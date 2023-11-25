<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Auto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand_id')->textInput() ?>

    <?= $form->field($model, 'mileage')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
