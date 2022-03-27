<?php

use app\models\ReturnBook;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\search\SearchReturnBook */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Return Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="return-book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Return Book', ['create'], ['class' => 'btn btn-success']) ?>
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
            'state_id',
            //'return_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ReturnBook $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
