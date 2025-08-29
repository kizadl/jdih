<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\IzinDokumen */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            'offset' => 'col-sm-offset-3',
            'wrapper' => 'col-sm-6',
            'hint' => '',
        ],
    ]
]); ?>

<?= $form->errorSummary($model) ?>

<div class="box-body">
    <?= $form->field($model, 'client_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dokumen_id')->widget(Select2::classname(), [
        'initValueText' => '', // set the initial display text
        'options' => ['placeholder' => 'Cari dokumen ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new \yii\web\JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => Url::to(['loaddokumen']),
                'dataType' => 'json',
                'data' => new \yii\web\JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
            'templateResult' => new \yii\web\JsExpression('function(dokumen) { return dokumen.text; }'),
            'templateSelection' => new \yii\web\JsExpression('function (dokumen) { return dokumen.text; }'),
        ],
    ]); ?>

    <?= $form->field($model, 'status')->dropDownList([
        \common\models\IzinDokumen::STATUS_PENDING => 'Pending',
        \common\models\IzinDokumen::STATUS_APPROVED => 'Disetujui',
        \common\models\IzinDokumen::STATUS_REJECTED => 'Ditolak',
        \common\models\IzinDokumen::STATUS_EXPIRED => 'Kadaluarsa',
    ], ['prompt' => '-- Pilih Status --']) ?>
</div>

<div class="box-footer">
    <div class="col-sm-offset-3 col-sm-6">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Simpan' : '<i class="fa fa-save"></i> Update', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
        <?= Html::a('<i class="fa fa-times"></i> Batal', ['index'], ['class' => 'btn btn-default']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>