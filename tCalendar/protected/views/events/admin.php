<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Events', 'url'=>array('index')),
	array('label'=>'Create Events', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#events-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Events</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'fieldtype',
		'date',
		'starttime',
		'endtime',
		
		'email',
		'mobile',
		'status',
		/*'DateCreated',
		'LastUpdate',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{accept}{decline}',
			'buttons'=>array(
					'accept'=>array(
							'label'=>'Accept',
							'url'=>'Yii::app()->createUrl("events/accept", array("id"=>$data->id))',
						),
					'decline'=>array(
							'label'=>'Decline',
							'url'=>'Yii::app()->createUrl("events/decline", array("id"=>$data->id))'
						),
				),
		),
	),
)); ?>
