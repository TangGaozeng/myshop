<?php

namespace frontend\controllers;

use Yii;
use frontend\models\order;
use frontend\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Product;
use frontend\models\Money;

/**
 * OrderController implements the CRUD actions for order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 用户订单列表
     */
	public function actionShow(){
		$user_id = Yii::$app->user->id;
		$order = Order::getOrderShow($user_id);
		return $this->render("show",array("order"=>$order));
	}
    
    /**
	 * 生成订单
	 */
    public function actionCreate(){
    	$request = Yii::$app->request;
    	$item_id = $request->get('item_id'); // 等价于: $get = $_GET;
    	$num = $request->get('num');
    	
    	$pro_model = new Product();
    	$product = $pro_model::find()->where(['item_id' => $item_id])->one();
    	$total = $product->price * $num;

    	//生成订单
    	$orderid = $this->getOrderid();
    	$order = new Order();
    	$order->item_id = $item_id;
    	$order->order_id = $orderid;
    	$order->user_id  = Yii::$app->user->id;
    	$order->num      = $num;
    	$order->create_time  = date("Y-m-d H:i:s",time());
    	$order->total  = $total;
    	$order->lv_price = 0;
    	$order->status = 1;
    	$order->delivery_info = 'zanwu';
    	$order->amount  = $total;
    	$order->save();
    	
    	//扣除金额
    	$money = new Money();
    	$money->dedu(Yii::$app->user->id , $total);
    	return $this->render('index', array('arr'=>$order));
    }
    
    public function getOrderid(){
    	//97~122是小写的英文字母 65~90是大写的
    	$s = '';
    	for ($i = 1; $i <= 4; $i++) {
    		$s .= chr(rand(65, 90));
    	}
    	//当前毫秒的中间4位开始
    	$iii = microtime();
    	$beg = explode(' ', $iii);
    	$jjj = substr($beg[1],4);
    	
    	$str = $s.$jjj;
    	return $str;
    }
}
