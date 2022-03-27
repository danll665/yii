<?php

use yii\db\Migration;

/**
 * Class m220323_143021_create_table_roles
 */
class m220323_143021_create_table_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%roles}}',[
            'id' => $this->bigPrimaryKey()->notNull(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220323_143021_create_table_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220323_143021_create_table_roles cannot be reverted.\n";

        return false;
    }
    */
}
