<?php

namespace common\widgets\hello;

use yii\base\widget;

class HelloWidget extends Widget
{
	public $msg = '';
	public function init(){
		parent::init();
	}

	public function run(){
		return $this->render('index',['msg'=>$this->msg]);
	}
}