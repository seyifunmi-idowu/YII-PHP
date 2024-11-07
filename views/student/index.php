<?php

$this->title = 'Students';
?>
<div class="student-index">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>
    <p>
        <?= \yii\helpers\Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'mentor_teacher_id',
                'value' => 'mentorTeacher.name',
                'label' => 'Mentor Teacher'
            ],
            'enrolled_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
