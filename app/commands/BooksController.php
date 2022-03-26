<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Book;
use yii\console\Controller;
use yii\console\ExitCode;

class BooksController extends Controller
{
    public function actionTest(){
        $book = new Book();
        $book->name='dsa';
        $book->author='gandon';
        $book->artikul=123;
        $book->receipt_date=date("Ymd");
        $book->save();
    }
}
