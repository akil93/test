<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Events', 'url'=>array('index'),'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Events', 'url'=>array('create')),
	array('label'=>'Update Events', 'url'=>array('update', 'id'=>$model->id),'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Delete Events', 'url'=>'#','visible'=>!Yii::app()->user->isGuest, 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Events', 'url'=>array('admin'),'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Delete Request')
);
?>

<h1>Confirm Number #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form1', array('model'=>$model)); ?>