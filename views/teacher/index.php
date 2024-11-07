<?php
$this->title = 'Teachers';
?>
<div class="teacher-index">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>
    <p>
        <?= \yii\helpers\Html::a('Create Teacher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'started_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
