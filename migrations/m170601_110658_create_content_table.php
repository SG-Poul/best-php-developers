<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content`.
 */
class m170601_110658_create_content_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('content', [
            'id' => $this->primaryKey(),
            'page' => $this->string()->notNull()->unique(),
            'url' => $this->string()->notNull()->unique(),
            'category' => $this->string(),
            'body' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('content');
    }
}
