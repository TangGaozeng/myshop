<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MoneySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '余额';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="money-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' =>'user_id',
                'label' => '用户ID'
            ],
            [
                'attribute' => 'amount',
                'label' => '余额',
            ],
            [
                'attribute' => 'frozenamount',
                'label' => '冻结资金'
            ],
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
