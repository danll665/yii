<?php

namespace app\controllers;

use app\models\Book;
use app\models\LendingOutBook;
use app\models\Role;
use app\models\User;
use app\search\SearchLendingOutBook;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LendingOutBookController implements the CRUD actions for LendingOutBook model.
 */
class LendingOutBookController extends Controller
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
     * Lists all LendingOutBook models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchLendingOutBook();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LendingOutBook model.
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
     * Creates a new LendingOutBook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LendingOutBook();

        $books = Book::find()->where(['is_active' => true])->all();
        $employees = User::find()->where(['role_id' => Role::EMPLOYEE])->asArray()->all();
        $clients = User::find()->where(['role_id' => Role::CLIENT])->asArray()->all();

        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->save()) {
                $book = Book::findOne($this->request->post()["LendingOutBook"]['book_id']);
                $book->is_active = false;
                $book->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else {
                echo "<pre>";
                var_dump($model->errors);
                echo "</pre>";
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'books' => $books,
            'clients' => $clients,
            'employees' => $employees
        ]);
    }

    /**
     * Updates an existing LendingOutBook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $books = Book::find()->where(['is_active' => true])->all();
        $employees = User::find()->where(['role_id' => Role::EMPLOYEE])->asArray()->all();
        $clients = User::find()->where(['role_id' => Role::CLIENT])->asArray()->all();
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'books' => $books,
            'clients' => $clients,
            'employees' => $employees
        ]);
    }

    /**
     * Deletes an existing LendingOutBook model.
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
     * Finds the LendingOutBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LendingOutBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LendingOutBook::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
