<?php
use yii\helpers\Html;
use app\assets\OneCardAsset;

OneCardAsset::register($this);
?>
<h2>Продам: <?= $model->brand->brand_name ?> <?= $model->model->model_name ?></h2>
<h3>Цена: <?=$model->price?></h3>
<div class="view-container">

<div class="images-block">
    <div class="main-image">
        <?= Html::img("img/middle/720-{$model->images[0]->path}",
            ['alt' => $model->images[0]->path, 'class' => 'big-image']) ?>
    </div>
    <div class="container-small-images" >
    <?php foreach($model->images as $key => $image): ?>
        <div class="container-small-images">
        <?php if ($key == 0): ?>
        <?= Html::img("img/small/146-{$model->images[$key]->path}",
            ['alt' => $model->images[$key]->path,
            'class' => 'small-images  selected-image',
            'data-name' => $model->images[$key]->path]) ?>
        <?php endif; ?>
        <?php if ($key != 0): ?>

        <?= Html::img("img/small/146-{$model->images[$key]->path}",
            ['alt' => $model->images[$key]->path,
            'class' => 'small-images',
            'data-name' => $model->images[$key]->path]) ?>

        <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<div class="information-block">
    <p><strong>Пробег:</strong><?= $model->mileage?></p>
    <details class="safeties_details">
        <summary class="details_summary">Безопасность:</summary>
        <?php
        foreach ($model->safeties as $key => $safety): ?>
            <p><?= $safety->name?></p>
        <?php endforeach; ?>
    </details>
</div>
<div class=""contact-info">
<h3>Телефон: <?= $model->phone?></h3>
</div>


</div>
