<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model izyue\admin\models\Article */
/* @var $form backend\widgets\ActiveForm */
?>

<div class="article-form row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <?= Html::encode($this->title) ?>
            </header>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'article_title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'addtime')->textInput() ?>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </section>
    </div>
</div>
