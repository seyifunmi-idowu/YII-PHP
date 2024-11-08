<?php

$this->title = 'Course Enrollments';
?>
<div class="course-enrollment-index">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>
    <p>
        <?= \yii\helpers\Html::a('Create Course Enrollment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'course_id',
                'value' => function($model) {
                    return $model->course->courseTopic->name . ' - ' . $model->course->teacher->name;
                },
                'label' => 'Course'
            ],
            [
                'attribute' => 'student_id',
                'value' => 'student.name',
                'label' => 'Student'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
