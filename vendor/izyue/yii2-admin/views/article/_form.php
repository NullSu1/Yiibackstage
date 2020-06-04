<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */


?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'article_title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'created_at')->textInput() ?>

                <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </section>
    </div>
</div>
