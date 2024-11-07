<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Course';
?>
<div class="course-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="course-form">
        <?php $form = ActiveForm::begin(); ?> 

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'course_topic_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\CourseTopic::find()->all(), 'id', 'name'),
            ['prompt' => 'Select Course Topic']
        ) ?>

        <?= $form->field($model, 'teacher_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\Teacher::find()->all(), 'id', 'name'),
            ['prompt' => 'Select Teacher']
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
