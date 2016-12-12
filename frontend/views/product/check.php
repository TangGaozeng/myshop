<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商品详情';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='row check-main'>
	<img width="650px" src="<?php echo '/imgs/'.$arr['img'] ?>" class="col-lg-6" />
	<div class="col-lg-6">
		<div class="tesl"><h4>型号:</h4><p class="text-danger fs-16"><?php echo $arr['title']?></p></div>
		<div class="tesl"><h4>价格:</h4><p class="text-danger fs-22">￥<?php echo $arr['price']?></p></div>
		<div class="tesl"><h4>配置:</h4><p class="text-danger fs-18"><?php echo $arr['detail']?></p></div>
		<div class="tesl"><h4>数量:</h4><input type="number" name="num" id="num"></div>
		<br>
		<button class="btn btn-success sow">立即购买</button>
	</div>
	<input type="hidden" id="item_id" value="<?php echo $arr['item_id'];?>" >
</div>