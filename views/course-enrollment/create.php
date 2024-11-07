<?php

$this->title = 'Create Course Enrollment';
?>
<div class="course-enrollment-create">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <div class="course-enrollment-form">
        <?php $form = \yii\widgets\ActiveForm::begin(); ?>

        <!-- Dropdown for Course -->
        <?= $form->field($model, 'course_id')->dropDownList(
            $courses, 
            ['prompt' => 'Select Course']
        ) ?>

        <!-- Dropdown for Student -->
        <?= $form->field($model, 'student_id')->dropDownList(
            $students, 
            ['prompt' => 'Select Student']
        ) ?>

        <div class="form-group">
            <?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>
