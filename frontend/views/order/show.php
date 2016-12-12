<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '我的订单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
   
</div>
<div id="row">
<?php foreach ($order as $key=>$val): ?>
	<div class="col-lg-3">
		<div class="list">
			<div class="order-imgs">
				<a href=""><img src="<?php echo '/imgs/'.$val['item_id'].'.jpg' ?>" /></a>
			</div>
			<div class="grp02">
				<h4 class="text-danger">订单编号:<a href="javascript:;"><?php echo $val['order_id']?></a></h4>
				<h5 class="text-waring">订单金额:<a href="javascript:;"><?php echo $val['total']?></a></h5>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>