<?php

$this->title = 'Create Student';
?>
<div class="student-create">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <div class="student-form">
        <?php $form = \yii\widgets\ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mentor_teacher_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\Teacher::find()->all(), 'id', 'name'),
            ['prompt' => 'Select Mentor Teacher']
        ) ?>
        
        <div class="form-group">
            <?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>

