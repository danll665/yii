<?php

use yii\db\Migration;

/**
 * Class m220324_144638_create_table_users
 */
class m220324_144638_create_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}',[
            'id' => $this->bigPrimaryKey()->notNull(),
            'full_name' => $this->string()->notNull(),
            'position' => $this->string()->Null(),
            'passport' => $this->integer()->Null(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password' => $this->string()->notNull(),
            'role_id' => $this->bigInteger()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220324_144638_create_table_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220324_144638_create_table_users cannot be reverted.\n";

        return false;
    }
    */
}
