<?php

use yii\db\Migration;

/**
 * Class m220326_091952_create_table_return_books
 */
class m220326_091952_create_table_return_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%return_books}}',[
            'id' => $this->bigPrimaryKey()->notNull(),
            'book_id' => $this->bigInteger()->notNull(),
            'employee_id' => $this->bigInteger()->notNull(),
            'client_id' => $this->bigInteger()->notNull(),
            'state_id' => $this->integer(),
            'return_date' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220326_091952_create_table_return cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220326_091952_create_table_return cannot be reverted.\n";

        return false;
    }
    */
}
