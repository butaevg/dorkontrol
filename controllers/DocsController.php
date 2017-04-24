<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\models\Docs;
use app\models\DocsCategory;

class DocsController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['manage', 'create', 'update', 'upload'],
                'rules' => [
                    [
                        'actions' => ['manage', 'create', 'update', 'upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                    
                ],
            ],
        ];
    }

    public function actionIndex($category_id = 1)
    {
    	$categories = DocsCategory::find()->all();

        $docs = Docs::find()
    	    ->where(['category_id' => $category_id])
    	    ->orderBy('putdate DESC')
    	    ->all();

        return $this->render('index', [
        	'docs' => $docs, 
        	'categories' => $categories,
            ]);
    }

    public function actionManage($category_id = 1)
    {
        $this->layout = 'user';

        $categories = DocsCategory::find()->all();
        $category = DocsCategory::findOne($category_id);

        $docs = Docs::find()
    	    ->where(['category_id' => $category_id])
    	    ->orderBy('putdate DESC')
    	    ->all();

        return $this->render('manage', [
        	'docs' => $docs, 
        	'categories' => $categories,
        	'category' => $category,
            ]);
    }

    public function actionCreate()
    {
        $this->layout = 'user';

        $model = new DocsCategory();

        if ($model->load(Yii::$app->request->post()) & ($model->save())) {
            Yii::$app->session->addFlash('success', 
                'Категория «'.$model->name.'» сохранена'
                );

            return $this->redirect('/docs/manage/');
        } else {
            return $this->render('category_form', ['model' => $model]);
        } 
    }

    public function actionUpdate($id)
    {
        $this->layout = 'user';

        $model = DocsCategory::findOne($id);

        if ($model->load(Yii::$app->request->post()) & ($model->save())) {
            Yii::$app->session->addFlash('success', 
                'Категория «'.$model->name.'» сохранена'
                );

            return $this->redirect('/docs/manage/');
        } else {
            return $this->render('category_form', ['model' => $model]);
        } 
    }

    public function actionUpload($category_id)
    {
        $this->layout = 'user';

        $model = new Docs();
        $model->category_id = $category_id;

        if ($model->load(Yii::$app->request->post())) {
            $doc = UploadedFile::getInstance($model,'url');
            $docpath='upload/docs/';

            if ($doc) {
                $model->url = "{$category_id}_{$doc}"; 
                $model->ext = $doc->extension; 
                $model->size = $doc->size;
                $model->putdate = '2017-04-24 08:00:00';
            }            

            if ($model->save()) {
                $doc->saveAs($docpath.$model->url);

                Yii::$app->session->addFlash('success', 
	                'Документ загружен'
	                );

                return $this->redirect(['docs/manage', 'category_id' => $category_id]);
            } else {print($docpath.$model->url);}                       
        } else {
            return $this->render('upload_form', ['model' => $model]);
        } 
    }

}
