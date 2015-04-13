<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form-my',
	'htmlOptions'=>array(
			'onsubmit' => "return false;",
	),
	
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile'); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>
	<input type="hidden" id="my_value" value="<?php echo $model2->id; ?>">
	<div class="row buttons">
		<?php echo CHtml::submitButton('Update',array('class' => 'btn btn-primary', 'id' => 'my_button', 'onclick'=>'function(){
	alert("!!!");var url = "/tCalendar/index.php/Events/editRequest/id/"'. $model2->id .'
	var dataObject = $("#events-form-my").serialize();
	$.ajax({
		url:url,
		type:"POST",
		dataType:"json",
		data:dataObject,
		success: function(response){ $.post("/tCalendar/index.php/Events/update/id/"<?php echo $model2->id; ?>, function(data){ $("#myModalBody").html(data); $("#myModal").modal(); return false;});},
	});
}')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
/*function edit(){
	var url = "/tCalendar/index.php/Events/editRequest/id/"<?php echo $model2->id; ?>;
	var dataObject = $("#events-form-my").serialize();
	$.ajax({
		url:url,
		type:"POST",
		dataType:"json",
		data:dataObject,
		success: function(response){ $.post("/tCalendar/index.php/Events/update/id/"<?php echo $model2->id; ?>, function(data){ $("#myModalBody").html(data); $("#myModal").modal(); return false;});},
	});
}*/
</script>