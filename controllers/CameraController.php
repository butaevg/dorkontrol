<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Camera;

class CameraController extends Controller
{
    public function actionIp()
    {
        $cameras = Camera::find()
    	    ->where(['type' => 'ip', 'hide' => 0])
    	    ->all();

        return $this->render('ip', ['cameras' => $cameras]);
    }

    public function action3g()
    {
        $cameras = Camera::find()
    	    ->where(['type' => '3g', 'hide' => 0])
    	    ->all();

        return $this->render('3g', ['cameras' => $cameras]);
    }

    public function actionView($id)
    {
    	$camera = Camera::findOne($id);

    	if ($camera->type == 'ip') {
    		$view = 'view';
    	} else {
    		$view = 'view3g';
    	}
        
        return $this->render($view, ['cam' => $camera]);
    }
}
