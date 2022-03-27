<?php

use yii\db\Migration;

/**
 * Class m220326_145520_create_fk_book_id_employee_id_client_id_to_return_books
 */
class m220326_145520_create_fk_book_id_employee_id_client_id_to_return_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_return_books_book_id',
            'return_books',
            'book_id',
            'books',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_return_books_employee_id',
            'return_books',
            'employee_id',
            'users',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-return_books_client_id',
            'return_books',
            'client_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220326_145520_create_fk_book_id_employee_id_client_id_to_return_books cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220326_145520_create_fk_book_id_employee_id_client_id_to_return_books cannot be reverted.\n";

        return false;
    }
    */
}
