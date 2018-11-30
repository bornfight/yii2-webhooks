<?php

use yii\db\Migration;

/**
 * Class m181011_101959_crate_table_webhook
 */
class m181011_101960_create_table_webhook_log extends Migration
{
    /**
     * @var string
     */
    private $tableName = '{{%webhook_log}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->bigPrimaryKey(),
            'log_time' => $this->integer(11),
            'webhook_event' => $this->string(),
            'webhook_method' => $this->string(10),
            'webhook_url' => $this->string(),
            'request_headers' => $this->text(),
            'request_payload' => $this->text(),
            'response_headers' => $this->text(),
            'response_status_code' => $this->integer(),
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
