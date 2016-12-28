<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

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
        'css/site.css', 
        'js/fancybox/jquery.fancybox.css?v=2.1.4',
    ];
    public $js = [
        'js/jquery.liMenuHor.js', 
        'js/datepicker.js', 
        'js/jquery.tablesorter.min.js', 
        'js/fancybox/jquery.fancybox.js?v=2.1.4', 
        'js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
