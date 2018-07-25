<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "tracing".
 *
 * @property int $id
 * @property string $created_at
 * @property string $message
 * @property int $ticket_id
 * @property int $created_by
 *
 * @property Ticket $ticket
 * @property User $createdBy
 */
class Tracing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tracing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'message', 'ticket_id', 'created_by'], 'required'],
            [['created_at'], 'safe'],
            [['message'], 'string'],
            [['ticket_id', 'created_by'], 'integer'],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ticket::className(), 'targetAttribute' => ['ticket_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Fecha',
            'message' => 'Mensaje',
            'ticket_id' => 'Ticket ID',
            'created_by' => 'De',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Ticket::className(), ['id' => 'ticket_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getShortmessage()
    {
        return substr($this->message, 0, 40) . '... ';
    }
}
