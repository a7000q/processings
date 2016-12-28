<?php

namespace app\models\Objects;

use Yii;

/**
 * This is the model class for table "terminals".
 *
 * @property integer $id
 * @property integer $id_object
 * @property integer $imei
 * @property string $password
 * @property string $token
 *
 * @property TTerminals $tTerminals
 * @property Objects $idObject
 */
class Terminals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terminals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_object'], 'required'],
            [['id_object', 'imei'], 'integer'],
            [['password', 'token'], 'string', 'max' => 255],
            [['imei'], 'unique'],
            [['id_object'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::className(), 'targetAttribute' => ['id_object' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_object' => 'Id Object',
            'imei' => 'Imei',
            'password' => 'Password',
            'token' => 'Token',
        ];
    }
    public function fields()
    {
        $fields = parent::fields();

        unset($fields["password"]);

        return $fields;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdObject()
    {
        return $this->hasOne(Objects::className(), ['id' => 'id_object']);
    }
}
