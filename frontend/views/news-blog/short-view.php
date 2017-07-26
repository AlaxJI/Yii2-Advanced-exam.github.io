<?php

use yii\helpers\Html;
?>
<div class='panel panel-default'>
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-9">
                <h2><?= $model->title ?></h2>            
            </div>

            <div class="meta col-md-3">
                <p>Дата публикации: <br/> <?= $model->publiched_at ?></p>
            </div>
        </div>
    </div>    

    <div class="panel-body"">
        <?php if (strlen($model->content) > 300): ?>
            <?= substr(strip_tags($model->content), 0, 300) ?>
            <br/>
            <?= Html::a('Читать далее', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>        
        <?php else: ?>
            <?= $model->content ?>
        <?php endif ?>
    </div>
</div>

