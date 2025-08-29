<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IzinDokumen */

$this->title = 'Tambah Izin Dokumen';
$this->params['breadcrumbs'][] = ['label' => 'Izin Dokumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Izin Dokumen</h3>
    </div>

    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>