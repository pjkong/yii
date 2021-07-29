<?php

/**
 * This is the model class for table "tbl_document".
 *
 * The followings are the available columns in table 'tbl_document':
 * @property integer $ID
 * @property string $Number
 * @property integer $DocumentTypeID
 * @property string $Title
 * @property integer $StatusID
 * @property string $RevisionReference
 * @property string $Details
 * @property string $DateCreated
 * @property string $ReviewDate
 *
 * The followings are the available model relations:
 * @property TblDocumentstatus $status
 * @property TblDocumenttype $documentType
 */
class Document extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DocumentTypeID, StatusID', 'numerical', 'integerOnly'=>true),
			array('Number, Title, RevisionReference, Details', 'length', 'max'=>200),
			array('DateCreated, ReviewDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, Number, DocumentTypeID, Title, StatusID, RevisionReference, Details, DateCreated, ReviewDate', 'safe', 'on'=>'search'),
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
			'status' => array(self::BELONGS_TO, 'TblDocumentstatus', 'StatusID'),
			'documentType' => array(self::BELONGS_TO, 'TblDocumenttype', 'DocumentTypeID'),
			'createdBy'=> array(self::BELONGS_TO, 'tbl_user', 'id'),// get created by user id 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Number' => 'Number',
			'DocumentTypeID' => 'Document Type',
			'Title' => 'Title',
			'StatusID' => 'Status',
			'RevisionReference' => 'Revision Reference',
			'Details' => 'Details',
			'DateCreated' => 'Date Created',
			'ReviewDate' => 'Review Date',
			'createdBy'=> 'Document Owner',

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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('Number',$this->Number,true);
		$criteria->compare('DocumentTypeID',$this->DocumentTypeID);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('StatusID',$this->StatusID);
		$criteria->compare('RevisionReference',$this->RevisionReference,true);
		$criteria->compare('Details',$this->Details,true);
		$criteria->compare('DateCreated',$this->DateCreated,true);
		$criteria->compare('ReviewDate',$this->ReviewDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Document the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getDocumentTypeOptions(){
		return array('1' => 'Pdf', '2' => 'JPG','3'=>'CSV');
	}

	public function getDocumentStatusOptions(){
		return array('1' => 'Pending', '2' => 'Review');
	}
}
