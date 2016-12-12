<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use frontend\models\Cate;
use backend\models\Cate as Cates;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
	            'attribute' => 'parent_id',
	            'value'=>function ($model) {
	            	return $model->getParentName($model->parent_id);
	            }
            ],
            [
            	'attribute' => 'id',
            	'label' => '名称',
	            'value'=>function ($model) {
	            	return $model->getParentName($model->id);
	            },'filter' => Html::activeDropDownList(
	                    $searchModel,
	                    'id',
	                    ArrayHelper::map(Cates::get(0, Cates::find()->asArray()->all()), 'id', 'label'),
	                    ['class' => 'form-control', 'prompt' => Yii::t('app', '')]
	                ),
	            ],
            
            [
            	"attribute"	=> 'brief',
            	"label" => '简介',
            		
            ],
//             'is_nav',
            

         ['class' => 'yii\grid\ActionColumn',
          "template" => "{goodslist}",
          "header" => "操作",
          "buttons" => [
            'goodslist' => function ($url, $model, $key) {
              $options = [
                'title' => Yii::t('yii', 'Update'),
                'aria-label' => Yii::t('yii', 'Update'),
              ];
              return Html::a('<span class="glyphicon glyphicon-eye-open" title="查看产品"></span>', Url::toRoute(['product/index','id'=>$key]));
            }
          ],
      ],
        ],
    ]); ?>
</div>
