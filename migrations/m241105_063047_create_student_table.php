<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m241105_063047_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'mentor_teacher_id' => $this->integer()->notNull(),
            'enrolled_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        
        $this->createIndex(
            'idx-student-mentor_teacher_id',
            'student',
            'mentor_teacher_id'
        );    
        $this->addForeignKey(
            'fk-student-mentor_teacher_id',
            'student',
            'mentor_teacher_id',
            'teacher',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-student-mentor_teacher_id', 'student');
        $this->dropTable('student');
    }
}
