<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\IzinDokumen */
/* @var $dokumen backend\models\DokumenJdih */

$this->title = 'Detail Izin Dokumen';
$this->params['breadcrumbs'][] = ['label' => 'Izin Dokumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs dashboard_tabs_cl">
        <li class="active"><a href="#tab_1" data-toggle="tab">Data Izin Dokumen</a></li>
        <li><a href="#tab_2" data-toggle="tab">Informasi Dokumen</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail Izin Dokumen</h3>
                    <div class="box-tools pull-right">
                        <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?php if ($model->status == \common\models\IzinDokumen::STATUS_PENDING): ?>
                            <?= Html::a('<i class="fa fa-check"></i> Setujui', ['approve', 'id' => $model->id], [
                                'class' => 'btn btn-success btn-sm',
                                'data' => [
                                    'confirm' => 'Apakah Anda yakin ingin menyetujui izin dokumen ini?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                            <?= Html::a('<i class="fa fa-times"></i> Tolak', ['reject', 'id' => $model->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Apakah Anda yakin ingin menolak izin dokumen ini?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        <?php endif; ?>
                        <?= Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'client_id',
                            'dokumen_id',
                            [
                                'attribute' => 'status',
                                'value' => $model->getStatusLabel(),
                            ],
                            [
                                'attribute' => 'created_at',
                                'format' => ['datetime', 'php:d/m/Y H:i:s'],
                            ],
                            [
                                'attribute' => 'updated_at',
                                'format' => ['datetime', 'php:d/m/Y H:i:s'],
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="tab_2">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Dokumen</h3>
                </div>
                <div class="box-body">
                    <?php if ($dokumen): ?>
                        <?= DetailView::widget([
                            'model' => $dokumen,
                            'attributes' => [
                                'id',
                                'judul',
                                'nomor_peraturan',
                                'jenis_peraturan',
                                'tahun_terbit',
                                [
                                    'attribute' => 'status',
                                    'value' => $dokumen->status,
                                ],
                            ],
                        ]) ?>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <h4><i class="icon fa fa-warning"></i> Dokumen Tidak Ditemukan</h4>
                            Dokumen dengan ID <?php echo $model->dokumen_id; ?> tidak ditemukan dalam database.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>