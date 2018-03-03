<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
$title = $category === null ? 'PRINKANHOI' : $category->title;
$this->title = Html::encode($title);
?>

<h1><?= Html::encode($title) ?></h1>
<h4 align="center" style="background-color: #3a9090; color: white;"> &nbsp;Ada Diskon untuk bulan ini untuk cetak diatas Rp.10.000 !, Ayo segera berbelanja!&nbsp;  </h4>

<h3>Kategori :</h3>
<div class="container-fluid">
  <div class="row">
      <div class="col-xs-4">
          <?= Menu::widget([
              'items' => $menuItems,
              'options' => [
                  'class' => 'menu',
              ],
          ]) ?>
      </div>
      <div class="col-xs-8">
          <?= ListView::widget([
              'dataProvider' => $productsDataProvider,
              'itemView' => '_product',
          ]) ?>
      </div>
  </div>
</div>