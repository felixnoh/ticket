<?php

namespace common\models;

use Yii;
use yii\helpers\Html;


/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $avatar
 * @property int $user_id
 * @property string $image_src_filename
 * @property string $image_web_filename
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'last_name', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'last_name'], 'string', 'max' => 45],
            [['avatar'], 'string', 'max' => 60],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'last_name' => 'Apellido',
            'avatar' => 'Imagen de Usuario',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCreatedAt() {
      return $this->getUser->user->username;
    }

    public function getTypeLabel()
    {
      switch ($this->user->type) {
        case '1':
          return Html::encode('Administrador');
          break;
        case '2':
          return Html::encode('Tecnico');
          break;
        case '3':
          return Html::encode('Usuario Estandar');
          break;
      }
    }

}
