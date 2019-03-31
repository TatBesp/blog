<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [['name','surname', 'patronymic', 'email', 'password', 'photo'], 'string', 'max' => 255];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'email' => 'Email',
            'password' => 'Password',
            'photo' => 'Photo',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findIdentity($user_id)
    {
        return User::findOne($user_id);
    }
    public function getId()
    {
        return $this->user_id;
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }
    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }
    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }
    
    public function create()
    {
        return $this->save(false);
    }
    
    public function getImage()
    {
        return $this->photo;
    }
    public static function getAll($pageSize = 5)
    {
        $query = User::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $users = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
         $data['users'] = $users;
         $data['pagination'] = $pagination; 
         return $data;
    }
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'user_id']);
    }
         
}