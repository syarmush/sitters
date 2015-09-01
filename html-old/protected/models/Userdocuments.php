<?php

/**
 * This is the model class for table "userdocuments".
 *
 * The followings are the available columns in table 'userdocuments':
 * @property integer $userid
 * @property integer $documenttypeid
 * @property string $expires
 * @property string $documentpath
 */
class Userdocuments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'userdocuments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, documenttypeid, documentpath', 'required'),
			array('userid, documenttypeid', 'numerical', 'integerOnly'=>true),
			array('documentpath', 'length', 'max'=>128),
			array('expires', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userid, documenttypeid, expires, documentpath', 'safe', 'on'=>'search'),
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
			'userid' => 'Userid',
			'documenttypeid' => 'Documenttypeid',
			'expires' => 'Expires',
			'documentpath' => 'Documentpath',
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

		$criteria->compare('userid',$this->userid);
		$criteria->compare('documenttypeid',$this->documenttypeid);
		$criteria->compare('expires',$this->expires,true);
		$criteria->compare('documentpath',$this->documentpath,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Userdocuments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
