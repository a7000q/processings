<?php

namespace app\models\Partners;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property integer $id
 * @property string $name
 * @property string $full_name
 * @property string $address
 * @property string $fakt_address
 * @property string $inn
 * @property integer $kpp
 *
 * @property Balances[] $balances
 * @property Balances[] $balances0
 * @property Cards[] $cards
 * @property DiscountPartner[] $discountPartners
 * @property DiscountPartner[] $discountPartners0
 * @property Inpayments[] $inpayments
 * @property Inpayments[] $inpayments0
 * @property Objects[] $objects
 * @property TPartnerBayer[] $tPartnerBayers
 * @property TPartnerSeller[] $tPartnerSellers
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'full_name', 'address', 'fakt_address', 'inn'], 'required'],
            [['inn', 'kpp'], 'integer'],
            [['name', 'full_name', 'address', 'fakt_address'], 'string', 'max' => 255],
            [['inn'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'full_name' => 'Full Name',
            'address' => 'Address',
            'fakt_address' => 'Fakt Address',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBalances()
    {
        return $this->hasMany(Balances::className(), ['id_partner_seller' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBalances0()
    {
        return $this->hasMany(Balances::className(), ['id_partner_bayer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Cards::className(), ['id_partner' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountPartners()
    {
        return $this->hasMany(DiscountPartner::className(), ['id_partner_seller' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountPartners0()
    {
        return $this->hasMany(DiscountPartner::className(), ['id_partner_bayer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInpayments()
    {
        return $this->hasMany(Inpayments::className(), ['id_partner_seller' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInpayments0()
    {
        return $this->hasMany(Inpayments::className(), ['id_partner_bayer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjects()
    {
        return $this->hasMany(Objects::className(), ['id_partner' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTPartnerBayers()
    {
        return $this->hasMany(TPartnerBayer::className(), ['id_partner' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTPartnerSellers()
    {
        return $this->hasMany(TPartnerSeller::className(), ['id_partner' => 'id']);
    }
}
