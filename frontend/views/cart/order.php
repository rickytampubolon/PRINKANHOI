<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use \frontend\models

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */
?>
<h1>Pesanan anda</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-2">
            Harga
        </div>
        <div class="col-xs-2">
            Banyak
        </div>
        <div class="col-xs-2">
            Total Harga
        </div>
    </div>
    <?php foreach ($products as $product): ?>
    <div class="row">
        <div class="col-xs-4">
            <?= Html::encode($product->title) ?>
        </div>
        <div class="col-xs-2">
            Rp.<?= $product->price ?>
        </div>
        <div class="col-xs-2">
            <?= $quantity = $product->getQuantity()?>
        </div>
        <div class="col-xs-2">
            Rp.<?= $product->getCost() ?>
        </div>
    </div>
    <?php endforeach ?>
    <div class="row">
        <div class="col-xs-8">

        </div>
        <div class="col-xs-2">
            <?php $total ?>
            <br>
        </div>
    </div>
    <div class="col-xs-9">
<?php 
    if ($total >= 10000 && $total < 20000 ) {
                $total = $total - 1000;
                echo "<p align='right'>Hasil diskon : &nbsp; Rp." .$total;
                
            }
            elseif ($total >= 20000 && $total <= 30000) {
                $total = $total - 2000;
                echo "<p align='right'>Hasil diskon :Rp." .$total;
                
            }
            elseif ($total >= 30000 && $total <= 40000) {
                $total = $total - 3000;
                echo "<p align='right'> Hasil diskon : Rp." .$total;
            }
            elseif ($total >= 40000 && $total <= 50000) {
                $total = $total - 4000;
                echo "<p align='right'> Hasil diskon : Rp." .$total;
            }
            elseif ($total>50000) {
                $total= $total - 5000;
                echo "<p align='right'> Hasil diskon :&nbsp; Rp." .$total;
            }
            


?>
</div>
    <div class="row">
        <div class="col-xs-6">


            <?php
            //Bagian Diskon/ diskon harga
            /* @var $form ActiveForm */
        


            $form = ActiveForm::begin([
                'id' => 'order-form',
            ]) ?>
            <?= $form->field($order, 'nama')->textInput(['placeholder'=>"Nama Anda"]) ?>
            <?= $form->field($order, 'email')->textInput(['placeholder'=>"Email Anda"]) ?>
             <?= $form->field($order, 'nomor_HP')->textInput(['placeholder'=>"Nomor HP (+62)"]) ?>

             <?= $form->field($order, 'Account_No')->textInput(['placeholder'=>"Account Number Anda"]) ?>
            <?= $form->field($order, 'User_FullName')->textInput(['placeholder'=>"User FullName Anda"]) ?>
             <?= $form->field($order, 'PIN')->textInput(['placeholder'=>"PIN anda"]) ?>
             <?= $form->field($order, 'Exp_Month')->dropDownList(['January' => 'January', 'February' => 'February', 'March' => 'March', 'April' => 'April'
                , 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']); ?>
            <?= $form->field($order, 'Exp_Year')->dropDownList(['2017'=>2017,'2018' => 2018, '2019' => 2019, '2020' => 2020]) ?>
            
            <?= $form->field($order, 'waktu')->hiddenInput(['value' => strtotime("now") ])->label(false)?>




            <?= $form->field($order, 'total')->hiddenInput(['value' => $total])->label(false)?>

            <?= $form->field($order, 'coupun_code')->textInput(['placeholder'=>"Isi jika ada"])->label("Coupon Code (Isi jika ada, Jika tidak ada, isi 'NO')") ?>

            <?= $form->field($order, 'Produk')->hiddenInput(['value' => Html::encode($product->title)])->label(false)?>

            <?= $form->field($order, 'banyak')->hiddenInput(['value' => $product->getQuantity()])->label(false)?>
           
            <?= $form->field($order, 'file')->fileInput(['multiple' => true, 'accept' => 'file/*']); ?>

            <?= $form->field($order, 'notes')->textarea(['placeholder'=>"Catatan Tambahan"]) ?>
  
            <div class="form-group row">
                <div class="col-xs-12">
                    <?= Html::submitButton('Order', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>