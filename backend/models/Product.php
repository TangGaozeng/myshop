<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $item_id
 * @property string $title
 * @property string $price
 * @property string $img
 * @property integer $status
 * @property integer $cate_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'cate_id'], 'integer'],
            [['title', 'img'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => '产品ID',
            'title' => '手机型号',
            'price' => '价格',
            'cate_id' => '分类ID',
        ];
    }
}
