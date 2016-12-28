<?php

namespace app\models\Types;

use Yii;

/**
 * This is the model class for table "type_discounts".
 *
 * @property integer $id
 * @property string $name
 *
 * @property DiscountPartner[] $discountPartners
 */
class TypeDiscounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_discounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountPartners()
    {
        return $this->hasMany(DiscountPartner::className(), ['type' => 'id']);
    }
}
