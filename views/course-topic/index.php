<?php

$this->title = 'Course Topics';
?>
<div class="course-topic-index">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>
    <p>
        <?= \yii\helpers\Html::a('Create Course Topic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
