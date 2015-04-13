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
	array('label'=>'Delete Request', 'url'=>array('confirmDelete', 'id'=>$model->id)),
	array('label'=>'Edit Request', 'url'=>array('editRequest', 'id'=>$model->id)),
);
?>

<h1>View Events #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'fieldtype',
		'date',
		'starttime',
		'endtime',
		'email',
		'mobile',
		'status',
		'DateCreated',
		'LastUpdate',
	),
)); ?>
