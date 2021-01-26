<?php
namespace app\controllers;
use yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\models\Register;
class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	// $getUTM = Yii::$app->CoreFunctions->getUTM();
    	// $Register = new Register;
    	// $Register->UTM_SOURCE = $getUTM->utm_source;
     	// $Register->UTM_MEDIUM = $getUTM->utm_medium;
     	// $Register->UTM_CAMPAIGN = $getUTM->utm_campaign;
        return $this->render('index', [
            // 'Register' => $Register
    	]);
    }

    // public function actionRegister()
    // {

    // 	$Register = new Register;
    // 	if(Yii::$app->request->isPost){

    //         $post = Yii::$app->request->post();
            
    //         if ($Register->load($post)){

    //         	$postFirstname = $post['Register']['FIRSTNAME'];
    //         	$postLastname = $post['Register']['LASTNAME'];
    //         	$postModel = $post['Register']['SELECT_1'];
    //         	$postSerialNumber = $post['Register']['QUESTION_1'];

		  //       $Register->CREATED_DATETIME = new \yii\db\Expression('NOW()');
		  //       $Register->CREATED_AT = 'user-event';

		  //       // IP Address
		  //       $Register->IP = Yii::$app->CoreFunctions->getIP();

		  //       if(!empty($SerialNumber)){

	   //          	if ($Register->save()) {

	   //                  return json_encode([
	   //                      "status" => true,
	   //                      "response" => '<div class="text-center"><h5><b>ท่านได้ทำการลงทะเบียนผู้ใช้และรับสิทธิ์เรียบร้อยแล้ว</b></h5>เจ้าหน้าที่จะทำการติดต่อกลับเพื่อยืนยันสิทธิ์<br/>และนัดหมายให้บริการอีกครั้ง หลังจากสิ้นสุดระยะเวลาการลงทะเบียน</div>'
	   //                  ]);
	   //              }else{
	   //                  return json_encode([
	   //                      "status" => false,
	   //                      "response" => $Register->getErrors()
	   //                  ]);
	   //              }
	   //          }else{
	   //          	return json_encode([
    //                     "status" => false,
    //                     "response" => '<div class="text-center" style="color: #f00;"><h5><b>ลงทะเบียนไม่สำเร็จ</b></h5>หมายเลขซีเรียลไม่ถูกต้องหรือถูกใช้ไปแล้ว</div>'
    //                 ]);
	   //          }
    //        	}else{
    //        		return json_encode([
    //        			"status" => false,
    //        			"response" => $Register->getErrors()
    //        		]);
    //        	}
    //     }
    // }
}
