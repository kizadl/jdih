<?php

use mdm\admin\components\Helper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IzinDokumenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izin Dokumen';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php Pjax::begin(['enablePushState' => false]); ?>

<div class="box-body table-responsive no-padding">
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?= GridView::widget([

        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-file"></i> Data ' . 'Izin Dokumen' . '</h3>',
        ],
        'toolbar' =>  [
            [
                'content' => Html::a('<i class="fa fa-plus-circle"></i> Tambah Data', ['create'], ['class' => 'btn btn-success'])
            ],
            '{export}',
            '{toggleData}'
        ],
        'dataProvider' => $dataProvider,
        'summary' => 'Ditampilkan {begin} - {end} dari {totalCount} Data',
        'filterModel' => $searchModel,
        'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [

            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width: 50px;', 'class' => 'text-center'],
                'header' => 'No',
                'headerOptions' => ['class' => 'text-center'],
            ],

            'id',
            'client_id',
            'dokumen_id',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->getStatusLabel();
                },
                'filter' => [
                    \common\models\IzinDokumen::STATUS_PENDING => 'Pending',
                    \common\models\IzinDokumen::STATUS_APPROVED => 'Disetujui',
                    \common\models\IzinDokumen::STATUS_REJECTED => 'Ditolak',
                    \common\models\IzinDokumen::STATUS_EXPIRED => 'Kadaluarsa',
                ],
            ],
            [
                'attribute' => 'created_at',
                'format' => ['datetime', 'php:d/m/Y H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['datetime', 'php:d/m/Y H:i:s'],
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 150px;', 'class' => 'text-center'],
                'header' => 'Aksi',
                'headerOptions' => ['class' => 'text-center'],
                'template' => Helper::filterActionColumn('{view} {update} {delete} {approve} {reject}'),
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'View'),
                            'class' => 'btn btn-xs btn-info',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Update'),
                            'class' => 'btn btn-xs btn-warning',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'class' => 'btn btn-xs btn-danger',
                            'data' => [
                                'confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'approve' => function ($url, $model) {
                        if ($model->status == \common\models\IzinDokumen::STATUS_PENDING) {
                            return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['approve', 'id' => $model->id], [
                                'title' => 'Setujui',
                                'class' => 'btn btn-xs btn-success',
                                'data' => [
                                    'confirm' => 'Apakah Anda yakin ingin menyetujui izin dokumen ini?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    },
                    'reject' => function ($url, $model) {
                        if ($model->status == \common\models\IzinDokumen::STATUS_PENDING) {
                            return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['reject', 'id' => $model->id], [
                                'title' => 'Tolak',
                                'class' => 'btn btn-xs btn-danger',
                                'data' => [
                                    'confirm' => 'Apakah Anda yakin ingin menolak izin dokumen ini?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    },
                ],
            ],
        ],
    ]); ?>
</div>

<?php Pjax::end(); ?>