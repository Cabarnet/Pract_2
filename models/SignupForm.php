<?php
namespace app\models;
use Yii;
use yii\base\Model;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $login;
    public $email;
    public $password;
    public $date_born;
    public $id_city;
    public $id_currency;
    public $phone;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['login', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['date_born', 'required'],
            ['date_born', 'safe'],
            ['id_city', 'required'],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
            ['id_currency', 'required'],
            [['id_currency'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['id_currency' => 'id']],
            ['phone', 'required'],
            ['phone', 'string', 'min' => 11, 'max' => 12],
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->login = $this->login;
        $user->email = $this->email;
        $user->date_born = $this->date_born;
        $user->id_city = $this->id_city;
        $user->id_currency = $this->id_currency;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
