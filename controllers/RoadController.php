<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Road;

class RoadController extends Controller
{
    public function actionIndex()
    {
    	$roads = Road::find()
    	    ->where(['onsite' => 1, 'complete' => 0])
            ->orderBy(['id' => SORT_DESC]) 
    	    ->all();

        return $this->render('index', ['roads' => $roads]);
    }

    public function actionProgress($id = 124)
    {
    	$roads = Road::find()
    	    ->where(['onsite' => 1, 'complete' => 0])
            ->orderBy(['id' => SORT_DESC]) 
    	    ->all();
    	$road = Road::findOne($id);
        
        return $this->render('progress', ['roads' => $roads, 'road' => $road]);
    }

}
