<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LendingOutBook */

$this->title = 'Update Lending Out Book: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lending Out Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lending-out-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'books' => $books,
        'clients' => $clients,
        'employees' => $employees
    ]) ?>

</div>
