<?php
namespace app\controllers;
use yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\models\FormContact;
use app\models\TblSettingEmail;
class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {

    	$getUTM = Yii::$app->CoreFunctions->getUTM();
    	$FormContact = new FormContact;
    	$FormContact->utm_source = $getUTM->utm_source;
     	$FormContact->utm_medium = $getUTM->utm_medium;
     	$FormContact->utm_campaign = $getUTM->utm_campaign;

        if(Yii::$app->request->isPost){

            $post = Yii::$app->request->post();
            
            if ($FormContact->load($post)){

                if ($FormContact->save()) {

                    $settingEmail = TblSettingEmail::findOne(['ID' => 1]);
                    $this->sendmail($FormContact,$settingEmail);
                    $this->sendmailReply($FormContact,$settingEmail);

$token = 'lQXQikNfXr9xus4tpG2D3F98wXV6qGkdz8AIt4EUD1f';
$str = "
# Landingpage
-------------------------
เว็บไซต์: " . $FormContact->_website . "
ชื่อ-นามสกุล: " . $FormContact->_fname." ".$FormContact->_lname . "
อีเมล: " . $FormContact->_email . " 
เบอร์โทรศัพท์: " . $FormContact->_tel . "
รายละเอียดเพิ่มเติม: " . $FormContact->_detail . "
-------------------------
utm_source: " . $FormContact->utm_source . "
utm_campaign: " . $FormContact->utm_campaign . "
utm_medium: " . $FormContact->utm_medium. "
-------------------------
";
$res = Yii::$app->LineNotify->notify_message($str, $token);

                    return json_encode([
                        "status" => true,
                        "response" => '<div class="text-center"><h5><b>ท่านได้ทำการส่งข้อมูลมายังเราเรียบร้อยแล้ว</b></h5><div style="font-size:16px;">เจ้าหน้าที่จะทำการติดต่อกลับโดยเร็วที่สุด</div></div>'
                    ]);
                }else{
                    return json_encode([
                        "status" => false,
                        "response" => $FormContact->getErrors()
                    ]);
                }
            }else{
                return json_encode([
                    "status" => false,
                    "response" => $FormContact->getErrors()
                ]);
            }
        }
        return $this->render('index', [
            'FormContact' => $FormContact
    	]);
    }

    public function sendmail($FormContact=null,$settingEmail=null)
    {

        $mail = Yii::$app->mailer->compose('layouts/contact',[
            'FormContact'    => $FormContact,
            'settingEmail'      => $settingEmail
        ]);
        $mail->setFrom('noreply.iseo@gmail.com');
        $explodeEmail = explode(",", $settingEmail->_email);
        $mail->setTo($explodeEmail);
        $mail->setSubject('Landingpage - Website iseo.in.th');

        $mail->send();
        return $mail;
    }
    public function sendmailReply($FormContact=null,$settingEmail=null)
    {
        $mail = Yii::$app->mailer->compose('layouts/contact_reply',[
            'FormContact'    => $FormContact,
            'settingEmail'   => $settingEmail
        ]);
        $mail->setFrom('noreply.iseo@gmail.com');
        $mail->setTo($FormContact->_email);
        $mail->setSubject('Landingpage - Website iseo.in.th');

        $mail->send();
        return $mail;
    }
}
