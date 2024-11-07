<?php

namespace app\models;

use yii\db\ActiveRecord;

class CourseEnrollment extends ActiveRecord
{
    public static function tableName()
    {
        return 'course_enrollment';
    }

    public function rules()
    {
        return [
            [['course_id', 'student_id'], 'required'],
            [['course_id', 'student_id'], 'integer'],
        ];
    }

    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }
}
