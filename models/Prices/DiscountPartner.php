<?php

namespace app\models\Prices;

use Yii;

/**
 * This is the model class for table "discount_partner".
 *
 * @property integer $id
 * @property integer $id_partner_seller
 * @property integer $id_partner_bayer
 * @property integer $id_product
 * @property string $discount
 * @property integer $type
 *
 * @property Partners $idPartnerSeller
 * @property TypeDiscounts $type0
 * @property Products $idProduct
 * @property Partners $idPartnerBayer
 */
class DiscountPartner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discount_partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_partner_seller', 'id_partner_bayer', 'id_product', 'type'], 'integer'],
            [['id_partner_bayer'], 'required'],
            [['discount'], 'number'],
            [['id_partner_seller'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['id_partner_seller' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => TypeDiscounts::className(), 'targetAttribute' => ['type' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['id_product' => 'id']],
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
            'id_product' => 'Id Product',
            'discount' => 'Discount',
            'type' => 'Type',
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
    public function getType0()
    {
        return $this->hasOne(TypeDiscounts::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPartnerBayer()
    {
        return $this->hasOne(Partners::className(), ['id' => 'id_partner_bayer']);
    }
}
