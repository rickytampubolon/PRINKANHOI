<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
    <style >
    .my-navbar {
    background-color: #3a9090;}
    .banner {
  background-position: center top;
  background-image: url(images/test.png);
  
  background-repeat: no-repeat;
  -moz-background-size:cover;
  -o-background-size: cover;
  -webkit-background-size: cover;
  background-size: 1400px;

  min-height: 300px;
}

}</style>
        <?php
            NavBar::begin([
                'brandLabel' => Html::img('@web/images/sss.png', ['alt'=>Yii::$app->name]),

                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'my-navbar navbar-fixed-top',
                ],
            ]);
            $itemsInCart = Yii::$app->cart->getCount();
            $menuItems = [
                ['label' => 'Tentang', 'url' => ['/site/about'],'linkOptions' => ['style' => 'color: white;']],
               
                ['label' => 'Keranjang' . ($itemsInCart ? " ($itemsInCart)" : ''), 'url' => ['/cart/list'],'linkOptions' => ['style' => 'color: white;']],
            ];
            /*if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }*/
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
        <section class="banner" role="banner">

</section>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p align="center"><b>PRINKANHOI TI 11
        
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
