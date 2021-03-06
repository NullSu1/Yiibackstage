<?php

use izyue\admin\models\searchs\Category as CategorySearch;
use yii\helpers\Html;
use yii\helpers\url;
use yii\helpers\ArrayHelper;
use yii\redactor\widgets\Redactor;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */

$query = new \yii\db\Query();
$query->from('category');
foreach($query->batch() as $arr){}
?>
<div class="row">
    <div class="col-lg-12">
        <section class="wrapper site-min-height">
            <section class="panel">
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'language')->dropDownList(['en'=>'en']) ?>
                    <?= $form->field($model, 'category')->dropDownList([ArrayHelper::map($arr, 'sortname', 'sortname')]) ?>
                    <?= $form->field($model, 'SEO_title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'SEO_url')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'article_title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'TAG')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'mate_description')->textarea(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content')->widget(Redactor::className(),
                    [
                        'clientOptions' => [
                            'imageManagerJson' => ['@webroot/upload/image-json'],
                            'minHeight' => '300px',
                            'lang' => 'zh_cn',
                            'plugins' => ['clips', 'counter', 'definedlinks', 'filemanager',
                                'fontcolor', 'fontfamily', 'fontsize', 'fullscreen',
                                'imagemanager', 'limiter', 'table', 'textdirection', 'video',
                                'textexpander']
                        ]
                    ]) ?>
                    <div class="form-group">
                        <?= $form->field($model, 'publish')->checkbox(['maxlength' => true, 'name'=>'publish']) ?>
                        <?= $form->field($model, 'hot_article')->checkbox(['maxlength' => true, 'name'=>'hot_article']) ?>
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        <a class="btn btn-success" href="<?= url::toRoute(['/admin/article/preview','id'=>$model->id])?>">Preview</a>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </section>
        </section>
    </div>
</div>
