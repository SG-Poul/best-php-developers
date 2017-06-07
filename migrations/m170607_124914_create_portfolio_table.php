<?php

use yii\db\Migration;

/**
 * Handles the creation of table `portfolio`.
 */
class m170607_124914_create_portfolio_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('portfolio', [
            'id' => $this->primaryKey(),
            'body' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('portfolio');
    }
}
