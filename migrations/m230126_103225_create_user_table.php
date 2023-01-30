<?php
use yii\db\Migration;
/**
 * Handles the creation of table `{{%user}}`.
 */
class m230126_103225_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'date_born' => $this->date()->notNull(),
            'id_city' => $this->integer(),
            'id_role' => $this->integer(),
            'id_currency' => $this->integer(),
            'id_card' => $this->integer(),
            'gender' => $this->integer()->notNull(),
            'photo' => $this->string(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'phone'=> $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }
    public function down()
    {
        $this->dropTable('user');
    }
}