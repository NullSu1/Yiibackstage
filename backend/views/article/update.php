<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model izyue\admin\models\Article */

$this->title = 'Update Article: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="article-update wrapper site-min-height">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</section>
