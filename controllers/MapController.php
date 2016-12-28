<?php

namespace app\controllers;

use Yii;
use app\models\Map;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class MapController extends Controller
{
    /**
     * Lists all Map models.
     * @return mixed
     */
    public function actionIndex()
    {
        $maps = Map::find()
            ->orderBy(['rayon' => SORT_ASC]) 
            ->all();

        return $this->render('index', ['maps' => $maps]);
    }

    /**
     * Displays a single Map model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $map = Map::findOne($id);

        return $this->render('view', ['map' => $map]);
    }
}
