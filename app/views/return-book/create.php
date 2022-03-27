<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReturnBook */

$this->title = 'Create Return Book';
$this->params['breadcrumbs'][] = ['label' => 'Return Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="return-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'books' => $books,
        'states' => $states,
        'employees' => $employees
    ]) ?>

</div>
