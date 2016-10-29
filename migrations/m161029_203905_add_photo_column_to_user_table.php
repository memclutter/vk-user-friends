<?php

use app\modules\common\components\db\Migration;

/**
 * Handles adding photo to table `{{%user}}`.
 */
class m161029_203905_add_photo_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'photo', $this->string()->defaultValue(null));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'photo');
    }
}
