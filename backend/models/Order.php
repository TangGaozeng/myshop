<?php

namespace app\models;

use Yii;
use backend\models\User;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $order_id
 * @property integer $user_id
 * @property integer $num
 * @property integer $create_time
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
    public function rules()
    {
        return [
            [['user_id', 'num', 'create_time', 'status'], 'integer'],
            [['order_id', 'total', 'lv_price', 'amount'], 'string', 'max' => 255],
            [['delivery_info'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '订单编号',
            'user_id' => '用户',
            'num' => '数量',
            'create_time' => '创建时间',
            'delivery_info' => '收货信息',
            'total' => '总价',
            'lv_price' => '会员优惠',
            'amount' => '实际金额',
            'status' => '状态',
        ];
    }

    public static function getUsername($id)
    {
        $data = User::find()->where(['id' => $id])->one();
        return $data->username;
    }
}
