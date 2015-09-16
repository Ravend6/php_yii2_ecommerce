<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/lightbox.css',
        // 'css/demo.css',
        'css/slider.css',
        'css/site.css',
    ];
    public $js = [
        'js/lib/lightbox/lightbox.min.js',
        'js/lib/flex-slider2/modernizr.js',
        'js/lib/flex-slider2/jquery.flexslider.js',
        'js/lib/flex-slider2/shCore.js',
        'js/lib/flex-slider2/shBrushXml.js',
        'js/lib/flex-slider2/jquery.easing.js',
        'js/lib/flex-slider2/jquery.mousewheel.js',
        // 'js/lib/flex-slider2/demo.js',
        'js/slider.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
