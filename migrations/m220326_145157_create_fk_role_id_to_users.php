<?php

use yii\db\Migration;

/**
 * Class m220326_145157_create_fk_role_id_to_users
 */
class m220326_145157_create_fk_role_id_to_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-users-role_id',
            'users',
            'role_id',
            'roles',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220326_145157_create_fk_role_id_to_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220326_145157_create_fk_role_id_to_users cannot be reverted.\n";

        return false;
    }
    */
}
