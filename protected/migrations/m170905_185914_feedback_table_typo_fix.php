<?php

class m170905_185914_feedback_table_typo_fix extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('feedbacks');
        if ($tableSchema !== null) {
            $this->renameColumn('feedbacks', 'teacher_summery', 'teacher_summary');
            $this->renameColumn('feedbacks', 'expert_summery', 'expert_summary');
            $this->renameColumn('feedbacks', 'interviewer_summery', 'interviewer_summary');
        }
    }

    public function safeDown()
    {
        $tableSchema = Yii::app()->db->schema->getTable('feedbacks');
        if ($tableSchema !== null) {
            $this->renameColumn('feedbacks', 'teacher_summary', 'teacher_summery');
            $this->renameColumn('feedbacks', 'expert_summary', 'expert_summery');
            $this->renameColumn('feedbacks', 'interviewer_summary', 'interviewer_summery');
        }
    }
}
