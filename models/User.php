<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $auth_key
 * @property string $date_born
 * @property int|null $id_city
 * @property int|null $id_role
 * @property int|null $id_currency
 * @property int|null $id_card
 * @property int $gender
 * @property string|null $photo
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $phone
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property UserCard $card
 * @property Cart[] $carts
 * @property City $city
 * @property Company[] $companies
 * @property Currency $currency
 * @property FavoriteProduct[] $favoriteProducts
 * @property Ordering[] $orderings
 * @property Review[] $reviews
 * @property UserRole $role
 * @property UserAddress[] $userAddresses
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

//    /**
//     * {@inheritdoc}
//     */
//    public function rules()
//    {
//        return [
//            [['login', 'date_born', 'password_hash', 'phone', 'email', 'id_currency', 'id_city'], 'required'],
//            [['date_born'], 'safe'],
//            [['id_city', 'id_role', 'id_currency', 'id_card', 'gender', 'status', 'created_at', 'updated_at'], 'integer'],
//            [['login', 'photo', 'password_hash', 'password_reset_token', 'phone', 'email'], 'string', 'max' => 255],
//            [['auth_key'], 'string', 'max' => 32],
//            [['login'], 'unique'],
//            [['phone'], 'unique'],
//            [['email'], 'unique'],
//            [['password_reset_token'], 'unique'],
//            [['id_card'], 'exist', 'skipOnError' => true, 'targetClass' => UserCard::class, 'targetAttribute' => ['id_card' => 'id']],
//            [['id_currency'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['id_currency' => 'id']],
//            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
//            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::class, 'targetAttribute' => ['id_role' => 'id']],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'auth_key' => 'Авториз_ключ',
            'date_born' => 'Дата рождения',
            'id_city' => 'Город',
            'id_role' => 'Роль',
            'id_currency' => 'Валюта',
            'id_card' => 'Карта',
            'gender' => 'Пол',
            'photo' => 'Фото',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'phone' => 'Телефон',
            'email' => 'Почта',
            'status' => 'Статус',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    /**
     * Finds user by login
     *
     * @param string $login
     * @return static|null
     */
    public static function findByUsername($login)
    {
        return static::findOne(['login' => $login, 'status' => self::STATUS_ACTIVE]);
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    /*** @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(UserCard::class, ['id' => 'id_card']);
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id_city']);
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'id_currency']);
    }

    /**
     * Gets query for [[FavoriteProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoriteProducts()
    {
        return $this->hasMany(FavoriteProduct::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Orderings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderings()
    {
        return $this->hasMany(Ordering::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(UserRole::class, ['id' => 'id_role']);
    }

    /**
     * Gets query for [[UserAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(UserAddress::class, ['id_user' => 'id']);
    }
}
