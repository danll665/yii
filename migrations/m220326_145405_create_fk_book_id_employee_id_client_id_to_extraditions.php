<?php

use yii\db\Migration;

/**
 * Class m220326_145405_create_fk_book_id_employee_id_client_id_to_extraditions
 */
class m220326_145405_create_fk_book_id_employee_id_client_id_to_extraditions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-extraditions-book_id',
            'extraditions',
            'book_id',
            'books',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-extraditions-employee_id',
            'extraditions',
            'employee_id',
            'users',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-extraditions-client_id',
            'extraditions',
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
