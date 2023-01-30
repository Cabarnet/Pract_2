<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review_photo".
 *
 * @property int $id
 * @property int $id_review
 * @property string $photo
 *
 * @property Review $review
 */
class ReviewPhoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_review', 'photo'], 'required'],
            [['id_review'], 'integer'],
            [['photo'], 'string', 'max' => 255],
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
            'photo' => 'Фото',
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
