<?php 
	$d = 11;
	$week = array("Monday"=>$d++,"Tuesday"=>$d++,"Wednesday"=>$d++,"Thursday"=>$d++,"Friday"=>$d++,"Saturday"=>$d++,
		"Sunday"=>$d++); 
	$week1 = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
	
?>
<table style="border:1px solid black;">
		<tr >
				<td>
					1
				</td>
			<?php foreach($week as $day=>$data): ?>
				<td style="border:1px solid black;">

					<?php echo $day." ".$data; $d++?>
				</td>
			<?php endforeach; ?>
		</tr>
		<tr>
				<td>
					1
				</td>
			<?php foreach($week as $day): ?>
				<td>
					<?php echo "Task"; ?>
				</td>
			<?php endforeach; ?>
		</tr>
		<?php $rowspan = 0; $end_time = 0; $thatday = 0;?>
	<?php for($row = 0; $row<48; $row++): ?>
		
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
				 		if(Events::model()->findByAttributes(array('starttime'=>$hour.$minute.':00','date'=>'1993-06-'.$data))!==null){
				 			//echo ($row/2).$minute.':00';
				 			if(Events::model()->findByAttributes(array('starttime'=>$hour.$minute.':00','date'=>'1993-06-'.$data))!==null ){
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
				 				$thatday = $data;
				 				echo '<td rowspan="'.($rowspan).'" style="border:1px solid black;">';
				 				echo "NOT";
				 				echo ($arr['minute']).$rowspan;
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
					 						echo '<td style="border:1px solid black;">Null'.($row/2).'</td>';
					 					}
					 				}
				 				}else{
				 					if(($end_time-0)>$hour && $data===$thatday){
				 						$rowspan--;
					 				}else{
					 					if($min===30){
				 							$rowspan--;
					 					}else{
					 						echo '<td style="border:1px solid black;">Null'.($row/2).'</td>';
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
				 						echo '<td style="border:1px solid black;">Null'.($row/2).'</td>';
				 					}
				 					
				 				}
				 				
				 			}else{
				 				if(($end_time-0)>$hour && $data===$thatday){
				 						$rowspan--;
					 				}else{
					 					if($min===30){
				 							$rowspan--;
					 					}else{
					 						echo '<td style="border:1px solid black;">Null'.($row/2).'</td>';
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