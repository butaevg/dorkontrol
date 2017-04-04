<?php

namespace app\controllers;

use Yii;
use yii\web\Controller; 
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\models\Road;
use app\models\RoadReport;
use app\models\RoadReportImg;

class RoadController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['manage', 'create', 'update', 'reportlist', 'createreport' , 'upload'],
                'rules' => [
                    [
                        'actions' => ['manage', 'create', 'update', 'reportlist', 'createreport' , 'upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                    
                ],
            ],
        ];
    }

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

    public function actionManage()
    {
        $this->layout = 'user';

        $roads = Road::find()
            ->orderBy(['onsite' => SORT_DESC]) 
            ->all();

        return $this->render('manage', ['roads' => $roads]);
    }

    public function actionCreate()
    {
        $this->layout = 'user';

        $model = new Road();

        if ($model->load(Yii::$app->request->post()) & ($model->save())) {
            Yii::$app->session->addFlash('success', 
                'Новый объект «'.$model->name.'» сохранен'
                );

            return $this->redirect('/road/manage/');
        } else {
            return $this->render('form', ['model' => $model]);
        } 
    }

    public function actionUpdate($id)
    {
        $this->layout = 'user';

        $model = Road::findOne($id);

        if ($model->load(Yii::$app->request->post()) & ($model->save())) {
            Yii::$app->session->addFlash('success', 
                'Объект «'.$model->name.'» изменен'
                );

            return $this->redirect('/road/manage');
        } else {
            return $this->render('form', ['model' => $model]);
        } 
    }

    public function actionReportlist($road_id)
    {
        $this->layout = 'user';

        $road = Road::findOne($road_id);

        $reports = RoadReport::find()
            ->where(['road_id' => $road_id])
            ->orderBy(['id' => SORT_DESC]) 
            ->all();

        return $this->render('report_list', ['road' => $road, 'reports' => $reports]);
    }

    public function actionCreatereport($road_id)
    {
        $this->layout = 'user';

        $model = new RoadReport();
        $model->road_id = $road_id;

        if ($model->load(Yii::$app->request->post()) & ($model->save())) {
            Yii::$app->session->addFlash('success', 
                'Отчет «'.$model->name.'» сохранен'
                );

            return $this->redirect([
                '/road/reportlist/', 
                'road_id' => $road_id
            ]);
        } else {
            return $this->render('report_form', ['model' => $model]);
        } 
    }

    public function actionUpload($report_id)
    {
        $this->layout = 'user';

        $model = new RoadReportImg();
        $model->report_id = $report_id;

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model,'url');
            $imagepath='upload/roads/';

            if ($image) {
                $model->url = "{$report_id}_{$image}"; 
            }

            if ($model->save()) {
                if ($image) {
                    $image->saveAs($imagepath.$model->url);
                }
            }

            Yii::$app->session->addFlash('success', 
                'Изображение загружено'
                );

            return $this->redirect(['road/upload', 'report_id' => $report_id]);
        } else {

            $images = RoadReportImg::find()
                ->where(['report_id' => $report_id])
                ->orderBy(['id' => SORT_DESC]) 
                ->all();

            return $this->render('upload_form', ['model' => $model, 'images' => $images]);
        } 
    }


}
