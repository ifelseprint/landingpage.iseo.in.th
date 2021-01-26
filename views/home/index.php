<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;
use app\assets\HomeAsset;
AppAsset::register($this);
?>
<?php Pjax::begin(['id' => 'pjax-grid','timeout' => 0,'enablePushState' => false,]); ?>
<div id="loadingOverlay" class="loader-overlay" style="display: none;">
    <div class="loader-content loader-center">
        <div id="loading" class="loader"></div>
    </div>
</div>

<?= $this->render('_banner'); ?>
<?= $this->render('_process'); ?>
<?= $this->render('_seo'); ?>
<?= $this->render('_question'); ?>
<?= $this->render('_video'); ?>
<?= $this->render('_form',['FormContact'=>$FormContact]); ?>

<?php
$script = <<<JS
  $("document").ready(function(){

    $("#pjax-grid").on("pjax:start", function() {
      $('#loadingOverlay').show();
    });
    $("#pjax-grid").on("pjax:end", function() {
      $('#loadingOverlay').hide();
    });

    appWeb.App.initializeInPjax();
    appWeb.Home.initializeInPjax();
  });
JS;
$this->registerJs($script);
HomeAsset::register($this);
?>
<?php Pjax::end(); ?>

<?= $this->render('_modal');?>