<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main app application asset bundle.
 */
class HomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/page/home.css',
    ];
    public $js = [
        'js/page/Home.js'
    ];
    public $depends = [
    	'app\assets\AppAsset'
    ];
}
