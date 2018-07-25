<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system".
 *
 * @property integer $id
 * @property integer $folio
 */
class System extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['folio'], 'required'],
            [['folio'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'folio' => 'Folio',
        ];
    }
}
