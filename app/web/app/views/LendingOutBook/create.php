<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LendingOutBook */

$this->title = 'Create Lending Out Book';
$this->params['breadcrumbs'][] = ['label' => 'Lending Out Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lending-out-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
