<?php

namespace app\models\Types;

use Yii;

/**
 * This is the model class for table "type_limits".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Cards[] $cards
 */
class TypeLimits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_limits';
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
    public function getCards()
    {
        return $this->hasMany(Cards::className(), ['type_limit' => 'id']);
    }
}
