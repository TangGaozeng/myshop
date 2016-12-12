<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商品列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
   
</div>
<div id="row">
<?php foreach ($arr as $key=>$val): ?>
	<div class="col-lg-3">
		<div class="list">
			<div class="imgs">
				<a href="index.php?r=product/check&id=<?php echo $val['item_id'];?>"><img src="<?php echo '/imgs/'.$val['img'] ?>" /></a>
			</div>
			<div class="grp02">
				<h4 class="text-primary"><?php echo $val['cate_id']?></h4>
				<h5 class="text-waring"><?php echo $val['title']?></h5>
			</div>
			<div class="grp03">
				<h3 class="text-danger">￥<?php echo $val['price'];?></h3>
			</div>
			<a href="index.php?r=product/check&id=<?php echo $val['item_id']?>" class="btn btn-success">查看详情</a>
		</div>
	</div>
	<?php endforeach; ?>
</div>