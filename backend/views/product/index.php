<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建产品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'img',
              'label' => '图片',
                'format' => [
            'image', 
              [
              'width'=>'60',
              'height'=>'60'
              ]
            ],
                'value'=>function ($model) {
                    return "http://admin.myshop.cc/imgs/".$model->img;
                },
            ],
            'item_id',
            'title',
            'price',
           // 'img',
            //'status',
            // 'cate_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
