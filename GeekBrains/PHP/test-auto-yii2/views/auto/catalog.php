<?php
use yii\helpers\Html;
use app\assets\CatalogAsset;
use yii\widgets\LinkPager;

CatalogAsset::register($this);
?>
<div class="auto-catalog-container">
    <span>
        <strong>
            <?= $model[0]->brand->getAttributeLabel('brand_name') ?>,
            <?= $model[0]->model->getAttributeLabel('model_name') ?>
        </strong>
    </span>
    <span>
        <strong>
            <?= $model[0]->getAttributeLabel('price') ?>, руб
        </strong>
    </span>
    <span>
        <strong>
           Фото
        </strong>
    </span>
    <span>
        <strong>
            <?= $model[0]->getAttributeLabel('mileage') ?>
        </strong>
    </span>

    <?php foreach ($model as $key => $record) : ?>
    <span>
        <?= Html::a(
                "{$record->brand->brand_name}, {$record->model->model_name}",
                       ['auto/one', 'id' => $record->id])
        ?>
    </span>
    <span>
        <?= $record->price ?>
    </span>
    <span>
        <?= Html::img("@web/img/small/146-{$record->images[0]->path}") ?>
    </span>
    <span>
        <?= $record->mileage?>
    </span>
    <span class="button-container">
        <?= Html::a(
            "Удалить",
            ['auto/delete', 'id' => $record->id],
            ['class' => "btn btn-primary", 'data-method' => 'post'])
        ?>
    </span>

    <?php endforeach; ?>
</div>
<?= LinkPager::widget(['pagination' => $pagination]) ?>
