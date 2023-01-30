<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $id_user
 * @property string $pluses
 * @property string $minuses
 * @property string $description
 * @property int $id_photo
 * @property int $id_video
 * @property float $rating
 * @property string $status
 * @property int $id_like_rating
 * @property string $date_of_creation
 * @property string $date_of_update
 * @property string $author
 *
 * @property LikeRating $likeRating
 * @property ReviewPhoto[] $reviewPhotos
 * @property ReviewVideo[] $reviewVideos
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'pluses', 'minuses', 'description', 'id_photo', 'id_video', 'rating', 'status', 'id_like_rating', 'date_of_creation', 'date_of_update', 'author'], 'required'],
            [['id_user', 'id_photo', 'id_video', 'id_like_rating'], 'integer'],
            [['pluses', 'minuses', 'description', 'status'], 'string'],
            [['rating'], 'number'],
            [['date_of_creation', 'date_of_update'], 'safe'],
            [['author'], 'string', 'max' => 255],
            [['id_like_rating'], 'exist', 'skipOnError' => true, 'targetClass' => LikeRating::class, 'targetAttribute' => ['id_like_rating' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Пользователь',
            'pluses' => 'Плюсы',
            'minuses' => 'Минусы',
            'description' => 'Описание',
            'id_photo' => 'Фото',
            'id_video' => 'Видео',
            'rating' => 'Рейтинг',
            'status' => 'Статус',
            'id_like_rating' => 'Рейтинг лайков',
            'date_of_creation' => 'Дата создания',
            'date_of_update' => 'Дата обновления',
            'author' => 'Автор',
        ];
    }

    /**
     * Gets query for [[LikeRating]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikeRating()
    {
        return $this->hasOne(LikeRating::class, ['id' => 'id_like_rating']);
    }

    /**
     * Gets query for [[ReviewPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewPhotos()
    {
        return $this->hasMany(ReviewPhoto::class, ['id_review' => 'id']);
    }

    /**
     * Gets query for [[ReviewVideos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewVideos()
    {
        return $this->hasMany(ReviewVideo::class, ['id_review' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
