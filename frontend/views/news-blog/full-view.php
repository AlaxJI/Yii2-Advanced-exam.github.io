<?php 
use yii\helpers\Html;
?>

<h2><?= $model->title ?></h2>

<div class="meta">
    <p>Дата публикации: <?= $model->publiched_at ?></p>
</div>

<div class="content">
    <?= $model->content ?>
</div>

<?= Html::a('Назад', Yii::$app->user->getReturnUrl(), ['class' => 'btn btn-default']) ?>        