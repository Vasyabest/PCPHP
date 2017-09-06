<?php

class PhotoController extends BaseController
{
    public function actionCreate()
    {
        $model = new Photo();
        $model->atributes = $_POST['imageFile'];
        $model->imageFile = UploadedFile::getInstance($model,'CVFile');
 
        if ($model->validate())
        {
            $model->save();
        }

        $this->renderJson(["success" => true]);
    }
}