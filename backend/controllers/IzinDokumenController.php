<?php

namespace backend\controllers;

use Yii;
use common\models\IzinDokumen;
use backend\models\IzinDokumenSearch;
use backend\models\DokumenJdih;
use backend\models\LogPustakawan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * IzinDokumenController implements the CRUD actions for IzinDokumen model.
 */
class IzinDokumenController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all IzinDokumen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinDokumenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinDokumen model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        // Get related document information
        $dokumen = DokumenJdih::findOne($model->dokumen_id);

        return $this->render('view', [
            'model' => $model,
            'dokumen' => $dokumen,
        ]);
    }

    /**
     * Creates a new IzinDokumen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinDokumen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Log the creation
            $log = new LogPustakawan();
            $log->dokumen_id = $model->dokumen_id;
            $log->controller = 'IzinDokumen';
            $log->aksi = 'Tambah Izin Dokumen';
            $log->keterangan = 'User ' . \Yii::$app->user->identity->username . ' melakukan tambah data izin dokumen untuk client ' . $model->client_id . ' pada ' . date("Y-m-d H:i:s");
            $log->save();

            Yii::$app->session->setFlash('success', 'Data Izin Dokumen berhasil ditambahkan');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinDokumen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Log the update
            $log = new LogPustakawan();
            $log->dokumen_id = $model->dokumen_id;
            $log->controller = 'IzinDokumen';
            $log->aksi = 'Ubah Izin Dokumen';
            $log->keterangan = 'User ' . \Yii::$app->user->identity->username . ' melakukan ubah data izin dokumen untuk client ' . $model->client_id . ' pada ' . date("Y-m-d H:i:s");
            $log->save();

            Yii::$app->session->setFlash('success', 'Data Izin Dokumen berhasil diubah');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IzinDokumen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        try {
            $model->delete();

            // Log the deletion
            $log = new LogPustakawan();
            $log->dokumen_id = $model->dokumen_id;
            $log->controller = 'IzinDokumen';
            $log->aksi = 'Hapus Izin Dokumen';
            $log->keterangan = 'User ' . \Yii::$app->user->identity->username . ' melakukan hapus data izin dokumen untuk client ' . $model->client_id . ' pada ' . date("Y-m-d H:i:s");
            $log->save();

            Yii::$app->session->setFlash('success', 'Data Izin Dokumen berhasil dihapus');
            return $this->redirect(['index']);
        } catch (\yii\db\IntegrityException $e) {
            Yii::$app->session->setFlash('error', "Data Izin Dokumen Tidak Dapat Dihapus Karena Dipakai Modul Lain");
            return $this->redirect(['index']);
        }
    }

    /**
     * Approve an izin dokumen request
     * @param integer $id
     * @return mixed
     */
    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $model->status = IzinDokumen::STATUS_APPROVED;

        if ($model->save()) {
            // Log the approval
            $log = new LogPustakawan();
            $log->dokumen_id = $model->dokumen_id;
            $log->controller = 'IzinDokumen';
            $log->aksi = 'Setujui Izin Dokumen';
            $log->keterangan = 'User ' . \Yii::$app->user->identity->username . ' menyetujui izin dokumen untuk client ' . $model->client_id . ' pada ' . date("Y-m-d H:i:s");
            $log->save();

            Yii::$app->session->setFlash('success', 'Izin Dokumen berhasil disetujui');
        } else {
            Yii::$app->session->setFlash('error', 'Gagal menyetujui izin dokumen');
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Reject an izin dokumen request
     * @param integer $id
     * @return mixed
     */
    public function actionReject($id)
    {
        $model = $this->findModel($id);
        $model->status = IzinDokumen::STATUS_REJECTED;

        if ($model->save()) {
            // Log the rejection
            $log = new LogPustakawan();
            $log->dokumen_id = $model->dokumen_id;
            $log->controller = 'IzinDokumen';
            $log->aksi = 'Tolak Izin Dokumen';
            $log->keterangan = 'User ' . \Yii::$app->user->identity->username . ' menolak izin dokumen untuk client ' . $model->client_id . ' pada ' . date("Y-m-d H:i:s");
            $log->save();

            Yii::$app->session->setFlash('success', 'Izin Dokumen berhasil ditolak');
        } else {
            Yii::$app->session->setFlash('error', 'Gagal menolak izin dokumen');
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Load dokumen data for select2
     * @param string $q
     * @param integer $id
     * @return mixed
     */
    public function actionLoaddokumen($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new \yii\db\Query();
            $query->select('id, judul AS text')
                ->from('document')
                ->where(['like', 'judul', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => DokumenJdih::find($id)->judul];
        }
        return $out;
    }

    /**
     * Finds the IzinDokumen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinDokumen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinDokumen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
