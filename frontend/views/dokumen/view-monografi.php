<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\PeraturanTerkait;
use frontend\models\DokumenTerkait;
use frontend\models\DataLampiran;
use frontend\models\DataStatus;
use frontend\models\Eksemplar;
use frontend\models\HasilUjiMateri;
use frontend\models\DataPengarang;
use frontend\models\DataSubyek;
/* @var $this yii\web\View */
/* @var $model frontend\models\Dokumen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dokumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="page-title-section bg-img cover-background" data-overlay-dark="7" data-background="/img/banner/header.jpg">
    <div class="container">
        <h1>Monografi Detail</h1>
        <ul class="text-center">
            <li><?= Html::a('Home', ['/']); ?></li>
            <li><?= Html::a('Monografi', ['/dokumen/monografi']); ?></li>
            <li>
                <span class="active"> <?= $model->jenis_peraturan; ?></span>
            </li>
        </ul>
    </div>
</section>
<style>
    .modal.fade .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0 auto;
    }

    .modal-content {
        max-height: 80vh;
        overflow: auto;
    }
</style>
<!-- end page title section -->

<!-- start blog detail section -->
<section class="blogs">
    <div class="container">
        <div class="widget search mb-4">
            <form id="w0" action="/dokumen/index" method="get" data-pjax="1">
                <div class="form-row align-items-center">
                    <div class="col-md-10 my-1">
                        <input type="text" class="form-control" id="dokumensearch-judul" name="DokumenSearch[judul]" placeholder="cari dokumen hukum lainnya...">
                    </div>


                    <div class="col-md-2 my-1">
                        <button type="submit" class="butn btn-block">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <!--  start blog left-->

            <div class="col-lg-8 col-md-12 sm-margin-50px-bottom">
                <div class="posts">
                    <!--  start post-->

                    <div class="content">
                        <div class="blog-list-simple-text post-meta margin-20px-bottom">
                            <div class="post-title">
                                <h5><?= $model->judul; ?></h5>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-lg-6 col-md-6 mb-3">
                                Nomor Panggil<br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->nomor_panggil; ?></span>
                            </div>

                            <div class="col-lg-6 col-md-6 mb-3">
                                Penerbit <br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->penerbit; ?></span>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                Tahun Terbit<br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->tahun_terbit; ?></span>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                Deskripsi Fisik<br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->deskripsi_fisik; ?></span>
                            </div>

                            <div class="col-lg-6 col-md-6 mb-3">
                                Klasifikasi<br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->klasifikasi; ?></span>
                            </div>


                            <div class="col-lg-6 col-md-6 mb-3">
                                Bahasa<br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->bahasa; ?></span>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                ISBN<br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->isbn; ?></span>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                Tempat Terbit<br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->tempat_terbit; ?></span>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                Anotasi<br>
                                <span class="text-extra-dark-gray font-weight-600">
                                    <p class="text-justify"><?= $model->sumber; ?></p>
                                </span>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                Bidang Hukum<br>
                                <span class="text-extra-dark-gray font-weight-600"><?= $model->bidang_hukum; ?></span>
                            </div>

                        </div>

                        <div class="row align-items-end">
                            <div class="col-lg-12 col-md-12 mt-4">
                                <span class="text-extra-dark-gray font-weight-600">EKSEMPLAR</span><br>
                                <table class="table">
                                    <thead>
                                        <tr class="active">
                                            <th>Kode Eksemplar</th>
                                            <th>lokasi Rak</th>
                                            <th>Status Buku</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $eksemplar = Eksemplar::find()->where(['id_dokumen' => $model->id])->all();
                                    if (!empty($eksemplar)) {
                                        echo '<tbody>';
                                        foreach ($eksemplar as  $data) {
                                            //echo $data['document_terkait'];
                                            echo '<tr><td>' . $data->kode_eksemplar . '</td>';
                                            echo '<td>' . $data->lokasi_rak . '</td>';
                                            if ($data->status_eksemplar == 'Dipinjam') {

                                                echo '<td><span class="label label-danger">' . $data->status_eksemplar . '</span></td></tr>';
                                            } else {
                                                echo '<td>' . $data->status_eksemplar . '</td></tr>';
                                            }
                                        }
                                        echo '</tbody>';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>

                        <div class="row align-items-end">
                            <div class="col-lg-12 col-md-12 mt-4">
                                <span class="text-extra-dark-gray font-weight-600">T.E.U BADAN</span><br>
                                <table class="table">
                                    <thead>
                                        <tr class="active">
                                            <th>Nama Pengarang</th>
                                            <th>Tipe Pengarang</th>
                                            <th>Jenis Pengarang</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $teu = DataPengarang::find()->where(['id_dokumen' => $model->id])->all();
                                    if (!empty($teu)) {
                                        echo '<tbody>';
                                        foreach ($teu as  $data) {
                                            //echo $data['document_terkait'];
                                            echo '<tr><td>' . $data->namaPengarang->name . '</td>';
                                            echo '<td>' . $data->tipePengarang->name . '</td>';
                                            echo '<td>' . $data->jenisPengarang->name . '</td></tr>';
                                        }
                                        echo '</tbody>';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>

                        <div class="row align-items-end">
                            <div class="col-lg-12 col-md-12 mt-4">
                                <span class="text-extra-dark-gray font-weight-600"> SUBJEK : </span>
                                <!-- <table class="table">
                                    <thead>
                                        <tr class="active">
                                            <th>Nama Subjek</th>
                                            <th>Tipe Subjek</th>
                                            <th>Jenis Subjek</th>
                                        </tr>
                                    </thead> -->
                                <?php
                                $subjek = DataSubyek::find()->where(['id_dokumen' => $model->id])->all();
                                if (!empty($subjek)) {
                                    foreach ($subjek as  $data) {
                                        echo  $data->subyek . ' - ';
                                    }
                                    //echo// '</tbody>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  end blog left-->

            <!--  start blog right-->
            <div class="col-lg-4 col-md-12 padding-30px-left sm-padding-15px-left">
                <div class="side-bar">
                    <div class="shadow">
                        <ul class="list-group mt-2">
                            <li class="list-group-item text-center">JENIS DOKUMEN</li>
                            <li class="list-group-item list-group-item-primary text-center"><strong><?= $model->jenis_peraturan; ?></strong></li>
                        </ul>
                    </div>

                    <?php if (!empty($model->gambar_sampul)) {
                        echo '    
                    <div class="shadow">
                        <ul class="list-group mt-2">
                            <li class="list-group-item text-center">COVER </li>
                            <li class="list-group-item list-group-item-warning text-center">' .
                            Html::img('@web/common/dokumen/' . $model->gambar_sampul, ['class' => 'rounded']) . '
                            
                            </li>
                        </ul>
                    </div>';
                    } ?>

                    <div class="widget">
                        <div class="widget-title margin-35px-bottom mt-4">
                            <h3>Lampiran</h3>
                        </div>
                        <ul class="widget-list">
                            <?php
                            $lampiran = DataLampiran::find()->where(['id_dokumen' => $model->id])->all();

                            if (!empty($lampiran)) {
                                foreach ($lampiran as  $data) {
                                    echo Html::button(
                                        $data->dokumen_lampiran,
                                        [
                                            'class' => 'btn btn-secondary btn-sm mb-2 ml-2 btn-hover-primary lampiran-btn',
                                            'type' => 'button',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#lampiranModal',
                                            'data-file' => Yii::getAlias('@web') . '/storage/dokumen/' . str_replace(' ', '+', $data->dokumen_lampiran),
                                            'data-name' => $data->dokumen_lampiran,
                                            'data-id' => $data->id,
                                            'title' => 'lihat file'
                                        ]
                                    );
                                }
                            }
                            if (!empty($model->abstrak)) {
                                echo '<br>';
                                echo  Html::a($model->abstrak, ['/common/dokumen/' . $model->abstrak], ['class' => 'btn btn-secondary btn-sm mb-2 btn-hover-primary', 'target' => '_blank', 'title' => 'lihat file']);
                            }
                            ?>

                        </ul>
                    </div>

                    <!-- Lampiran Modal -->
                    <div class="modal fade" id="lampiranModal" tabindex="-1" role="dialog" aria-labelledby="lampiranModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="lampiranModalLabel">Lampiran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p id="lampiranFileName"></p>
                                    <div class="text-right">
                                        <a href="#" id="previewBtn" class="btn btn-primary">Download Preview</a>
                                        <button id="izinBtn" type="button" class="btn btn-secondary">Izin Download Dokumen Asli</button>
                                        <a href="#" id="downloadBtn" type="button" class="btn btn-success" hidden>Download Dokumen Asli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Lampiran Modal -->

                    <!-- Modal Konfirmasi Izin -->
                    <div class="modal fade" id="izinModal" tabindex="-1" role="dialog" aria-labelledby="izinModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="izinModalLabel">Konfirmasi Permintaan Izin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda ingin mengajukan izin untuk mengakses dokumen asli?</p>
                                    <p><strong>File:</strong> <span id="izinFileName"></span></p>
                                    <div class="alert alert-info">
                                        <small>
                                            Dengan mengajukan izin, Anda akan mendapatkan akses untuk mendownload dokumen asli setelah permintaan diproses. 
                                            Silakan cek secara berkala.
                                        </small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="ajukanIzinBtn">
                                        <i class="fa fa-paper-plane"></i> Ajukan Izin
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Konfirmasi Izin -->

                    <?php

                    use yii\helpers\Url;
                    use yii\web\View;

                    $cekUrl = Url::to(['izin-dokumen/cek-izin'], true);
                    $ajukanUrl = Url::to(['izin-dokumen/ajukan-izin'], true);
                    $previewBaseUrl = Url::to(['storage/dokumen/preview'], true);
                    $downloadBaseUrl = Url::to(['storage/dokumen/download'], true);

                    $js = <<<JS
                    (function(){
                    // --- init device_id sekali ---
                    (function initDeviceId(){
                        if (document.cookie.indexOf('device_id=') === -1) {
                        var id = (window.crypto && crypto.randomUUID) 
                                    ? crypto.randomUUID()
                                    : Math.random().toString(36).slice(2) + Date.now().toString(36);
                        document.cookie = "device_id=" + encodeURIComponent(id) + "; path=/; max-age=" + (60*60*24*365*10);
                        }
                    })();

                    // --- helper cookie ---
                    function getCookie(name){
                        var re = new RegExp('(?:^|; )' + name.replace(/[.\\[\\](){}?+*^$|\\\\]/g,'\\\\$&') + '=([^;]*)');
                        var m = document.cookie.match(re);
                        return m ? decodeURIComponent(m[1]) : null;
                    }

                    // --- fungsi cek izin (global) ---
                    window.cekIzinDokumen = function(dokumen_id){
                        var client_id = getCookie('device_id');
                        if (!client_id) {
                        console.warn("device_id belum ada di cookie");
                        return Promise.reject("device_id missing");
                        }
                        return fetch('$cekUrl?client_id=' + encodeURIComponent(client_id) + '&dokumen_id=' + encodeURIComponent(dokumen_id), {
                        method: 'GET',
                        headers: { 'Accept': 'application/json' }
                        }).then(function(r){ return r.json(); });
                    };

                    // --- fungsi ajukan izin ---
                    function ajukanIzinDokumen(dokumen_id, fileName){
                        var client_id = getCookie('device_id');
                        if (!client_id) {
                            alert('Device ID tidak ditemukan. Silakan refresh halaman.');
                            return Promise.reject("device_id missing");
                        }

                        // Prepare form data
                        var formData = new FormData();
                        formData.append('client_id', client_id);
                        formData.append('dokumen_id', dokumen_id);
                        // formData.append('_csrf', document.querySelector('meta[name=csrf-token]').getAttribute('content'));

                        return fetch('$ajukanUrl', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        }).then(function(r){
                            console.log(r);
                            if (!r.ok) {
                                throw new Error('HTTP error! status: ' + r.status);
                            }
                            return r.json();
                        });
                    }

                    // --- listener klik sekali untuk semua tombol .lampiran-btn ---
                    document.addEventListener('click', function(e){
                        var btn = e.target.closest('.lampiran-btn');
                        if (!btn) return;

                        var file = btn.getAttribute('data-file');
                        var name = btn.getAttribute('data-name');
                        var id   = btn.getAttribute('data-id');

                        var fnameEl = document.getElementById('lampiranFileName');
                        if (fnameEl) fnameEl.textContent = name;

                        var preview = document.getElementById('previewLink');
                        if (preview) preview.setAttribute('href', file);

                        cekIzinDokumen(id).then(function(data){
                            buttonPreview = document.getElementById('previewBtn');
                            buttonIzin = document.getElementById('izinBtn');
                            buttonDownload = document.getElementById('downloadBtn');

                            var client_id = getCookie('device_id');

                            if (data.status === true) {
                                buttonPreview.hidden = true;
                                buttonIzin.hidden = true;
                                buttonDownload.hidden = false;

                                var downloadUrl = '$downloadBaseUrl' + '/' + encodeURIComponent(client_id) + '/' + encodeURIComponent(id);
                                buttonDownload.setAttribute('href', downloadUrl);
                            } else {
                                buttonPreview.hidden = false;
                                buttonIzin.hidden = false;
                                buttonDownload.hidden = true;

                                var previewUrl = '$previewBaseUrl' + '/' + encodeURIComponent(id);
                                buttonPreview.setAttribute('href', previewUrl);
                            }
                        }).catch(function(err){
                            console.error(err);
                        });
                    }, false);

                    // --- listener untuk tombol izin ---
                    document.addEventListener('click', function(e){
                        if (e.target.id === 'izinBtn' || e.target.closest('#izinBtn')) {
                            e.preventDefault();

                            var fileName = document.getElementById('lampiranFileName').textContent;
                            var fileNameEl = document.getElementById('izinFileName');
                            if (fileNameEl) fileNameEl.textContent = fileName;

                            // Tutup modal lampiran dan buka modal izin
                            $('#lampiranModal').modal('hide');
                            setTimeout(function(){
                                $('#izinModal').modal('show');
                            }, 300);
                        }
                    });

                    // --- listener untuk tombol ajukan izin ---
                    document.addEventListener('click', function(e){
                        if (e.target.id === 'ajukanIzinBtn' || e.target.closest('#ajukanIzinBtn')) {
                            e.preventDefault();
                            
                            var fileName = document.getElementById('izinFileName').textContent;
                            var btn = e.target.id === 'ajukanIzinBtn' ? e.target : e.target.closest('#ajukanIzinBtn');

                            // Disable button dan ubah text
                            btn.disabled = true;
                            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mengirim...';

                            // Cari dokumen ID dari tombol lampiran yang diklik terakhir
                            var lampiranBtn = document.querySelector('.lampiran-btn[data-name="' + fileName + '"]');
                            var dokumenId = lampiranBtn ? lampiranBtn.getAttribute('data-id') : null;

                            if (!dokumenId) {
                                alert('Dokumen ID tidak ditemukan');
                                btn.disabled = false;
                                btn.innerHTML = '<i class="fa fa-paper-plane"></i> Ajukan Izin';
                                return;
                            }

                            ajukanIzinDokumen(dokumenId, fileName).then(function(response){
                                if (response.success === true) {
                                    alert('Permintaan izin berhasil dikirim!');
                                    $('#izinModal').modal('hide');
                                } else {
                                    // Show the actual message from server
                                    var message = response.message || 'Gagal mengirim permintaan izin. Silakan coba lagi.';
                                    alert(message);
                                }
                            }).catch(function(err){
                                console.error('Error:', err);
                                alert('Terjadi kesalahan. Silakan coba lagi.');
                            }).finally(function(){
                                // Reset button
                                btn.disabled = false;
                                btn.innerHTML = '<i class="fa fa-paper-plane"></i> Ajukan Izin';
                            });
                        }
                    });

                    })();
                    JS;

                    $this->registerJs($js, View::POS_END);
                    ?>
                </div>
            </div>
            <!--  end blog right-->
        </div>
    </div>
</section>