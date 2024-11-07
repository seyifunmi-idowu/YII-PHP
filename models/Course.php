<?php

namespace app\models;

use yii\db\ActiveRecord;

class Course extends ActiveRecord
{
    public static function tableName()
    {
        return 'course';
    }

    public function rules()
    {
        return [
            [['name', 'course_topic_id', 'teacher_id'], 'required'],
            [['course_topic_id', 'teacher_id'], 'integer'],
        ];
    }

    public function getTeacher()
    {
        return $this->hasOne(Teacher::class, ['id' => 'teacher_id']);
    }

    public function getCourseTopic()
    {
        return $this->hasOne(CourseTopic::class, ['id' => 'course_topic_id']);
    }

    public function getCourseEnrollments()
    {
        return $this->hasMany(CourseEnrollment::class, ['course_id' => 'id']);
    }

    public function getStudents()
    {
        return $this->hasMany(Student::class, ['id' => 'student_id'])
            ->via('courseEnrollments');
    }
}

