<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books list';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <ul>
    <?php foreach($data as $value) : ?>
        <li>
            <span>"<?=$value['title']?>" </span>
            <span><?=$value['author']['name']?>  <?=$value['author']['surname']?> </span>
        </li>
    <?php endforeach; ?>
    </ul>
</div>
