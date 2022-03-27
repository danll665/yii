<?php

namespace app\controllers;

use app\models\Book;
use app\models\BookState;
use app\models\LendingOutBook;
use app\models\ReturnBook;
use app\models\Role;
use app\models\User;
use app\search\SearchReturnBook;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReturnBookController implements the CRUD actions for ReturnBook model.
 */
class ReturnBookController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ReturnBook models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchReturnBook();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReturnBook model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ReturnBook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ReturnBook();

        // Данные для формы
        $books = Book::find()->where(['is_active' => false])->all();
        $employees = User::find()->where(['role_id' => Role::EMPLOYEE])->asArray()->all();
        $states = BookState::find()->asArray()->all();

        if ($this->request->isPost) {
            if($this->request->post()){
                $params = $this->request->post()["ReturnBook"];

                // удаляем к книгу у пользователя
                $lending_out_book = LendingOutBook::find()->where(['book_id' => $params['book_id']])->one();
                if ($lending_out_book){
                    $params = array_merge($params, ['client_id' => $lending_out_book['client_id']]);
                    $lending_out_book->delete();
                } else {
                    $model->loadDefaultValues();
                }

                // делаем книгу активной для выдачи
                $book = Book::findOne($params['book_id']);
                $book->is_active = true;
                $book->save();

                // сохраняем в таблицу данные о возврате
                $model->book_id = $params['book_id'];
                $model->client_id = $params['client_id'];
                $model->employee_id = $params['employee_id'];
                $model->state_id = $params['state_id'];

                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    echo "<pre>";
                    var_dump($model->errors);
                    echo "</pre>";
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'books' => $books,
            'states' => $states,
            'employees' => $employees
        ]);
    }

    /**
     * Updates an existing ReturnBook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $books = Book::find()->where(['is_active' => false])->all();
        $employees = User::find()->where(['role_id' => Role::EMPLOYEE])->asArray()->all();
        $states = BookState::find()->asArray()->all();
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'books' => $books,
            'states' => $states,
            'employees' => $employees
        ]);
    }

    /**
     * Deletes an existing ReturnBook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ReturnBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ReturnBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReturnBook::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
