<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "money".
 *
 * @property integer $user_id
 * @property string $amount
 * @property string $frozenamount
 * @property integer $status
 */
class Money extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['amount', 'frozenamount'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'frozenamount' => 'Frozenamount',
            'status' => 'Status',
        ];
    }
}
