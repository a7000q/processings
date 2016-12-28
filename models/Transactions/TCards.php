<?php

namespace app\models\Transactions;

use Yii;

/**
 * This is the model class for table "t_cards".
 *
 * @property integer $id_transaction
 * @property integer $id_card
 * @property string $name
 *
 * @property Transactions $idTransaction
 * @property Cards $idCard
 */
class TCards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaction', 'id_card', 'name'], 'required'],
            [['id_transaction', 'id_card'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_transaction'], 'unique'],
            [['id_transaction'], 'exist', 'skipOnError' => true, 'targetClass' => Transactions::className(), 'targetAttribute' => ['id_transaction' => 'id']],
            [['id_card'], 'exist', 'skipOnError' => true, 'targetClass' => Cards::className(), 'targetAttribute' => ['id_card' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transaction' => 'Id Transaction',
            'id_card' => 'Id Card',
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
    public function getIdCard()
    {
        return $this->hasOne(Cards::className(), ['id' => 'id_card']);
    }
}
