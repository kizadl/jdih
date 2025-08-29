<?php

namespace frontend\controllers;

use common\models\IzinDokumen;
use frontend\models\DataLampiran;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

class StorageController extends Controller
{
    public function actionPreview($dokumen_id)
    {
        if (!$dokumen_id) {
            throw new BadRequestHttpException('Dokumen ID harus diberikan');
        }

        $dokumen = DataLampiran::findOne($dokumen_id);
        if (!$dokumen) {
            throw new NotFoundHttpException('Dokumen tidak ditemukan');
        }

        $path = 'preview/' . $dokumen->dokumen_lampiran;

        if (preg_match('~\.\.|\\\\~', $path)) {
            throw new ForbiddenHttpException('Path tidak valid');
        }

        $abs = Yii::getAlias('@private/dokumen/' . $path);
        if (!is_file($abs)) {
            throw new NotFoundHttpException('File tidak ditemukan');
        }

        return Yii::$app->response->sendFile($abs, basename($abs), ['inline' => false]);
    }

    public function actionDownload($client_id, $dokumen_id)
    {
        if (!$client_id || !$dokumen_id) {
            throw new BadRequestHttpException('Client ID dan Dokumen ID harus diberikan');
        }

        $izin = IzinDokumen::findActiveByClientAndDokumen($client_id, $dokumen_id)->one();
        if (!$izin) {
            throw new ForbiddenHttpException('Anda tidak memiliki izin untuk mengunduh dokumen ini');
        }

        $path = '';

        $dokumen = DataLampiran::findOne($dokumen_id);
        if (!$dokumen) {
            throw new NotFoundHttpException('Dokumen tidak ditemukan');
        }

        if ($izin && $izin->status == IzinDokumen::STATUS_APPROVED) {
            $path = 'asli/' . $dokumen->dokumen_lampiran;
        }

        if (preg_match('~\.\.|\\\\~', $path)) {
            throw new ForbiddenHttpException('Path tidak valid');
        }

        $abs = Yii::getAlias('@private/dokumen/' . $path);
        if (!is_file($abs)) {
            throw new NotFoundHttpException('File tidak ditemukan');
        }

        return Yii::$app->response->sendFile($abs, basename($abs), ['inline' => false]);
    }
}
