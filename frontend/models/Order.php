<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $order_id
 * @property integer $user_id
 * @property integer $num
 * @property string $create_time
 * @property string $delivery_info
 * @property string $total
 * @property string $lv_price
 * @property string $amount
 * @property integer $status
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
//     public function rules()
//     {
//         return [
//             [['user_id', 'num', 'status'], 'integer'],
//             [['create_time'], 'safe'],
//             [['order_id', 'total', 'lv_price', 'amount'], 'string', 'max' => 255],
//             [['delivery_info'], 'string', 'max' => 1024],
//         ];
//     }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'num' => 'Num',
            'create_time' => 'Create Time',
            'delivery_info' => 'Delivery Info',
            'total' => 'Total',
            'lv_price' => 'Lv Price',
            'amount' => 'Amount',
            'status' => 'Status',
        ];
    }
    
    /**
     * 获得用户订单列表
     * @param unknown $user_id
     */
    public static function getOrderShow($user_id){
    	return Order::find()->where(['user_id'=>$user_id])->all();
    }
}
