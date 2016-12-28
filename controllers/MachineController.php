<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Machine;
use yii\web\UploadedFile;

class MachineController extends Controller
{
	public $layout = 'user';

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'list', 'create', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'list', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                    
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList($working)
    {
    	$machines = Machine::find()
    	    ->where(['working' => $working])
            ->orderBy(['putdate' => SORT_DESC]) 
    	    ->all();

        return $this->render('list', ['machines' => $machines, 'working' => $working]);
    }

    public function actionCreate($working)
    {
        $model = new Machine();
        $imagepath='upload/machines/';

        if ($model->load(Yii::$app->request->post())) {

            $image_1 = UploadedFile::getInstance($model,'pic_1');            

            if ($image_1) {
                $model->pic_1 = "{$model->dep_id}_{$image_1}"; 
            }

            $image_2 = UploadedFile::getInstance($model,'pic_2');

            if ($image_2) {
                $model->pic_2 = "{$model->dep_id}_{$image_2}"; 
            }

            $image_3 = UploadedFile::getInstance($model,'pic_3');

            if ($image_3) {
                $model->pic_3 = "{$model->dep_id}_{$image_3}"; 
            }

            $image_4 = UploadedFile::getInstance($model,'pic_4');

            if ($image_4) {
                $model->pic_4 = "{$model->dep_id}_{$image_4}"; 
            }

            $image_5 = UploadedFile::getInstance($model,'pic_5');

            if ($image_5) {
                $model->pic_5 = "{$model->dep_id}_{$image_5}"; 
            }

            $model->working = $working;

            if ($model->save()) {
                if ($image_1) {
                    $image_1->saveAs($imagepath.$model->pic_1);
                }
                if ($image_2) {
                    $image_2->saveAs($imagepath.$model->pic_2);
                }
                if ($image_3) {
                    $image_3->saveAs($imagepath.$model->pic_3);
                }
                if ($image_4) {
                    $image_4->saveAs($imagepath.$model->pic_4);
                }
                if ($image_5) {
                    $image_5->saveAs($imagepath.$model->pic_5);
                }
            }

            return $this->redirect([
                'machine/list/', 
                'working' => $working
            ]);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionDelete($id)
    {
        $machine = Machine::findOne($id);
        $machine->delete();

        return $this->redirect([
            'machine/list/', 
            'working' => $machine->working
        ]);
    }

}
