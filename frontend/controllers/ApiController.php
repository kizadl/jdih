<?php

namespace frontend\controllers;

use common\models\IzinDokumen;
use frontend\models\DataLampiran;
use frontend\models\Dokumen;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\db\Connection;

class ApiController extends Controller
{
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $key = Yii::$app->request->get('key');;

        if (!$key || !hash_equals($key, getenv('API_KEY'))) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->statusCode = 403;
            Yii::$app->response->data = ['error' => 'Invalid API key'];
            return false;
        }

        return true;
    }

    public function actionDokumen()
    {
        try {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $servername = getenv('DB_HOST') . ':' . getenv('DB_DATABASE_PORT');
            $username = getenv('DB_USER');
            $password = getenv('DB_PASSWORD');
            $dbname = getenv('DB_DATABASE');

            $varjson = array();
            $conn = new \mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                throw new \Exception("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM document";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row_array = (object)array();
                    $row_array->idData = $row["id"]; //berisi id dokumen
                    $row_array->tahun_pengundangan = !empty($row["tanggal_pengundangan"]) ? date('Y', strtotime($row["tanggal_pengundangan"])) : null; //berisi tahun penetapan atau tahun terbit ex. 2019
                    $row_array->tanggal_pengundangan = !empty($row["tanggal_pengundangan"]) ? $row["tanggal_pengundangan"] : null; //berisi tahun bulan tanggal (YYYY-MM-DD) ex. 2019-04-22
                    $row_array->jenis = !empty($row["jenis_peraturan"]) ? $row["jenis_peraturan"] : null; //berisi jenis peraturan ex. Peraturan Daerah
                    $row_array->noPeraturan = !empty($row["nomor_peraturan"]) ? $row["nomor_peraturan"] : null; //berisi no peraturan ex. 24
                    $row_array->judul = !empty($row["judul"]) ? $row["judul"] : null; //berisi judul ex. Peraturan Pemerintah No 1 Tahun 2019 Tentang Peraturan
                    $row_array->noPanggil = !empty($row["nomor_panggil"]) ? $row["nomor_panggil"] : null; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
                    $row_array->singkatanJenis = !empty($row["singkatan_jenis"]) ? $row["singkatan_jenis"] : null; //berisi singkatan dari jenis ex. PERMEN/KEPMEN
                    $row_array->tempatTerbit = !empty($row["tempat_terbit"]) ? $row["tempat_terbit"] : null; //berisi tempat terbit
                    $row_array->penerbit = !empty($row["penerbit"]) ? $row["penerbit"] : null; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
                    $row_array->deskripsiFisik = !empty($row["deskripsi_fisik"]) ? $row["deskripsi_fisik"] : null; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
                    $row_array->sumber = !empty($row["sumber"]) ? $row["sumber"] : null; //berisi sumber dokumen hukum, contoh PUU bersumber dari Berita Negara Tahun .... Nomor .....

                    // Fetch subjects from data_subyek table where id_dokumen matches
                    $subyek_sql = "SELECT subyek FROM data_subyek WHERE id_dokumen = " . $row["id"];
                    $subyek_result = $conn->query($subyek_sql);
                    $subjects = [];
                    if ($subyek_result->num_rows > 0) {
                        while ($subyek_row = $subyek_result->fetch_assoc()) {
                            $subjects[] = $subyek_row["subyek"];
                        }
                    }
                    $row_array->subjek = implode(", ", $subjects); //berisi kata kunci dari dokumen hukum, dipisah koma
                    $row_array->isbn = !empty($row["isbn"]) ? $row["isbn"] : null; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
                    $row_array->status = !empty($row["status"]) ? $row["status"] : null; //berisi status PUU ex.berlaku/tidak berlaku
                    $row_array->bahasa = !empty($row["bahasa"]) ? $row["bahasa"] : null; //berisi bahasa dari dokumen hukum tersebut
                    $row_array->bidangHukum = !empty($row["bidang_hukum"]) ? $row["bidang_hukum"] : null; //berisi pembidangan/pengkategorian isi dokumen hukum(opsional menyesuaikan kebutuhan instansi)
                    $row_array->teuBadan = !empty($row["teu"]) ? $row["teu"] : null; //nama instansi terkait
                    $row_array->nomorIndukBuku = !empty($row["nomor_induk_buku"]) ? $row["nomor_induk_buku"] : null; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'

                    $file_sql = "SELECT id, dokumen_lampiran FROM data_lampiran WHERE id_dokumen = " . $row["id"] . " LIMIT 1";
                    $file_result = $conn->query($file_sql);
                    $id = null;
                    $file = null;
                    if ($file_result->num_rows > 0) {
                        $file_row = $file_result->fetch_assoc();
                        $id = $file_row["id"];
                        $file = $file_row["dokumen_lampiran"];
                    }
                    $row_array->fileDownload = !empty($file) ? $file : null; //berisi nama file ex. peraturan.pdf, peraturan.docx

                    //berisi url dan nama file ex. domain.com/peraturan.pdf atau menyesuaikan
                    if (!empty($row["tipe_dokumen"]) && intval($row["tipe_dokumen"]) == 2) {
                        $staticKey = getenv('API_KEY');

                        $row_array->urlDownload = (!empty($id) && $staticKey)
                            ? (rtrim(getenv('PUBLIC_DOMAIN'), '/') . "/api/view/{$staticKey}/{$id}")
                            : null;
                    } else if (!empty($row["tipe_dokumen"]) && intval($row["tipe_dokumen"]) != 2) {
                        $row_array->urlDownload = !empty($file) ? (getenv('PUBLIC_DOMAIN') . "/ildis/common/dokumen/" . rawurlencode($file)) : null;
                    } else {
                        // Fallback jika id_dokumen kosong
                        $row_array->urlDownload = !empty($file) ? (getenv('PUBLIC_DOMAIN') . "/" . $file) : null;
                    }
                    $row_array->abstrak = !empty($row["abstrak"]) ? $row["abstrak"] : null;
                    $row_array->urlabstrak = !empty($row["abstrak"]) ? (getenv('PUBLIC_DOMAIN') . "/ildis/common/dokumen/" . rawurlencode($row["abstrak"])) : null;
                    $row_array->urlDetailPeraturan = !empty($row["id"]) ? (getenv('PUBLIC_DOMAIN') . "/dokumen/view?id=" . $row["id"]) : null; //berisi url halaman detail peraturan
                    $row_array->operasi = "4"; //wajib ada
                    $row_array->display = "1"; //wajib ada

                    array_push($varjson, $row_array);
                }
                $conn->close();
                return $varjson;
            } else {
                $conn->close();
                return ["message" => "No results found"];
            }
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function actionView($dokumen_id)
    {
        if (!$dokumen_id) throw new BadRequestHttpException('Dokumen ID harus diberikan');

        $lampiran = DataLampiran::findOne($dokumen_id);
        if (!$lampiran) throw new NotFoundHttpException('Dokumen tidak ditemukan');

        $dokumen = Dokumen::findOne($lampiran->id_dokumen);
        if (!$dokumen) throw new NotFoundHttpException('Dokumen tidak ditemukan');

        $name = $lampiran->dokumen_lampiran;

        if ($dokumen->tipe_dokumen == 2) {
            $path = Yii::getAlias('@private/dokumen/asli/' . $name);
        } else {
            $path = Yii::getAlias('@ildisCommon/dokumen/' . $name);
        }

        if (!is_file($path)) throw new NotFoundHttpException('File tidak ditemukan');

        return Yii::$app->response->sendFile($path, $name, [
            'mimeType' => 'application/pdf',
            'inline'   => true,
        ]);
    }
}
