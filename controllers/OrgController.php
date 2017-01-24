<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Org;
use app\models\User;

class OrgController extends Controller
{
	public $layout = 'user';

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view', 'update'],
                'rules' => [
                    [
                        'actions' => ['view', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                    
                ],
            ],
        ];
    }

    public function actionView($dep_id, $cat)
    {
    	$orgs = User::find()
    	    ->where(['cat' => 3])
    	    ->orderBy('name ASC')
    	    ->all();

    	$org = User::findOne($dep_id);

    	$info = Org::find()
    	    ->where(['dep_id' => $dep_id, 'cat' => $cat])
    	    ->one();

        return $this->render('view', [
        	'cat' => $cat,
        	'orgs' => $orgs,
        	'org' => $org,
        	'info' => $info,
        	]);
    }

    public function actionUpdate($id)
    {
        $model = Org::findOne($id);

        if ($model->load(Yii::$app->request->post()) and $model->save()) {
            return $this->redirect([
                'org/view/', 
                'dep_id' => intval($model->dep_id), 
                'cat' => intval($model->cat)
            ]);
        } else {
            return $this->render('form', ['model' => $model]);
        } 
    }
}
