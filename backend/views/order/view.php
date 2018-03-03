<?php

use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;
use common\models\Order;
use yii\helpers\Url;
use yii\helpers\Json;


use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">
<a href=""></a>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php 
    $ActionKonfirmasi = "https://rest.nexmo.com/sms/json?api_key=38f9cdad &api_secret=c6c587eb54e70f3c&to=6282160437803 &from='Andrey'&text='Pesanan anda telah diproses, Anda dapat mengambil hasil cetakan pada GD 723.Jika ada yang ingin diberitahukan hubungi nomor 08110878789' ";
    $ActionProses = "proses.php";

?>

<?php 

/**
* 
*/
$arr[] = DetailView::widget(['model' => $model,'attributes' => ['total']]);

$int = $arr[0][84].$arr[0][85].$arr[0][86].$arr[0][87].$arr[0][88].$arr[0][89];
$totalnya =(int)$int; 
echo " total: ".$totalnya;


$randomString = '';
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < 10; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
$params = [
            'api_key' => Yii::$app->params['api_key'],
            'receiver_no' => Yii::$app->params['merchant_account_no'],
            'amount' => $totalnya,
            'code' => "Prinkanhoi-". $randomString,
            'sender_pin' => 11
            
        ];
        
        $sikilatUrl  = Yii::$app->params['sikilat'] . "?data=" . Json::encode($params);
        
        Yii::$app->response->redirect($sikilatUrl);
        Yii::$app->end();
    

  




?>

<a href="https://rest.nexmo.com/sms/json?api_key=38f9cdad &api_secret=c6c587eb54e70f3c&to=6281932395825 &from='Andrey'&text='Hallo Pabwe' " class="btn btn-info">Konfirmasi</a>

    

         <?= Html::a('Proses', ['proses', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
      
        
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    
    </p>
<?= $id=$_GET['id']; 
 


        ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'nama',
            'nomor_HP',
            'Account_No',
            'User_FullName',
            'PIN',
            'Exp_Month',
            'Exp_Year',
            
            'Produk',
            'banyak',
            'file',
            'total',

            'email:email',
            'notes:ntext',
            
        ],
    ]) ?>

</div>
