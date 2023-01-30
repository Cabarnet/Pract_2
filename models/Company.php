<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $inn
 * @property string $photo
 * @property string $date_of_creation
 * @property string $date_of_update
 * @property string $author
 * @property int $id_user
 *
 * @property Product[] $products
 * @property User $user
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'inn', 'photo', 'date_of_creation', 'date_of_update', 'author', 'id_user'], 'required'],
            [['date_of_creation', 'date_of_update'], 'safe'],
            [['id_user'], 'integer'],
            [['name', 'inn', 'photo', 'author'], 'string', 'max' => 255],
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
            'name' => 'Название',
            'inn' => 'Инн',
            'photo' => 'Фото',
            'date_of_creation' => 'Date Of Creation',
            'date_of_update' => 'Date Of Update',
            'author' => 'Автор',
            'id_user' => 'Пользователь',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id_company' => 'id']);
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
