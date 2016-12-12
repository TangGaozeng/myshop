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
            [['status'], 'integer'],
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
            'item_id' => 'Item ID',
            'title' => 'Title',
            'price' => 'Price',
            'img' => 'Img',
            'status' => 'Status',
            'detail' => 'Detail'
        ];
    }
    
}
