 
 <?php 
    
    $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
    //'themeCssFile'=>'cupertino/jquery-ui.min.css',
    'options'=>array(
        'header'=>array(

            'left'=>'prev,next,today',
            'center'=>'title',
            'right'=>'',
            
        ),
        'defaultView'=>'agendaWeek',
        'monthNames'=>['Январь','Февраль','Март','Апрель','Май','οюнь','οюль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        'monthNamesShort'=> ['Янв.','Фев.','Март','Апр.','Май','οюнь','οюль','Авг.','Сент.','Окт.','Ноя.','Дек.'],
        'dayNamesShort'=> ["ВС","ПН","ВТ","СР","ЧТ","ПТ","СБ"],
         'minTime' => '09:00:00',
         'maxTime' => '22:00:00',
        'firstDay'=> '1',
        'axisFormat'=>'H:mm',
        'selectable'=> 'true',
        'selectHelper'=> 'true',
        'select'=>'js:function(startDate, endDate, jsEvent,view){
			 $.post("'.Yii::app()->createUrl("Events/create").'", function(data){ $("#myModalBody").html(data);});
			 document.getElementById("update_id").style.display = "none";
			 $("#update_id").attr("visibility","hidden");
             $("#myModal").modal();
        }',
        'buttonText'=> array( 
            'today'=> 'Сегодня'
            ),  
        'events'=>$this->createUrl('Site/calendarEvents'),

        'eventClick'=> 'js:function(calEvent, jsEvent, view) {
			document.getElementById("update_id").style.display = "true";
			$.post("'.Yii::app()->createUrl("Events/view/id").'"+"/"+calEvent.id,function(data){ $("#myModalBody").html(data);});
			$("#update_id").bind("updateEvent", function(){ $.get("'.Yii::app()->createUrl("Events/editRequest/id").'"+"/"+calEvent.id, function(data){ $("#myModalBody").html(data);});});
            $("#myModal").modal();
        }',
              
     
    )
));
?> 
    <?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
); ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" id="myModalHeader1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      
      <div class="modal-body" id="myModalBody">
        
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        <a href="#" id="update_id" class="btn btn-primary">Update</a>
      </div>
    </div>
  </div>
</div>

<?php $this->endWidget(); ?>

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'modal1')
); ?>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4 id="myModalHeader1">Create Event</h4>
    </div>
      
      <div class="modal-body" id="ModalBody1">
       	<span>Name</span><span id="event_name" style="margin-left:20px;"></span><br/>
        <span>Start time</span><span id="event_start" style="margin-left:20px;"></span><br/>
        <span>End time</span><span id="event_end" style="margin-left:20px;"></span><br/>
        <span>Date</span><span id="event_date" style="margin-left:20px;"></span><br/>
        <span>Status</span><span id="event_status" style="margin-left:20px;"></span>
      <div class="modal-footer">        
        <a href="#" id="update_id" class="btn btn-primary">Create</a>
      </div>
    </div>
  </div>
</div>

<?php $this->endWidget(); ?>
<script>
/*js:function(calEvent, jsEvent, view) {
            $("#myModalHeader").html(calEvent.title);
            $("#event_name").html(calEvent.title);
            $("#event_start").html(calEvent.s_time);
            $("#event_end").html(calEvent.e_time);
            $("#event_date").html(calEvent.e_date);
            $("#event_status").html(calEvent.status);
            $("#update_id").attr("href","/tCalendar/index.php/events/editRequest?id="+calEvent.id);
            $("#myModalBody").load("'.Yii::app()->createUrl("Events/view/id/").'"+calEvent.id);
            $("#myModal").modal();
        }
*/

$(function(){
	$("#update_id").click(function(){
		$(this).trigger('updateEvent');	
	});	
});

</script>