<?php

namespace app\models\Transactions;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property integer $id
 * @property string $volume
 * @property integer $type
 * @property integer $date
 *
 * @property TCards $tCards
 * @property TObjects $tObjects
 * @property TPartnerBayer $tPartnerBayer
 * @property TPartnerSeller $tPartnerSeller
 * @property TPrices $tPrices
 * @property TProducts $tProducts
 * @property TTerminals $tTerminals
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['volume', 'type', 'date'], 'required'],
            [['volume'], 'number'],
            [['type', 'date'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'volume' => 'Volume',
            'type' => 'Type',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTCards()
    {
        return $this->hasOne(TCards::className(), ['id_transaction' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTObjects()
    {
        return $this->hasOne(TObjects::className(), ['id_transaction' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTPartnerBayer()
    {
        return $this->hasOne(TPartnerBayer::className(), ['id_transaction' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTPartnerSeller()
    {
        return $this->hasOne(TPartnerSeller::className(), ['id_transaction' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTPrices()
    {
        return $this->hasOne(TPrices::className(), ['id_transaction' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTProducts()
    {
        return $this->hasOne(TProducts::className(), ['id_transaction' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTTerminals()
    {
        return $this->hasOne(TTerminals::className(), ['id_transaction' => 'id']);
    }
}
