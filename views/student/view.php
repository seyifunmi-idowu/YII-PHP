<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

$this->title = $model->name;
?>
<div class="student-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this student?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'mentor_teacher_id',
                'value' => $model->mentorTeacher->name,
                'label' => 'Mentor Teacher'
            ],
            'enrolled_at:datetime',
        ],
    ]) ?>

    <h2>Enrolled Courses</h2>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getCourses(),
        ]),
        'columns' => [
            'id',
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
        ],
    ]); ?>
</div>

