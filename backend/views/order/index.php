<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php// echo 
// Html::img('@web/dokumen/alpoti.png')
?>
<div class="order-index">
Nomor HP Pesanan:
<input type="number" name="ID" >
<a href="https://rest.nexmo.com/sms/json?api_key=38f9cdad &api_secret=c6c587eb54e70f3c&to=6282160437803 &from='Andrey'&text='Pesanan anda telah selesai dicetak, Silahkan ambil di Kantor PRINKANHOI. Silahkan  hubungi nomor : 6282160437803 untuk info lebih lanjut' " class="btn btn-info">Konfirmasi Pesanan</a>

<a href="https://rest.nexmo.com/sms/json?api_key=38f9cdad &api_secret=c6c587eb54e70f3c&to=6282160437803 &from='Andrey'&text='Selamat anda mendapatkan kupon pemotongan harga sebesar Rp. 2000 untuk percetakan selanjutnya dengan code [A0Tx].  Silahkan hubungi nomor : 6282160437803 untuk info lebih lanjut  ' " class="btn btn-success">Konfirmasi Kupon</a>


<a href="https://rest.nexmo.com/sms/json?api_key=38f9cdad &api_secret=c6c587eb54e70f3c&to=6282160437803 &from='Andrey'&text='Maaf, Layanan kami tidak dapat melakukan percetakan yang anda minta. Silahkan hubungi nomor : 6282160437803 untuk info lebih lanjut ' " class="btn btn-danger">Tolak Pesanan </a>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'waktu',
            'nama',
            'email:email',
            'nomor_HP',
            'Account_No',
            'User_FullName',
            'PIN',
            'Exp_Month',
            'Exp_Year',
            'Produk',
            'banyak',
            'file:email',
            'coupun_code',
            'total',

            
            'notes:ntext',
            

            [
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>

</div>
