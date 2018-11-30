<?php

use yii\db\Migration;

/**
 * Class m181011_101959_crate_table_webhook
 */
class m181011_101959_create_table_webhook extends Migration
{
    /**
     * @var string
     */
    private $tableName = '{{%webhook}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'event' => $this->string(255)->notNull(),
            'description' => $this->text()->null(),
            'url' => $this->string(2083)->notNull(),
            'method' => $this->string(6)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
