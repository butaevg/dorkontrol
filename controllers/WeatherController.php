<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Weather;
use app\models\WeatherCurrent;

class WeatherController extends Controller
{
    public function actionIndex()
    {
    	if (Yii::$app->request->post()) {
    		$date = Yii::$app->request->post('date');
            $date_format = Yii::$app->formatter->asDatetime($date, "php:Y-m-d");

            $reports = Weather::find()
                ->orderBy('id')
                ->filterWhere(['like', 'putdate', $date_format.'%', false])
                ->all();

    	    return $this->render('index', [
                'reports' => $reports, 
                'today' => "<a href=weather/>Последние данные</a>",
                ]);
    	} else {
	    	$reports = WeatherCurrent::find()
	    	    ->orderBy('id')
	    	    ->all();

	        return $this->render('index', ['reports' => $reports]);
        }
    }

    public function actionMy()
    {
        $this->layout = 'user';

    	$id = Yii::$app->user->identity->id;

    	$query = Weather::find()
    	    ->where(['rayon' => $id])
    	    ->orderBy('putdate DESC');

    	$pages = new Pagination([
    		'totalCount' => $query->count(), 
    		'pageSize' => 4
    		]);
    	$pages->pageSizeParam = false;

    	$reports = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('my', ['reports' => $reports, 'pages' => $pages]);
    }

    public function actionCreate()
    {
        $this->layout = 'user';
        
    	$id = Yii::$app->user->identity->id;

    	$current = WeatherCurrent::find()->where(['id' => $id])->one();

    	$model = new Weather(); 
    	$model->rayon = $id;
    	$model->sost = $current->sost;
    	$model->pr_r = $current->pr_r; 
    	$model->pr_m = $current->pr_m;

    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		$current->sost = $model->sost;
    		$current->temp = $model->temp;
    		$current->pr_r = $model->pr_r;
    		$current->pr_m = $model->pr_m;
    		$current->works = $model->works;
    		$current->save();
    		return $this->redirect(['weather/my']);
    	} else {
    		return $this->render('create', ['model' => $model, 'current' => $current]);
    	} 
    }

}
