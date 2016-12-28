<?php

namespace app\models\Partners;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property integer $id
 * @property integer $id_partner
 * @property string $name
 * @property string $id_electro
 * @property integer $id_txt
 * @property integer $type_limit
 * @property integer $time_limit
 * @property string $limit
 *
 * @property Partners $idPartner
 * @property TypeLimits $typeLimit
 * @property TCards[] $tCards
 */
class Cards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_partner'], 'required'],
            [['id_partner', 'id_txt', 'type_limit', 'time_limit'], 'integer'],
            [['limit'], 'number'],
            [['name', 'id_electro'], 'string', 'max' => 255],
            [['id_partner'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['id_partner' => 'id']],
            [['type_limit'], 'exist', 'skipOnError' => true, 'targetClass' => TypeLimits::className(), 'targetAttribute' => ['type_limit' => 'id']],
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
            'id_electro' => 'Id Electro',
            'id_txt' => 'Id Txt',
            'type_limit' => 'Type Limit',
            'time_limit' => 'Time Limit',
            'limit' => 'Limit',
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
    public function getTypeLimit()
    {
        return $this->hasOne(TypeLimits::className(), ['id' => 'type_limit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTCards()
    {
        return $this->hasMany(TCards::className(), ['id_card' => 'id']);
    }
}
