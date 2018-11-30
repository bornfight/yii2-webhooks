<?php
/**
 * Created by PhpStorm.
 * User: rudolfjurisic
 * Date: 2018-11-28
 * Time: 10:55
 */

namespace degordian\webhooks\models;

use Yii;

/**
 * This is the model class for table "webhook_log".
 *
 * @property int $id
 * @property int $log_time
 * @property string $webhook_event
 * @property string $webhook_method
 * @property string $webhook_url
 * @property string $request_headers
 * @property string $request_payload
 * @property string $response_headers
 * @property int $response_status_code
 */
class WebhookLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webhook_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['log_time', 'response_status_code'], 'integer'],
            [['request_headers', 'request_payload', 'response_headers'], 'string'],
            [['webhook_event', 'webhook_url'], 'string', 'max' => 255],
            [['webhook_method'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'log_time' => 'Log Time',
            'webhook_event' => 'Webhook Event',
            'webhook_method' => 'Webhook Method',
            'webhook_url' => 'Webhook Url',
            'request_headers' => 'Request Headers',
            'request_payload' => 'Request Payload',
            'response_headers' => 'Response Headers',
            'response_status_code' => 'Response Status Code',
        ];
    }
}
