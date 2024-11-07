<?php

namespace app\models;

use yii\db\ActiveRecord;

class Teacher extends ActiveRecord
{
    public static function tableName()
    {
        return 'teacher';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['started_at'], 'safe'],
        ];
    }

    public function getStudents()
    {
        return $this->hasMany(Student::class, ['mentor_teacher_id' => 'id']);
    }

    public function getCourses()
    {
        return $this->hasMany(Course::class, ['teacher_id' => 'id']);
    }
}
