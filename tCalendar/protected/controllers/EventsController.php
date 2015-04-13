<?php

class EventsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','confirmDelete','create','editRequest','update'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(''),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','accept','decline'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
    {
 
        /*if (@$_GET['asModal']==true)
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
        }*/
		$this->renderPartial('view',
                array('model'=>$this->loadModel($id))
            );
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Events;
		
 
      /*  if (@$_GET['asModal']==true)
        {
            $this->renderPartial('create',
                array('model'=>$this->loadModel($id)),false,true
            );
        }
        else{
            $this->layout = 'column2';
            $this->render('create',array(
                'model'=>$this->loadModel($id),
            ));
        }*/
   
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
			$model->DateCreated = date_create()->format('Y-m-d H:i:s');
			$model->status = 2;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		//echo "Events/create"; die();
		$this->renderPartial('create',
                array('model'=>$model)
            );
	//	$this->render('create',array(
//			'model'=>$model,
//		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->renderPartial('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Events');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Events('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Events']))
			$model->attributes=$_GET['Events'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Events the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Events::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Events $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionConfirmDelete($id){
		$model = Events::model()->findByPk($id);
		$model1 = new Events;
		if(isset($_POST['Events'])){
			$model1->attributes = $_POST['Events'];
			if($model1->email == $model->email && $model1->mobile == $model->mobile){
				Events::model()->deleteByPk($id);
				$this->redirect(array('site/index'));
			}
		}
		$this->render('confirm', array('model'=>$model1));
	}

	public function actionEditRequest($id){
		$model = Events::model()->findByPk($id);
		$model1 = new Events;
		if(isset($_POST['Events'])){
			$model1->attributes = $_POST['Events'];
			if($model1->email == $model->email && $model1->mobile == $model->mobile){
				//Events::model()->deleteByPk($id);
				//$this->redirect(array('events/update', 'id'=>$id));
				echo $id;
				//die();
			}else{
				echo "Error";
			}
		}
		$this->renderPartial('_form2', array('model'=>$model1,'model2' => $model));
	}

	public function actionAccept($id){
		$model = Events::model()->findByPk($id);
		$model->status = 3;

		$email = Yii::app()->email;
		$email->to = $model->email;
		$email->subject = 'Reservation';
		$email->message = 'Your reserv is accepted';
		$email->send();
		if($model->update()){
			$this->redirect(array("admin"));
		}	
		
	}

	public function actionDecline($id){
		Events::model()->deleteByPk($id);
		$email = Yii::app()->email;
		$email->to = Events::model()->findByPk($id)->email;
		$email->subject = 'Reservation';
		$email->message = 'Your reserv is declined';
		$email->send();
		$this->redirect(array("admin"));
	}

}
