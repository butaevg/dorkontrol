<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Section;

class UsermenuWidget extends Widget
{
	public $cats;

    public function init() 
    {
    	parent::init();

    	$sections =  explode(",", Yii::$app->user->identity->group->sections);
        $this->cats = array();

        foreach ($sections as $section_id) {
            $section = Section::findOne($section_id);
            array_push($this->cats, $section);  
        }
    }

    public function run() 
    {
        return $this->render('usermenu', [
	      'cats' => $this->cats
	    ]);
    }
}