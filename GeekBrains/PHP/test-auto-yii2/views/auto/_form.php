<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Auto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand_id')->dropDownList($brandArray,
        ['prompt' => 'Выберете марку автомобиля', 'class'=>'brand-select-form form-control']) ?>
    <?= \yii\helpers\Html::label('Модель', ['class'=>'control-label']) ?>
    <?= \yii\helpers\Html::dropDownList('Auto[model_id]',null,[],
        ['class' => 'model-select-form form-control',
            'prompt' => 'Вначале выберете марку автомобиля',
            'required' => 'required'] ) ?>


    <?= $form->field($model, 'mileage')->textInput() ?>

    <?= $form->field($model, 'safeties')->checkboxList($safetiesArray) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'photo_id')->textInput() */?>

    <?= $form->field($model, 'imageFile[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
