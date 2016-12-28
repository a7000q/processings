<?php

namespace app\models\Transactions;

use Yii;

/**
 * This is the model class for table "t_partner_bayer".
 *
 * @property integer $id_transaction
 * @property integer $id_partner
 * @property string $name
 *
 * @property Transactions $idTransaction
 * @property Partners $idPartner
 */
class TPartnerBayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_partner_bayer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaction', 'id_partner', 'name'], 'required'],
            [['id_transaction', 'id_partner'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_transaction'], 'unique'],
            [['id_transaction'], 'exist', 'skipOnError' => true, 'targetClass' => Transactions::className(), 'targetAttribute' => ['id_transaction' => 'id']],
            [['id_partner'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['id_partner' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transaction' => 'Id Transaction',
            'id_partner' => 'Id Partner',
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
    public function getIdPartner()
    {
        return $this->hasOne(Partners::className(), ['id' => 'id_partner']);
    }
}
