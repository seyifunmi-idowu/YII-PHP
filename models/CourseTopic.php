<?php

namespace app\models;

use yii\db\ActiveRecord;

class CourseTopic extends ActiveRecord
{
    public static function tableName()
    {
        return 'course_topic';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    public function getCourses()
    {
        return $this->hasMany(Course::class, ['course_topic_id' => 'id']);
    }
}