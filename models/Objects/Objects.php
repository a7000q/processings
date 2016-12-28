<?php

namespace app\models\Objects;

use Yii;

/**
 * This is the model class for table "objects".
 *
 * @property integer $id
 * @property integer $id_partner
 * @property string $name
 * @property string $address
 *
 * @property Partners $idPartner
 * @property Prices[] $prices
 * @property TObjects[] $tObjects
 * @property Terminals[] $terminals
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'objects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_partner', 'name', 'address'], 'required'],
            [['id_partner'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['id_partner'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['id_partner' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_partner' => 'Id Partner',
            'name' => 'Name',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPartner()
    {
        return $this->hasOne(Partners::className(), ['id' => 'id_partner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Prices::className(), ['id_object' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTObjects()
    {
        return $this->hasMany(TObjects::className(), ['id_object' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerminals()
    {
        return $this->hasMany(Terminals::className(), ['id_object' => 'id']);
    }
}
