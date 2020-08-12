<?php

use yii\helpers\Html;
use yii\helpers\url;
use yii\widgets\DetailView;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'preview'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<body class="" style="position: relative; min-height: 100%; top: 0px;">
<noscript>
    <strong>We're sorry but GetInsta doesn't work properly without JavaScript enabled. Please enable it to
        continue.</strong>
</noscript>

<div id="app">
    <header class="fixed active">
        <div data-v-412f1e5a="" id="header" class="header-nav__navigator">
            <div data-v-412f1e5a="" class="header-nav__wrapper">
                <div data-v-412f1e5a="" class="wrapper">
                    <div data-v-412f1e5a="" class="header-nav__logo"><a data-v-412f1e5a="" id="nav-home" to="/">
                            <i data-v-412f1e5a=""></i>
                            <span data-v-412f1e5a="">GetInsta</span>
                        </a>
                    </div>
                    <div data-v-412f1e5a="" class="header-nav__menu">
                        <div data-v-412f1e5a="" class="pc">
                            <a data-v-412f1e5a="" id="nav-menu-00" to="/" class="header-nav__menu_links">Home</a>
                            <a data-v-412f1e5a="" id="nav-menu-01" to="/buy-instagram-followers" class="header-nav__menu_links">Store</a>
                            <a data-v-412f1e5a="" id="nav-menu-02" to="/get-instagram-followers-likes" class="header-nav__menu_links">Get Followers&amp; Likes</a>
                            <a data-v-412f1e5a="" id="nav-menu-03" to="/faqs" class="header-nav__menu_links">FAQs</a>
                            <a data-v-412f1e5a="" id="nav-menu-04" href="<?= Url::toRoute('/article/index')?>" class="header-nav__menu_links">Blog</a>
                        </div>
                        <a data-v-412f1e5a=""
                           href="http://localhost:8080/checkout" class="cart" title="Cart">
                            <i data-v-412f1e5a="" class="cart"></i>
                        </a>
                        <!---->
                        <!---->
                        <div data-v-412f1e5a="" title="User Center" class="header-nav_menu_user">
                            <a data-v-412f1e5a="" href="http://localhost:8080/user" class="avatar-container">
                                <div data-v-412f1e5a="" class="avatar">
                                    <img data-v-412f1e5a="" src="img/68761814_406547376656235_6673091594033299456_n.jpg" alt="avatar"></div>
                            </a>
                        </div>
                    </div>
                    <!---->
                    <div data-v-412f1e5a="" class="header-nav__btn mobile"><i data-v-412f1e5a="" class="open"></i></div>
                </div>
            </div>
            <!---->
            <!---->
            <!---->
            <!---->
        </div>
    </header>
    <div data-v-23970af3="" class="blog-detail content-container">
        <div data-v-23970af3="" id="header-blank" class="header-blank"></div>
        <div data-v-23970af3="" class="wrapper">
            <div data-v-23970af3="" class="left">
                <div data-v-23970af3="">
                    <div data-v-23970af3="" class="breadcrumb">
                        <a data-v-23970af3="" href="http://localhost:8080/" class="router-link-active">Home</a>
                        <span data-v-23970af3="">&gt;</span>
                        <a data-v-23970af3="" href="<?= Url::toRoute(['article/index'],true)?>" class="router-link-active">Blog</a>
                        <span data-v-23970af3="">&gt;</span>
                        <a data-v-23970af3="" href="#" class="router-link-active"><?= html::decode($model->article_title) ?></a>
                        <b data-v-23970af3=""></b>
                    </div>
                    <div data-v-23970af3="" class="meta-info">
                        <h1 data-v-23970af3=""><?= html::decode($model->article_title) ?></h1>
                        <p data-v-23970af3="" class="intro"><?= html::decode($model->mate_description) ?></p>
                        <hr data-v-23970af3="">
                        <p data-v-23970af3="" class="info"> Updated <?= html::decode($model->updated_at) ?> |
                            by <?= html::decode($model->author) ?> </p>
                    </div>
                    <div data-v-23970af3="" id="blogDetailContent" class="blog-detail__content windows">
                        <?= html::decode($model->content) ?>
                        <section style="height: 60px;"></section>
                    </div>
                </div>
            </div>
            <div data-v-23970af3="" class="right">
                <div data-v-23970af3="" class="mix-container">
                    <img data-v-23970af3="" src="img/logo.svg" alt="LOGO">
                    <h2 data-v-23970af3="">GetInsta</h2>
                    <p data-v-23970af3=""><span data-v-23970af3="">Your ultimate tool to get free Instagram followers &amp;
                likes. 100% real.

              </span></p>
                    <div data-v-23970af3="" class="btn pc">
                        <div data-v-23970af3="" class="btn-c">
                            <button data-v-4a026ef3="" data-v-23970af3="" class="">
                                <div data-v-4a026ef3="" class="icon">
                                    <i data-v-4a026ef3=""></i>
                                    <b data-v-4a026ef3=""></b>
                                </div>
                                <div data-v-4a026ef3="" class="text">
                                    <p data-v-4a026ef3="">Download For</p>
                                    <p data-v-4a026ef3="">Windows</p>
                                    <p data-v-4a026ef3="" class="single">Download</p>
                                </div>
                            </button>
                        </div>
                        <div data-v-23970af3="" class="btn-c">
                            <button data-v-64218fca="" data-v-23970af3="" class="transparent">
                                <div data-v-64218fca="" class="icon"><i data-v-64218fca=""></i>
                                    <b data-v-64218fca=""></b>
                                </div>
                                <div data-v-64218fca="" class="text">
                                    <p data-v-64218fca="">Download For</p>
                                    <p data-v-64218fca="">Android</p>
                                </div>
                            </button>
                        </div>
                        <div data-v-23970af3="" class="btn-c">
                            <button data-v-26f88be8="" data-v-23970af3="" class="transparent">
                                <div data-v-26f88be8="" class="icon"><i data-v-26f88be8=""></i>
                                    <b data-v-26f88be8=""></b>
                                </div>
                                <div data-v-26f88be8="" class="text">
                                    <p data-v-26f88be8="">Download From</p>
                                    <p data-v-26f88be8="">App Store</p>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div data-v-23970af3="" class="btn mobile">
                        <button data-v-53814ad1="" data-v-23970af3="" class="icon-android">
                            <span data-v-53814ad1="">Download App Now</span>
                        </button>
                    </div>
                    <p data-v-23970af3="" class="b"><i data-v-23970af3=""></i><span data-v-23970af3="">100% safe &amp;
                clean</span></p>
                </div>
                <div data-v-23970af3="" class="hot-list">
                    <h2 data-v-23970af3="">Hot Articles</h2>
                    <div data-v-23970af3="" class="links">
                        <?php
                        $subQuery = Yii::$app->db->createCommand("select id, article_title from article where hot_article=1 AND publish=1")->queryAll();
                        foreach($subQuery as $arr): ?>
                        <a data-v-23970af3="" href="<?= url::toRoute(['article/preview','id'=>$arr['id']])?>"
                           class="" title="<?php echo $arr['article_title']?>"><span data-v-23970af3=""><?php echo $arr['article_title']?></span></a></div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <!---->
    </div>
    <footer class="active">
        <div data-v-764efdba="" class="footer-text">
            <div data-v-764efdba="" class="footer-text__links">
                <div data-v-764efdba="" class="wrapper">
                    <div data-v-764efdba="" class="footer-text__links_column logo mobile">
                        <a data-v-764efdba=""
                           href="http://localhost:8080/" class="router-link-active"><i data-v-764efdba=""></i>
                            <h2 data-v-764efdba="">GetInsta</h2>
                        </a>
                        <p data-v-764efdba="">Copyright © 2020 <br data-v-764efdba=""> easygetinsta.com</p>
                        <div data-v-764efdba="" id="footer-translate-blank"></div>
                    </div>
                    <div data-v-764efdba="" class="footer-text__links_column first narrow">
                        <h3 data-v-764efdba=""><span data-v-764efdba="">About</span></h3>
                        <a data-v-764efdba="" href="http://localhost:8080/terms" class="">Terms of Use</a>
                        <a data-v-764efdba="" href="http://localhost:8080/privacy" class="">Privacy Policy</a>
                    </div>
                    <div data-v-764efdba="" class="footer-text__links_column narrow">
                        <h3 data-v-764efdba=""><span data-v-764efdba="">Services</span></h3>
                        <a data-v-764efdba="" href="http://localhost:8080/get-instagram-followers-likes" class="">Get Followers</a>
                        <a data-v-764efdba="" href="http://localhost:8080/get-instagram-followers-likes" class="">Get Likes</a>
                    </div>
                    <div data-v-764efdba="" class="footer-text__links_column narrow">
                        <h3 data-v-764efdba=""><span data-v-764efdba="">Resource</span></h3>
                        <a data-v-764efdba="" href="http://localhost:8080/login" class="">Login</a>
                        <a data-v-764efdba="" href="http://localhost:8080/faqs" class="">FAQs</a>
                        <a data-v-764efdba="" href="http://localhost:8080/blog" class="router-link-active">Blog</a>
                    </div>
                    <div data-v-764efdba="" class="footer-text__links_column">
                        <h3 data-v-764efdba=""><span data-v-764efdba="">Free Tools</span></h3>
                        <a data-v-764efdba="" to="/instagram-video-downloader">Instagram Video Downloader</a>
                        <a data-v-764efdba="" to="/the-most-followed-instagram">Instagram Ranking Tool</a>
                    </div>
                    <div data-v-764efdba="" class="footer-text__links_column pc download">
                        <h3 data-v-764efdba=""><span data-v-764efdba="">GetInsta Download</span></h3>
                        <div data-v-764efdba="">
                            <button data-v-c1265c44="" data-v-764efdba="" class="footer">
                                <div data-v-c1265c44="" class="icon"><i data-v-c1265c44=""></i><b
                                            data-v-c1265c44=""></b></div>
                                <div data-v-c1265c44="" class="text">
                                    <p data-v-c1265c44="">Download For</p>
                                    <p data-v-c1265c44="">Windows</p>
                                </div>
                            </button>
                        </div>
                        <div data-v-764efdba="">
                            <button data-v-64218fca="" data-v-764efdba="" class="footer">
                                <div data-v-64218fca="" class="icon"><i data-v-64218fca=""></i><b
                                            data-v-64218fca=""></b></div>
                                <div data-v-64218fca="" class="text">
                                    <p data-v-64218fca="">Download For</p>
                                    <p data-v-64218fca="">Android</p>
                                </div>
                            </button>
                        </div>
                        <div data-v-764efdba="">
                            <button data-v-26f88be8="" data-v-764efdba="" class="footer">
                                <div data-v-26f88be8="" class="icon"><i data-v-26f88be8=""></i><b
                                            data-v-26f88be8=""></b></div>
                                <div data-v-26f88be8="" class="text">
                                    <p data-v-26f88be8="">Download From</p>
                                    <p data-v-26f88be8="">App Store</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
        <!---->
        <div data-v-53f0c892="" class="footer-copyright pc">
            <div data-v-53f0c892="" class="wrapper">
                <div data-v-53f0c892="" class="copyright"><img data-v-53f0c892=""
                                                               src="img/logo.svg" alt="LOGO">
                    <div data-v-53f0c892="" class="text">
                        <h2 data-v-53f0c892="">GetInsta</h2>
                        <p data-v-53f0c892="">Copyright © 2020 easygetinsta.com</p>
                    </div>
                </div>
            </div>
        </div>
        <!---->
        <div id="wrapper-translate">
            <div id="google_translate_element">
                <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                    <div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;"><img
                                src="img/cleardot.gif" class="goog-te-gadget-icon"
                                alt=""
                                style="background-image: url(&quot;https://translate.googleapis.com/translate_staticimg/te_ctrl3.gif&quot;); background-position: -65px 0px;"><span
                                style="vertical-align: middle;"><a aria-haspopup="true" class="goog-te-menu-value"
                                                                   href="javascript:void(0)"><span>选择语言</span><img
                                        src="img/cleardot.gif" alt="" width="1"
                                        height="1"><span style="border-left: 1px solid rgb(187, 187, 187);">​</span><img
                                        src="img/cleardot.gif" alt="" width="1"
                                        height="1"><span aria-hidden="true" style="color: rgb(118, 118, 118);">▼</span></a></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="bottom-cta mobile">
        <div data-v-0e47e2bd="" class="download-cta">
            <div data-v-0e47e2bd="" class="text">Download GetInsta to Get Free Followers &amp; Likes Instantly</div>
            <div data-v-0e47e2bd="" class="btn">
                <button data-v-53814ad1="" data-v-0e47e2bd="" class="bottom-cta"><span
                            data-v-53814ad1="">Download App</span></button>
            </div>
            <!---->
        </div>
    </div>
    <!---->
    <div class="locale-switch">
        <button>EN</button>
        <button>FR</button>
        <button>DE</button>
    </div>
</div>
<div class="model-box-container"></div>
<div class="tip-container"></div>
</body>