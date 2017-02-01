<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\WeatherCurrent;
use app\models\Page;

class PageController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['list', 'create', 'update'],
                'rules' => [
                    [
                        'actions' => ['list', 'create', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                    
                ],
            ],
        ];
    }

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

    public function actionList()
    {
        $this->layout = 'user';

        $pages = Page::find()->all();

        return $this->render('list', ['pages' => $pages]);
    }

    public function actionCreate()
    {
        $this->layout = 'user';

        $model = new Page();

        if ($model->load(Yii::$app->request->post()) & ($model->save())) {
            return $this->redirect('/page/list/');
        } else {
            return $this->render('form', ['model' => $model]);
        } 
    }

    public function actionUpdate($id)
    {
        $this->layout = 'user';

        $model = Page::findOne($id);

        if ($model->load(Yii::$app->request->post()) & ($model->save())) {
            return $this->redirect('/page/list/');
        } else {
            return $this->render('form', ['model' => $model]);
        } 
    }
}
