<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles Recycle bin';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <section class="wrapper site-min-height">
            <section class="panel">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= Html::a('Back', ['index'],['class' => 'btn btn-success']) ?>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'user',
                        'article_title',
                        'content:ntext',
                        'created_at',
                        'updated_at',

                        ['class' => 'yii\grid\ArticleColumn'],
                    ],
                ]); ?>

            </section>
        </section>
    </div>
</div>
