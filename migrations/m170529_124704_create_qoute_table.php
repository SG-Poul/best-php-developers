<?php

use yii\db\Migration;

/**
 * Handles the creation of table `qoute`.
 */
class m170529_124704_create_qoute_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('qoute', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'email' => $this->string(),
            'skype' => $this->string(),
            'phone' => $this->string(),
            'body' => $this->text(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('qoute');
    }
}
