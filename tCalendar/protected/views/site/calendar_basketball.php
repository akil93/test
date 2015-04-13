
	<?php /*
	
	//$week = array("Monday"=>$d++,"Tuesday"=>$d++,"Wednesday"=>$d++,"Thursday"=>$d++,"Friday"=>$d++,"Saturday"=>$d++,
		//"Sunday"=>$d++); 
	$week1 = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
	$urlDay=0; $urlMonth=0;$urlYear=0;
	if(date("t",mktime(0,0,0,$m,$week['Monday'],$y))-$week['Monday'] < 7)
	{
		if($m == 12){
			$urlDay = 7-(date("t",mktime(0,0,0,$m,$week['Monday'],$y))-$week['Monday']);
			$m = 1; $y++;
			$urlMonth = $m;
			$urlYear = $y; 
		}else{
			$urlDay = 7-(date("t",mktime(0,0,0,$m,$week['Monday'],$y))-$week['Monday']);
			$m++;
			$urlMonth = $m;
			$urlYear = $y;
		}
	}elseif(date("t",mktime(0,0,0,$m,$week['Monday'],$y))-$week['Monday'] == 7){
			if ($m == 12) {
				$m = 1;
				$urlDay = 1;
				$y++;
				$urlMonth = $m; $urlYear = $y;
			}else{
				$urlDay = 7-(date("t",mktime(0,0,0,$m,$week['Monday'],$y))-$week['Monday']);
				$m++;
				$urlMonth = $m;
				$urlYear = $y;
			}
	}else{ 
			$urlDay = $week['Monday'] + 7; $urlMonth = $m; $urlYear = $y;
	}


	$urlLastMonday = 0; $urlLastMonth = 0; $urlLastYear = 0;
	//----------------------------------------------- do not include ----------------------------------------//
	/*if($week['Monday'] < 7){
		if($m == 1){
			$m = 12;
			$urlLastMonday = 31 - (7-$week['Monday']);
			$y--;
			$urlLastYear = $y;
			$urlLastMonth = $m;
		}else{
			$m--;
			$urlLastMonday = date("t",mktime(0,0,0,$m,1,$y))-(7-$week['Monday']);
			$urlLastMonth = $m;
			$urlLastYear = $y;
		}
	}elseif($week['Monday'] == 1){
		if ($m == 1) {
			$m = 12;
			$urlLastMonday = 24;
			$urlLastMonth = 12;
			$urlLastYear = $y-1;
		}else{
			$urlLastMonday = date("t",mktime(0,0,0,$m,1,$y))-7;
			$urlLastMonth = $m - 1;
			$urlLastYear = $y;
		}
	}else{

		$urlLastMonday = $week['Monday'] - 7; $urlLastMonth = $m-1; $urlLastYear = $y;
	}*/
	//------------------------------------------------------------------------------------------------//

/*	$urlLastMonday = date("d", strtotime("-1 week"));
	$urlLastMonth = date("m", strtotime("-1 week"));
	$urlLastYear = date("Y", strtotime("-1 week"));

	echo CHtml::link('Last Week', array('site/calendarFootball', 'theDate'=>$urlLastMonday, 
		'theMonth'=>$urlLastMonth, 'theYear'=>$urlLastYear), array('class'=>'links_calendar'));
	echo CHtml::link('Create', array('events/create'), array('class'=>'links_calendar'));
	echo CHtml::link('Next Week', array('site/calendarFootball', 'theDate'=>$urlDay,
		'theMonth'=>$urlMonth, 'theYear'=>$urlYear), array('class'=>'links_calendar'));
	*/

/*$this->widget('ext.fullcalendar.EFullCalendarHeart', array(
    //'themeCssFile'=>'cupertino/jquery-ui.min.css',
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next,today',
            'center'=>'title',
            'right'=>'month,agendaWeek,agendaDay',
        ),

        'lazyFetching'=>true,
        'events'=>$this->createUrl('Site/calendarEvents'), // URL to get event
    )));*/
    echo CHtml::link('Create', array('events/create'), array('class'=>'links_calendar'));
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
        	 
        	 $("#myModalBody").load("'.Yii::app()->createUrl("Site/calendar/").'");
             $("#myModal1").modal();
        }',
        'buttonText'=> array( 
        	'today'=> 'Сегодня'
        	),	
        'events'=>$this->createUrl('Site/calendarEvents3'),

        'eventClick'=> 'js:function(calEvent, jsEvent, view) {
            $("#myModalHeader").html(calEvent.title);
            $("#event_name").html(calEvent.title);
            $("#event_start").html(calEvent.s_time);
            $("#event_end").html(calEvent.e_time);
            $("#event_date").html(calEvent.e_date);
            $("#event_status").html(calEvent.status);
            $("#update_id").attr("href","/tCalendar/index.php/events/editRequest?id="+calEvent.id);
            $("#myModalBody").load("'.Yii::app()->createUrl("Site/view/id/").'"+calEvent.id+"?asModal=true");
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
      <div class="modal-header" id="myModalHeader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      
      <div class="modal-body">
        <span>Name</span><span id="event_name" style="margin-left:20px;"></span><br/>
        <span>Start time</span><span id="event_start" style="margin-left:20px;"></span><br/>
        <span>End time</span><span id="event_end" style="margin-left:20px;"></span><br/>
        <span>Date</span><span id="event_date" style="margin-left:20px;"></span><br/>
        <span>Status</span><span id="event_status" style="margin-left:20px;"></span>
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
    array('id' => 'myModal1')
); ?>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4 id="myModalHeader1">Modal header</h4>
    </div>
      
      <div class="modal-body" id="myModalBody1">
       
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        <a href="#" id="update_id" class="btn btn-primary">Update</a>
      </div>
    </div>
  </div>
</div>

