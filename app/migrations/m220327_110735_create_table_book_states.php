<?php

use yii\db\Migration;

/**
 * Class m220327_110735_create_table_book_states
 */
class m220327_110735_create_table_book_states extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_states}}',[
            'id' => $this->bigPrimaryKey()->notNull(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220327_110735_create_table_book_states cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220327_110735_create_table_book_states cannot be reverted.\n";

        return false;
    }
    */
}
