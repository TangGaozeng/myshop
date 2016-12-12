<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员中心';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">


        <table class="table table-hover table-bordered tabod">
        <thead>
            <th class="fs-22">我的订单</th>
            <th class="fs-22">账户余额</th>
            <th class="fs-22">冻结资金</th>
        </thead>
            
        <tbody>
            <tr>
                <td class="row"><span class="text-danger fs-22 col-lg-6"><?php echo $arr['count'];?>条</span>  <a href="/index.php?r=order/show" class="fs-22 col-lg-6">查看订单</a></td>
                <td class="fs-22">￥ <?php echo $arr['amount']?></td>
                <td class="fs-22">￥ <?php echo $arr['frozenamount']?></td>
            </tr>
        </tbody>
    </table>

    
</div>
