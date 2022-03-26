<?php

use yii\db\Migration;

/**
 * Class m220326_091929_create_table_extradition
 */
class m220326_091929_create_table_extradition extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%extraditions}}',[
            'id' => $this->bigPrimaryKey()->notNull(),
            'date_of_issuance' => $this->timestamp(),
            'period' => $this->string()->notNull(),
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
        echo "m220326_091929_create_table_extradition cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220326_091929_create_table_extradition cannot be reverted.\n";

        return false;
    }
    */
}
