<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новостной блог';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    foreach ($dataProvider->models as $model):
        echo $this->render('short-view', ['model' => $model]);
    endforeach;
    ?>

</div>
