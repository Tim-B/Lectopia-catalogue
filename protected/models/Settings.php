<?php

/**

 * @property integer $id
 * @property string $key
 * @property string $value

 */



class Settings extends CActiveRecord
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
		return 'data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id, key, value', 'safe'),
		);
	}
	
	public function saveSetting($setting, $value){
		$record = Settings::model()->findByAttributes(array('key' => $setting));
		$record->value = $value;
		$record->save();
	}

}