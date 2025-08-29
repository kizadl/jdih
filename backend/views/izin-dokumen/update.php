<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IzinDokumen */

$this->title = 'Update Izin Dokumen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Dokumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Form Update Izin Dokumen</h3>
    </div>

    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>