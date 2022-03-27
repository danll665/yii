<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LendingOutBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lending-out-book-form">

    <?php $form = ActiveForm::begin(); ?>

    book:<br>
    <?= Html::activeDropDownList($model, 'book_id',
        ArrayHelper::map($books, 'id', 'name'),
        ['class'=>'form-control','prompt' => 'Select book']
    )

    ?><br><br>

    employee:<br>
    <?= Html::activeDropDownList($model, 'employee_id',
        ArrayHelper::map($employees, 'id', 'full_name'),
        ['class'=>'form-control','prompt' => 'Select employee']
    ) ?><br><br>

    client:<br>
    <?= Html::activeDropDownList($model, 'client_id',
        ArrayHelper::map($clients, 'id', 'full_name'),
        ['class'=>'form-control','prompt' => 'Select client']
    ) ?><br><br>

    <?= $form->field($model, 'date_expiration')->textInput(['type' => 'datetime-local']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
