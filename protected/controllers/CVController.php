<?php

class CVController extends BaseController
{
    public function actionCreate()
    {
        $model = new CV();
        $model->atributes = $_POST['CVFile'];
        $model->CVFile = UploadedFile::getInstance($model,'CVFile');

        if ($model->validate())
        {
            $model->save();
        }

        $this->renderJson(["success" => true]);
    }
}