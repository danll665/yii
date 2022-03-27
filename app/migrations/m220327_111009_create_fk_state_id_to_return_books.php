<?php

use yii\db\Migration;

/**
 * Class m220327_111009_create_fk_state_id_to_return_books
 */
class m220327_111009_create_fk_state_id_to_return_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_return_books_state_id',
            'return_books',
            'state_id',
            'book_states',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220327_111009_create_fk_state_id_to_return_books cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220327_111009_create_fk_state_id_to_return_books cannot be reverted.\n";

        return false;
    }
    */
}
