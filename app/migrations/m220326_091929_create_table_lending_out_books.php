<?php

use yii\db\Migration;

/**
 * Class m220326_091929_create_table_lending_out_books
 */
class m220326_091929_create_table_lending_out_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lending_out_books}}',[
            'id' => $this->bigPrimaryKey()->notNull(),
            'book_id' => $this->bigInteger()->notNull(),
            'employee_id' => $this->bigInteger()->notNull(),
            'client_id' => $this->bigInteger()->notNull(),
            'date_of_issue' => $this->timestamp()->notNull(),
            'date_expiration' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220326_091929_create_table_lendingoutbooks cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220326_091929_create_table_lendingoutbooks cannot be reverted.\n";

        return false;
    }
    */
}
