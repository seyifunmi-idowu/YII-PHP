<?php

$this->title = $model->name;
?>
<div class="teacher-view">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p>
        <?= \yii\helpers\Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'started_at:datetime',
        ],
    ]) ?>

    <h2>Mentored Students</h2>
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
