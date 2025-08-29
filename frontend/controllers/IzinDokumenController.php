<?php

namespace frontend\controllers;

use Yii;
use common\models\IzinDokumen;
use frontend\models\Dokumen;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * IzinDokumenController implements the permission management for documents.
 */
class IzinDokumenController extends Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if ($action->id === 'ajukan-izin') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'ajukan-izin' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Check permission for a specific document
     * @param string $client_id
     * @param string $dokumen_id
     * @return mixed
     */
    public function actionCekIzin($client_id = null, $dokumen_id = null)
    {
        $client_id = $client_id ?: Yii::$app->request->get('client_id');
        $dokumen_id = $dokumen_id ?: Yii::$app->request->get('dokumen_id');

        $status = false;

        if ($client_id && $dokumen_id) {
            $izin = IzinDokumen::findActiveByClientAndDokumen($client_id, $dokumen_id)->one();

            if ($izin) {
                $status = $this->isIzinExpired($izin) ? $this->expireIzin($izin) : true;
            }
        }

        return json_encode(['status' => $status]);
    }

    /**
     * Submit permission request
     * @return mixed
     */
    public function actionAjukanIzin()
    {
        $client_id = Yii::$app->request->post('client_id');
        $dokumen_id = Yii::$app->request->post('dokumen_id');

        try {
            if ($client_id && $dokumen_id) {
                $cek = IzinDokumen::findActiveOrPendingByClientAndDokumen($client_id, $dokumen_id)->one();

                if ($cek) {
                    $success = false;
                    $message = "Pengajuan izin sebelumnya masih aktif atau dalam proses.";
                } else {
                    $model = new IzinDokumen([
                        'client_id' => $client_id,
                        'dokumen_id' => $dokumen_id,
                        'status' => IzinDokumen::STATUS_PENDING
                    ]);

                    if ($model->save()) {
                        $success = true;
                        $message = "Pengajuan izin berhasil dikirim. Status: " . $model->getStatusLabel();
                    } else {
                        $success = false;
                        $message = "Gagal menyimpan pengajuan izin.";
                    }
                }
            } else {
                $success = false;
                $message = "Client ID dan Dokumen ID diperlukan.";
            }
        } catch (\Throwable $th) {
            $success = false;
            $message = $th->getMessage();
        }

        return json_encode(['success' => $success, 'message' => $message]);
    }

    /**
     * Check if permission is expired (more than 1 month old)
     * @param IzinDokumen $izin
     * @return bool
     */
    private function isIzinExpired(IzinDokumen $izin)
    {
        return strtotime($izin->updated_at) < strtotime('-1 month');
    }

    /**
     * Mark permission as expired and return false
     * @param IzinDokumen $izin
     * @return bool
     */
    private function expireIzin(IzinDokumen $izin)
    {
        $izin->status = IzinDokumen::STATUS_EXPIRED;
        $izin->save();
        return false;
    }
}
