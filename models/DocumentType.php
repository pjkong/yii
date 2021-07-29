<?php

/**
 * This is the model class for table "tbl_documenttype".
 *
 * The followings are the available columns in table 'tbl_documenttype':
 * @property integer $ID
 * @property string $Name
 * @property integer $ParentID
 * @property string $DateCreated
 *
 * The followings are the available model relations:
 * @property TblDocument[] $tblDocuments
 * @property DocumentType $parent
 * @property DocumentType[] $tblDocumenttypes
 */
class DocumentType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_documenttype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ParentID', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>200),
			array('DateCreated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, Name, ParentID, DateCreated', 'safe', 'on'=>'search'),
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
			'tblDocuments' => array(self::HAS_MANY, 'TblDocument', 'DocumentTypeID'),
			'parent' => array(self::BELONGS_TO, 'DocumentType', 'ParentID'),
			'tblDocumenttypes' => array(self::HAS_MANY, 'DocumentType', 'ParentID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Name' => 'Name',
			'ParentID' => 'Parent',
			'DateCreated' => 'Date Created',
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
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('ParentID',$this->ParentID);
		$criteria->compare('DateCreated',$this->DateCreated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DocumentType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
