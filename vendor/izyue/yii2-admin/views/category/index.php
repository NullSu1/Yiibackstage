<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel izyue\admin\models\searchs\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('rbac-admin', 'category');;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <section class="wrapper site-min-height">
                <section class="panel">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <p>
                        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom:15px;']) ?>
                    </p>
                    <!--                --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
//                    'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'sortname',
                            'language',
                            'created_at',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </section>
        </section>
    </div>
</div>
