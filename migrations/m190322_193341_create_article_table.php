<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m190322_185526_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'article_id' => $this->primaryKey(),
            'article_name'=>$this->string(),
            'description'=>$this->text(),
            'content'=>$this->text(),
            'date'=>$this->date(),
            'image'=>$this->string(),
            'user_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}