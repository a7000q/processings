<?php

namespace app\models\Transactions;

use Yii;

/**
 * This is the model class for table "t_objects".
 *
 * @property integer $id_transaction
 * @property integer $id_object
 * @property string $name
 *
 * @property Transactions $idTransaction
 * @property Objects $idObject
 */
class TObjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_objects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaction', 'id_object', 'name'], 'required'],
            [['id_transaction', 'id_object'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_transaction'], 'unique'],
            [['id_transaction'], 'exist', 'skipOnError' => true, 'targetClass' => Transactions::className(), 'targetAttribute' => ['id_transaction' => 'id']],
            [['id_object'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::className(), 'targetAttribute' => ['id_object' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transaction' => 'Id Transaction',
            'id_object' => 'Id Object',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTransaction()
    {
        return $this->hasOne(Transactions::className(), ['id' => 'id_transaction']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdObject()
    {
        return $this->hasOne(Objects::className(), ['id' => 'id_object']);
    }
}
