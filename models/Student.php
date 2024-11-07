<?php

namespace app\models;

use yii\db\ActiveRecord;

class Student extends ActiveRecord
{
    public static function tableName()
    {
        return 'student';
    }

    public function rules()
    {
        return [
            [['name', 'mentor_teacher_id'], 'required'],
            [['mentor_teacher_id'], 'integer'],
            [['enrolled_at'], 'safe'],
            
        ];
    }

    public function getMentorTeacher()
    {
        return $this->hasOne(Teacher::class, ['id' => 'mentor_teacher_id']);
    }

    public function getCourseEnrollments()
    {
        return $this->hasMany(CourseEnrollment::class, ['student_id' => 'id']);
    }

    public function getCourses()
    {
        return $this->hasMany(Course::class, ['id' => 'course_id'])
            ->via('courseEnrollments');
    }
}
