<?php


use yii\helpers\Html;
use yii\widgets\ListView;

?>

<div class="inner-container">
    <ul>
        <li>  Автор: <?= $model->name . " " . $model->surname ?>
            <ul>
            <?php foreach ($model->books as $book): ?>
            <li> <?= $book->title ?></li>
            <?php endforeach; ?>
            </ul>

        </li>

    </ul>
</div>
