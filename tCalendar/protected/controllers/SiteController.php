<?php

class SiteController extends Controller
{
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	  public function actionCalendarEvents()
		{/*
		    $items[]=array(
		        'title'=>'Meeting',
		        'start'=>'2015-02-24',
		        'color'=>'#CC0000',
		        'allDay'=>true,
		        'url'=>'http://anyurl.com'
		    );	
		    $items[]=array(
		        'title'=>'Meeting reminder',
		        'start'=>'2015-02-19',
		        'end'=>'2015-02-20',
		 
		        // can pass unix timestamp too
		        // 'start'=>time()
		 
		        'color'=>'blue',

		   	
		    );
		     echo CJSON::encode($items);
		    Yii::app()->end();
		} */
		$items = array();
		$i = 0;
		        $model=Events::model()->findAllByAttributes(array('fieldtype'=>1));    
		        foreach ($model as $value) {
		        	$i++;
		        	$stat = "";
		        	if($value->status == 1){
		        		$stat = "free";
		        	}else if($value->status == 2){
		        		$stat = "under request";
		        	}else{
		        		$stat = "reserved";
		        	}
		        	$start = $value->date.' '.$value->starttime;
		        	$end = $value->date.' '.$value->endtime;
		            $items[]=array(
		            	'id' => $value->id,
		                'title'=>$value->name,
		                'date'=> strtotime($value->date),
		                'start'=>date('Y-m-d H:i:s', strtotime($start)),
		                'end'=>date('Y-m-d H:i:s',strtotime($end)),
		                'status'=>$stat,
		                's_time'=>$value->starttime,
		                'e_time'=>$value->endtime,
		                'e_date'=>$value->date,
		                //'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->endtime))),
		                'color'=>'#CC0000',
		                'allDay'=>false,
		                'url'=>'#'
		            );
		            /*
		        $items[]=array(
		        'title'=>'Meeting',
		        'start'=>'2015-02-0'.$i,
		        'color'=>'#CC0000',
		        'allDay'=>true,
		        'url'=>'http://anyurl.com'.$value->name
		    );	*/
		        }
		       
		        echo CJSON::encode($items);
		        Yii::app()->end();

		}
		public function actionCalendarEvents2()
		{/*
		    $items[]=array(
		        'title'=>'Meeting',
		        'start'=>'2015-02-24',
		        'color'=>'#CC0000',
		        'allDay'=>true,
		        'url'=>'http://anyurl.com'
		    );	
		    $items[]=array(
		        'title'=>'Meeting reminder',
		        'start'=>'2015-02-19',
		        'end'=>'2015-02-20',
		 
		        // can pass unix timestamp too
		        // 'start'=>time()
		 
		        'color'=>'blue',

		   	
		    );
		     echo CJSON::encode($items);
		    Yii::app()->end();
		} */
		$items = array();
		$i = 0;
		        $model=Events::model()->findAllByAttributes(array('fieldtype'=>2));    
		        foreach ($model as $value) {
		        	$i++;
		        	$stat = "";
		        	if($value->status == 1){
		        		$stat = "free";
		        	}else if($value->status == 2){
		        		$stat = "under request";
		        	}else{
		        		$stat = "reserved";
		        	}
		        	$start = $value->date.' '.$value->starttime;
		        	$end = $value->date.' '.$value->endtime;
		            $items[]=array(
		            	'id' => $value->id,
		                'title'=>$value->name,
		                'date'=> strtotime($value->date),
		                'start'=>date('Y-m-d H:i:s', strtotime($start)),
		                'end'=>date('Y-m-d H:i:s',strtotime($end)),
		                'status'=>$stat,
		                's_time'=>$value->starttime,
		                'e_time'=>$value->endtime,
		                'e_date'=>$value->date,
		                //'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->endtime))),
		                'color'=>'#CC0000',
		                'allDay'=>false,
		                'url'=>'#'
		            );
		            /*
		        $items[]=array(
		        'title'=>'Meeting',
		        'start'=>'2015-02-0'.$i,
		        'color'=>'#CC0000',
		        'allDay'=>true,
		        'url'=>'http://anyurl.com'.$value->name
		    );	*/
		        }
		       
		        echo CJSON::encode($items);
		        Yii::app()->end();

		}
		public function actionCalendarEvents3()
		{/*
		    $items[]=array(
		        'title'=>'Meeting',
		        'start'=>'2015-02-24',
		        'color'=>'#CC0000',
		        'allDay'=>true,
		        'url'=>'http://anyurl.com'
		    );	
		    $items[]=array(
		        'title'=>'Meeting reminder',
		        'start'=>'2015-02-19',
		        'end'=>'2015-02-20',
		 
		        // can pass unix timestamp too
		        // 'start'=>time()
		 
		        'color'=>'blue',

		   	
		    );
		     echo CJSON::encode($items);
		    Yii::app()->end();
		} */
		$items = array();
		$i = 0;
		        $model=Events::model()->findAllByAttributes(array('fieldtype'=>3));    
		        foreach ($model as $value) {
		        	$i++;
		        	$stat = "";
		        	if($value->status == 1){
		        		$stat = "free";
		        	}else if($value->status == 2){
		        		$stat = "under request";
		        	}else{
		        		$stat = "reserved";
		        	}
		        	$start = $value->date.' '.$value->starttime;
		        	$end = $value->date.' '.$value->endtime;
		            $items[]=array(
		            	'id' => $value->id,
		                'title'=>$value->name,
		                'date'=> strtotime($value->date),
		                'start'=>date('Y-m-d H:i:s', strtotime($start)),
		                'end'=>date('Y-m-d H:i:s',strtotime($end)),
		                'status'=>$stat,
		                's_time'=>$value->starttime,
		                'e_time'=>$value->endtime,
		                'e_date'=>$value->date,
		                //'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->endtime))),
		                'color'=>'#CC0000',
		                'allDay'=>false,
		                'url'=>'#'
		            );
		            /*
		        $items[]=array(
		        'title'=>'Meeting',
		        'start'=>'2015-02-0'.$i,
		        'color'=>'#CC0000',
		        'allDay'=>true,
		        'url'=>'http://anyurl.com'.$value->name
		    );	*/
		        }
		       
		        echo CJSON::encode($items);
		        Yii::app()->end();

		}
	public function actionView($id)
    {
 
        if (@$_GET['asModal']==true)
        {
            $this->renderAjax('view',
                array('model'=>$this->loadModel($id)),false,true
            );
        }
        else{
            $this->layout = 'column2';
            $this->renderAjax('view',array(
                'model'=>$this->loadModel($id),
            ));
        }
    }

 
public function actionCalendar()
    {
        $model=new Events('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Events']))
            $model->attributes=$_GET['Events'];
        $this->render('calendar',array(
            'model'=>$model,
        )); 
    }
	
  

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model,));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionCalendarFootball($theDate,$theMonth,$theYear){
		$model = Events::model()->findAllByAttributes(array('fieldtype'=>1,'status'=>2));
		foreach ($model as $key => $value) {
			$currentTime = date_create()->format('Y-m-d H:i:s');
			$datetime1 = new DateTime($value['DateCreated']);
			$datetime2 = new DateTime($currentTime);
			$difference = ($datetime1->diff($datetime2));
			if($difference->format("%H") > 2){
				Events::model()->deleteByPk($value['id']);	
			}
		}
		//	$model->save();
		$week = $this->getTime($theDate,$theMonth,$theYear);
		$this->render('calendar_football', array('model'=>$model,'week'=>$week,'m'=>$theMonth,'y'=>$theYear));
	}

	public function actionCalendarVolleyball($theDate,$theMonth,$theYear){
		$model = Events::model()->findAllByAttributes(array('fieldtype'=>2,'status'=>2));
		foreach ($model as $key => $value) {
			$currentTime = date_create()->format('Y-m-d H:i:s');
			$datetime1 = new DateTime($value['DateCreated']);
			$datetime2 = new DateTime($currentTime);
			$difference = ($datetime1->diff($datetime2));
			if($difference->format("%H") > 2){
				Events::model()->deleteByPk($value['id']);	
			}
		}
		$week = $this->getTime($theDate,$theMonth,$theYear);
		$this->render('calendar_volleyball', array('model'=>$model,'week'=>$week,'m'=>$theMonth,'y'=>$theYear));
	}

	public function actionCalendarBasketball($theDate,$theMonth,$theYear){
		$model = Events::model()->findAllByAttributes(array('fieldtype'=>3,'status'=>2));
		foreach ($model as $key => $value) {
			$currentTime = date_create()->format('Y-m-d H:i:s');
			$datetime1 = new DateTime($value['DateCreated']);
			$datetime2 = new DateTime($currentTime);
			$difference = ($datetime1->diff($datetime2));
			if($difference->format("%H") > 2){
				Events::model()->deleteByPk($value['id']);	
			}
		}
		$week = $this->getTime($theDate,$theMonth,$theYear);
		$this->render('calendar_basketball', array('model'=>$model,'week'=>$week,'m'=>$theMonth,'y'=>$theYear));
	}

	public function actionSample(){
		$this->render('sample');
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function getTime($day,$month,$year){
		$today = date("w",mktime(0,0,0,$month,$day,$year));
		$week = array("Monday"=>0,"Tuesday"=>0,"Wednesday"=>0,"Thursday"=>0,"Friday"=>0,"Saturday"=>0,
			"Sunday"=>0);

		switch ($today) {
			case 0:
				$week['Sunday']=$day;
				$week['Monday']=$day-6;
				$week['Tuesday']=$day-5;
				$week['Wednesday']=$day-4;
				$week['Thursday']=$day-3;
				$week['Friday']=$day-2;
				$week['Saturday']=$day-1;
				break;
			case 1:
				$week['Sunday']=$day+6;
				$week['Monday']=$day;
				$week['Tuesday']=$day+1;
				$week['Wednesday']=$day+2;
				$week['Thursday']=$day+3;
				$week['Friday']=$day+4;
				$week['Saturday']=$day+5;
				break;
			case 2:
				$week['Sunday']=$day+5;
				$week['Monday']=$day-1;
				$week['Tuesday']=$day;
				$week['Wednesday']=$day+1;
				$week['Thursday']=$day+2;
				$week['Friday']=$day+3;
				$week['Saturday']=$day+4;
				break;
			case 3:
				$week['Sunday']=$day+4;
				$week['Monday']=$day-2;
				$week['Tuesday']=$day-1;
				$week['Wednesday']=$day;
				$week['Thursday']=$day+1;
				$week['Friday']=$day+2;
				$week['Saturday']=$day+3;
				break;
			case 4:
				$week['Sunday']=$day+3;
				$week['Monday']=$day-3;
				$week['Tuesday']=$day-2;
				$week['Wednesday']=$day-1;
				$week['Thursday']=$day;
				$week['Friday']=$day+1;
				$week['Saturday']=$day+2;
				break;
			case 5:
				$week['Sunday']=$day+2;
				$week['Monday']=$day-4;
				$week['Tuesday']=$day-3;
				$week['Wednesday']=$day-2;
				$week['Thursday']=$day-1;
				$week['Friday']=$day;
				$week['Saturday']=$day+1;
				break;
			case 6:
				$week['Sunday']=$day+1;
				$week['Monday']=$day-5;
				$week['Tuesday']=$day-4;
				$week['Wednesday']=$day-3;
				$week['Thursday']=$day-2;
				$week['Friday']=$day-1;
				$week['Saturday']=$day;
				break;
		}

			//if($month==12){
				$dc = 1;
				foreach ($week as $wd => $d) {
					if($d > date("t",mktime(0,0,0,$month,$day,$year))){
						$week[$wd]=$dc;
						$dc++;
					}
				}
			//}else{
			/*	$dc = 1;
				foreach ($week as $wd => $d) {
					if($d > date("t",mktime(0,0,0,$month,$day,$year))){
						$week[$wd]=$dc;
						$dc++;
					}
				}*/
			//}
			

		return $week;
	}

	public function getWeek($day,$month,$year){
		
	}
	
}