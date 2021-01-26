<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<?php
$action = Yii::$app->controller->action->id;

$form = ActiveForm::begin([
    'action' => ['home/index'],
    'method' => 'post',
    'options' => ['id' => 'formContact', 'class' => 'form-horizontal','enctype' => 'multipart/form-data' ],
    'enableClientValidation' => true,
    'fieldConfig' => [
        'template' => "{input} {error}",
        'inputOptions' => ['class' => 'form-control form-control-sm'],
        'options' => [
          'data-pjax' => true,
          'tag' => false,
        ],
    ],
]); ?>
<div class="homepage-contact">
  <div class="container">
    <div class="row" style="margin-bottom: 40px;">
      <div class="col-sm-12">
        <div class="homepage-contact-title">
          <h2>แบบฟอร์มกรอกเพื่อขอรายละเอียดเพิ่มเติม</h2>
        </div>
      </div>
    </div>
    <div class="row justify-content-center homepage-contact-form">
      <div class="col-sm-12 col-md-6">
        <div class="form-group-sm" style="margin-bottom: 10px;">
          <label>ชื่อ <span class="field_required">*</span> :</label>
          <?= $form->field($FormContact, '_fname')->textInput(['class' => 'form-control form-control-sm','id'=>'_fname','required'=> true,'data-msg'=>'คุณยังไม่ได้ระบุชื่อ',])?>
        </div>
        <div class="form-group-sm" style="margin-bottom: 10px;">
          <label>นามสกุล <span class="field_required">*</span> :</label>
          <?= $form->field($FormContact, '_lname')->textInput(['class' => 'form-control form-control-sm','id'=>'_lname','required'=> true,'data-msg'=>'คุณยังไม่ได้ระบุนามสกุล',])?>
        </div>
        <div class="form-group-sm" style="margin-bottom: 10px;">
          <label>เบอร์โทรศัพท์ <span class="field_required">*</span> :</label>
          <?= $form->field($FormContact, '_tel')->textInput(['class' => 'form-control form-control-sm','id'=>'_tel','required'=> true,'onkeypress' =>'return appWeb.App.OnlyNumbers(event)','pattern'=> '^0[0-9]{8,10}','maxlength' =>'10','data-msg'=>'ข้อมูลเบอร์โทรศัพท์ไม่ถูกต้อง และห้ามเป็นค่าว่าง'])?>
        </div>
        <div class="form-group-sm" style="margin-bottom: 10px;">
          <label>อีเมล <span class="field_required">*</span> :</label>
          <?= $form->field($FormContact, '_email')->textInput(['class' => 'form-control form-control-sm','id'=>'_email','required'=> true,'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$','data-msg'=>'ข้อมูลอีเมลไม่ถูกต้อง และห้ามเป็นค่าว่าง'])?>
        </div>
        <div class="form-group-sm" style="margin-bottom: 10px;">
          <label>Line ID :</label>
          <?= $form->field($FormContact, '_line_id')->textInput(['class' => 'form-control form-control-sm','id'=>'_line_id'])?>
        </div>
        <div class="form-group-sm" style="margin-bottom: 10px;">
          <label>เว็บไซต์ www. <span class="field_required">*</span> :</label>
          <?= $form->field($FormContact, '_website')->textInput(['class' => 'form-control form-control-sm','id'=>'_website','required'=> true,'data-msg'=>'คุณยังไม่ได้ระบุเว็บไซต์ www',])?>
        </div>
        <div class="form-group-sm" style="margin-bottom: 10px;">
          <label>คีย์เวิร์ดที่ต้องการทำ SEO <span class="field_required">*</span> :</label>
          <?= $form->field($FormContact, '_detail')->textArea(['rows' => '5','class' => 'form-control form-control-sm','id'=>'_detail','required'=> true,'data-msg'=>'คุณยังไม่ได้ระบุคีย์เวิร์ดที่ต้องการทำ SEO',])?>
        </div>
        <div class="form-group-sm" style="margin-bottom: 10px; text-align: center;">
          <?= $form->field($FormContact, 'utm_source')->textInput(['type' => 'hidden','id'=>'utm_source'])?>
          <?= $form->field($FormContact, 'utm_source')->textInput(['type' => 'hidden','id'=>'utm_source'])?>
          <?= $form->field($FormContact, 'utm_campaign')->textInput(['type' => 'hidden','id'=>'utm_campaign'])?>
          <?= Html::Button(Yii::t('app', 'ส่งเพื่อขอรายละเอียดเพิ่มเติม'), ['class' => 'btn btn-primary btn-sm submit-contact']) ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="text-center" style="padding-bottom: 15px;">
         <h1>หรือ</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="<?php echo Url::base(true); ?>/img/line_add_icon.png">
        </div>
      </div>
    </div>

  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?php ActiveForm::end(); ?>