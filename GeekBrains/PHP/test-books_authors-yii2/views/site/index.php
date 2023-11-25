<?php

/* @var $this yii\web\View */
use yii\widgets\ListView;

$this->title = 'Список авторов и книг:';

?>
<div class="site-index">

    <div class="author-books_list_container">
        <h1><?= $this->title?> </h1>

        <?php
        echo ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{pager}\n{items}\n{summary}",
        'summary' =>'',
        'itemView' => '_list',

        ]) ?>

    </div>


</div>
