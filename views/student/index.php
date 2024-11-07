<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Students';
?>
<div class="student-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
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
