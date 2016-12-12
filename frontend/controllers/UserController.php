<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Money;
use frontend\models\Order;

/**
 * Site controller
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
    	$user_id = Yii::$app->user->id;
    	$money = Money::find()->where(['user_id'=>$user_id])->one();
    	
    	$count = Order::find()->where(['user_id' => $user_id])->count();
    	$arr = array();
    	$arr['amount'] = number_format($money->amount);
    	$arr['frozenamount'] = number_format($money->frozenamount);
    	$arr['count'] = $count;
        return $this->render('index',array("arr"=>$arr));
    }

    /**
     * 检查登录状态
     */
    public function actionCheck  (){
    	//true：未登录， false：已登录
    	$res = array();
    	$status = Yii::$app->user->isGuest;
    	if($status){
    		return 2;
    	}
    	return 1;
    }
}
