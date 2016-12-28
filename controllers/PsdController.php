<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Psd;
use app\models\User;

class PsdController extends Controller
{
	public $layout = 'user';

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'update'],
                'rules' => [
                    [
                        'actions' => ['index', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                    
                ],
            ],
        ];
    }

    public function actionIndex()
    {
    	$contractors = User::find()
    	    ->where(['cat' => 7])
    	    ->orderBy('name DESC')
    	    ->all();

        return $this->render('index', [
        	'contractors' => $contractors,
            ]);
    }

    public function actionMy() 
    {
    	$id = Yii::$app->user->identity->id;

    	$objects = Psd::find()->where(['contractor' => $id])->all();

    	return $this->render('my', [
        	'objects' => $objects,
            ]);
    }

    public function actionExec($id)
    {
    	$object = Psd::find()->where(['id' => $id])->one();

    	if ($object->load(Yii::$app->request->post())) {

    		$object->exe_perc = round(($object->exe/$object->price)*100);
    		$object->exe_getsum = round(($object->getsum/$object->price)*100);

    		$object->save();

    		Yii::$app->session->addFlash('success', 
    			'Данные по проекту «'.$object->name.'» изменены'
    			);

    		return $this->redirect(['psd/my']);
    	}

    	return $this->render('exec', [
        	'object' => $object,
            ]);
    }

}
