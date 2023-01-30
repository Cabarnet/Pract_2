<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "like_rating".
 *
 * @property int $id
 * @property int $count_like
 * @property int $count_dislikes
 *
 * @property Review[] $reviews
 */
class LikeRating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'like_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count_like', 'count_dislikes'], 'required'],
            [['count_like', 'count_dislikes'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count_like' => 'Количество лайков',
            'count_dislikes' => 'Количество дизлайков',
        ];
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_like_rating' => 'id']);
    }
}
