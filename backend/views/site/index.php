<?php

/* @var $this yii\web\View */

$this->registerCssFile('@web/statics/assets/font-awesome/css/font-awesome.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/statics/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/statics/css/owl.carousel.css', ['depends'=>'backend\assets\AppAsset']);

$this->registerJsFile('@web/statics/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/statics/js/owl.carousel.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/statics/js/jquery.customSelect.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/statics/js/respond.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/statics/js/sparkline-chart.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/statics/js/easy-pie-chart.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/statics/js/count.js', ['depends'=>'backend\assets\AppAsset']);

$this->registerJs("
      //owl carousel

      $(document).ready(function() {
          $(\"#owl-demo\").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
");

$this->title = 'My Yii Application';
?>
<section class="wrapper">
    <h1>Welcome: <span class="username"><?=Yii::$app->user->identity['username']?></span></h1>
</section>
