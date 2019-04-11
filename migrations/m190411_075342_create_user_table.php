<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190411_075342_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'user_id' => $this->primaryKey(),
            'name'=>$this->string(),
            'surname'=>$this->string()->defaultValue(null),
            'patronymic'=>$this->string()->defaultValue(null),
            'email'=>$this->string(),
            'password'=>$this->string(),
            'photo'=>$this->string()->defaultValue(null)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
