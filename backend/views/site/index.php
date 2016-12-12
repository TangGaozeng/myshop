<?php

/* @var $this yii\web\View */

$this->title = '店铺后台';
?>
 <aside class="main-sidebar fixed">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="sidebar" id="scrollspy">

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="nav sidebar-menu">
            <li class="headamounter">后台选项</li>
            <li class="active"><a href="#introduction"><i class="fa fa-circle-o"></i>首页</a></li>
            <li><a href="/index.php?r=product"><i class="fa fa-circle-o"></i>产品</a></li>
            <li><a href="/index.php?r=order"><i class="fa fa-circle-o"></i>订单</a></li>
            <li><a href="/index.php?r=money"><i class="fa fa-circle-o"></i> 余额</a></li>
            <li><a href="/index.php?r=user"><i class="fa fa-circle-o"></i> 用户</a></li>
            <li><a href="/index.php?r=cate"><i class="fa fa-circle-o"></i>分类</a></li>
            <li><a href="/index.php?r=country"><i class="fa fa-circle-o"></i> 国家</a></li>
            <li class="treeview" id="scrollspy-components">
              <a href="javascript:void(0)"><i class="fa fa-circle-o"></i> Components</a>
              <ul class="nav treeview-menu">
                <li><a href="#component-main-header">Main Header</a></li>
                <li><a href="#component-sidebar">Sidebar</a></li>
                <li><a href="#component-control-sidebar">Control Sidebar</a></li>
                <li><a href="#component-info-box">Info Box</a></li>
                <li><a href="#component-box">Boxes</a></li>
                <li><a href="#component-direct-chat">Direct Chat</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.sidebar -->
      </aside>

    <section id="introduction">
      <h2 class="page-header"><a href="/index.php?r=product">欢迎来到我的店铺后台管理</a></h2>
      <p class="lead">
        开始你的管理吧
      </p>
    </section>


