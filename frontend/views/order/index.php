<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
	<div class="order-header bg-info">
		<span>交易成功</span>
	</div>
    <h2 class="text-waring">订单编号:<?php echo $arr['order_id'];?></h2>
	<h3 class="text-danger">订单金额:<?php echo $arr['total']?></h3>
	<br>
	<h4 class="text-waring">创建时间:<?php echo $arr['create_time']?></h4>
	<br>
	<a href="/index.php?r=order/show" class="btn btn-primary" >查看我的订单</a>
</div>
