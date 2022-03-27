<?php

use yii\db\Migration;

/**
 * Class m220326_145405_create_fk_book_id_employee_id_client_id_to_lending_out_books
 */
class m220326_145405_create_fk_book_id_employee_id_client_id_to_lending_out_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_lending_out_books_book_id',
            'lending_out_books',
            'book_id',
            'books',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_lending_out_books_employee_id',
            'lending_out_books',
            'employee_id',
            'users',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_lending_out_books_client_id',
            'lending_out_books',
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
        echo "m220326_145405_create_fk_book_id_employee_id_client_id_to_extraditions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220326_145405_create_fk_book_id_employee_id_client_id_to_extraditions cannot be reverted.\n";

        return false;
    }
    */
}
