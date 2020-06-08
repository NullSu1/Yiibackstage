<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */


?>
<div class="row">
    <div class="col-lg-12">
        <section class="wrapper site-min-height">
            <section class="panel">
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'article_title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor', [
                        'clientOptions' => [
                            //编辑区域大小
                            'initialFrameHeight' => '450',
                            'initialFrameWidth' => '800',
                            //设置语言
                            'lang' => 'en', //中文为 zh-cn
                        ]
                    ]); ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </section>
        </section>
    </div>
</div>
