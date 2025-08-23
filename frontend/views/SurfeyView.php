<!-- views/survey/index.php -->

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Survei Kepuasan Masyarakat';

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'respondent_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'question_1')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<?= $form->field($model, 'question_2')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<?= $form->field($model, 'question_3')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<?= $form->field($model, 'question_4')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<?= $form->field($model, 'question_5')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<?= $form->field($model, 'question_6')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<?= $form->field($model, 'question_7')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<?= $form->field($model, 'question_8')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<?= $form->field($model, 'question_9')->dropDownList(['1' => 'Sangat Puas', '2' => 'Puas', '3' => 'Kurang Puas', '4' => 'Tidak Puas']) ?>

<div class="form-group">
    <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
