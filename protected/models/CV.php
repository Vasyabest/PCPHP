<?php

class CV extends CActiveRecord
{
    public $CVFile;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'cv_tbl';
    }

    public function rules()
    {
        return [
            ['CVFile', 'file', 'types'=> 'doc, docx, pdf, rtf',
                 'message'=> 'Sorry, you should ue aonly allowed file types: doc, docx, pdf or rtf']
        ];
    }

    public function relations()
    {
	return array(
		'CVFile' => array(self::BELONGS_TO, 'cv_user_tbl', 'id_cv'),
	);
    }

    public function beforeSave()
	{
		foreach ($this->attributes as $key => $attribute) 
			if ($attribute instanceof CUploadedFile)
			{
				$strSource = uniqid();
				if ($attribute->saveAs(Yii::getPathOfAlias('application.data.files') . '/' .  $strSource))
					$this->$key = $strSource;
			}
		return parent::beforeSave();
	}
	
}