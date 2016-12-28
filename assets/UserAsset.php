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
class UserAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/user.css', 
        'js/fancybox/jquery.fancybox.css?v=2.1.4',
    ];
    public $js = [
        'js/jquery.tablesorter.min.js', 
        'js/fancybox/jquery.fancybox.js?v=2.1.4', 
        'js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6',
        'js/user.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true
    ];
}
