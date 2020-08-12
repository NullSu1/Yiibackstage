<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Articles');;
$this->params['breadcrumbs'][] = $this->title;
$request = new \yii\web\Request;
?>
<div class="row">
    <div class="col-lg-12">
        <section class="wrapper site-min-height">
            <section class="panel">
                <h1><?= Html::encode($this->title) ?></h1>
                <p><?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?></p>

                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                <label>
                    <?= Html::dropDownList(
                        'per_page',
                        isset($request->get()['per_page']) ? $request->get()['per_page'] : $dataProvider->getPagination()->pageSize, [10 => 10, 20 => 20, 50 => 50, 100 => 100]
                    ); ?>
                    <span>records per page</span>
                </label>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
//                    'filterModel' => $searchModel,
                    'filterSelector' => 'select[name="per_page"]',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'article_title',
                        'author',
                        'category',
                        'created_at',
                        'updated_at',
                        'language',
                        [
                            'format' => 'html',
                            'attribute' => 'publish',
                            'value' => function ($model) {
                                return $model->publish ? '<a href="'.url::toRoute(['article/ChangeHot','id'=>$model->id]).'" class="label-success label label-default"><button>Active</button></a>' : '<span class="label-defalt label label-default">Inactive</span>';
                            },
                        ],
                        [
                            'format' => 'html',
                            'attribute' => 'hot_article',
                            'value' => function ($model) {
                                return $model->hot_article ? '<span class="label-success label label-default">Active</span>' : '<span class="label-defalt label label-default">Inactive</span>';
                            },
                        ],
                        ['class' => 'yii\grid\ArticleColumn'],

                    ],
                ]); ?>
            </section>
        </section>
    </div>
</div>
