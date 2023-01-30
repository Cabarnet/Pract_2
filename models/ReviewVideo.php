<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review_video".
 *
 * @property int $id
 * @property int $id_review
 * @property string $video
 *
 * @property Review $review
 */
class ReviewVideo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review_video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_review', 'video'], 'required'],
            [['id_review'], 'integer'],
            [['video'], 'string', 'max' => 255],
            [['id_review'], 'exist', 'skipOnError' => true, 'targetClass' => Review::class, 'targetAttribute' => ['id_review' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_review' => 'Обзор',
            'video' => 'Видео',
        ];
    }

    /**
     * Gets query for [[Review]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReview()
    {
        return $this->hasOne(Review::class, ['id' => 'id_review']);
    }
}
