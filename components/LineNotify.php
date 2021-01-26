<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

class LineNotify extends Component
{
	public function notify_message($message, $token)
	{	
		$LINE_API = "https://notify-api.line.me/api/notify";
		$queryData = array('message' => $message);
		$queryData = http_build_query($queryData, '', '&');
		$headerOptions = array(
			'http' => array(
				'method' => 'POST',
				'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
					. 'Authorization: Bearer ' . $token . "\r\n"
					. 'Content-Length: ' . strlen($queryData) . "\r\n",
				'content' => $queryData
			),
		);
		$context = stream_context_create($headerOptions);
		$result = file_get_contents($LINE_API, FALSE, $context);

		return $result;
	}
}