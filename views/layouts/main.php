<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="<?php echo Url::base(true); ?>/img/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo Url::base(true); ?>/img/apple-touch-icon-iphone4.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Url::base(true); ?>/img/apple-touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Url::base(true); ?>/img/apple-touch-icon-iphone4.png" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div class="page-wrapper">

    <?= $content; ?>

    <?php echo $this->render('_footer'); ?>

</div><!-- End .page-wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
