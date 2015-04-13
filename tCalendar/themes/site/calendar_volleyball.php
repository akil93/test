<?php 
	
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


	/*$urlLastMonday = 0; $urlLastMonth = 0; $urlLastYear = 0;
	if($week['Monday'] < 7){
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

	echo CHtml::link('Last Week', array('site/calendarVolleyball', 'theDate'=>$urlDay, 
		'theMonth'=>$urlMonth, 'theYear'=>$urlYear), array('class'=>'links_calendar'));
	echo CHtml::link('Create', array('events/create'), array('class'=>'links_calendar'));
	echo CHtml::link('Next Week', array('site/calendarVolleyball', 'theDate'=>$urlDay,
		'theMonth'=>$urlMonth, 'theYear'=>$urlYear), array('class'=>'links_calendar'));
?>
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
				 		if(Events::model()->findByAttributes(array('fieldtype'=>2,'starttime'=>$hour.$minute.':00','date'=>$y.'-'.$m.'-'.$data))!==null){
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
</table>
