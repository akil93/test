<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fieldtype'); ?>
		<?php echo $form->dropDownList($model,'fieldtype', array(1=>'Football',2=>'Volleyball',3=>'Basketball')); ?>
		<?php echo $form->error($model,'fieldtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php //echo $form->textField($model,'date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		   'name' => 'date',
		   'model' => $model,
		   'attribute' => 'date',
		   'language' => 'en',
		   'options' => array(
		       'showAnim' => 'fold',
		   ),
		   'htmlOptions' => array(
		       'style' => 'height:15px;'
		   ),
		));?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'starttime'); ?>
		<?php //echo $form->textField($model,'starttime'); ?>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
		    'model'=>$model,
		    'name'=>'starttime',
		    'select'=>'time',
		    'options'=>array(
		    	'showOn'=>'focus',
		    	'timeFormat'=>'hh:mm',
		    	'hourGrid'=>2,
		    	'minGrid'=>10,
		    	),
		)); ?>
		<?php echo $form->error($model,'starttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endtime'); ?>
		<?php //echo $form->textField($model,'endtime'); ?>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
		    'model'=>$model,
		    'name'=>'endtime',
		    'select'=>'time',
		    'options'=>array(
		    	'showOn'=>'focus',
		    	'timeFormat'=>'hh:mm',
		    	'hourGrid'=>2,
		    	'minGrid'=>10,
		    	),
		)); ?>
		<?php echo $form->error($model,'endtime'); ?>
	</div>

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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->