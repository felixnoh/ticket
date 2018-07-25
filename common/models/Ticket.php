<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "ticket".
 *
* @property int $id
 * @property int $folio
 * @property string $subject
 * @property string $created_at
 * @property int $state
 * @property string $priority
 * @property string $description
 * @property string $expiration
 * @property string $attached
 * @property int $user_id
 * @property int $created_by
 * @property string $image_src_filename
 * @property string $image_web_filename
 *
 * @property User $createdBy
 * @property Tracing[] $tracings
 */
class Ticket extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['folio', 'subject', 'created_at', 'priority', 'description', 'created_by'], 'required'],
            [['folio', 'state', 'user_id', 'created_by'], 'integer'],
            [['created_at', 'expiration'], 'safe'],
            [['description'], 'string'],
            [['subject'], 'string', 'max' => 200],
            [['priority'], 'string', 'max' => 45],
            [['attached'], 'string', 'max' => 80],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'folio' => 'Ticket',
            'subject' => 'Asunto',
            'created_at' => 'Fecha',
            'state' => 'Estado',
            'priority' => 'Prioridad',
            'description' => 'Descripcion',
            'expiration' => 'Cerrado',
            'attached' => 'Adjunto(s)',
            'user_id' => 'Tecnico',
            'created_by' => 'De',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserName() {
      return (is_null($this->user) ? Html::tag('span', 'No signado!!', ['class' => 'label label-danger']) : Html::tag('strong', $this->user->profile->name));
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }


    public function getCreatedByName() {
      return $this->createdBy->profile->name;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTracings()
    {
        return $this->hasMany(Tracing::className(), ['ticket_id' => 'id']);
    }

    /**
     * [getShortdescrip description]
     * @return [type] [description]
     */
    public function getShortdescrip()
    {
        return substr($this->description, 0, 32) . '... ';
    }

    public function getShortsubject()
    {
      $tam = strlen($this->subject);
      if ($tam > 23) {
        return substr($this->subject, 0, 17) . '...';
      }else{
        return $this->subject;
      }
        
    }

    public function getStatusLabel()
    {
      switch ($this->state) {
        case '0':
          return Html::tag('span', 'Cerrado', ['class' => 'label label-danger']);
          break;
        case '1':
          return Html::tag('span', 'Abierto', ['class' => 'label label-success']);
          break;
        
      }
    }

    public function getPriorityLabel()
    {
      switch ($this->priority) {

          case 'Urgente':
            return Html::tag('span', 'Urgente', ['class' => 'label label-danger']);
            break;

          case 'Alto':
              return Html::tag('span', 'Alto', ['class' => 'label label-warning']);
              break;

          case 'Normal':
              return Html::tag('span', 'Normal', ['class' => 'label label-success']);
              break;

          case 'Bajo':
              return Html::tag('span', 'Bajo', ['class' => 'label label-info']);
              break;
      }
    }


}
