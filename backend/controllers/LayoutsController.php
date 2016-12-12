<?php

namespace backend\controllers;

use Yii;
use backend\models\user;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class LayoutsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
    	
    	$user = User::find()->where(['id' => $user_id])->one();
    	$arr = array();

    	$arr['user_name'] = $user->username;
    	return $this->render('index',array('arr'=>$arr));
    }

    
}
