<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Редактирование профиля';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="row">
	<div class="col-md-8">
		<div class="user-update">
		    <p>Вы можете изменить эти поля</p>

		    <?php $form = ActiveForm::begin([
		        'id' => 'login-form',
		        'layout' => 'horizontal',
		        'fieldConfig' => [
		            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
		            'labelOptions' => ['class' => 'col-lg-1 control-label'],
		        ],
		    ]); ?>

		        <?= $form->field($user, 'name')->textInput(['autofocus' => true]) ?>

		        <?= $form->field($user, 'surname')->textInput() ?>

		        <?= $form->field($user, 'patronymic')->textInput() ?>
		 
		        <div class="form-group">
		            <div class="col-lg-offset-1 col-lg-11">
		                <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
		            </div>
		        </div>

		    <?php ActiveForm::end(); ?>
		</div>
		</div>
		<div class="col-md-4">
		    <div class="update-image-form">

		    <?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($user_image, 'image')->fileInput(['maxlength' => true]) ?>

		    <div class="form-group">
		        <?= Html::submitButton('Загрузить фото', ['class' => 'btn btn-success']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>

		</div>
	</div>
</div>

