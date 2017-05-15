<?php

namespace app\controllers;

use Yii;
use app\models\Appeal;
use yii\web\Controller;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

class AppealController extends Controller
{
    public function actionIndex()
    {
        $model = new Appeal();
        $imagepath='upload/appeal/';

        if ($model->load(Yii::$app->request->post())) {

            $image_1 = UploadedFile::getInstance($model,'pic_1');            

            if ($image_1) {
                $model->pic_1 = "{$image_1}"; 
            }

            $image_2 = UploadedFile::getInstance($model,'pic_2');

            if ($image_2) {
                $model->pic_2 = "{$image_2}"; 
            }

            $image_3 = UploadedFile::getInstance($model,'pic_3');

            if ($image_3) {
                $model->pic_3 = "{$image_3}"; 
            }

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
            }

            return $this->redirect('/appeal/');
        } else {
        	$posts = Appeal::find()
            ->orderBy(['putdate' => SORT_DESC]) 
    	    ->all();

            return $this->render('index', ['posts' => $posts, 'model' => $model]);
        }
    }

}
