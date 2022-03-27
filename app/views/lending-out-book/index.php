<?php

use app\models\LendingOutBook;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\search\SeachLendingOutBook */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lending Out Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lending-out-book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lending Out Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'book_id',
            'employee_id',
            'client_id',
            'date_of_issue',
            //'date_expiration',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LendingOutBook $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
