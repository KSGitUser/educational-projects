<?php
/**
 * Created by PhpStorm.
 * User: Катерина
 * Date: 12.02.2019
 * Time: 10:13
 */

namespace app\widgets;


use yii\bootstrap\Widget;

class AuthorBookListWidget extends Widget;
{

    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_list',

    ])

}