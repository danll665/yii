<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReturnBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="return-book-form">

    <?php $form = ActiveForm::begin(); ?>

    Book:<br>
    <?= Html::activeDropDownList($model, 'book_id',
        ArrayHelper::map($books, 'id', 'name'),
        ['class'=>'form-control','prompt' => 'Select book']
    )

    ?><br><br>

    Employee:<br>
    <?= Html::activeDropDownList($model, 'employee_id',
        ArrayHelper::map($employees, 'id', 'full_name'),
        ['class'=>'form-control','prompt' => 'Select employee']
    ) ?><br><br>

    Book state:<br>
    <?= Html::activeDropDownList($model, 'state_id',
        ArrayHelper::map($states, 'id', 'name'),
        ['class'=>'form-control','prompt' => 'Select state']
    ) ?><br><br>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
