<?php

use yii\helpers\Html;
use app\assets\AutoAsset;

AutoAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\tables\Auto */

$this->title = 'Create Auto';
$this->params['breadcrumbs'][] = ['label' => 'Autos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'brandArray' => $brandArray,
        'safetiesArray' => $safetiesArray,
    ]) ?>

</div>
