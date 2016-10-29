<?php

use app\modules\common\components\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m161028_202258_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'social_id' => $this->integer()->notNull()->unique(),
            'username' => $this->string()->notNull(),
            'first_name' => $this->string()->defaultValue(null),
            'last_name' => $this->string()->defaultValue(null),
            'auth_key' => $this->string()->notNull()->unique(),
            'email' => $this->string()->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
