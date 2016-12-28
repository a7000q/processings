<?php

namespace app\models\Inpayment;

use Yii;

/**
 * This is the model class for table "inpayments".
 *
 * @property integer $id
 * @property integer $id_partner_seller
 * @property integer $id_partner_bayer
 * @property integer $date
 * @property string $sum
 * @property string $description
 *
 * @property Partners $idPartnerSeller
 * @property Partners $idPartnerBayer
 */
class Inpayments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inpayments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_partner_seller', 'id_partner_bayer', 'date', 'sum', 'description'], 'required'],
            [['id_partner_seller', 'id_partner_bayer', 'date'], 'integer'],
            [['sum'], 'number'],
            [['description'], 'string', 'max' => 1000],
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
            'date' => 'Date',
            'sum' => 'Sum',
            'description' => 'Description',
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
