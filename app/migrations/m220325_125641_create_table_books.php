<?php

use yii\db\Migration;

/**
 * Class m220325_125641_create_table_books
 */
class m220325_125641_create_table_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->bigPrimaryKey()->notNull(),
            'name' => $this->string()->notNull(),
            'artikul' => $this->integer()->notNull(),
            'author' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220325_125641_create_table_books cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220325_125641_create_table_books cannot be reverted.\n";

        return false;
    }
    */
}