<?php $this->endWidget(); ?>

<?php /* take out this php 
<table style="border:1px solid black;">
		<tr >
				<td>
					
				</td>
			<?php foreach($week as $day=>$data): ?>
				<td style="border:1px solid black;">

					<?php echo $day." ".$data; ?>
				</td>
			<?php endforeach; ?>
		</tr>
		<tr>
				<td>
					
				</td>
			<?php foreach($week as $day): ?>
				<td>
					<?php echo ""; ?>
				</td>
			<?php endforeach; ?>
		</tr>
		<?php $rowspan = 0; $end_time = 0; $thatday = 0;?>
	<?php for($row = 18; $row<46; $row++): ?>
		
		<tr>
			<?php 
				if($row%2==0){
					echo '<td rowspan="2" style="border:1px solid black;">'.($row/2).':00</td>';
				}
			?>
			<?php foreach($week as $day=>$data): ?>
				 
				 	<?php 
				 	$minute = '';
				 	$hour = '';
				 	$min = 0;
				 		if($row%2==0){
				 			$minute = ':00';
				 			$hour = ($row/2);
				 			//$min = 0;
				 		}else{
				 			$minute = ':30';
				 			$hour = (($row/2)-0.5);
				 			//$min = 1;
				 		}
				 		//echo ($row/2).$minute.':00';
				 		if(Events::model()->findByAttributes(array('fieldtype'=>1,'starttime'=>$hour.$minute.':00','date'=>$y.'-'.$m.'-'.$data))!==null){
				 			//echo ($row/2).$minute.':00';
				 			if(Events::model()->findByAttributes(array('starttime'=>$hour.$minute.':00','date'=>$y.'-'.$m.'-'.$data))!==null ){
				 				$s_time = Events::model()->findByAttributes(array('starttime'=>$hour.$minute.':00'))->starttime;
				 				$arr = date_parse($s_time);
				 				$end_time = $e_time = Events::model()->findByAttributes(array('starttime'=>$hour.$minute.':00'))->endtime;
				 				$arr2 = date_parse($e_time);
				 				$min = $arr2['minute'];

				 				if(($arr['minute']===30 && $arr2['minute']===0) || 
				 					($arr['minute']===0 && $arr2['minute']===30)){
				 					$rowspan = ($e_time-$s_time)/2;
				 				}else{
				 					$rowspan = $e_time-$s_time;
				 				}
				 				
				 				$rowspan *= 2;
				 				if(($arr['minute']===30 && $arr2['minute']===0) || 
				 					($arr['minute']===0 && $arr2['minute']===30)){
				 					$rowspan++;
				 				}else{
				 					//$rowspan = $e_time-$s_time;
				 				}
				 				$status = Events::model()->findByAttributes(array('fieldtype'=>1,'starttime'=>$hour.$minute.':00','date'=>$y.'-'.$m.'-'.$data))->status;
				 				$createdTime = Events::model()->findByAttributes(array('fieldtype'=>1,'starttime'=>$hour.$minute.':00','date'=>$y.'-'.$m.'-'.$data))->DateCreated;

				 				$cellColor = 'none';
				 				if($status == 2){
				 					$cellColor = 'yellow';
				 				}elseif ($status == 3) {
				 					$cellColor = 'red';
				 				}	
				 				$event = Events::model()->findByAttributes(array('fieldtype'=>1,'starttime'=>$hour.$minute.':00','date'=>$y.'-'.$m.'-'.$data));
				 				$thatday = $data;
				 				echo '<td rowspan="'.($rowspan).'" style="border:1px solid black;
				 				background-color:'.$cellColor.';">';
				 				echo CHtml::link($event->name,array('events/view', 'id'=>$event->id));
				 				echo "</td>";
				 				$rowspan -= 1;

				 			}else{
				 				if($rowspan===0){
				 					if(($end_time-0)>$hour && $data===$thatday){
				 						$rowspan -= 1;
					 				}else{
					 					if($min===30){
				 							$rowspan--;
					 					}else{
					 						echo '<td style="border:1px solid black;">'.
					 						CHtml::link('?', '#',array(
					 							'onclick'=>'$("#mydialog").dialog("open"); return false;',
					 							)).'</td>';
					 					}
					 				}
				 				}else{
				 					if(($end_time-0)>$hour && $data===$thatday){
				 						$rowspan--;
					 				}else{
					 					if($min===30){
				 							$rowspan--;
					 					}else{
					 						echo '<td style="border:1px solid black;">'.
					 						CHtml::link('', '#',array(
					 							'onclick'=>'$("#mydialog").dialog("open"); return false;',
					 							)).'</td>';
					 					}
					 				}
				 					
				 				}
				 				
				 			}
				 		}else{
				 			if ($rowspan===0) {
				 				if(($end_time-0)>$hour && $data===$thatday){
				 					$rowspan -= 1;
				 				}else{
				 					if($min===30){
				 						$rowspan--;
				 					}else{
				 						echo '<td style="border:1px solid black;">'.
					 						CHtml::link('', '#',array(
					 							'onclick'=>'$("#mydialog").dialog("open"); return false;',
					 							)).'</td>';
				 					}
				 					
				 				}
				 				
				 			}else{
				 				if(($end_time-0)>$hour && $data===$thatday){
				 						$rowspan--;
					 				}else{
					 					if($min===30){
				 							$rowspan--;
					 					}else{
					 						echo '<td style="border:1px solid black;">'.
					 						CHtml::link('', '#',array('onclick'=>'$("#mydialog").dialog("open"); return false;',
)).'</td>';
					 					}
					 				}
				 				//$rowspan--;
				 			}
				 			
				 		}
				 	 ?>
						 

			<?php endforeach; ?>
			
		</tr>
	<?php endfor; ?>
</table>*/?>
