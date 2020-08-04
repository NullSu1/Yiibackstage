<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model izyue\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <?= Html::encode($this->title) ?>
            </header>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'sortname')->textInput() ?>
                <?= $form->field($model, 'language')->dropDownList(['en' => 'en']) ?>
<!--                --><?//= $form->field($model, 'updated_at')->textInput() ?>
<!--                --><?//= $form->field($model, 'created_at')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </section>
    </div>
</div>
