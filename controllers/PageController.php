<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\WeatherCurrent;
use app\models\Page;

class PageController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $loginform = new LoginForm();
        $model = WeatherCurrent::find()->with('user')->all();
        
        return $this->render('index', [
            'model' => $model, 'loginform' => $loginform, 
        ]);
    }

    /**
     * Displays page.
     *
     * @return string
     */
    public function actionView($slug)
    {
        $page = Page::find()
            ->where(['slug' => $slug])
            ->one();
            
        return $this->render('view', ['page' => $page]);
    }

    public function actionError()
    {
        return $this->render('error');
    }
}
