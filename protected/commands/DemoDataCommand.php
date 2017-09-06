<?php

class DemoDataCommand extends CConsoleCommand
{
    public function actionFillOutAllTables()
    {
        $this->actionFillOutTableLocations();
        $this->actionFillOutTableUsers();
        $this->actionFillOutTableDirections();
        $this->actionFillOutTableGroups();
        $this->actionFillOutTableUserGroups();
        $this->actionFillOutTableUserRoles();
        $this->actionFillOutTableExperts();
        $this->actionFillOutTableStudents();
    }

    private function getDemoData($tableName)
    {
        $filePath = Yii::app()->basePath . "/data/demo/{$tableName}.php";
        if (!file_exists($filePath)) {
            throw new RuntimeException("File {$filePath} does not exist!");
        }
        return require_once $filePath;
    }

    private function fillOutTable($tableName)
    {
        $demoData = $this->getDemoData($tableName);
        $command = Yii::app()->db->createCommand();
        foreach ($demoData as $columnsArr) {
            $command->insert($tableName, $columnsArr);
        }
    }

    public function actionFillOutTableLocations()
    {
        $this->fillOutTable('locations');
    }

    public function actionFillOutTableUsers()
    {
        $this->fillOutTable('users');
    }

    public function actionFillOutTableDirections()
    {
        $this->fillOutTable('directions');
    }

    public function actionFillOutTableGroups()
    {
        $this->fillOutTable('groups');
    }

    public function actionFillOutTableUserGroups()
    {
        $this->fillOutTable('user_groups');
    }

    public function actionFillOutTableUserRoles()
    {
        $this->fillOutTable('user_roles');
    }

    public function actionFillOutTableExperts()
    {
        $this->fillOutTable('experts');
    }

    public function actionFillOutTableStudents()
    {
        $this->fillOutTable('students');
    }
}
