<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cate".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $brief
 * @property integer $is_nav
 * @property string $banner
 * @property string $keywords
 * @property string $description
 * @property string $redirect_url
 * @property integer $sort_order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Cate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'is_nav', 'sort_order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['brief', 'banner', 'keywords', 'redirect_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => '上级关联',
            'name' => '分类名称',
            'brief' => 'Brief',
//             'is_nav' => 'Is Nav',
            'banner' => 'Banner',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'redirect_url' => 'Redirect Url',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    
    
    public static function getParentName($id){
    	if($id == 0){
    		return "一级分类";
    	}
    	$model = Cate::find()->where(['id'=>$id])->one();
    	
        return $model['name'];

    }
}
