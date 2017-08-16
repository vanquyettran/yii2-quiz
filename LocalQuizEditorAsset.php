<?php

/**
 * Created by PhpStorm.
 * User: Quyet
 * Date: 7/11/2017
 * Time: 11:59 AM
 */

namespace common\modules\quiz;

use yii\web\AssetBundle;

class LocalQuizEditorAsset extends AssetBundle
{
    public $sourcePath = '@quiz/assets';

    public $jsOptions = ['position' => \yii\web\View::POS_END];

    public $css = [

    ];

    public $js = [
        'http://localhost:3000/static/js/bundle.js',
    ];

    public $depends = [
//        '\common\modules\quiz\DefaultAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}