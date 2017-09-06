<?php

class Photo extends CActiveRecord
{
    public $imageFile;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'photo_tbl';
    }

    public function rules()
    {
        return [
            ['imageFile', 'file', 'types'=> 'jpg, jpeg, tiff, png',
                'message'=> 'Sorry, you should ue aonly allowed file types: jpg, jpeg, tiff or png']
        ];
    }

    public function relations()
    {
        return array(
            'imageFile' => array(self::BELONGS_TO, 'DImage', 'photo_user_tbl', 'id_photo'),
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