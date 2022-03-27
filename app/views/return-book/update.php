<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReturnBook */

$this->title = 'Update Return Book: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Return Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="return-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'books' => $books,
        'states' => $states,
        'employees' => $employees
    ]) ?>

</div>
