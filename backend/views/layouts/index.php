<?php
/* @var $this yii\web\View */
?>
<h1>layouts/index</h1>

<p>
<?php $this->beginBlock("block1")?>

    <?php echo $arr['user_name']?> 

<?php $this->endBlock()?>
<?php echo $arr['user_name']?> 
</p>
