<?php

namespace app\models\Partners;

use Yii;

/**
 * This is the model class for table "balances".
 *
 * @property integer $id
 * @property integer $id_partner_seller
 * @property integer $id_partner_bayer
 * @property string $balance
 * @property integer $limit
 *
 * @property Partners $idPartnerSeller
 * @property Partners $idPartnerBayer
 */
class Balances extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'balances';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_partner_seller', 'id_partner_bayer', 'limit'], 'required'],
            [['id_partner_seller', 'id_partner_bayer', 'limit'], 'integer'],
            [['balance'], 'number'],
            [['id_partner_seller'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['id_partner_seller' => 'id']],
            [['id_partner_bayer'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['id_partner_bayer' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_partner_seller' => 'Id Partner Seller',
            'id_partner_bayer' => 'Id Partner Bayer',
            'balance' => 'Balance',
            'limit' => 'Limit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPartnerSeller()
    {
        return $this->hasOne(Partners::className(), ['id' => 'id_partner_seller']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPartnerBayer()
    {
        return $this->hasOne(Partners::className(), ['id' => 'id_partner_bayer']);
    }
}
