<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $id
 * @property string $name
 * @property integer $fieldtype
 * @property string $date
 * @property string $starttime
 * @property string $endtime
 * @property string $email
 * @property integer $mobile
 * @property integer $status
 * @property string $DateCreated
 * @property string $LastUpdate
 */
class Events extends CActiveRecord implements AjaxResponseInterface
{
	/**
	 * @return string the associated database table name
	 */
	public $name;
    public $fieldtype;
    public $date;
    public $starttime;
    public $endtime;
    public $mobile;
    public $email;
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('fieldtype, mobile, status', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>255),
			array('date, starttime, endtime, DateCreated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, fieldtype, date, starttime, endtime, email, mobile, status, DateCreated, LastUpdate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'fieldtype' => 'Fieldtype',
			'date' => 'Date',
			'starttime' => 'Starttime',
			'endtime' => 'Endtime',
			'email' => 'Email',
			'mobile' => 'Mobile',
			'status' => 'Status',
			'DateCreated' => 'Date Created',
			'LastUpdate' => 'Last Update',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fieldtype',$this->fieldtype);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('starttime',$this->starttime,true);
		$criteria->compare('endtime',$this->endtime,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mobile',$this->mobile);
		$criteria->compare('status',$this->status);
		$criteria->compare('DateCreated',$this->DateCreated,true);
		$criteria->compare('LastUpdate',$this->LastUpdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave() {
	   if(parent::beforeSave()) {
	       $this->date = date('Y-m-d', strtotime($this->date));//strtotime($this->date_start);
	       return true;
	   } else {
	       return false;
	   }
	}


	protected function afterFind() {
	   $date = date('d.m.Y', strtotime($this->date));
	   $this->date = $date;
	   parent::afterFind();
	}
	public function getResponseData()
	{
		return $this ->getAttributes();
	}
}
