<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NewsBlog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-blog-view">

    <?= $this->render('full-view', ['model' => $model]);?>
    
   
</div>
