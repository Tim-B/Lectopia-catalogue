<?php

/**

 * @property integer $id
 * @property integer $lecture_id
 * @property string $description
 * @property string $code
 * @property integer $count

 */



class Lectures extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lecture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id, lecture_id, description, code, count', 'safe', 'on'=>'crawl'),
			array('code, description', 'safe', 'on'=>'search'),
		);
	}
	
	public function byLecID($id)
	{
		return Lectures::model()->findByAttributes(array('lecture_id' => $id));
	}
	
	public function attributeLabels()
	{
		return array(
			'code' => 'Course Code',
			'description' => 'Course Description',
			'count' => 'Video Count',
			'lecture_id' => 'Go to'
		);
	}
	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('description',$this->description,true);

		$criteria->compare('code',$this->code, true);

		return new CActiveDataProvider('Lectures', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'lecture_id ASC',
			),
			'pagination' => array('pageSize' => 20)
		));
	}

}