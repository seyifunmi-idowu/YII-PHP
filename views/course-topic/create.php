<?php

$this->title = 'Create Course Topic';
?>
<div class="course-topic-create">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <div class="course-topic-form">
        <?php $form = \yii\widgets\ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>


