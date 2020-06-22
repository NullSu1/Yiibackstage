<?php

use yii\helpers\Html;
use yii\redactor\widgets\Redactor;
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

                    <?= $form->field($model, 'content')->widget(Redactor::className(),
                    [
                        'clientOptions' => [
                            'minHeight' => '300px',
                            'lang' => 'zh_cn',
                            'plugins' => ['clips', 'counter', 'definedlinks', 'filemanager',
                                'fontcolor', 'fontfamily', 'fontsize', 'fullscreen',
                                'imagemanager', 'limiter', 'table', 'textdirection',
                                'textexpander', 'video','midget']
                        ]
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </section>
        </section>
    </div>
</div>
