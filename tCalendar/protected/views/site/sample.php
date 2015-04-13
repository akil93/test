<?php 
$this->widget('application.extensions.fullcalendar.FullcalendarGraphWidget', 
    array(
        'data'=>array(
              
        ),
        'options'=>array(
            'editable'=>'true',
           // 'defaultView'=>'agendaWeek',
            'eventClick'=>'js:function(event, eventElement){
             alert("hello"); }',
             'dayClick' => 'new \yii\web\JsExpression("function(date, jsEvent, view) {
                    // event handling code
                    ...
                }")',
        ),
        'htmlOptions'=>array(
               'style'=>'width:800px;margin: 0 auto;'
        ),
    )
);