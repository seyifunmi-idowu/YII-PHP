<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_enrollment}}`.
 */
class m241105_063434_create_course_enrollment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('course_enrollment', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'student_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-course_enrollment-course_id',
            'course_enrollment',
            'course_id',
            'course',
            'id'
        );

        $this->addForeignKey(
            'fk-course_enrollment-student_id',
            'course_enrollment',
            'student_id',
            'student',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-course_enrollment-student_id', 'course_enrollment');
        $this->dropForeignKey('fk-course_enrollment-course_id', 'course_enrollment');
        $this->dropTable('course_enrollment');
    }
}
