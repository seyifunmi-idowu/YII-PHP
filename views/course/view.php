<?php

$this->title = $model->courseTopic->name;
?>
<div class="course-view">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p>
        <?= \yii\helpers\Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this course?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= \yii\widgets\DetailView::widget([ 
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'name',
                'value' => $model->name,
            ],
            [
                'attribute' => 'course_topic_id',
                'value' => $model->courseTopic->name,
            ],
            [
                'attribute' => 'teacher_id',
                'value' => $model->teacher->name,
            ],
        ],
    ]) ?>

    <h2>Enrolled Students</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getStudents(),
        ]),
        'columns' => [
            'id',
            'name',
            'enrolled_at:datetime',
        ],
    ]); ?>
</div>
