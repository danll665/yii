<?php

use yii\db\Migration;

/**
 * Class m220327_115741_add_is_active_to_books_table
 */
class m220327_115741_add_is_active_to_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('books', 'is_active', $this->boolean()->after('artikul')->defaultValue(true));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220327_115741_add_is_active_to_books_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220327_115741_add_is_active_to_books_table cannot be reverted.\n";

        return false;
    }
    */
}
