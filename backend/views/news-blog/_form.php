<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model common\models\NewsBlog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publiched_at')->widget('common\widgets\MaskedInput',
            ['clientOptions' => ['alias' =>  'dd.mm.yyyy'], 
                'options' => [
                    'value'=>$model->dateParse(),
                    'class'=>'form-control'
                    ]
                ]);


//textInput(['type' => 'date', 'value'=>Yii::$app->formatter->asDatetime($model->publiched_at, "php:Y-m-d")]) ?>

    <? //= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
