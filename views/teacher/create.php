<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Teacher';
?>
<div class="teacher-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="teacher-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
