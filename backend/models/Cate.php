<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Cate".
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
        return 'Cate';
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
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'brief' => 'Brief',
            'is_nav' => 'Is Nav',
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
    
    
    /**
     * Get all catalog order by parent/child with the space before child label
     * Usage: ArrayHelper::map(Catalog::get(0, Catalog::find()->asArray()->all()), 'id', 'label')
     * @param int $parentId  parent catalog id
     * @param array $array  catalog array list
     * @param int $level  catalog level, will affect $repeat
     * @param int $add  times of $repeat
     * @param string $repeat  symbols or spaces to be added for sub catalog
     * @return array  catalog collections
     */
    static public function get($parentId = 0, $array = [], $level = 0, $add = 2, $repeat = '　')
    {
    	$strRepeat = '';
    	// add some spaces or symbols for non top level categories
    	if ($level > 1) {
    		for ($j = 0; $j < $level; $j++) {
    			$strRepeat .= $repeat;
    		}
    	}
    
    	$newArray = array ();
    	//performance is not very good here
    	foreach ((array)$array as $v) {
    		if ($v['parent_id'] == $parentId) {
    			$item = (array)$v;
    			$item['label'] = $strRepeat . (isset($v['title']) ? $v['title'] : $v['name']);
    			$newArray[] = $item;
    
    			$tempArray = self::get($v['id'], $array, ($level + $add), $add, $repeat);
    			if ($tempArray) {
    				$newArray = array_merge($newArray, $tempArray);
    			}
    		}
    	}
    	return $newArray;
    }
    
    /**
     * 获得订单关联用户信息
     * @return ActiveQuery
     */
    public function getCate()
    {
    	return $this->hasOne(Cate::className(), ['id' => 'cate_id']);//关联一条
    }
    
    public function getParentName($id){
    	if($id == 0){
    		return "一级分类";
    	}
    	$model = $this->find()->where(['id'=>$id])->one();
    	return $model->name;
    }
}
