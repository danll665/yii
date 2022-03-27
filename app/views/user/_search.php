<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\search\SearchUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <label> Books exists
        <select name="is_books_exists">
            <option selected disabled><?= ($queryParams['is_books_exists'] == 1) ? "True" : "False" ?></option>
            <option value="<?= ($queryParams['is_books_exists'] == 0) ? 1 : 0 ?>"><?= ($queryParams['is_books_exists'] == 0) ? "True" : "False" ?></option>
        </select>
    </label>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
