<?php

namespace app\models\Transactions;

use Yii;

/**
 * This is the model class for table "t_prices".
 *
 * @property integer $id_transaction
 * @property string $price
 * @property string $price_stella
 *
 * @property Transactions $idTransaction
 */
class TPrices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_prices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaction', 'price', 'price_stella'], 'required'],
            [['id_transaction'], 'integer'],
            [['price', 'price_stella'], 'number'],
            [['id_transaction'], 'unique'],
            [['id_transaction'], 'exist', 'skipOnError' => true, 'targetClass' => Transactions::className(), 'targetAttribute' => ['id_transaction' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transaction' => 'Id Transaction',
            'price' => 'Price',
            'price_stella' => 'Price Stella',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTransaction()
    {
        return $this->hasOne(Transactions::className(), ['id' => 'id_transaction']);
    }
}
