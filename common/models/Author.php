<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "b_author".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $Column 5
 */
class Author extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['created_at',], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Author', 'ID'),
            'name' => Yii::t('Author', 'Name'),
            'description' => Yii::t('Author', 'Description'),
            'created_at' => Yii::t('Author', 'Created At'),
        ];
    }
}
