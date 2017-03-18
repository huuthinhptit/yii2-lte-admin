<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tn_story".
 *
 * @property integer $id
 * @property string $title
 * @property string $icon
 * @property integer $chap_id
 * @property string $author
 * @property integer $comment_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 */
class Story extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tn_story';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chap_id', 'comment_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'required'],
            [['title', 'author'], 'string', 'max' => 200],
            [['icon'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('story', 'ID'),
            'title' => Yii::t('story', 'Title'),
            'icon' => Yii::t('story', 'Icon'),
            'chap_id' => Yii::t('story', 'Chap ID'),
            'author' => Yii::t('story', 'Author'),
            'comment_id' => Yii::t('story', 'Comment ID'),
            'created_at' => Yii::t('story', 'Created At'),
            'updated_at' => Yii::t('story', 'Updated At'),
            'status' => Yii::t('story', 'Status'),
        ];
    }
}
