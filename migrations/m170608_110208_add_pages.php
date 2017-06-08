<?php

use yii\db\Migration;

class m170608_110208_add_pages extends Migration
{
    public function safeUp()
    {
        $this->insert('content',array(
            'page'=>'About us',
            'url' =>'about',
            'category' =>'Company',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'Educational services',
            'url' =>'education',
            'category' =>'Company',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'Vision and Values',
            'url' =>'vision',
            'category' =>'Company',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'Our photos',
            'url' =>'gallery',
            'category' =>'Company',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'Our projects',
            'url' =>'projects',
            'category' =>'Company',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'Why best-php-developers.com',
            'url' =>'why',
            'category' =>'Company',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'Contact us',
            'url' =>'contact',
            'category' =>'Company',
            'body' =>'-edit-',
        ));


        $this->insert('content',array(
            'page'=>'PHP Consulting',
            'url' =>'consulting',
            'category' =>'Services',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'PHP Outsourcing',
            'url' =>'outsourcing',
            'category' =>'Services',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'PHP Services',
            'url' =>'services',
            'category' =>'Services',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'PHP Staffing',
            'url' =>'staffing',
            'category' =>'Services',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'PHP Training',
            'url' =>'training',
            'category' =>'Services',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'Prices',
            'url' =>'prices',
            'category' =>'Services',
            'body' =>'-edit-',
        ));


        $this->insert('content',array(
            'page'=>'Dedicated PHP Team',
            'url' =>'team',
            'category' =>'Developers',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'Hire PHP Developers',
            'url' =>'hire',
            'category' =>'Developers',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'PHP Coders',
            'url' =>'coders',
            'category' =>'Developers',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'PHP development',
            'url' =>'development',
            'category' =>'Developers',
            'body' =>'-edit-',
        ));
        $this->insert('content',array(
            'page'=>'PHP Programming',
            'url' =>'programming',
            'category' =>'Developers',
            'body' =>'-edit-',
        ));
    }

    public function safeDown()
    {
        echo "m170608_110208_add_pages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170608_110208_add_pages cannot be reverted.\n";

        return false;
    }
    */
}
