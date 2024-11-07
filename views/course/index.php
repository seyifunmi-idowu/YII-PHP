<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Courses';
?>
<div class="course-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'name',
                'value' => 'name',
                'label' => 'Course Name'
            ],
            [
                'attribute' => 'course_topic_id',
                'value' => 'courseTopic.name',
                'label' => 'Course Topic'
            ],
            [
                'attribute' => 'teacher_id',
                'value' => 'teacher.name',
                'label' => 'Teacher'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
