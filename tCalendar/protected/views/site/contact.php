<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Calendar',
);
  
?>
<?php 
/*
 $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
    //'themeCssFile'=>'cupertino/jquery-ui.min.css',
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next,today',
            'center'=>'title',
            'right'=>'month,agendaWeek,agendaDay',
        ),
        'events'=>$this->createUrl('Site/calendarEvents'),
        'eventClick'=> 'js:function(calEvent, jsEvent, view) {
            $("#myModalHeader").html(calEvent.title);
            $("#myModalBody").load("'.Yii::app()->createUrl("Site/view/id/").'"+calEvent.id+"?asModal=true");
            $("#myModal").modal();
        }',
    )));
?>
 
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
); ?>
 
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4 id="myModalHeader">Modal header</h4>
    </div>
 
    <div class="modal-body" id="myModalBody">
        <p>One fine body...</p>
    </div>
 
    <div class="modal-footer">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'label' => 'Close',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>
 
<?php $this->endWidget(); ?>






<script>
$(document).ready(function() {
$(".fc-day fc-thu fc-widget-content fc-other-month fc-future").click(function(){

alert('works');

});
});
</script>

<script src='/fullcalendar/fullcalendar.js'></script>
<script src='/fullcalendar/lang-all.js'></script>
<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            lang: 'ru'
        });

    });

</script>
*/