<?php

use yii\db\Migration;

/**
 * Class m220326_091952_create_table_return
 */
class m220326_091952_create_table_return extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%return_books}}',[
            'id' => $this->bigPrimaryKey()->notNull(),
            'return_date' => $this->time(),
            'book_condition' => $this->string(),
            'book_id' => $this->bigInteger()->notNull(),
            'employee_id' => $this->bigInteger()->notNull(),
            'client_id' => $this->bigInteger()->notNull()
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
