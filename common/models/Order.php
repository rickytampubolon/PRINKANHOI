<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

class Order extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 'New';
    const STATUS_IN_PROGRESS = 'In progress';
    const STATUS_DONE = 'Done';

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'email','coupun_code','Account_No','Exp_Month','Exp_Year','User_FullName','PIN'], 'required'],
            [['notes'], 'string'],
            [['total'], 'string'],
            [['Produk'], 'string'],
             [['Account_No','nomor_HP'], 'integer'],
            [['User_FullName'], 'string'],
            [['PIN'], 'integer'],
            [['Exp_Month'], 'string'],
            [['Exp_Year'], 'integer'],
            [['banyak'], 'integer'],
            [['file'],'file','extensions' => 'doc, docx,pdf,jpeg,png,jpg,gif','maxFiles' => 1],
            [['email'], 'match','pattern'=> '/^[a-z0-9]+[@]+[a-z]+[.]+[del]+[.]+[ac]+[.]+[id]\w*$/i','message'=>Yii::t('app','Email anda tidak terdaftar')],
            [['coupun_code'],  'in', 'range' => ['A0Tx','A16x','A1Tx','A4Tx','NO'],'message'=>Yii::t('app','Kupon tidak terdapat dalam data')],

               ];
     
    }


public function validatePassword()
    {
        $user = User::findByUsername($this->username);

        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError('coupun_code', 'Incorrect username or password.');
        }
    }


public function cekKupon($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, ['AAA', 'BBB'])) {
            $this->addError($attribute, 'The country must be either "USA" or "Web".');
        }
    }
    /**
     * @inheritdoc
     */


     public function generateSequence($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $this->seq = "Prinkan-" . $randomString;
}
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'nama' => 'Nama',
            'nomor_HP'=>'Nomor HP',
            'address' => 'Address',
            'email' => 'Email',
            'Account_No'=>'Account Number',
            'User_FullName'=>'User FullName',
            'PIN'=>'PIN',
            'Exp_Month'=>'Exp Month',
            'Exp_Year'=>'Exp Year',
            'Produk'=>'Produk',
            'banyak'=>'Banyak',
            'file'=>'File',
            'total'=> 'Total',
            'notes' => 'Notes',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->status = self::STATUS_NEW;
            }
            return true;
        } else {
            return false;
        }
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_DONE => 'Done',
            self::STATUS_IN_PROGRESS => 'In progress',
            self::STATUS_NEW => 'New',
        ];
    }

    public function sendEmail()
    {
        return Yii::$app->mailer->compose('order', ['order' => $this])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject('New order #' . $this->id)
            ->send();
    }
}
