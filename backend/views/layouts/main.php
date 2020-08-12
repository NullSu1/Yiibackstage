<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
use izyue\admin\components\MenuHelper;

AppAsset::register($this);

$menuRows = MenuHelper::getAssignedMenu(Yii::$app->user->id);

$route = Yii::$app->controller->getRoute();
$routeArray = explode('/', $route);
array_pop($routeArray);
$controllerName = implode('/', $routeArray);

$this->registerCssFile('@web/statics/css/slidebars.css', ['depends' => 'backend\assets\AppAsset']);
$this->registerCssFile('@web/statics/css/main.css', ['depends' => 'backend\assets\AppAsset']);


function isSubUrl($menuArray, $route)
{

    if (isset($menuArray) && is_array($menuArray)) {

        if (isset($menuArray['items'])) {
            foreach ($menuArray['items'] as $item) {
                if (isSubUrl($item, $route)) {
                    return true;
                }
            }
        } else {
            $url = is_array($menuArray['url']) ? $menuArray['url'][0] : $menuArray['url'];
            if (strpos($url, $route)) {
                return true;
            }
        }
    } else {
        $url = is_array($menuArray['url']) ? $menuArray['url'][0] : $menuArray['url'];
        if (strpos($url, $route)) {
            return true;
        }
    }
    return false;
}

function isSubMenu($menuArray, $controllerName)
{

    if (isset($menuArray) && is_array($menuArray)) {

        if (isset($menuArray['items'])) {
            foreach ($menuArray['items'] as $item) {
                if (isSubMenu($item, $controllerName)) {
                    return true;
                }
            }
        } else {
            $url = is_array($menuArray['url']) ? $menuArray['url'][0] : $menuArray['url'];
            if (strpos($url, $controllerName . '/')) {
                return true;
            }
        }
    } else {
        $url = is_array($menuArray['url']) ? $menuArray['url'][0] : $menuArray['url'];
        if (strpos($url, $controllerName . '/')) {
            return true;
        }
    }
    return false;
}

function initMenu($menuArray, $controllerName, $isSubUrl, $isShowIcon = false)
{
    if (isset($menuArray) && is_array($menuArray)) {

        $url = is_array($menuArray['url']) ? $menuArray['url'][0] : $menuArray['url'];

        if (empty($isSubUrl)) {
            $isSubMenu = isSubMenu($menuArray, $controllerName);
        } else {
            $route = Yii::$app->controller->getRoute();
            $isSubMenu = isSubUrl($menuArray, $route);
        }
        if ($isSubMenu) {
            $class = ' active ';
        } else {
            $class = '';
        }
        if (isset($menuArray['items'])) {
            echo '<li class="sub-menu">';
        } else {
            echo '<li class="' . $class . '">';
        }
        $url = $url == '#' ? 'javascript:;' : Url::toRoute($url);
        echo '<a href="' . $url . '"  class="' . $class . '">' . ($isShowIcon ? '<i class="fa fa-sitemap"></i>' : '') . '<span>' . $menuArray['label'] . '</span></a>';

        if (isset($menuArray['items'])) {
            echo '<ul class="sub">';
            foreach ($menuArray['items'] as $item) {
                echo initMenu($item, $controllerName, $isSubUrl);
            }
            echo '</ul>';
        }
        echo '</li>';
    }
}

?>

<?php $this->beginPage() ?>
<?php if (Yii::$app->controller->action->id == 'preview') : ?>
<!DOCTYPE html>
<!-- saved from url=(0029)http://localhost:8080/blog/-2 -->
<html lang="en" class=" " style="height: 100%;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <!--[if IE]>
    <link rel="icon" href="/favicon.ico"><![endif]-->
    <title>Fix iOS 9 Battery Life Issues On iPhone And iPad</title>
    <meta name="theme-color" content="#7C56FF">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="GetInsta">
    <meta name="msapplication-TileImage" content="img/icons/msapplication-icon-144x144.png">
    <meta name="msapplication-TileColor" content="#000000">
    <style>
        .vue-go-top[data-v-0c20a6ee] {
            overflow: hidden;
            position: fixed;
            cursor: pointer;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-size: 70% auto;
            white-space: nowrap;
            text-indent: 100%
        }

        .vue-go-top__content[data-v-0c20a6ee] {
            position: relative;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%
        }

        .vue-go-top__ripple[data-v-0c20a6ee] {
            position: absolute;
            border-radius: 50%;
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0;
            pointer-events: none
        }

        .vue-go-top__ripple[is-active][data-v-0c20a6ee] {
            -webkit-animation: vue-go-top-ripple-animation-data-v-0c20a6ee .75s ease-out;
            animation: vue-go-top-ripple-animation-data-v-0c20a6ee .75s ease-out
        }

        .vue-go-top__icon[data-v-0c20a6ee] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%
        }

        .vue-go-top__image[data-v-0c20a6ee] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover
        }

        .vue-go-top-enter-active[data-v-0c20a6ee],
        .vue-go-top-leave-active[data-v-0c20a6ee] {
            -webkit-transition: opacity .3s, -webkit-transform .3s;
            transition: opacity .3s, -webkit-transform .3s;
            transition: opacity .3s, transform .3s;
            transition: opacity .3s, transform .3s, -webkit-transform .3s
        }

        .vue-go-top-enter[data-v-0c20a6ee],
        .vue-go-top-leave-to[data-v-0c20a6ee] {
            opacity: 0;
            -webkit-transform: translateY(50px);
            transform: translateY(50px)
        }

        @-webkit-keyframes vue-go-top-ripple-animation-data-v-0c20a6ee {
            from {
                opacity: 1
            }

            to {
                -webkit-transform: scale(2);
                transform: scale(2);
                opacity: 0
            }
        }

        @keyframes vue-go-top-ripple-animation-data-v-0c20a6ee {
            from {
                opacity: 1
            }

            to {
                -webkit-transform: scale(2);
                transform: scale(2);
                opacity: 0
            }
        }
    </style>
    <style type="text/css">
        button[data-v-53814ad1] {
            padding: 0 6%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: #FF9C39;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 64px;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        button span[data-v-53814ad1] {
            color: #ffffff;
            font-weight: 600;
            font-size: 24px;
            word-break: break-word;
        }

        button.icon-android[data-v-53814ad1],
        button.icon-ios[data-v-53814ad1],
        button.icon-windows[data-v-53814ad1] {
            -webkit-box-shadow: 0 12px 24px #A528003D;
            box-shadow: 0 12px 24px #A528003D;
        }

        button.icon-android[data-v-53814ad1]:before,
        button.icon-ios[data-v-53814ad1]:before,
        button.icon-windows[data-v-53814ad1]:before {
            display: inline-block;
        }

        button[data-v-53814ad1]:before {
            margin-right: 4%;
            display: none;
            width: 10.4%;
            height: 36px;
            background: url(img/icon__android_logo.svg) no-repeat center;
            background-size: contain;
            content: "";
        }

        button.icon-android[data-v-53814ad1]:before {
            background-image: url(img/icon__android_logo.svg);
        }

        button.icon-ios[data-v-53814ad1]:before {
            background-image: url(img/icon__btn-download_logo_apple_white.svg);
        }

        button.icon-windows[data-v-53814ad1]:before {
            background-image: url(img/icon__btn-download_logo_windows.svg);
        }

        button[data-v-53814ad1]:hover {
            background-color: rgba(255, 156, 57, 0.8);
        }

        button.header-small span[data-v-53814ad1] {
            font-size: 16px;
        }

        button.size-16 span[data-v-53814ad1] {
            font-size: 16px;
        }

        button.size-20 span[data-v-53814ad1] {
            font-size: 20px;
        }

        button.square[data-v-53814ad1] {
            border-radius: 5px;
        }

        button.theme-blue[data-v-53814ad1] {
            background-color: #005FFF;
        }

        button.theme-blue[data-v-53814ad1]:hover {
            background-color: #2070F6;
        }

        button.shadow[data-v-53814ad1] {
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
        }

        @media (max-width: 768px) {
            button[data-v-53814ad1] {
                -webkit-transition: all 0.1s;
                transition: all 0.1s;
            }

            button span[data-v-53814ad1] {
                font-size: 14px;
            }

            button[data-v-53814ad1]:before {
                height: 32px;
            }

            button[data-v-53814ad1]:hover {
                background-color: #FF9C39;
            }

            button:hover.theme-blue[data-v-53814ad1] {
                background-color: #005FFF;
            }

            button[data-v-53814ad1]:active {
                background-color: rgba(255, 156, 57, 0.8);
            }

            button:active.theme-blue[data-v-53814ad1] {
                background-color: #2070F6;
            }

            button.header-small span[data-v-53814ad1] {
                font-size: 14px;
            }

            button.size-16 span[data-v-53814ad1] {
                font-size: 14px;
            }

            button.size-20 span[data-v-53814ad1] {
                font-size: 16px;
            }

            button.bottom-cta span[data-v-53814ad1] {
                font-size: 12px;
            }

            button.icon-android[data-v-53814ad1],
            button.icon-ios[data-v-53814ad1],
            button.icon-windows[data-v-53814ad1] {
                -webkit-box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.16);
                box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.16);
            }
        }
    </style>
    <style type="text/css">
        .download-cta[data-v-0e47e2bd] {
            position: fixed;
            bottom: 0;
            left: 0;
            /*z-index: 2000000;*/
            z-index: 9;
            padding: 16px 30px;
            width: 100%;
            background: rgba(255, 255, 255, 0.8);
            -webkit-backdrop-filter: saturate(180%) blur(30px);
            backdrop-filter: saturate(180%) blur(30px);
            -webkit-box-shadow: 0 1.5px 12px rgba(0, 0, 0, 0.16);
            box-shadow: 0 1.5px 12px rgba(0, 0, 0, 0.16);
            font-size: 0;
        }

        @media (max-width: 768px) {
            .download-cta[data-v-0e47e2bd] {
                padding: 8px 4vw;
                padding-bottom: env(safe-area-inset-bottom);
                padding-bottom: max(8px, env(safe-area-inset-bottom));
            }

            .download-cta .text[data-v-0e47e2bd],
            .download-cta .btn[data-v-0e47e2bd] {
                display: inline-block;
                vertical-align: middle;
            }

            .download-cta .text[data-v-0e47e2bd] {
                padding-right: 4vw;
                width: 58vw;
                font: 500 12px/15px Montserrat;
                color: #A8A8A8;
                text-shadow: 0 3px 24px rgba(0, 0, 0, 0.16);
            }

            .download-cta .btn[data-v-0e47e2bd] {
                width: 34vw;
                height: 40px;
            }
        }
    </style>
    <style type="text/css">
        button[data-v-316f8e5c] {
            position: relative;
            padding: 0 4%;
            width: 100%;
            height: 100%;
            background-color: #7c56ff;
            border-radius: 64px;
            cursor: pointer;
            font-size: 0;
            color: #ffffff;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        button span[data-v-316f8e5c] {
            display: inline-block;
            font-weight: 600;
            font-size: 24px;
            word-break: break-word;
            vertical-align: middle;
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button[data-v-316f8e5c]:hover {
            background-color: #005FFF;
        }

        button[data-v-316f8e5c]:after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 100%;
            height: 100%;
            background: url(img/loading-puff-white.svg) no-repeat center;
            background-size: contain;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            opacity: 0;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button[data-v-316f8e5c]:before {
            margin-right: 24px;
            content: "";
            display: none;
            width: 25px;
            height: 30px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            vertical-align: middle;
        }

        button.shadow[data-v-316f8e5c] {
            -webkit-box-shadow: 0 12px 24px rgba(32, 0, 164, 0.24);
            box-shadow: 0 12px 24px rgba(32, 0, 164, 0.24);
        }

        button.square[data-v-316f8e5c] {
            border-radius: 6px !important;
        }

        button.square-big[data-v-316f8e5c] {
            border-radius: 6px !important;
        }

        button.sharp[data-v-316f8e5c] {
            border-radius: 0 !important;
        }

        button.header-small span[data-v-316f8e5c] {
            font-size: 16px;
        }

        button.size-20 span[data-v-316f8e5c] {
            font-size: 20px;
        }

        button.size-14 span[data-v-316f8e5c] {
            font-size: 14px;
        }

        button.size-16 span[data-v-316f8e5c] {
            font-size: 16px;
        }

        button.icon-android[data-v-316f8e5c]:before,
        button.icon-windows[data-v-316f8e5c]:before,
        button.icon-ios[data-v-316f8e5c]:before {
            display: inline-block;
        }

        button.icon-ios[data-v-316f8e5c]:before {
            background-image: url(img/icon__btn-download_logo_apple_white.svg);
        }

        button.icon-android[data-v-316f8e5c]:before {
            background-image: url(img/icon__btn-download_logo_android_white.svg);
        }

        button.icon-windows[data-v-316f8e5c]:before {
            background-image: url(img/icon__btn-download_logo_windows.svg);
        }

        button.loading[data-v-316f8e5c] {
            cursor: default;
        }

        button.loading[data-v-316f8e5c]:hover {
            background-color: #7c56ff;
        }

        button.loading[data-v-316f8e5c]:after {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
        }

        button.loading span[data-v-316f8e5c] {
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
            opacity: 0;
        }

        @media (max-width: 768px) {
            button[data-v-316f8e5c] {
                -webkit-transition: all 0.1s;
                transition: all 0.1s;
            }

            button span[data-v-316f8e5c] {
                font-size: 14px;
            }

            button[data-v-316f8e5c]:hover {
                background-color: #7c56ff;
            }

            button[data-v-316f8e5c]:active {
                background-color: #005FFF;
            }

            button[data-v-316f8e5c]:before {
                margin-right: 6%;
                width: 24px;
                height: 28px;
            }

            button.square[data-v-316f8e5c] {
                border-radius: 5px;
            }

            button.header-small span[data-v-316f8e5c] {
                font-size: 8px;
            }

            button.size-20 span[data-v-316f8e5c] {
                font-size: 14px;
            }

            button.size-16 span[data-v-316f8e5c] {
                font-size: 14px;
            }

            button.shadow[data-v-316f8e5c] {
                -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            }
        }
    </style>
    <style type="text/css">
        button[data-v-7fabcf39] {
            position: relative;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: transparent;
            border-radius: 60px;
            cursor: pointer;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        button span[data-v-7fabcf39] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0 6%;
            width: 100%;
            height: 100%;
            border: 2px solid #2A2A2A;
            border-radius: 60px;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button span i[data-v-7fabcf39] {
            position: relative;
            z-index: 1;
            font-size: 24px;
            font-weight: 600;
            font-style: normal;
            color: #2A2A2A;
        }

        button[data-v-7fabcf39]:hover {
            background-color: #005FFF;
        }

        button:hover span[data-v-7fabcf39] {
            border-color: #005FFF;
        }

        button:hover span i[data-v-7fabcf39] {
            color: #fff;
        }

        button.white span[data-v-7fabcf39] {
            border-color: #fff;
        }

        button.white span i[data-v-7fabcf39] {
            color: #fff;
        }

        button.sidebar-small span i[data-v-7fabcf39] {
            font-size: 16px;
        }

        button.header-small span i[data-v-7fabcf39] {
            font-size: 16px;
        }

        @media (max-width: 768px) {
            button[data-v-7fabcf39] {
                -webkit-transition: all 0.1s;
                transition: all 0.1s;
            }

            button span[data-v-7fabcf39] {
                border-width: 1.5px;
                -webkit-transition: all 0.1s;
                transition: all 0.1s;
            }

            button span i[data-v-7fabcf39] {
                font-size: 16px;
            }

            button[data-v-7fabcf39]:hover {
                background-color: transparent;
            }

            button:hover span[data-v-7fabcf39] {
                border-color: #2A2A2A;
            }

            button:hover span i[data-v-7fabcf39] {
                color: #2A2A2A;
            }

            button:hover.white span[data-v-7fabcf39] {
                border-color: #fff;
            }

            button:hover.white span i[data-v-7fabcf39] {
                color: #fff;
            }

            button[data-v-7fabcf39]:active,
            button.white[data-v-7fabcf39]:active {
                background-color: #005FFF;
            }

            button:active span[data-v-7fabcf39],
            button.white:active span[data-v-7fabcf39] {
                border-color: #005FFF;
            }

            button:active span i[data-v-7fabcf39],
            button.white:active span i[data-v-7fabcf39] {
                color: #fff;
            }

            button.sidebar-small span i[data-v-7fabcf39] {
                font-size: 14px;
            }

            button.header-small span i[data-v-7fabcf39] {
                font-size: 11px;
            }
        }
    </style>
    <style type="text/css">
        button[data-v-7abd6dc4] {
            position: relative;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: transparent;
            border-radius: 43px;
            cursor: pointer;
            overflow: hidden;
        }

        button span[data-v-7abd6dc4] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0 6%;
            width: 100%;
            height: 100%;
            border: 3px solid #005FFF;
            border-radius: 43px;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button span i[data-v-7abd6dc4] {
            position: relative;
            z-index: 1;
            font-size: 20px;
            font-weight: 600;
            font-style: normal;
            color: #005FFF;
        }

        button:hover span[data-v-7abd6dc4] {
            border-color: #005FFF !important;
            background-color: #005FFF;
        }

        button:hover span i[data-v-7abd6dc4] {
            color: #fff;
        }

        button.white span[data-v-7abd6dc4] {
            border-color: #fff;
        }

        button.white span i[data-v-7abd6dc4] {
            color: #fff;
        }

        button.sidebar-small span i[data-v-7abd6dc4] {
            font-size: 16px;
        }

        button.header-small span i[data-v-7abd6dc4] {
            font-size: 16px;
        }

        @media (max-width: 768px) {
            button span[data-v-7abd6dc4] {
                border-width: 1.5px;
            }

            button.sidebar-small span i[data-v-7abd6dc4] {
                font-size: 14px;
            }

            button.header-small span i[data-v-7abd6dc4] {
                font-size: 11px;
            }
        }
    </style>
    <style type="text/css">
        button[data-v-4a026ef3],
        .button[data-v-4a026ef3] {
            position: relative;
            z-index: 2;
            padding: 0 1%;
            display: inline-block;
            min-width: 240px;
            height: 80px;
            font-size: 0;
            background-color: #fff;
            border: 2px solid #A8A8A8;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon[data-v-4a026ef3],
        .button .icon[data-v-4a026ef3] {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 40px;
            vertical-align: middle;
            overflow: hidden;
        }

        button .icon i[data-v-4a026ef3],
        button .icon b[data-v-4a026ef3],
        .button .icon i[data-v-4a026ef3],
        .button .icon b[data-v-4a026ef3] {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            display: inline-block;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon i[data-v-4a026ef3],
        .button .icon i[data-v-4a026ef3] {
            width: 100%;
            height: 100%;
        }

        button .icon b[data-v-4a026ef3],
        .button .icon b[data-v-4a026ef3] {
            width: 100%;
            height: 88%;
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            background-image: url(img/icon__btn-download_dl_black.svg);
        }

        button .text[data-v-4a026ef3],
        .button .text[data-v-4a026ef3] {
            margin-left: 10%;
            display: inline-block;
            min-width: 126px;
            vertical-align: middle;
            text-align: left;
            color: #2A2A2A;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .text p[data-v-4a026ef3],
        .button .text p[data-v-4a026ef3] {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font: 700 24px Montserrat;
        }

        button .text p.single[data-v-4a026ef3],
        .button .text p.single[data-v-4a026ef3] {
            display: none;
        }

        button .text p[data-v-4a026ef3]:first-child,
        .button .text p[data-v-4a026ef3]:first-child {
            font: 600 12px Montserrat;
        }

        button.ios .icon i[data-v-4a026ef3],
        .button.ios .icon i[data-v-4a026ef3] {
            background-image: url(img/icon__btn-download_logo_apple.svg);
        }

        button.android .icon i[data-v-4a026ef3],
        .button.android .icon i[data-v-4a026ef3] {
            background-image: url(img/icon__btn-download_logo_android.svg);
        }

        button[data-v-4a026ef3]:hover,
        button[data-v-4a026ef3]:active,
        .button[data-v-4a026ef3]:hover,
        .button[data-v-4a026ef3]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button:hover i[data-v-4a026ef3],
        button:active i[data-v-4a026ef3],
        .button:hover i[data-v-4a026ef3],
        .button:active i[data-v-4a026ef3] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button:hover b[data-v-4a026ef3],
        button:active b[data-v-4a026ef3],
        .button:hover b[data-v-4a026ef3],
        .button:active b[data-v-4a026ef3] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.footer[data-v-4a026ef3],
        .button.footer[data-v-4a026ef3] {
            min-width: 200px;
            height: 50px;
            background-color: transparent;
        }

        button.footer[data-v-4a026ef3]:hover,
        button.footer[data-v-4a026ef3]:active,
        .button.footer[data-v-4a026ef3]:hover,
        .button.footer[data-v-4a026ef3]:active {
            background-color: #DDD;
            border-color: #DDD;
        }

        button.footer .icon[data-v-4a026ef3],
        .button.footer .icon[data-v-4a026ef3] {
            width: 25px;
            height: 30px;
        }

        button.footer .icon b[data-v-4a026ef3],
        .button.footer .icon b[data-v-4a026ef3] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.footer .text[data-v-4a026ef3],
        .button.footer .text[data-v-4a026ef3] {
            min-width: 105px;
        }

        button.footer .text p[data-v-4a026ef3]:last-child,
        .button.footer .text p[data-v-4a026ef3]:last-child {
            font: 700 20px/20px Montserrat;
        }

        button.footer:hover i[data-v-4a026ef3],
        button.footer:active i[data-v-4a026ef3],
        .button.footer:hover i[data-v-4a026ef3],
        .button.footer:active i[data-v-4a026ef3] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.footer:hover b[data-v-4a026ef3],
        button.footer:active b[data-v-4a026ef3],
        .button.footer:hover b[data-v-4a026ef3],
        .button.footer:active b[data-v-4a026ef3] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.header[data-v-4a026ef3],
        .button.header[data-v-4a026ef3] {
            padding: 0 10px;
            min-width: 175px;
            height: 52px;
        }

        button.header .icon[data-v-4a026ef3],
        .button.header .icon[data-v-4a026ef3] {
            width: 25px;
            height: 30px;
        }

        button.header .icon b[data-v-4a026ef3],
        .button.header .icon b[data-v-4a026ef3] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.header .text[data-v-4a026ef3],
        .button.header .text[data-v-4a026ef3] {
            margin-left: 22px;
            min-width: 86px;
        }

        button.header .text p[data-v-4a026ef3],
        .button.header .text p[data-v-4a026ef3] {
            display: none;
        }

        button.header .text p.single[data-v-4a026ef3],
        .button.header .text p.single[data-v-4a026ef3] {
            display: inline-block;
            font: 600 16px Montserrat;
        }

        button.header[data-v-4a026ef3]:hover,
        button.header[data-v-4a026ef3]:active,
        .button.header[data-v-4a026ef3]:hover,
        .button.header[data-v-4a026ef3]:active {
            background-color: #FFA850;
            border-color: #FFA850;
        }

        button.header:hover i[data-v-4a026ef3],
        button.header:active i[data-v-4a026ef3],
        .button.header:hover i[data-v-4a026ef3],
        .button.header:active i[data-v-4a026ef3] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.header:hover b[data-v-4a026ef3],
        button.header:active b[data-v-4a026ef3],
        .button.header:hover b[data-v-4a026ef3],
        .button.header:active b[data-v-4a026ef3] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.transparent[data-v-4a026ef3],
        .button.transparent[data-v-4a026ef3] {
            background-color: transparent;
            border-color: #fff;
        }

        button.transparent .text[data-v-4a026ef3],
        .button.transparent .text[data-v-4a026ef3] {
            color: #fff;
        }

        button.transparent[data-v-4a026ef3]:hover,
        button.transparent[data-v-4a026ef3]:active,
        .button.transparent[data-v-4a026ef3]:hover,
        .button.transparent[data-v-4a026ef3]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button.transparent:hover .text[data-v-4a026ef3],
        button.transparent:active .text[data-v-4a026ef3],
        .button.transparent:hover .text[data-v-4a026ef3],
        .button.transparent:active .text[data-v-4a026ef3] {
            color: #2A2A2A;
        }

        button.transparent:hover i[data-v-4a026ef3],
        button.transparent:active i[data-v-4a026ef3],
        .button.transparent:hover i[data-v-4a026ef3],
        .button.transparent:active i[data-v-4a026ef3] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button.transparent:hover b[data-v-4a026ef3],
        button.transparent:active b[data-v-4a026ef3],
        .button.transparent:hover b[data-v-4a026ef3],
        .button.transparent:active b[data-v-4a026ef3] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            button[data-v-4a026ef3] {
                padding: 0 20px;
                min-width: 211px;
                height: 56px;
                border-width: 1px;
                border-radius: 4px;
            }

            button .icon[data-v-4a026ef3] {
                width: 24px;
                height: 28px;
            }

            button .icon b[data-v-4a026ef3] {
                width: 20px;
                height: 28px;
            }

            button .text[data-v-4a026ef3] {
                margin-left: 24px;
                min-width: 120px;
            }

            button .text p[data-v-4a026ef3] {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            button .text p[data-v-4a026ef3]:first-child {
                font: 600 10px Montserrat;
            }

            button .text p[data-v-4a026ef3]:last-child {
                font: 700 22px/22px Montserrat;
            }
        }
    </style>
    <style type="text/css">
        button[data-v-4a026ef3] {
            background-color: #FF9C39;
            border: none;
        }

        button .icon i[data-v-4a026ef3] {
            background-image: url(img/icon__btn-download_logo_windows.svg);
        }

        button .icon b[data-v-4a026ef3] {
            background-image: url(img/icon__btn-download_dl_white.svg);
        }

        button .text[data-v-4a026ef3] {
            color: #FFFFFF;
        }

        button[data-v-4a026ef3]:hover {
            background-color: #FFA850;
        }
    </style>
    <style type="text/css">
        .header-nav__navigator[data-v-412f1e5a] {
            width: 100%;
            height: 80px;
            background-color: rgba(255, 255, 255, 0.9);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
            -webkit-transition: all 0.6s;
            transition: all 0.6s;
        }

        .header-nav__navigator .wrapper[data-v-412f1e5a] {
            height: 100%;
        }

        .header-nav__navigator .wrapper[data-v-412f1e5a]:before,
        .header-nav__navigator .wrapper[data-v-412f1e5a]:after {
            content: "";
            display: table;
        }

        .header-nav__navigator .wrapper[data-v-412f1e5a]:after {
            clear: both;
        }

        .header-nav__navigator.home[data-v-412f1e5a] {
            background-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .header-nav__navigator.home .header-nav__logo span[data-v-412f1e5a] {
            color: #ffffff;
        }

        .header-nav__navigator.home .header-nav__menu a.header-nav__menu_links[data-v-412f1e5a] {
            color: #fff;
        }

        .header-nav__navigator.home .header-nav__menu a.header-nav__menu_links[data-v-412f1e5a]:after {
            background-color: #fff;
        }

        .header-nav__navigator.home .header-nav__menu i.cart[data-v-412f1e5a] {
            background-image: url(img/icon__cart_white.svg);
        }

        .header-nav__navigator .header-nav__wrapper[data-v-412f1e5a] {
            height: 100%;
        }

        .header-nav__navigator .header-nav__logo[data-v-412f1e5a] {
            float: left;
            height: 100%;
        }

        .header-nav__navigator .header-nav__logo a[data-v-412f1e5a] {
            display: inline-block;
            height: 100%;
        }

        .header-nav__navigator .header-nav__logo i[data-v-412f1e5a] {
            margin-right: 16px;
            display: inline-block;
            width: 32px;
            height: 100%;
            background-image: url(img/logo-with-border.svg);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            vertical-align: top;
        }

        .header-nav__navigator .header-nav__logo span[data-v-412f1e5a] {
            font: 800 italic 28px/80px Montserrat;
            color: #005FFF;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .header-nav__navigator .header-nav__menu[data-v-412f1e5a] {
            float: right;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 100%;
        }

        .header-nav__navigator .header-nav__menu a[data-v-412f1e5a] {
            margin-left: 48px;
            display: inline-block;
        }

        .header-nav__navigator .header-nav__menu a.header-nav__menu_links[data-v-412f1e5a] {
            position: relative;
            font: 600 16px Montserrat;
            color: #2128BD;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .header-nav__navigator .header-nav__menu a.header-nav__menu_links[data-v-412f1e5a]:after {
            position: absolute;
            bottom: -4px;
            left: 0;
            display: inline-block;
            width: 100%;
            height: 4px;
            background-color: #2128BD;
            content: "";
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transform-origin: left center;
            transform-origin: left center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .header-nav__navigator .header-nav__menu a.header-nav__menu_links[data-v-412f1e5a]:hover:after {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
        }

        .header-nav__navigator .header-nav__menu .header-nav__btn-container[data-v-412f1e5a] {
            width: 100px;
            height: 40px;
        }

        .header-nav__navigator .header-nav__menu .header-nav__btn-container.pt[data-v-412f1e5a] {
            width: 162px;
            height: 40px;
        }

        .header-nav__navigator .header-nav__menu .header-nav__btn-container.minor-lang[data-v-412f1e5a] {
            width: 214px;
        }

        .header-nav__navigator .header-nav__menu .header-nav_menu_user[data-v-412f1e5a] {
            margin-left: 48px;
            width: 48px;
            height: 48px;
            cursor: pointer;
        }

        .header-nav__navigator .header-nav__menu .header-nav_menu_user .avatar-container[data-v-412f1e5a] {
            margin-left: 0;
            width: 100%;
            height: 100%;
        }

        .header-nav__navigator .header-nav__menu .header-nav_menu_user .avatar[data-v-412f1e5a] {
            height: 100%;
            border: 3px solid #fff;
            -webkit-box-shadow: 0 0 6px #00000029;
            box-shadow: 0 0 6px #00000029;
            border-radius: 50%;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .header-nav__navigator .header-nav__menu .header-nav_menu_user .avatar img[data-v-412f1e5a] {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .header-nav__navigator .header-nav__menu .header-nav_menu_user .avatar[data-v-412f1e5a]:hover {
            border-color: #005fff;
        }

        .header-nav__navigator .header-nav__btn[data-v-412f1e5a] {
            position: absolute;
            z-index: 100;
            left: 0;
            top: 0;
            height: 100%;
        }

        .header-nav__navigator .header-nav__btn i[data-v-412f1e5a] {
            display: block;
            width: 106px;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center;
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .header-nav__navigator .header-nav__btn i.open[data-v-412f1e5a] {
            background-image: url(img/icon_menu_open.svg);
            background-size: 36px 12px;
        }

        .header-nav__navigator .header-nav__btn i.back[data-v-412f1e5a] {
            background-image: url(img/icon_menu_back.svg);
            background-size: 24px 24px;
        }

        .header-nav__navigator .header-nav__btn i.home[data-v-412f1e5a] {
            background-image: url(img/icon_menu_home.svg);
            background-size: 28px 24px;
        }

        .header-nav__navigator .header-nav__logged[data-v-412f1e5a] {
            position: relative;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_logo[data-v-412f1e5a] {
            width: 100%;
            height: 100%;
            text-align: center;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_logo a[data-v-412f1e5a],
        .header-nav__navigator .header-nav__logged .header-nav__logged_logo span[data-v-412f1e5a] {
            font: 900 italic 28px/80px Montserrat;
            color: #005FFF;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user[data-v-412f1e5a] {
            position: absolute;
            z-index: 100;
            top: 0;
            right: 32px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 100%;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user .header-nav__logged_user_container[data-v-412f1e5a] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user i.download[data-v-412f1e5a] {
            margin-right: 30px;
            display: inline-block;
            width: 158px;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user span[data-v-412f1e5a] {
            margin: 0 4px;
            font: 600 16px/19px Montserrat;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user span.username[data-v-412f1e5a] {
            color: #2A2A2A;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user span.coins[data-v-412f1e5a] {
            font: 600 16px/19px Montserrat;
            color: #FF6F00;
            /*cursor: pointer;*/
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user i.coin-icon[data-v-412f1e5a] {
            margin-left: 8px;
            display: inline-block;
            width: 32px;
            height: 32px;
            background: url(img/icon_coin.svg) no-repeat center;
            background-size: contain;
            vertical-align: middle;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user .avatar-container .avatar[data-v-412f1e5a] {
            width: 48px;
            height: 48px;
            border: 3px solid #fff;
            -webkit-box-shadow: 0 0 6px rgba(0, 0, 0, 0.16);
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.16);
            border-radius: 50%;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user .avatar-container .avatar[data-v-412f1e5a]:hover {
            border-color: #005fff;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user .avatar-container .avatar img[data-v-412f1e5a] {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user .btn-container[data-v-412f1e5a] {
            display: inline-block;
            height: 40px;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user .btn-container.white-0[data-v-412f1e5a] {
            width: 120px;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user .btn-container.white-1[data-v-412f1e5a] {
            width: 86px;
        }

        .header-nav__navigator .header-nav__logged .header-nav__logged_user a.cart[data-v-412f1e5a] {
            margin-left: 18px;
            margin-right: 24px;
        }

        .header-nav__navigator .header-nav__logged_content_mask[data-v-412f1e5a] {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 199;
            width: 100%;
            height: 100%;
        }

        .header-nav__navigator .header-nav__logged_content[data-v-412f1e5a] {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 200;
            width: 300px;
            background-color: #fff;
            -webkit-box-shadow: 3px 0 10px #0000001A;
            box-shadow: 3px 0 10px #0000001A;
        }

        .header-nav__navigator .header-nav__logged_content i.close[data-v-412f1e5a] {
            display: block;
            width: 106px;
            height: 84px;
            background: url(img/icon_menu_close.svg) no-repeat center;
            background-size: 28px 28px;
            cursor: pointer;
        }

        .header-nav__navigator .header-nav__logged_content a.header-nav__logged_content_link[data-v-412f1e5a] {
            margin-top: 20px;
            display: block;
            width: 100%;
            height: 60px;
            background-color: transparent;
            font: 500 16px/60px Montserrat;
            color: #2A2A2A;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .header-nav__navigator .header-nav__logged_content a.header-nav__logged_content_link[data-v-412f1e5a]:hover {
            background-color: #005FFF;
            color: #fff;
        }

        .header-nav__navigator .header-nav__logged_content .avatar[data-v-412f1e5a] {
            margin: 0 auto;
            width: 84px;
            height: 84px;
            padding: 1px;
            border: 1px solid #00000029;
            border-radius: 50%;
        }

        .header-nav__navigator .header-nav__logged_content .avatar img[data-v-412f1e5a] {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .header-nav__navigator .header-nav__logged_content .btn[data-v-412f1e5a] {
            margin-top: 65px;
        }

        .header-nav__navigator .header-nav__logged_content .btn .btn-container[data-v-412f1e5a] {
            width: 100%;
            height: 50px;
        }

        .header-nav__navigator .header-nav__logged_content .btn .btn-container.single[data-v-412f1e5a] {
            padding: 0 14%;
        }

        .header-nav__navigator .header-nav__logged_content .btn .btn-container.double[data-v-412f1e5a] {
            padding: 0 4%;
        }

        .header-nav__navigator .header-nav__logged_content .btn .btn-container a[data-v-412f1e5a] {
            display: inline-block;
            width: 100%;
            height: 100%;
        }

        .header-nav__navigator .header-nav__logged_content .btn .btn-container .btn-logged[data-v-412f1e5a] {
            margin-top: 32px;
            width: 100%;
            height: 100%;
        }

        .header-nav__navigator a.cart[data-v-412f1e5a] {
            display: inline-block;
        }

        .header-nav__navigator a.cart i.cart[data-v-412f1e5a] {
            display: inline-block;
            width: 28px;
            height: 28px;
            background: url(img/icon__cart_black.svg) no-repeat center;
            background-size: contain;
            -webkit-transition: opacity 0.3s;
            transition: opacity 0.3s;
        }

        .header-nav__navigator a.cart i.cart[data-v-412f1e5a]:hover {
            opacity: 0.7;
        }

        .header-nav__navigator a.cart i.cart[data-v-412f1e5a]:active {
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }

        @media (max-width: 768px) {
            .header-nav__navigator[data-v-412f1e5a] {
                height: 44px;
            }

            .header-nav__navigator.home[data-v-412f1e5a] {
                background-color: rgba(255, 255, 255, 0.13);
                -webkit-backdrop-filter: blur(3px);
                backdrop-filter: blur(3px);
            }

            .header-nav__navigator.home .header-nav__btn i.open[data-v-412f1e5a] {
                -webkit-filter: brightness(100);
                filter: brightness(100);
            }

            .header-nav__navigator .header-nav__logo[data-v-412f1e5a] {
                float: none;
                width: 100%;
                text-align: center;
            }

            .header-nav__navigator .header-nav__logo i[data-v-412f1e5a] {
                display: none;
            }

            .header-nav__navigator .header-nav__logo span[data-v-412f1e5a] {
                color: #2A2A2A;
                line-height: 44px;
                font-size: 16px;
            }

            .header-nav__navigator .header-nav__menu[data-v-412f1e5a] {
                position: absolute;
                top: 0;
                right: 15px;
            }

            .header-nav__navigator .header-nav__menu .header-nav__btn-container[data-v-412f1e5a] {
                margin-left: 0;
                width: 63px;
                height: 28px;
            }

            .header-nav__navigator .header-nav__menu .header-nav__btn-container.pt[data-v-412f1e5a] {
                width: 81px;
                height: 28px;
            }

            .header-nav__navigator .header-nav__menu .header-nav_menu_user[data-v-412f1e5a] {
                margin-left: 0;
                width: 28px;
                height: 28px;
            }

            .header-nav__navigator .header-nav__menu .header-nav_menu_user .avatar-container[data-v-412f1e5a] {
                margin-left: 0;
                width: 100%;
                height: 100%;
            }

            .header-nav__navigator .header-nav__menu .header-nav_menu_user .avatar[data-v-412f1e5a] {
                border-width: 1.5px;
            }

            .header-nav__navigator .header-nav__btn i[data-v-412f1e5a] {
                width: 53px;
                height: 100%;
            }

            .header-nav__navigator .header-nav__btn i.open[data-v-412f1e5a] {
                background-size: 18px 6px;
            }

            .header-nav__navigator .header-nav__btn i.back[data-v-412f1e5a] {
                background-size: 14px 15px;
            }

            .header-nav__navigator .header-nav__btn i.home[data-v-412f1e5a] {
                background-size: 16px 16px;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_logo a[data-v-412f1e5a],
            .header-nav__navigator .header-nav__logged .header-nav__logged_logo span[data-v-412f1e5a] {
                font-size: 16px;
                line-height: 44px;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_user[data-v-412f1e5a] {
                right: 15px;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_user .btn[data-v-412f1e5a] {
                width: 63px;
                height: 28px;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_user .avatar[data-v-412f1e5a] {
                width: 28px;
                height: 28px;
                border: 1.5px solid #fff;
                border-radius: 50%;
                -webkit-box-shadow: 0 0 6px #00000029;
                box-shadow: 0 0 6px #00000029;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_user .avatar img[data-v-412f1e5a] {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                -o-object-fit: cover;
                object-fit: cover;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_user .btn-container[data-v-412f1e5a] {
                height: 28px;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_user .btn-container.white-0[data-v-412f1e5a] {
                width: 90px;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_user .btn-container.white-1[data-v-412f1e5a] {
                width: 50px;
            }

            .header-nav__navigator .header-nav__logged .header-nav__logged_user a.cart[data-v-412f1e5a] {
                margin-left: 0;
                margin-right: 16px;
            }

            .header-nav__navigator .header-nav__logged_content[data-v-412f1e5a] {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                padding: 44px 0 96px;
                width: 100%;
            }

            .header-nav__navigator .header-nav__logged_content i.close[data-v-412f1e5a] {
                position: absolute;
                left: 0;
                top: 0;
                width: 53px;
                height: 42px;
                background-size: 14px 14px;
            }

            .header-nav__navigator .header-nav__logged_content a.header-nav__logged_content_link[data-v-412f1e5a] {
                margin-top: 10px;
                height: 56px;
                font: 500 16px/56px Montserrat;
            }

            .header-nav__navigator .header-nav__logged_content .avatar[data-v-412f1e5a] {
                margin-bottom: 20px;
                width: 74px;
                height: 74px;
            }

            .header-nav__navigator .header-nav__logged_content .btn[data-v-412f1e5a] {
                margin-top: 0;
                position: absolute;
                bottom: 39px;
                left: 0;
                width: 100%;
            }

            .header-nav__navigator .header-nav__logged_content .btn .btn-container[data-v-412f1e5a] {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                width: 100%;
                height: 56px;
            }

            .header-nav__navigator .header-nav__logged_content .btn .btn-container .btn-logged[data-v-412f1e5a] {
                margin-top: 0;
                width: 48%;
                height: 100%;
            }

            .header-nav__navigator .header-nav__logged_content .header-nav__logged_content_container[data-v-412f1e5a] {
                padding: 20px 0;
                width: 100%;
                height: 100%;
                overflow-y: auto;
            }

            .header-nav__navigator a.cart[data-v-412f1e5a] {
                margin-right: 16px;
                display: inline-block;
            }

            .header-nav__navigator a.cart i.cart[data-v-412f1e5a] {
                width: 20px;
                height: 20px;
            }
        }
    </style>
    <style type="text/css">
        header {
            position: relative;
            z-index: 100;
            width: 100%;
            opacity: 0;
            -webkit-transform: translateY(-6px);
            transform: translateY(-6px);
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
        }

        header.fixed {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 10;
        }

        header.active {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
    </style>
    <style type="text/css">
        button[data-v-64218fca],
        .button[data-v-64218fca] {
            position: relative;
            z-index: 2;
            padding: 0 1%;
            display: inline-block;
            min-width: 240px;
            height: 80px;
            font-size: 0;
            background-color: #fff;
            border: 2px solid #A8A8A8;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon[data-v-64218fca],
        .button .icon[data-v-64218fca] {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 40px;
            vertical-align: middle;
            overflow: hidden;
        }

        button .icon i[data-v-64218fca],
        button .icon b[data-v-64218fca],
        .button .icon i[data-v-64218fca],
        .button .icon b[data-v-64218fca] {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            display: inline-block;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon i[data-v-64218fca],
        .button .icon i[data-v-64218fca] {
            width: 100%;
            height: 100%;
        }

        button .icon b[data-v-64218fca],
        .button .icon b[data-v-64218fca] {
            width: 100%;
            height: 88%;
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            background-image: url(img/icon__btn-download_dl_black.svg);
        }

        button .text[data-v-64218fca],
        .button .text[data-v-64218fca] {
            margin-left: 10%;
            display: inline-block;
            min-width: 126px;
            vertical-align: middle;
            text-align: left;
            color: #2A2A2A;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .text p[data-v-64218fca],
        .button .text p[data-v-64218fca] {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font: 700 24px Montserrat;
        }

        button .text p.single[data-v-64218fca],
        .button .text p.single[data-v-64218fca] {
            display: none;
        }

        button .text p[data-v-64218fca]:first-child,
        .button .text p[data-v-64218fca]:first-child {
            font: 600 12px Montserrat;
        }

        button.ios .icon i[data-v-64218fca],
        .button.ios .icon i[data-v-64218fca] {
            background-image: url(img/icon__btn-download_logo_apple.svg);
        }

        button.android .icon i[data-v-64218fca],
        .button.android .icon i[data-v-64218fca] {
            background-image: url(img/icon__btn-download_logo_android.svg);
        }

        button[data-v-64218fca]:hover,
        button[data-v-64218fca]:active,
        .button[data-v-64218fca]:hover,
        .button[data-v-64218fca]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button:hover i[data-v-64218fca],
        button:active i[data-v-64218fca],
        .button:hover i[data-v-64218fca],
        .button:active i[data-v-64218fca] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button:hover b[data-v-64218fca],
        button:active b[data-v-64218fca],
        .button:hover b[data-v-64218fca],
        .button:active b[data-v-64218fca] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.footer[data-v-64218fca],
        .button.footer[data-v-64218fca] {
            min-width: 200px;
            height: 50px;
            background-color: transparent;
        }

        button.footer[data-v-64218fca]:hover,
        button.footer[data-v-64218fca]:active,
        .button.footer[data-v-64218fca]:hover,
        .button.footer[data-v-64218fca]:active {
            background-color: #DDD;
            border-color: #DDD;
        }

        button.footer .icon[data-v-64218fca],
        .button.footer .icon[data-v-64218fca] {
            width: 25px;
            height: 30px;
        }

        button.footer .icon b[data-v-64218fca],
        .button.footer .icon b[data-v-64218fca] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.footer .text[data-v-64218fca],
        .button.footer .text[data-v-64218fca] {
            min-width: 105px;
        }

        button.footer .text p[data-v-64218fca]:last-child,
        .button.footer .text p[data-v-64218fca]:last-child {
            font: 700 20px/20px Montserrat;
        }

        button.footer:hover i[data-v-64218fca],
        button.footer:active i[data-v-64218fca],
        .button.footer:hover i[data-v-64218fca],
        .button.footer:active i[data-v-64218fca] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.footer:hover b[data-v-64218fca],
        button.footer:active b[data-v-64218fca],
        .button.footer:hover b[data-v-64218fca],
        .button.footer:active b[data-v-64218fca] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.header[data-v-64218fca],
        .button.header[data-v-64218fca] {
            padding: 0 10px;
            min-width: 175px;
            height: 52px;
        }

        button.header .icon[data-v-64218fca],
        .button.header .icon[data-v-64218fca] {
            width: 25px;
            height: 30px;
        }

        button.header .icon b[data-v-64218fca],
        .button.header .icon b[data-v-64218fca] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.header .text[data-v-64218fca],
        .button.header .text[data-v-64218fca] {
            margin-left: 22px;
            min-width: 86px;
        }

        button.header .text p[data-v-64218fca],
        .button.header .text p[data-v-64218fca] {
            display: none;
        }

        button.header .text p.single[data-v-64218fca],
        .button.header .text p.single[data-v-64218fca] {
            display: inline-block;
            font: 600 16px Montserrat;
        }

        button.header[data-v-64218fca]:hover,
        button.header[data-v-64218fca]:active,
        .button.header[data-v-64218fca]:hover,
        .button.header[data-v-64218fca]:active {
            background-color: #FFA850;
            border-color: #FFA850;
        }

        button.header:hover i[data-v-64218fca],
        button.header:active i[data-v-64218fca],
        .button.header:hover i[data-v-64218fca],
        .button.header:active i[data-v-64218fca] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.header:hover b[data-v-64218fca],
        button.header:active b[data-v-64218fca],
        .button.header:hover b[data-v-64218fca],
        .button.header:active b[data-v-64218fca] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.transparent[data-v-64218fca],
        .button.transparent[data-v-64218fca] {
            background-color: transparent;
            border-color: #fff;
        }

        button.transparent .text[data-v-64218fca],
        .button.transparent .text[data-v-64218fca] {
            color: #fff;
        }

        button.transparent[data-v-64218fca]:hover,
        button.transparent[data-v-64218fca]:active,
        .button.transparent[data-v-64218fca]:hover,
        .button.transparent[data-v-64218fca]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button.transparent:hover .text[data-v-64218fca],
        button.transparent:active .text[data-v-64218fca],
        .button.transparent:hover .text[data-v-64218fca],
        .button.transparent:active .text[data-v-64218fca] {
            color: #2A2A2A;
        }

        button.transparent:hover i[data-v-64218fca],
        button.transparent:active i[data-v-64218fca],
        .button.transparent:hover i[data-v-64218fca],
        .button.transparent:active i[data-v-64218fca] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button.transparent:hover b[data-v-64218fca],
        button.transparent:active b[data-v-64218fca],
        .button.transparent:hover b[data-v-64218fca],
        .button.transparent:active b[data-v-64218fca] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            button[data-v-64218fca] {
                padding: 0 20px;
                min-width: 211px;
                height: 56px;
                border-width: 1px;
                border-radius: 4px;
            }

            button .icon[data-v-64218fca] {
                width: 24px;
                height: 28px;
            }

            button .icon b[data-v-64218fca] {
                width: 20px;
                height: 28px;
            }

            button .text[data-v-64218fca] {
                margin-left: 24px;
                min-width: 120px;
            }

            button .text p[data-v-64218fca] {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            button .text p[data-v-64218fca]:first-child {
                font: 600 10px Montserrat;
            }

            button .text p[data-v-64218fca]:last-child {
                font: 700 22px/22px Montserrat;
            }
        }
    </style>
    <style type="text/css">
        button .icon i[data-v-64218fca] {
            background-image: url(img/icon__btn-download_logo_android.svg);
        }

        button.transparent .icon i[data-v-64218fca] {
            background-image: url(img/icon__btn-download_logo_android_white.svg);
        }
    </style>
    <style type="text/css">
        button[data-v-c1265c44],
        .button[data-v-c1265c44] {
            position: relative;
            z-index: 2;
            padding: 0 1%;
            display: inline-block;
            min-width: 240px;
            height: 80px;
            font-size: 0;
            background-color: #fff;
            border: 2px solid #A8A8A8;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon[data-v-c1265c44],
        .button .icon[data-v-c1265c44] {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 40px;
            vertical-align: middle;
            overflow: hidden;
        }

        button .icon i[data-v-c1265c44],
        button .icon b[data-v-c1265c44],
        .button .icon i[data-v-c1265c44],
        .button .icon b[data-v-c1265c44] {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            display: inline-block;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon i[data-v-c1265c44],
        .button .icon i[data-v-c1265c44] {
            width: 100%;
            height: 100%;
        }

        button .icon b[data-v-c1265c44],
        .button .icon b[data-v-c1265c44] {
            width: 100%;
            height: 88%;
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            background-image: url(img/icon__btn-download_dl_black.svg);
        }

        button .text[data-v-c1265c44],
        .button .text[data-v-c1265c44] {
            margin-left: 10%;
            display: inline-block;
            min-width: 126px;
            vertical-align: middle;
            text-align: left;
            color: #2A2A2A;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .text p[data-v-c1265c44],
        .button .text p[data-v-c1265c44] {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font: 700 24px Montserrat;
        }

        button .text p.single[data-v-c1265c44],
        .button .text p.single[data-v-c1265c44] {
            display: none;
        }

        button .text p[data-v-c1265c44]:first-child,
        .button .text p[data-v-c1265c44]:first-child {
            font: 600 12px Montserrat;
        }

        button.ios .icon i[data-v-c1265c44],
        .button.ios .icon i[data-v-c1265c44] {
            background-image: url(img/icon__btn-download_logo_apple.svg);
        }

        button.android .icon i[data-v-c1265c44],
        .button.android .icon i[data-v-c1265c44] {
            background-image: url(img/icon__btn-download_logo_android.svg);
        }

        button[data-v-c1265c44]:hover,
        button[data-v-c1265c44]:active,
        .button[data-v-c1265c44]:hover,
        .button[data-v-c1265c44]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button:hover i[data-v-c1265c44],
        button:active i[data-v-c1265c44],
        .button:hover i[data-v-c1265c44],
        .button:active i[data-v-c1265c44] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button:hover b[data-v-c1265c44],
        button:active b[data-v-c1265c44],
        .button:hover b[data-v-c1265c44],
        .button:active b[data-v-c1265c44] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.footer[data-v-c1265c44],
        .button.footer[data-v-c1265c44] {
            min-width: 200px;
            height: 50px;
            background-color: transparent;
        }

        button.footer[data-v-c1265c44]:hover,
        button.footer[data-v-c1265c44]:active,
        .button.footer[data-v-c1265c44]:hover,
        .button.footer[data-v-c1265c44]:active {
            background-color: #DDD;
            border-color: #DDD;
        }

        button.footer .icon[data-v-c1265c44],
        .button.footer .icon[data-v-c1265c44] {
            width: 25px;
            height: 30px;
        }

        button.footer .icon b[data-v-c1265c44],
        .button.footer .icon b[data-v-c1265c44] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.footer .text[data-v-c1265c44],
        .button.footer .text[data-v-c1265c44] {
            min-width: 105px;
        }

        button.footer .text p[data-v-c1265c44]:last-child,
        .button.footer .text p[data-v-c1265c44]:last-child {
            font: 700 20px/20px Montserrat;
        }

        button.footer:hover i[data-v-c1265c44],
        button.footer:active i[data-v-c1265c44],
        .button.footer:hover i[data-v-c1265c44],
        .button.footer:active i[data-v-c1265c44] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.footer:hover b[data-v-c1265c44],
        button.footer:active b[data-v-c1265c44],
        .button.footer:hover b[data-v-c1265c44],
        .button.footer:active b[data-v-c1265c44] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.header[data-v-c1265c44],
        .button.header[data-v-c1265c44] {
            padding: 0 10px;
            min-width: 175px;
            height: 52px;
        }

        button.header .icon[data-v-c1265c44],
        .button.header .icon[data-v-c1265c44] {
            width: 25px;
            height: 30px;
        }

        button.header .icon b[data-v-c1265c44],
        .button.header .icon b[data-v-c1265c44] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.header .text[data-v-c1265c44],
        .button.header .text[data-v-c1265c44] {
            margin-left: 22px;
            min-width: 86px;
        }

        button.header .text p[data-v-c1265c44],
        .button.header .text p[data-v-c1265c44] {
            display: none;
        }

        button.header .text p.single[data-v-c1265c44],
        .button.header .text p.single[data-v-c1265c44] {
            display: inline-block;
            font: 600 16px Montserrat;
        }

        button.header[data-v-c1265c44]:hover,
        button.header[data-v-c1265c44]:active,
        .button.header[data-v-c1265c44]:hover,
        .button.header[data-v-c1265c44]:active {
            background-color: #FFA850;
            border-color: #FFA850;
        }

        button.header:hover i[data-v-c1265c44],
        button.header:active i[data-v-c1265c44],
        .button.header:hover i[data-v-c1265c44],
        .button.header:active i[data-v-c1265c44] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.header:hover b[data-v-c1265c44],
        button.header:active b[data-v-c1265c44],
        .button.header:hover b[data-v-c1265c44],
        .button.header:active b[data-v-c1265c44] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.transparent[data-v-c1265c44],
        .button.transparent[data-v-c1265c44] {
            background-color: transparent;
            border-color: #fff;
        }

        button.transparent .text[data-v-c1265c44],
        .button.transparent .text[data-v-c1265c44] {
            color: #fff;
        }

        button.transparent[data-v-c1265c44]:hover,
        button.transparent[data-v-c1265c44]:active,
        .button.transparent[data-v-c1265c44]:hover,
        .button.transparent[data-v-c1265c44]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button.transparent:hover .text[data-v-c1265c44],
        button.transparent:active .text[data-v-c1265c44],
        .button.transparent:hover .text[data-v-c1265c44],
        .button.transparent:active .text[data-v-c1265c44] {
            color: #2A2A2A;
        }

        button.transparent:hover i[data-v-c1265c44],
        button.transparent:active i[data-v-c1265c44],
        .button.transparent:hover i[data-v-c1265c44],
        .button.transparent:active i[data-v-c1265c44] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button.transparent:hover b[data-v-c1265c44],
        button.transparent:active b[data-v-c1265c44],
        .button.transparent:hover b[data-v-c1265c44],
        .button.transparent:active b[data-v-c1265c44] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            button[data-v-c1265c44] {
                padding: 0 20px;
                min-width: 211px;
                height: 56px;
                border-width: 1px;
                border-radius: 4px;
            }

            button .icon[data-v-c1265c44] {
                width: 24px;
                height: 28px;
            }

            button .icon b[data-v-c1265c44] {
                width: 20px;
                height: 28px;
            }

            button .text[data-v-c1265c44] {
                margin-left: 24px;
                min-width: 120px;
            }

            button .text p[data-v-c1265c44] {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            button .text p[data-v-c1265c44]:first-child {
                font: 600 10px Montserrat;
            }

            button .text p[data-v-c1265c44]:last-child {
                font: 700 22px/22px Montserrat;
            }
        }
    </style>
    <style type="text/css">
        button .icon i[data-v-c1265c44] {
            background-image: url(img/icon__btn-download_logo_windows_black.svg);
        }

        button .icon b[data-v-c1265c44] {
            background-image: url(img/icon__btn-download_dl_black.svg);
        }
    </style>
    <style type="text/css">
        button[data-v-26f88be8],
        .button[data-v-26f88be8] {
            position: relative;
            z-index: 2;
            padding: 0 1%;
            display: inline-block;
            min-width: 240px;
            height: 80px;
            font-size: 0;
            background-color: #fff;
            border: 2px solid #A8A8A8;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon[data-v-26f88be8],
        .button .icon[data-v-26f88be8] {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 40px;
            vertical-align: middle;
            overflow: hidden;
        }

        button .icon i[data-v-26f88be8],
        button .icon b[data-v-26f88be8],
        .button .icon i[data-v-26f88be8],
        .button .icon b[data-v-26f88be8] {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            display: inline-block;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon i[data-v-26f88be8],
        .button .icon i[data-v-26f88be8] {
            width: 100%;
            height: 100%;
        }

        button .icon b[data-v-26f88be8],
        .button .icon b[data-v-26f88be8] {
            width: 100%;
            height: 88%;
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            background-image: url(img/icon__btn-download_dl_black.svg);
        }

        button .text[data-v-26f88be8],
        .button .text[data-v-26f88be8] {
            margin-left: 10%;
            display: inline-block;
            min-width: 126px;
            vertical-align: middle;
            text-align: left;
            color: #2A2A2A;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .text p[data-v-26f88be8],
        .button .text p[data-v-26f88be8] {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font: 700 24px Montserrat;
        }

        button .text p.single[data-v-26f88be8],
        .button .text p.single[data-v-26f88be8] {
            display: none;
        }

        button .text p[data-v-26f88be8]:first-child,
        .button .text p[data-v-26f88be8]:first-child {
            font: 600 12px Montserrat;
        }

        button.ios .icon i[data-v-26f88be8],
        .button.ios .icon i[data-v-26f88be8] {
            background-image: url(img/icon__btn-download_logo_apple.svg);
        }

        button.android .icon i[data-v-26f88be8],
        .button.android .icon i[data-v-26f88be8] {
            background-image: url(img/icon__btn-download_logo_android.svg);
        }

        button[data-v-26f88be8]:hover,
        button[data-v-26f88be8]:active,
        .button[data-v-26f88be8]:hover,
        .button[data-v-26f88be8]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button:hover i[data-v-26f88be8],
        button:active i[data-v-26f88be8],
        .button:hover i[data-v-26f88be8],
        .button:active i[data-v-26f88be8] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button:hover b[data-v-26f88be8],
        button:active b[data-v-26f88be8],
        .button:hover b[data-v-26f88be8],
        .button:active b[data-v-26f88be8] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.footer[data-v-26f88be8],
        .button.footer[data-v-26f88be8] {
            min-width: 200px;
            height: 50px;
            background-color: transparent;
        }

        button.footer[data-v-26f88be8]:hover,
        button.footer[data-v-26f88be8]:active,
        .button.footer[data-v-26f88be8]:hover,
        .button.footer[data-v-26f88be8]:active {
            background-color: #DDD;
            border-color: #DDD;
        }

        button.footer .icon[data-v-26f88be8],
        .button.footer .icon[data-v-26f88be8] {
            width: 25px;
            height: 30px;
        }

        button.footer .icon b[data-v-26f88be8],
        .button.footer .icon b[data-v-26f88be8] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.footer .text[data-v-26f88be8],
        .button.footer .text[data-v-26f88be8] {
            min-width: 105px;
        }

        button.footer .text p[data-v-26f88be8]:last-child,
        .button.footer .text p[data-v-26f88be8]:last-child {
            font: 700 20px/20px Montserrat;
        }

        button.footer:hover i[data-v-26f88be8],
        button.footer:active i[data-v-26f88be8],
        .button.footer:hover i[data-v-26f88be8],
        .button.footer:active i[data-v-26f88be8] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.footer:hover b[data-v-26f88be8],
        button.footer:active b[data-v-26f88be8],
        .button.footer:hover b[data-v-26f88be8],
        .button.footer:active b[data-v-26f88be8] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.header[data-v-26f88be8],
        .button.header[data-v-26f88be8] {
            padding: 0 10px;
            min-width: 175px;
            height: 52px;
        }

        button.header .icon[data-v-26f88be8],
        .button.header .icon[data-v-26f88be8] {
            width: 25px;
            height: 30px;
        }

        button.header .icon b[data-v-26f88be8],
        .button.header .icon b[data-v-26f88be8] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.header .text[data-v-26f88be8],
        .button.header .text[data-v-26f88be8] {
            margin-left: 22px;
            min-width: 86px;
        }

        button.header .text p[data-v-26f88be8],
        .button.header .text p[data-v-26f88be8] {
            display: none;
        }

        button.header .text p.single[data-v-26f88be8],
        .button.header .text p.single[data-v-26f88be8] {
            display: inline-block;
            font: 600 16px Montserrat;
        }

        button.header[data-v-26f88be8]:hover,
        button.header[data-v-26f88be8]:active,
        .button.header[data-v-26f88be8]:hover,
        .button.header[data-v-26f88be8]:active {
            background-color: #FFA850;
            border-color: #FFA850;
        }

        button.header:hover i[data-v-26f88be8],
        button.header:active i[data-v-26f88be8],
        .button.header:hover i[data-v-26f88be8],
        .button.header:active i[data-v-26f88be8] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.header:hover b[data-v-26f88be8],
        button.header:active b[data-v-26f88be8],
        .button.header:hover b[data-v-26f88be8],
        .button.header:active b[data-v-26f88be8] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.transparent[data-v-26f88be8],
        .button.transparent[data-v-26f88be8] {
            background-color: transparent;
            border-color: #fff;
        }

        button.transparent .text[data-v-26f88be8],
        .button.transparent .text[data-v-26f88be8] {
            color: #fff;
        }

        button.transparent[data-v-26f88be8]:hover,
        button.transparent[data-v-26f88be8]:active,
        .button.transparent[data-v-26f88be8]:hover,
        .button.transparent[data-v-26f88be8]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button.transparent:hover .text[data-v-26f88be8],
        button.transparent:active .text[data-v-26f88be8],
        .button.transparent:hover .text[data-v-26f88be8],
        .button.transparent:active .text[data-v-26f88be8] {
            color: #2A2A2A;
        }

        button.transparent:hover i[data-v-26f88be8],
        button.transparent:active i[data-v-26f88be8],
        .button.transparent:hover i[data-v-26f88be8],
        .button.transparent:active i[data-v-26f88be8] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button.transparent:hover b[data-v-26f88be8],
        button.transparent:active b[data-v-26f88be8],
        .button.transparent:hover b[data-v-26f88be8],
        .button.transparent:active b[data-v-26f88be8] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            button[data-v-26f88be8] {
                padding: 0 20px;
                min-width: 211px;
                height: 56px;
                border-width: 1px;
                border-radius: 4px;
            }

            button .icon[data-v-26f88be8] {
                width: 24px;
                height: 28px;
            }

            button .icon b[data-v-26f88be8] {
                width: 20px;
                height: 28px;
            }

            button .text[data-v-26f88be8] {
                margin-left: 24px;
                min-width: 120px;
            }

            button .text p[data-v-26f88be8] {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            button .text p[data-v-26f88be8]:first-child {
                font: 600 10px Montserrat;
            }

            button .text p[data-v-26f88be8]:last-child {
                font: 700 22px/22px Montserrat;
            }
        }
    </style>
    <style type="text/css">
        button .icon i[data-v-26f88be8] {
            background-image: url(img/icon__btn-download_logo_apple.svg);
        }

        button.transparent .icon i[data-v-26f88be8] {
            background-image: url(img/icon__btn-download_logo_apple_white.svg);
        }
    </style>
    <style type="text/css">
        .footer-text[data-v-764efdba] {
            padding: 125px 0 94px;
            background-color: #F2F3F8;
        }

        .footer-text .footer-text__links .wrapper[data-v-764efdba] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .footer-text .footer-text__links .footer-text__links_column[data-v-764efdba] {
            padding-left: 40px;
            width: 370px;
            display: inline-block;
            vertical-align: top;
        }

        .footer-text .footer-text__links .footer-text__links_column.logo[data-v-764efdba] {
            margin-right: 115px;
            padding-right: 20px;
            width: 290px;
            height: 330px;
            border-right: 1px solid rgba(255, 255, 255, 0.15);
        }

        .footer-text .footer-text__links .footer-text__links_column.logo i[data-v-764efdba] {
            display: inline-block;
            width: 100px;
            height: 100px;
            background-image: url(img/logo.svg);
            background-size: contain;
        }

        .footer-text .footer-text__links .footer-text__links_column.download[data-v-764efdba] {
            margin-bottom: 20px;
            width: 240px;
        }

        .footer-text .footer-text__links .footer-text__links_column h2[data-v-764efdba] {
            margin-top: 8px;
            font: 800 italic 28px/34px Montserrat;
            color: #fff;
        }

        .footer-text .footer-text__links .footer-text__links_column p[data-v-764efdba] {
            margin-top: 15px;
            line-height: 26px;
        }

        .footer-text .footer-text__links .footer-text__links_column button[data-v-764efdba] {
            margin-top: 10px;
        }

        .footer-text .footer-text__links .footer-text__links_column.first[data-v-764efdba] {
            padding-left: 0;
        }

        .footer-text .footer-text__links .footer-text__links_column.narrow[data-v-764efdba] {
            width: 200px;
        }

        .footer-text .footer-text__links p[data-v-764efdba],
        .footer-text .footer-text__links a[data-v-764efdba] {
            font: 500 16px/1.2 Montserrat;
            color: rgba(42, 42, 42, 0.6);
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .footer-text .footer-text__links a[data-v-764efdba] {
            display: block;
            margin-top: 20px;
        }

        .footer-text .footer-text__links a[data-v-764efdba]:hover {
            color: #2a2a2a;
        }

        .footer-text .footer-text__links h3[data-v-764efdba] {
            margin-bottom: 20px;
        }

        .footer-text .footer-text__links h3 span[data-v-764efdba] {
            font: 600 20px Montserrat;
            color: #2A2A2A;
        }

        @media (max-width: 768px) {
            .footer-text[data-v-764efdba] {
                background-color: #5920CE;
                padding: 56px 0 82px;
            }

            .footer-text .footer-text__links[data-v-764efdba] {
                padding-bottom: env(safe-area-inset-bottom);
            }

            .footer-text .footer-text__links .wrapper[data-v-764efdba] {
                display: block;
            }

            .footer-text .footer-text__links .footer-text__links_column[data-v-764efdba] {
                margin: 50px auto 0;
                padding: 0 8vw;
                width: 100% !important;
                height: auto !important;
                text-align: center;
            }

            .footer-text .footer-text__links .footer-text__links_column.logo[data-v-764efdba] {
                margin-top: 0;
                margin-right: 0;
                padding: 0;
                border-right: none;
            }

            .footer-text .footer-text__links .footer-text__links_column.logo i[data-v-764efdba] {
                width: 78px;
                height: 78px;
            }

            .footer-text .footer-text__links .footer-text__links_column h2[data-v-764efdba] {
                margin-top: 4px;
                font-size: 24px;
            }

            .footer-text .footer-text__links .footer-text__links_column h3[data-v-764efdba] {
                position: relative;
                margin-bottom: 0;
                display: inline-block;
                width: 100%;
                font-size: 16px;
            }

            .footer-text .footer-text__links .footer-text__links_column h3 span[data-v-764efdba] {
                position: relative;
                z-index: 1;
                display: inline-block;
                background-color: #5920CE;
                padding: 0 8vw;
                color: #fff;
            }

            .footer-text .footer-text__links .footer-text__links_column h3[data-v-764efdba]:before {
                position: absolute;
                left: 0;
                top: 50%;
                width: 100%;
                height: 1px;
                background-color: rgba(255, 255, 255, 0.2);
                content: "";
            }

            .footer-text .footer-text__links .footer-text__links_column p[data-v-764efdba],
            .footer-text .footer-text__links .footer-text__links_column a[data-v-764efdba] {
                color: rgba(255, 255, 255, 0.8);
            }

            .footer-text .footer-text__links .footer-text__links_column p[data-v-764efdba] {
                margin-top: 4px;
            }

            .footer-text .footer-text__links .footer-text__links_column p span[data-v-764efdba] {
                font-size: 16px;
            }

            .footer-text .footer-text__links .footer-text__links_column p br[data-v-764efdba] {
                display: none;
            }

            .footer-text .footer-text__links .footer-text__links_column a[data-v-764efdba] {
                width: 100%;
                font-size: 16px;
                font-weight: 400;
            }

            .footer-text .footer-text__links .footer-text__links_column.first[data-v-764efdba] {
                padding-left: 8vw;
            }

            .footer-text .user-center-bottom-blank[data-v-764efdba] {
                height: 56px;
            }
        }
    </style>
    <style type="text/css">
        .footer-text[data-v-72ffd2a7] {
            padding: 125px 0 94px;
            background-color: #757E97;
        }

        .footer-text .footer-text__links .footer-text__links_column[data-v-72ffd2a7] {
            width: 250px;
            display: inline-block;
            vertical-align: top;
        }

        .footer-text .footer-text__links .footer-text__links_column.logo[data-v-72ffd2a7] {
            margin-right: 115px;
            padding-right: 20px;
            width: 290px;
            height: 330px;
            border-right: 1px solid rgba(255, 255, 255, 0.15);
        }

        .footer-text .footer-text__links .footer-text__links_column.logo i[data-v-72ffd2a7] {
            display: inline-block;
            width: 100px;
            height: 100px;
            background-image: url(img/logo.svg);
            background-size: contain;
        }

        .footer-text .footer-text__links .footer-text__links_column h2[data-v-72ffd2a7] {
            margin-top: 8px;
            font: 800 italic 28px/34px Montserrat;
            color: #fff;
        }

        .footer-text .footer-text__links .footer-text__links_column p[data-v-72ffd2a7] {
            margin-top: 15px;
            line-height: 26px;
        }

        .footer-text .footer-text__links p[data-v-72ffd2a7],
        .footer-text .footer-text__links a[data-v-72ffd2a7] {
            font: 400 20px Montserrat;
            color: rgba(255, 255, 255, 0.6);
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .footer-text .footer-text__links a[data-v-72ffd2a7] {
            line-height: 40px;
        }

        .footer-text .footer-text__links a[data-v-72ffd2a7]:hover {
            color: white;
        }

        .footer-text .footer-text__links h3[data-v-72ffd2a7] {
            font: 600 20px/40px Montserrat;
            color: #FFFFFF;
        }

        @media (max-width: 768px) {
            .footer-text[data-v-72ffd2a7] {
                padding: 56px 0 25px;
            }

            .footer-text .footer-text__links[data-v-72ffd2a7] {
                padding-bottom: env(safe-area-inset-bottom);
            }

            .footer-text .footer-text__links .footer-text__links_column[data-v-72ffd2a7] {
                margin: 45px auto 0;
                padding: 0 8vw;
                width: 100% !important;
                height: auto !important;
                text-align: center;
            }

            .footer-text .footer-text__links .footer-text__links_column.logo[data-v-72ffd2a7] {
                margin-top: 0;
                margin-right: 0;
                padding: 0;
                border-right: none;
            }

            .footer-text .footer-text__links .footer-text__links_column.logo i[data-v-72ffd2a7] {
                width: 78px;
                height: 78px;
            }

            .footer-text .footer-text__links .footer-text__links_column h2[data-v-72ffd2a7] {
                margin-top: 4px;
                font-size: 24px;
                line-height: 29px;
            }

            .footer-text .footer-text__links .footer-text__links_column p[data-v-72ffd2a7] {
                margin-top: 4px;
                font-size: 16px;
                line-height: 20px;
            }

            .footer-text .footer-text__links .footer-text__links_column p br[data-v-72ffd2a7] {
                display: none;
            }

            .footer-text .footer-text__links .footer-text__links_column h3[data-v-72ffd2a7] {
                position: relative;
                margin-bottom: 10px;
                display: inline-block;
                width: 100%;
                font-size: 16px;
                line-height: 20px;
            }

            .footer-text .footer-text__links .footer-text__links_column h3 span[data-v-72ffd2a7] {
                position: relative;
                z-index: 1;
                display: inline-block;
                background-color: #5920CE;
                padding: 0 8vw;
            }

            .footer-text .footer-text__links .footer-text__links_column h3[data-v-72ffd2a7]:before {
                position: absolute;
                left: 0;
                top: 50%;
                width: 100%;
                height: 1px;
                background-color: rgba(255, 255, 255, 0.2);
                content: "";
            }

            .footer-text .footer-text__links .footer-text__links_column a[data-v-72ffd2a7] {
                font-size: 16px;
                line-height: 40px;
            }

            .footer-text .user-center-bottom-blank[data-v-72ffd2a7] {
                height: 56px;
            }
        }
    </style>
    <style type="text/css">
        .footer-copyright[data-v-53f0c892] {
            background-color: #F2F3F8;
        }

        .footer-copyright .wrapper[data-v-53f0c892] {
            padding: 26px 0 30px;
            border-top: 1px solid rgba(42, 42, 42, 0.15);
        }

        .footer-copyright .wrapper .copyright img[data-v-53f0c892] {
            width: 64px;
            height: 64px;
            vertical-align: top;
            cursor: pointer;
        }

        .footer-copyright .wrapper .copyright .text[data-v-53f0c892] {
            margin-left: 26px;
            display: inline-block;
            vertical-align: top;
        }

        .footer-copyright .wrapper .copyright .text h2[data-v-53f0c892] {
            font: 800 italic 28px/34px Montserrat;
            color: #2A2A2A;
            cursor: pointer;
        }

        .footer-copyright .wrapper .copyright .text p[data-v-53f0c892] {
            font: 500 16px/32px Montserrat;
            color: #A8A8A8;
        }
    </style>
    <style type="text/css">
        .footer-copyright[data-v-ff90f724] {
            background-color: transparent;
        }

        .footer-copyright .wrapper[data-v-ff90f724] {
            padding: 32px 0 66px;
            border-top: 1px solid rgba(42, 42, 42, 0.15);
        }

        .footer-copyright .wrapper .copyright img[data-v-ff90f724] {
            width: 64px;
            height: 64px;
            vertical-align: top;
            cursor: pointer;
        }

        .footer-copyright .wrapper .copyright .text[data-v-ff90f724] {
            margin-left: 26px;
            display: inline-block;
            vertical-align: top;
        }

        .footer-copyright .wrapper .copyright .text h2[data-v-ff90f724] {
            font: 800 italic 28px/34px Montserrat;
            color: #2A2A2A;
            cursor: pointer;
        }

        .footer-copyright .wrapper .copyright .text p[data-v-ff90f724] {
            font: 500 16px/32px Montserrat;
            color: #A8A8A8;
        }

        @media (max-width: 768px) {
            .footer-copyright[data-v-ff90f724] {
                background-color: #F5F6FB;
            }

            .footer-copyright .wrapper[data-v-ff90f724] {
                padding: 30px 4vw;
                padding-bottom: env(safe-area-inset-bottom);
                padding-bottom: max(30px, env(safe-area-inset-bottom));
                border-top: none;
            }

            .footer-copyright .wrapper .copyright img[data-v-ff90f724] {
                width: 40px;
                height: 40px;
            }

            .footer-copyright .wrapper .copyright .text[data-v-ff90f724] {
                margin-left: 15px;
                padding-top: 2px;
            }

            .footer-copyright .wrapper .copyright .text h2[data-v-ff90f724] {
                font: 800 italic 16px/20px Montserrat;
            }

            .footer-copyright .wrapper .copyright .text p[data-v-ff90f724] {
                font: 500 12px/15px Montserrat;
            }
        }
    </style>
    <style type="text/css">
        footer {
            position: relative;
            width: 100%;
            opacity: 0;
            -webkit-transform: translateY(6px);
            transform: translateY(6px);
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
        }

        footer.active {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
    </style>
    <style type="text/css">
        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video,
        input {
            margin: 0;
            padding: 0;
            border: 0;
            font-weight: normal;
            vertical-align: baseline;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        a {
            color: #7e8c8d;
            text-decoration: none;
            -webkit-backface-visibility: hidden;
        }

        li {
            list-style: none;
        }

        html,
        body {
            width: 100%;
        }

        body {
            -webkit-text-size-adjust: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        input,
        button {
            -webkit-appearance: none;
            border-radius: 0;
            outline: none;
            border: none;
        }

        * {
            font-family: Montserrat, sans-serif;
            -webkit-font-smoothing: subpixel-antialiased;
        }

        a {
            color: #005fff;
            cursor: pointer;
            font-weight: 500;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        a:hover {
            color: #2128BD;
        }

        hr {
            border: none;
        }

        html {
            height: 100%;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
        }

        html body {
            height: 100%;
        }

        html body #app {
            min-height: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        html body #app .content-container {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            /* IE 11 */
        }

        .no-scroll {
            height: 100% !important;
            overflow: hidden !important;
        }

        .no-scroll #app {
            height: 100% !important;
            overflow: hidden !important;
        }

        .no-scroll footer {
            display: none;
        }

        .wrapper {
            position: relative;
            margin: 0 auto;
            width: 1210px;
        }

        .index-loading {
            padding: 80px;
            text-align: center;
        }

        #app {
            width: 100%;
        }

        #app .fade-enter {
            opacity: 0;
        }

        #app .fade-enter-active {
            -webkit-transform: translateY(30px);
            transform: translateY(30px);
            -webkit-transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        #app .fade-enter-to {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        #app .fade-leave {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        #app .fade-leave-active {
            -webkit-transform: translateY(-30px);
            transform: translateY(-30px);
            -webkit-transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        #app .fade-leave-to {
            opacity: 0;
        }

        #app .header-slide-enter-active {
            -webkit-transform: translateX(-100%) scaleX(0);
            transform: translateX(-100%) scaleX(0);
            -webkit-transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
            -webkit-transform-origin: left center;
            transform-origin: left center;
        }

        #app .header-slide-enter-to {
            -webkit-transform: translateX(0) scaleX(1);
            transform: translateX(0) scaleX(1);
        }

        #app .header-slide-leave {
            -webkit-transform: translateX(0) scaleX(1);
            transform: translateX(0) scaleX(1);
        }

        #app .header-slide-leave-active {
            -webkit-transform: translateX(-100%) scaleX(0);
            transform: translateX(-100%) scaleX(0);
            -webkit-transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
            -webkit-transform-origin: left center;
            transform-origin: left center;
        }

        #app .fade-tabs-enter {
            opacity: 0;
        }

        #app .fade-tabs-enter-active {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
            -webkit-transition: all 0.3s cubic-bezier(0.77, 0, 0.175, 1);
            transition: all 0.3s cubic-bezier(0.77, 0, 0.175, 1);
        }

        #app .fade-tabs-enter-to {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        #app .fade-tabs-leave {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        #app .fade-tabs-leave-active {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
            -webkit-transition: all 0.3s cubic-bezier(0.77, 0, 0.175, 1);
            transition: all 0.3s cubic-bezier(0.77, 0, 0.175, 1);
        }

        #app .fade-tabs-leave-to {
            opacity: 0;
        }

        #app .fade-skeleton-enter-active,
        #app .fade-skeleton-leave-active {
            -webkit-transition: all 0.2s;
            transition: all 0.2s;
        }

        #app .fade-skeleton-enter,
        #app .fade-skeleton-leave-to {
            opacity: 0;
        }

        #app .rolling-subtitles-enter-active,
        #app .rolling-subtitles-leave-active {
            position: relative;
            -webkit-transition: all 0.5s cubic-bezier(0.45, 0, 0.55, 1);
            transition: all 0.5s cubic-bezier(0.45, 0, 0.55, 1);
        }

        #app .rolling-subtitles-enter {
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
        }

        #app .rolling-subtitles-enter-to,
        #app .rolling-subtitles-leave {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        #app .rolling-subtitles-leave-to {
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
        }

        .home__sec {
            padding: 170px 0 146px;
        }

        .home__sec .home__sec_h2 {
            font: 600 44px/54px Montserrat;
            color: #2A2A2A;
            text-align: center;
        }

        .home__sec .home__sec_p {
            margin-top: 20px;
            font: 500 20px/30px Montserrat;
            color: #000000;
            text-align: center;
        }

        .home__sec.pt .home__sec_h2 {
            color: #2A2A2A;
        }

        span.btn-download-blank {
            display: inline-block;
            width: 32px;
        }

        input[type=text],
        input[type=email],
        input[type=search],
        input[type=password],
        input[type=number],
        input[type=tel],
        textarea,
        select,
        .stripe-filed {
            position: relative;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 24px;
            width: 100%;
            height: 100%;
            background: #FFFFFF;
            border: 2px solid #DEDEDE;
            border-radius: 6px;
            outline: none;
            -webkit-appearance: none !important;
            vertical-align: middle;
            line-height: normal;
            text-align: left;
            font: 600 16px/20px Montserrat;
            color: #2A2A2A;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        input[type=text]::-webkit-input-placeholder,
        input[type=email]::-webkit-input-placeholder,
        input[type=search]::-webkit-input-placeholder,
        input[type=password]::-webkit-input-placeholder,
        input[type=number]::-webkit-input-placeholder,
        input[type=tel]::-webkit-input-placeholder,
        textarea::-webkit-input-placeholder,
        select::-webkit-input-placeholder,
        .stripe-filed::-webkit-input-placeholder {
            color: #A8A8A8;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        input[type=text]::-moz-placeholder,
        input[type=email]::-moz-placeholder,
        input[type=search]::-moz-placeholder,
        input[type=password]::-moz-placeholder,
        input[type=number]::-moz-placeholder,
        input[type=tel]::-moz-placeholder,
        textarea::-moz-placeholder,
        select::-moz-placeholder,
        .stripe-filed::-moz-placeholder {
            color: #A8A8A8;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }

        input[type=text]:-ms-input-placeholder,
        input[type=email]:-ms-input-placeholder,
        input[type=search]:-ms-input-placeholder,
        input[type=password]:-ms-input-placeholder,
        input[type=number]:-ms-input-placeholder,
        input[type=tel]:-ms-input-placeholder,
        textarea:-ms-input-placeholder,
        select:-ms-input-placeholder,
        .stripe-filed:-ms-input-placeholder {
            color: #A8A8A8;
            -ms-transition: all 0.3s;
            transition: all 0.3s;
        }

        input[type=text]::-ms-input-placeholder,
        input[type=email]::-ms-input-placeholder,
        input[type=search]::-ms-input-placeholder,
        input[type=password]::-ms-input-placeholder,
        input[type=number]::-ms-input-placeholder,
        input[type=tel]::-ms-input-placeholder,
        textarea::-ms-input-placeholder,
        select::-ms-input-placeholder,
        .stripe-filed::-ms-input-placeholder {
            color: #A8A8A8;
            -ms-transition: all 0.3s;
            transition: all 0.3s;
        }

        input[type=text]::placeholder,
        input[type=email]::placeholder,
        input[type=search]::placeholder,
        input[type=password]::placeholder,
        input[type=number]::placeholder,
        input[type=tel]::placeholder,
        textarea::placeholder,
        select::placeholder,
        .stripe-filed::placeholder {
            color: #A8A8A8;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        input[type=text]:hover,
        input[type=text]:focus,
        input[type=email]:hover,
        input[type=email]:focus,
        input[type=search]:hover,
        input[type=search]:focus,
        input[type=password]:hover,
        input[type=password]:focus,
        input[type=number]:hover,
        input[type=number]:focus,
        input[type=tel]:hover,
        input[type=tel]:focus,
        textarea:hover,
        textarea:focus,
        select:hover,
        select:focus,
        .stripe-filed:hover,
        .stripe-filed:focus {
            border: 2px solid #005FFF;
            z-index: 1;
        }

        input[type=text]:hover::-webkit-input-placeholder,
        input[type=text]:focus::-webkit-input-placeholder,
        input[type=email]:hover::-webkit-input-placeholder,
        input[type=email]:focus::-webkit-input-placeholder,
        input[type=search]:hover::-webkit-input-placeholder,
        input[type=search]:focus::-webkit-input-placeholder,
        input[type=password]:hover::-webkit-input-placeholder,
        input[type=password]:focus::-webkit-input-placeholder,
        input[type=number]:hover::-webkit-input-placeholder,
        input[type=number]:focus::-webkit-input-placeholder,
        input[type=tel]:hover::-webkit-input-placeholder,
        input[type=tel]:focus::-webkit-input-placeholder,
        textarea:hover::-webkit-input-placeholder,
        textarea:focus::-webkit-input-placeholder,
        select:hover::-webkit-input-placeholder,
        select:focus::-webkit-input-placeholder,
        .stripe-filed:hover::-webkit-input-placeholder,
        .stripe-filed:focus::-webkit-input-placeholder {
            color: #656565;
        }

        input[type=text]:hover::-moz-placeholder,
        input[type=text]:focus::-moz-placeholder,
        input[type=email]:hover::-moz-placeholder,
        input[type=email]:focus::-moz-placeholder,
        input[type=search]:hover::-moz-placeholder,
        input[type=search]:focus::-moz-placeholder,
        input[type=password]:hover::-moz-placeholder,
        input[type=password]:focus::-moz-placeholder,
        input[type=number]:hover::-moz-placeholder,
        input[type=number]:focus::-moz-placeholder,
        input[type=tel]:hover::-moz-placeholder,
        input[type=tel]:focus::-moz-placeholder,
        textarea:hover::-moz-placeholder,
        textarea:focus::-moz-placeholder,
        select:hover::-moz-placeholder,
        select:focus::-moz-placeholder,
        .stripe-filed:hover::-moz-placeholder,
        .stripe-filed:focus::-moz-placeholder {
            color: #656565;
        }

        input[type=text]:hover:-ms-input-placeholder,
        input[type=text]:focus:-ms-input-placeholder,
        input[type=email]:hover:-ms-input-placeholder,
        input[type=email]:focus:-ms-input-placeholder,
        input[type=search]:hover:-ms-input-placeholder,
        input[type=search]:focus:-ms-input-placeholder,
        input[type=password]:hover:-ms-input-placeholder,
        input[type=password]:focus:-ms-input-placeholder,
        input[type=number]:hover:-ms-input-placeholder,
        input[type=number]:focus:-ms-input-placeholder,
        input[type=tel]:hover:-ms-input-placeholder,
        input[type=tel]:focus:-ms-input-placeholder,
        textarea:hover:-ms-input-placeholder,
        textarea:focus:-ms-input-placeholder,
        select:hover:-ms-input-placeholder,
        select:focus:-ms-input-placeholder,
        .stripe-filed:hover:-ms-input-placeholder,
        .stripe-filed:focus:-ms-input-placeholder {
            color: #656565;
        }

        input[type=text]:hover::-ms-input-placeholder,
        input[type=text]:focus::-ms-input-placeholder,
        input[type=email]:hover::-ms-input-placeholder,
        input[type=email]:focus::-ms-input-placeholder,
        input[type=search]:hover::-ms-input-placeholder,
        input[type=search]:focus::-ms-input-placeholder,
        input[type=password]:hover::-ms-input-placeholder,
        input[type=password]:focus::-ms-input-placeholder,
        input[type=number]:hover::-ms-input-placeholder,
        input[type=number]:focus::-ms-input-placeholder,
        input[type=tel]:hover::-ms-input-placeholder,
        input[type=tel]:focus::-ms-input-placeholder,
        textarea:hover::-ms-input-placeholder,
        textarea:focus::-ms-input-placeholder,
        select:hover::-ms-input-placeholder,
        select:focus::-ms-input-placeholder,
        .stripe-filed:hover::-ms-input-placeholder,
        .stripe-filed:focus::-ms-input-placeholder {
            color: #656565;
        }

        input[type=text]:hover::placeholder,
        input[type=text]:focus::placeholder,
        input[type=email]:hover::placeholder,
        input[type=email]:focus::placeholder,
        input[type=search]:hover::placeholder,
        input[type=search]:focus::placeholder,
        input[type=password]:hover::placeholder,
        input[type=password]:focus::placeholder,
        input[type=number]:hover::placeholder,
        input[type=number]:focus::placeholder,
        input[type=tel]:hover::placeholder,
        input[type=tel]:focus::placeholder,
        textarea:hover::placeholder,
        textarea:focus::placeholder,
        select:hover::placeholder,
        select:focus::placeholder,
        .stripe-filed:hover::placeholder,
        .stripe-filed:focus::placeholder {
            color: #656565;
        }

        .invalid input[type=text],
        .invalid input[type=email],
        .invalid input[type=search],
        .invalid input[type=password],
        .invalid input[type=number],
        .invalid input[type=tel],
        .invalid textarea,
        .invalid select,
        .invalid .stripe-filed {
            border-color: #FF3939;
        }

        .invalid:after {
            -webkit-filter: invert(54%) sepia(69%) saturate(7296%) hue-rotate(342deg) brightness(101%) contrast(96%);
            filter: invert(54%) sepia(69%) saturate(7296%) hue-rotate(342deg) brightness(101%) contrast(96%);
        }

        textarea {
            padding: 20px 24px;
            resize: none;
        }

        select {
            color: #B4B4B4;
            background: #FFFFFF url(img/icon_from__select_arrow.svg) no-repeat right 3% center;
        }

        select:hover {
            color: #373737;
        }

        select.clicked,
        select.changed {
            color: #373737;
        }

        select option {
            color: #373737;
            font-weight: 600;
        }

        input[type=radio] {
            padding: 3px;
            width: 24px;
            height: 24px;
            border: 2px solid #A8A8A8;
            border-radius: 50%;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            cursor: pointer;
            vertical-align: middle;
        }

        input[type=radio]:after {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            background-color: #005fff;
            border-radius: 50%;
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        input[type=radio]:hover {
            border-color: #005fff;
        }

        input[type=radio]:checked {
            border-color: #005fff;
        }

        input[type=radio]:checked:after {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        .stripe-filed {
            padding: 16px 24px;
        }

        input[type=search]::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }

        input[type=search]:after {
            display: inline-block;
            content: "";
        }

        input[type=number].no-spin-btn::-webkit-outer-spin-button,
        input[type=number].no-spin-btn::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .uni-dialog-box,
        .uni-action-sheet {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
            height: 100%;
        }

        .uni-dialog-box .mask,
        .uni-action-sheet .mask {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .uni-dialog-box .container,
        .uni-action-sheet .container {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            margin: auto;
            width: 400px;
            height: 420px;
            background: #FFFFFF;
            -webkit-box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            border-radius: 12px;
            opacity: 0;
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
            -webkit-transition: opacity 0.3s cubic-bezier(0.11, 0, 0.5, 0), height 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s cubic-bezier(0.11, 0, 0.5, 0), height 0.3s, -webkit-transform 0.3s;
            transition: transform 0.3s, opacity 0.3s cubic-bezier(0.11, 0, 0.5, 0), height 0.3s;
            transition: transform 0.3s, opacity 0.3s cubic-bezier(0.11, 0, 0.5, 0), height 0.3s, -webkit-transform 0.3s;
        }

        .uni-dialog-box .container i.close,
        .uni-action-sheet .container i.close {
            position: absolute;
            top: 11px;
            right: 12px;
            z-index: 1003;
            display: block;
            width: 42px;
            height: 42px;
            background-color: #f2f2f2;
            border-radius: 50%;
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .uni-dialog-box .container i.close:before,
        .uni-dialog-box .container i.close:after,
        .uni-action-sheet .container i.close:before,
        .uni-action-sheet .container i.close:after {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -2.4%;
            margin-left: -26.2%;
            width: 52%;
            height: 4.8%;
            border-radius: 2px;
            display: block;
            background-color: #a8a8a8;
            content: "";
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .uni-dialog-box .container i.close:before,
        .uni-action-sheet .container i.close:before {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .uni-dialog-box .container i.close:after,
        .uni-action-sheet .container i.close:after {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        .uni-dialog-box .container i.close:hover,
        .uni-action-sheet .container i.close:hover {
            background-color: #F28787;
        }

        .uni-dialog-box .container i.close:hover:before,
        .uni-dialog-box .container i.close:hover:after,
        .uni-action-sheet .container i.close:hover:before,
        .uni-action-sheet .container i.close:hover:after {
            background-color: #fff;
        }

        .uni-dialog-box .container .content,
        .uni-action-sheet .container .content {
            position: relative;
            z-index: 1002;
            padding: 32px;
            width: 100%;
            height: 100%;
        }

        .uni-dialog-box .container .content .model-box,
        .uni-action-sheet .container .content .model-box {
            position: relative;
            padding-bottom: 80px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: space-evenly;
            -ms-flex-pack: space-evenly;
            justify-content: space-evenly;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            height: 100%;
            text-align: center;
            font-size: 0;
        }

        .uni-dialog-box .container .content .model-box.idle .title i.icon,
        .uni-action-sheet .container .content .model-box.idle .title i.icon {
            display: none;
        }

        .uni-dialog-box .container .content .model-box.alert .title i.icon,
        .uni-action-sheet .container .content .model-box.alert .title i.icon {
            background-image: url(img/dialog__icon_alert.svg);
        }

        .uni-dialog-box .container .content .model-box.alert .title h3,
        .uni-action-sheet .container .content .model-box.alert .title h3 {
            color: #FF4444;
        }

        .uni-dialog-box .container .content .model-box.alert p.note samp,
        .uni-action-sheet .container .content .model-box.alert p.note samp {
            display: inline-block;
            text-align: left;
            word-break: break-all;
        }

        .uni-dialog-box .container .content .model-box.alert-coin .title i.icon,
        .uni-action-sheet .container .content .model-box.alert-coin .title i.icon {
            background-image: url(img/dialog__icon_alert-coin.svg);
        }

        .uni-dialog-box .container .content .model-box.alert-coin .title h3,
        .uni-action-sheet .container .content .model-box.alert-coin .title h3 {
            color: #ffb639;
        }

        .uni-dialog-box .container .content .model-box.success .title i.icon,
        .uni-action-sheet .container .content .model-box.success .title i.icon {
            background-image: url(img/dialog__icon_success.svg);
        }

        .uni-dialog-box .container .content .model-box.success .title h3,
        .uni-action-sheet .container .content .model-box.success .title h3 {
            color: #17d281;
        }

        .uni-dialog-box .container .content .model-box.info .title i.icon,
        .uni-action-sheet .container .content .model-box.info .title i.icon {
            background-image: url(img/dialog__icon_info.svg);
        }

        .uni-dialog-box .container .content .model-box.info .title h3,
        .uni-action-sheet .container .content .model-box.info .title h3 {
            color: #7c56ff;
        }

        .uni-dialog-box .container .content .model-box.attention .title i.icon,
        .uni-dialog-box .container .content .model-box.warn .title i.icon,
        .uni-action-sheet .container .content .model-box.attention .title i.icon,
        .uni-action-sheet .container .content .model-box.warn .title i.icon {
            background-image: url(img/dialog__icon_attention.svg);
        }

        .uni-dialog-box .container .content .model-box.attention .title h3,
        .uni-dialog-box .container .content .model-box.warn .title h3,
        .uni-action-sheet .container .content .model-box.attention .title h3,
        .uni-action-sheet .container .content .model-box.warn .title h3 {
            color: #ff9c39;
        }

        .uni-dialog-box .container .content .model-box.clap .title i.icon,
        .uni-action-sheet .container .content .model-box.clap .title i.icon {
            background-image: url(img/dialog__icon_clap.png);
        }

        .uni-dialog-box .container .content .model-box.clap .title h3,
        .uni-action-sheet .container .content .model-box.clap .title h3 {
            color: #ff9c39;
        }

        .uni-dialog-box .container .content .model-box.search-add-ins .title,
        .uni-action-sheet .container .content .model-box.search-add-ins .title {
            padding-top: 60px;
        }

        .uni-dialog-box .container .content .model-box.logo.getinsup i.icon,
        .uni-action-sheet .container .content .model-box.logo.getinsup i.icon {
            background-image: url(img/logo_getinsup.svg);
        }

        .uni-dialog-box .container .content .model-box .title i.icon,
        .uni-action-sheet .container .content .model-box .title i.icon {
            display: inline-block;
            width: 80px;
            height: 80px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        .uni-dialog-box .container .content .model-box .title h3,
        .uni-action-sheet .container .content .model-box .title h3 {
            padding-top: 16px;
            font: 600 28px/34px Montserrat;
        }

        .uni-dialog-box .container .content .model-box p.note,
        .uni-action-sheet .container .content .model-box p.note {
            font: 400 16px/19px Montserrat;
            color: #2A2A2A;
            word-break: break-word;
        }

        .uni-dialog-box .container .content .model-box p.note b,
        .uni-action-sheet .container .content .model-box p.note b {
            font-weight: 600;
        }

        .uni-dialog-box .container .content .model-box p.note.bold,
        .uni-action-sheet .container .content .model-box p.note.bold {
            font-weight: 600;
        }

        .uni-dialog-box .container .content .model-box p.note.bold b,
        .uni-action-sheet .container .content .model-box p.note.bold b {
            font-weight: 700;
            color: #FF9C39;
        }

        .uni-dialog-box .container .content .model-box p.note.absolute,
        .uni-action-sheet .container .content .model-box p.note.absolute {
            position: absolute;
            bottom: 76px;
        }

        .uni-dialog-box .container .content .model-box .btn,
        .uni-action-sheet .container .content .model-box .btn {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
        }

        .uni-dialog-box .container .content .model-box .btn a,
        .uni-action-sheet .container .content .model-box .btn a {
            display: block;
            width: 100%;
            height: 100%;
        }

        .uni-dialog-box .container .content .model-box .input,
        .uni-action-sheet .container .content .model-box .input {
            margin-top: 64px;
            width: 100%;
            height: 60px;
        }

        .uni-dialog-box .container .content .model-box .ins,
        .uni-action-sheet .container .content .model-box .ins {
            padding-top: 50px;
        }

        .uni-dialog-box .container .content .model-box .ins img,
        .uni-action-sheet .container .content .model-box .ins img {
            width: 136px;
            height: 136px;
            border-radius: 50%;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .uni-dialog-box .container .content .model-box .ins p,
        .uni-action-sheet .container .content .model-box .ins p {
            margin-top: 20px;
            font: 600 16px/20px Montserrat;
            color: #2A2A2A;
        }

        .uni-dialog-box .container .content .model-box .login-register,
        .uni-action-sheet .container .content .model-box .login-register {
            padding: 0;
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label {
            position: relative;
            margin: 20px auto 0;
            display: block;
            width: 336px;
            height: 60px;
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label:after,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label:after {
            position: absolute;
            top: 0;
            left: 24px;
            z-index: 1;
            display: block;
            width: 20px;
            height: 100%;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            content: "";
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.username input,
        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.email input,
        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.password input,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.username input,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.email input,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.password input {
            padding-left: 66px;
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.username:after,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.username:after {
            background-image: url(img/login-register__icon_user.svg);
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.email:after,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.email:after {
            background-image: url(img/login-register__icon_email.svg);
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.password:after,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.password:after {
            background-image: url(img/login-register__icon_password.svg);
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.msg,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.msg {
            height: auto;
            font: 500 14px/18px Montserrat;
            color: #FF4444;
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label a,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label a {
            font: 400 12px Montserrat;
            letter-spacing: 0;
            color: #2A2A2A;
            text-decoration: underline;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label a:hover,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label a:hover {
            color: #005fff;
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.links,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.links {
            margin-top: 20px;
            height: auto;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .uni-dialog-box .container .content .model-box .login-register .login-register__form label.links-row,
        .uni-action-sheet .container .content .model-box .login-register .login-register__form label.links-row {
            margin-top: 10px;
            height: auto;
        }

        .uni-dialog-box .container .loading-puff-type-1,
        .uni-action-sheet .container .loading-puff-type-1 {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            margin: auto;
            width: 30%;
            height: 30%;
            background: url(img/loading-puff-type-1.svg) no-repeat center;
            background-size: contain;
        }

        .uni-dialog-box .container.bg-festival,
        .uni-action-sheet .container.bg-festival {
            background: linear-gradient(44deg, #FFB16D 0%, #FF437C 27%, #B035F1 80%, #A733FF 100%);
        }

        .uni-dialog-box .container.bg-festival .content .model-box .title h3,
        .uni-action-sheet .container.bg-festival .content .model-box .title h3 {
            color: #fff !important;
        }

        .uni-dialog-box .container.bg-festival .content .model-box p.note,
        .uni-action-sheet .container.bg-festival .content .model-box p.note {
            color: #fff;
        }

        .uni-dialog-box .container.bg-festival .content .model-box p.note b,
        .uni-action-sheet .container.bg-festival .content .model-box p.note b {
            color: #FFDB4B;
        }

        .uni-dialog-box .container.login .content .model-box,
        .uni-dialog-box .container.register .content .model-box,
        .uni-action-sheet .container.login .content .model-box,
        .uni-action-sheet .container.register .content .model-box {
            padding-bottom: 0;
        }

        .uni-dialog-box .container.login .content .model-box .title i.icon,
        .uni-dialog-box .container.register .content .model-box .title i.icon,
        .uni-action-sheet .container.login .content .model-box .title i.icon,
        .uni-action-sheet .container.register .content .model-box .title i.icon {
            width: 58px;
            height: 58px;
        }

        .uni-dialog-box .container.login .content .model-box .title h3,
        .uni-dialog-box .container.register .content .model-box .title h3,
        .uni-action-sheet .container.login .content .model-box .title h3,
        .uni-action-sheet .container.register .content .model-box .title h3 {
            padding-top: 16px;
            font: 600 18px Montserrat;
        }

        .uni-dialog-box .container.login,
        .uni-action-sheet .container.login {
            height: 540px;
        }

        .uni-dialog-box .container.register,
        .uni-action-sheet .container.register {
            height: 680px;
        }

        .uni-dialog-box .loading-puff,
        .uni-action-sheet .loading-puff {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            margin: auto;
            width: 50px;
            height: 50px;
            background: url(img/loading-puff-black.svg) no-repeat center;
            background-size: contain;
        }

        .uni-dialog-box .loading-progress-container,
        .uni-action-sheet .loading-progress-container {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            margin: auto;
            width: 340px;
            height: 60px;
        }

        .uni-dialog-box .loading-progress-container .loading-progress,
        .uni-action-sheet .loading-progress-container .loading-progress {
            position: relative;
            width: 100%;
            height: 30%;
            background-color: #d2d2d2;
            border-radius: 10px;
            overflow: hidden;
        }

        .uni-dialog-box .loading-progress-container .loading-progress i,
        .uni-action-sheet .loading-progress-container .loading-progress i {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            display: block;
            height: 100%;
            background-color: #8f3ec3;
            background-image: repeating-linear-gradient(-45deg, #7c56ff, #7c56ff 30px, #ab34e8 30px, #d162e8 60px);
            background-size: 600px 100%;
            border-radius: 10px;
            -webkit-transition: width 0.5s cubic-bezier(0.83, 0, 0.17, 1);
            transition: width 0.5s cubic-bezier(0.83, 0, 0.17, 1);
            -webkit-animation: loading-progress-move 10s linear infinite;
            animation: loading-progress-move 10s linear infinite;
        }

        @-webkit-keyframes loading-progress-move {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 600px 0;
            }
        }

        @keyframes loading-progress-move {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 600px 0;
            }
        }

        .uni-dialog-box .loading-progress-container p,
        .uni-action-sheet .loading-progress-container p {
            margin-top: 6%;
            text-align: center;
            font-weight: 500;
            font-size: 18px;
        }

        .uni-dialog-box.stripe-iframe .container,
        .uni-action-sheet.stripe-iframe .container {
            width: auto;
            height: auto;
            max-width: 600px;
            max-height: 600px;
            border-radius: 12px;
            overflow: hidden;
        }

        .uni-dialog-box.stripe-iframe .container .content,
        .uni-action-sheet.stripe-iframe .container .content {
            padding: 0;
        }

        .uni-dialog-box.stripe-iframe .container .content iframe,
        .uni-action-sheet.stripe-iframe .container .content iframe {
            background: url(img/loading-puff-type-1.svg) no-repeat center;
            background-size: 30% 30%;
        }

        .uni-dialog-box.enter-box .container,
        .uni-action-sheet.enter-box .container {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        .uni-dialog-box.enter-mask .mask,
        .uni-action-sheet.enter-mask .mask {
            background-color: rgba(255, 255, 255, 0.4);
            -webkit-backdrop-filter: saturate(140%) blur(8px);
            backdrop-filter: saturate(140%) blur(8px);
        }

        .uni-action-sheet .container {
            position: absolute;
            top: auto;
            bottom: 0;
            width: 500px;
            border-radius: 32px 32px 0 0;
            opacity: 1;
            -webkit-transform: scale(1) translateY(100%);
            transform: scale(1) translateY(100%);
        }

        .uni-action-sheet.enter-box .container {
            -webkit-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0);
        }

        .uni-tip-container-qr-code {
            position: fixed;
            z-index: 20;
            margin: auto;
            width: 146px;
            height: 146px;
            overflow: hidden;
            border-radius: 7px;
            background-color: #fff;
            -webkit-box-shadow: 2px 2px 6px 1px rgba(0, 0, 0, 0.28);
            box-shadow: 2px 2px 6px 1px rgba(0, 0, 0, 0.28);
            font-size: 0;
            opacity: 0;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
            -webkit-transition: all 0.6s;
            transition: all 0.6s;
        }

        .uni-tip-container-qr-code.enter {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .uni-tip-container-qr-code img {
            position: relative;
            z-index: 7;
            width: 100%;
            height: 100%;
        }

        .uni-tip-container-qr-code img.loading {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 7;
            margin: auto;
            width: 30%;
            height: 30%;
        }

        .loading-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .loading-animation i {
            display: block;
            width: 60px;
            height: 60px;
            background: url(img/loading-puff-black.svg) no-repeat center;
            background-size: contain;
        }

        .loading-animation p {
            font-size: 15px;
            font-weight: 500;
        }

        .post-container .post-list {
            overflow: hidden;
        }

        .post-container .post-list .post-list-wrapper {
            margin-left: -10px;
            width: 720px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .post-container .post-list .img-container {
            position: relative;
            margin: 20px 10px 0;
            display: inline-block;
            width: 160px;
            height: 160px;
            cursor: pointer;
            border-radius: 18px;
            overflow: hidden;
        }

        .post-container .post-list .img-container.selected .mark {
            opacity: 1;
        }

        .post-container .post-list .img-container img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eaeaea), color-stop(18%, #e3e3e3), color-stop(33%, #eaeaea));
            background: linear-gradient(to right, #eaeaea 8%, #e3e3e3 18%, #eaeaea 33%);
            -webkit-animation: post-img-container-move 2s linear infinite;
            animation: post-img-container-move 2s linear infinite;
        }

        @-webkit-keyframes post-img-container-move {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 320px 0;
            }
        }

        @keyframes post-img-container-move {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 320px 0;
            }
        }

        .post-container .post-list .img-container .mark {
            position: absolute;
            top: 0;
            left: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            height: 100%;
            border: 5px solid #FF215C;
            border-radius: 18px;
            background-color: rgba(0, 0, 0, 0.53);
            opacity: 0;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .post-container .post-list .img-container .mark i {
            display: inline-block;
            width: 36px;
            height: 32px;
            background-image: url(img/icon_favorite.svg);
            background-size: contain;
            background-repeat: no-repeat;
        }

        .post-container .post-list .img-container .mark p {
            margin-top: 8px;
            font: 600 20px Montserrat;
            color: #FFFFFF;
        }

        .post-container .load-more {
            display: inline-block;
            width: 100%;
            font: 600 20px/120px Montserrat;
            color: #2A2A2A;
            text-align: center;
            text-decoration: underline;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .post-container .load-more:hover {
            color: #005fff;
        }

        .post-container .load-more.loading {
            text-decoration: none;
        }

        .post-container .load-more.loading:hover {
            color: #2A2A2A;
        }

        .post-container .load-more.loading:before {
            content: "";
            display: inline-block;
            width: 44px;
            height: 44px;
            background: url(img/loading-puff-black.svg) no-repeat center;
            background-size: contain;
            vertical-align: middle;
        }

        .post-container .post-blank {
            width: 100%;
            height: 60px;
        }

        .pkg-container .package {
            position: relative;
            margin-top: 38px;
            padding: 0 50px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            min-height: 100px;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            background: #FFFFFF;
            border: 2px solid rgba(168, 168, 168, 0.2);
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.06);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.06);
            border-radius: 12px;
            font-size: 0;
            cursor: pointer;
            -webkit-transition: border-color 0.3s, -webkit-box-shadow 0.3s;
            transition: border-color 0.3s, -webkit-box-shadow 0.3s;
            transition: border-color 0.3s, box-shadow 0.3s;
            transition: border-color 0.3s, box-shadow 0.3s, -webkit-box-shadow 0.3s;
        }

        .pkg-container .package:hover {
            -webkit-box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .pkg-container .package.selected {
            padding: 23px 49px 23px 49px !important;
            border-width: 3px !important;
            border-color: #FF4500 !important;
            cursor: default;
        }

        .pkg-container .package.selected:after {
            right: -3px;
            top: -3px;
            opacity: 1;
        }

        .pkg-container .package.selected.hot:before {
            right: -3px;
            top: -3px;
        }

        .pkg-container .package.selected:hover {
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.06) !important;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.06) !important;
        }

        .pkg-container .package.hot {
            background-color: #FFEAD8;
            border-color: #E4AE8A;
        }

        .pkg-container .package.hot:hover {
            -webkit-box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .pkg-container .package.hot:before {
            right: -2px;
            top: -2px;
            opacity: 1;
        }

        .pkg-container .package:after,
        .pkg-container .package:before {
            position: absolute;
            right: -2px;
            top: -2px;
            background-size: contain;
            background-repeat: no-repeat;
            content: "";
            opacity: 0;
            -webkit-transition: opacity 0.3s;
            transition: opacity 0.3s;
        }

        .pkg-container .package:after {
            width: 52px;
            height: 52px;
            background-image: url(img/user-center__icon_checked.svg);
        }

        .pkg-container .package:before {
            width: 90px;
            height: 90px;
            background-image: url(img/user-center__icon_hot.svg);
        }

        .pkg-container .package i {
            display: inline-block;
            vertical-align: middle;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .pkg-container .package.follow i.num-i {
            width: 39px;
            height: 28px;
            background-image: url(img/user-center__icon_follow_black.svg);
        }

        .pkg-container .package.like i.num-i {
            width: 30px;
            height: 26px;
            background-image: url(img/user__task_icon_like.svg);
        }

        .pkg-container .package span.num {
            font-size: 0;
        }

        .pkg-container .package span.num i,
        .pkg-container .package span.num b,
        .pkg-container .package span.num span {
            vertical-align: middle;
        }

        .pkg-container .package span.num i {
            margin-right: 20px;
        }

        .pkg-container .package span.num b {
            font: 800 24px Montserrat;
        }

        .pkg-container .package span.num span {
            font: 500 24px Montserrat;
            color: #2A2A2A;
        }

        .pkg-container .package span.likes {
            font-size: 0;
        }

        .pkg-container .package span.likes span {
            font: 500 20px Montserrat;
            color: #FF6F00;
            vertical-align: middle;
        }

        .pkg-container .package span.likes i {
            margin-left: 14px;
            content: "";
            display: inline-block;
            width: 26px;
            height: 26px;
            background-image: url(img/user-center__icon_giftbox.svg);
            vertical-align: middle;
        }

        .pkg-container .package span.coins {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            text-align: right;
        }

        .pkg-container .package span.coins sup {
            font: 500 24px Montserrat;
            color: #FF6F00;
        }

        .pkg-container .package span.coins sub {
            font: 500 16px Montserrat;
            color: #A8A8A8;
            text-decoration: line-through;
        }

        .pkg-container .package.skeleton {
            cursor: default;
        }

        .pkg-container .package.skeleton span.s {
            display: inline-block;
            width: 100%;
            height: 28px;
        }

        .pkg-container .package.skeleton span.num {
            width: 34%;
        }

        .pkg-container .package.skeleton span.likes {
            width: 26%;
        }

        .pkg-container .package.skeleton span.coins {
            width: 20%;
        }

        .pkg-container .package.skeleton:hover {
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.06);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.06);
        }

        .pkg-extra {
            margin-top: 86px;
        }

        .pkg-extra h2:before {
            margin-right: 10px;
            display: inline-block;
            vertical-align: middle;
            width: 34px;
            height: 34px;
            background: url(img/user-center__icon_giftbox.svg) no-repeat;
            background-size: contain;
            content: "";
        }

        .pkg-extra .img {
            margin: 60px auto 0;
            width: 200px;
            height: 200px;
        }

        .pkg-extra .img img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: 20px;
        }

        .pkg-extra p {
            margin-top: 16px;
            font-size: 0;
            text-align: center;
        }

        .pkg-extra p span {
            font: 600 20px Montserrat;
            color: #2A2A2A;
            vertical-align: middle;
        }

        .pkg-extra p i {
            margin-right: 8px;
            display: inline-block;
            vertical-align: middle;
            width: 27px;
            height: 24px;
            background: url(img/user__task_icon_like.svg) no-repeat;
            background-size: contain;
        }

        .control-search_ins {
            display: inline-block;
            width: 700px;
            height: 80px;
            -webkit-box-shadow: 0 5px 20px #000A3D1C;
            box-shadow: 0 5px 20px #000A3D1C;
            border-radius: 8px;
        }

        .control-search_ins label {
            width: 72%;
            height: 100%;
            display: inline-block;
            vertical-align: top;
        }

        .control-search_ins label input {
            padding-left: 15%;
            padding-right: 2.86%;
            width: 100%;
            height: 100%;
            border: 1px solid #E0E1E6 !important;
            border-right: none !important;
            border-radius: 8px 0 0 8px;
            background: #fff url(img/icon_search_username.svg) no-repeat 26px 20px;
            background-size: 34px 38px;
            font: 500 20px Montserrat;
            color: #2d2d2d;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .control-search_ins label input:hover,
        .control-search_ins label input:focus {
            border-color: #005FFF !important;
        }

        .control-search_ins .search_btn {
            display: inline-block;
            vertical-align: top;
            width: 28%;
            height: 100%;
            border-radius: 0 8px 8px 0;
            overflow: hidden;
        }

        .img-preloader {
            display: none;
        }

        .banner-animate-loading {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 60px;
            height: 60px;
            background: url(img/loading-puff-white.svg) no-repeat center;
            background-size: contain;
        }

        .skeleton-bg {
            background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
            background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
            background-size: 200% 100%;
            -webkit-animation: skeleton-bg-shimmer 4s infinite linear;
            animation: skeleton-bg-shimmer 4s infinite linear;
        }

        @-webkit-keyframes skeleton-bg-shimmer {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        @keyframes skeleton-bg-shimmer {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        .VuePagination {
            margin-top: 40px;
            text-align: center;
        }

        .VuePagination .page-item {
            position: relative;
            margin: 0 4px;
            display: inline-block;
            -webkit-transition: color 0.3s;
            transition: color 0.3s;
        }

        .VuePagination .page-item:active {
            top: 1px;
            -webkit-box-shadow: 0 2px 4px #0000000F !important;
            box-shadow: 0 2px 4px #0000000F !important;
        }

        .VuePagination .page-item a {
            padding: 4px 8px;
            display: inline-block;
            font: 600 16px/20px Montserrat;
            color: #7A7A7A;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .VuePagination .page-item a:hover {
            color: #005fff;
        }

        .VuePagination .page-item.active a {
            color: #005fff;
        }

        .VuePagination .page-item.active a:hover {
            cursor: default;
        }

        .VuePagination .page-item.disabled a {
            color: #d6d6d6;
        }

        .VuePagination .VuePagination__pagination-item-prev-page,
        .VuePagination .VuePagination__pagination-item-prev-chunk,
        .VuePagination .VuePagination__pagination-item-next-page,
        .VuePagination .VuePagination__pagination-item-next-chunk {
            margin: 0 8px;
            -webkit-box-shadow: 0 3px 6px #0000000F;
            box-shadow: 0 3px 6px #0000000F;
            border: 1px solid #DFDFDF;
            border-radius: 3px;
        }

        .VuePagination .VuePagination__pagination-item-prev-page a,
        .VuePagination .VuePagination__pagination-item-prev-chunk a,
        .VuePagination .VuePagination__pagination-item-next-page a,
        .VuePagination .VuePagination__pagination-item-next-chunk a {
            color: #2A2A2A;
        }

        .VuePagination .VuePagination__pagination-item-prev-page:hover,
        .VuePagination .VuePagination__pagination-item-prev-chunk:hover,
        .VuePagination .VuePagination__pagination-item-next-page:hover,
        .VuePagination .VuePagination__pagination-item-next-chunk:hover {
            -webkit-box-shadow: 0 3px 6px #00000036;
            box-shadow: 0 3px 6px #00000036;
        }

        .VuePagination .VuePagination__pagination-item-prev-page:hover a,
        .VuePagination .VuePagination__pagination-item-prev-chunk:hover a,
        .VuePagination .VuePagination__pagination-item-next-page:hover a,
        .VuePagination .VuePagination__pagination-item-next-chunk:hover a {
            color: #2A2A2A;
        }

        .VuePagination .VuePagination__pagination-item-prev-page.disabled,
        .VuePagination .VuePagination__pagination-item-prev-chunk.disabled,
        .VuePagination .VuePagination__pagination-item-next-page.disabled,
        .VuePagination .VuePagination__pagination-item-next-chunk.disabled {
            -webkit-box-shadow: 0 3px 6px #0000000F;
            box-shadow: 0 3px 6px #0000000F;
        }

        .VuePagination .VuePagination__pagination-item-prev-page.disabled a,
        .VuePagination .VuePagination__pagination-item-prev-chunk.disabled a,
        .VuePagination .VuePagination__pagination-item-next-page.disabled a,
        .VuePagination .VuePagination__pagination-item-next-chunk.disabled a {
            color: #d6d6d6;
            cursor: default;
        }

        #footer-translate-blank {
            margin-top: 24px;
            height: 32px;
        }

        #wrapper-translate {
            position: relative;
            margin: 0 auto;
            width: 1210px;
            height: 0;
        }

        #google_translate_element {
            position: absolute;
            right: 0;
            bottom: 48px;
            text-align: center;
        }

        #google_translate_element .goog-te-gadget {
            display: inline-block;
            text-align: left;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple {
            background-color: transparent;
            border: 1px solid rgba(0, 0, 0, 0.4);
            border-radius: 4px;
            font-size: 16px;
            padding: 0;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-gadget-icon {
            display: none;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value {
            margin-left: 12px;
            margin-right: 10px;
            display: inline-block;
            color: rgba(0, 0, 0, 0.6) !important;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value span {
            display: inline-block;
            height: 30px;
            line-height: 30px;
            border-color: rgba(0, 0, 0, 0.4) !important;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value img {
            width: 8px !important;
        }

        body {
            top: 0 !important;
            min-height: 0 !important;
        }

        @-webkit-keyframes pulse {
            from {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            50% {
                -webkit-transform: scale3d(1.05, 1.05, 1.05);
                transform: scale3d(1.05, 1.05, 1.05);
            }

            to {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes pulse {
            from {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            50% {
                -webkit-transform: scale3d(1.05, 1.05, 1.05);
                transform: scale3d(1.05, 1.05, 1.05);
            }

            to {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @-webkit-keyframes tada {
            from {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            10%,
            20% {
                -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
                transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
            }

            30%,
            50%,
            70%,
            90% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
            }

            40%,
            60%,
            80% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
            }

            to {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes tada {
            from {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            10%,
            20% {
                -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
                transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
            }

            30%,
            50%,
            70%,
            90% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
            }

            40%,
            60%,
            80% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
            }

            to {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @-webkit-keyframes hinge {
            0% {
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
            }

            20%,
            60% {
                -webkit-transform: rotate3d(0, 0, 1, 80deg);
                transform: rotate3d(0, 0, 1, 80deg);
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
            }

            40%,
            80% {
                -webkit-transform: rotate3d(0, 0, 1, 60deg);
                transform: rotate3d(0, 0, 1, 60deg);
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
                opacity: 1;
            }

            to {
                -webkit-transform: translate3d(0, 700px, 0);
                transform: translate3d(0, 700px, 0);
                opacity: 0;
            }
        }

        @keyframes hinge {
            0% {
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
            }

            20%,
            60% {
                -webkit-transform: rotate3d(0, 0, 1, 80deg);
                transform: rotate3d(0, 0, 1, 80deg);
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
            }

            40%,
            80% {
                -webkit-transform: rotate3d(0, 0, 1, 60deg);
                transform: rotate3d(0, 0, 1, 60deg);
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
                opacity: 1;
            }

            to {
                -webkit-transform: translate3d(0, 700px, 0);
                transform: translate3d(0, 700px, 0);
                opacity: 0;
            }
        }

        .goog-te-banner-frame {
            display: none;
        }

        @media (min-width: 769px) {
            .mobile {
                display: none !important;
            }

            .wrapper {
                width: 1210px;
            }

            .header-blank {
                height: 80px;
            }
        }

        @media (max-width: 768px) {
            a:hover {
                color: #005fff;
            }

            a:active {
                color: #2128BD;
            }

            .pc {
                display: none !important;
            }

            .wrapper {
                width: 100%;
            }

            .index-loading {
                padding: 80px 8vw;
            }

            .banner-animate-loading {
                width: 50px;
                height: 50px;
            }

            .header-blank {
                height: 44px;
            }

            .home__sec {
                padding: 85px 0 73px;
            }

            .home__sec .home__sec_h2 {
                padding: 0 15px;
                font-size: 22px;
                font-weight: 700;
                line-height: 27px;
            }

            .home__sec .home__sec_p {
                margin-top: 10px;
                padding: 0 15px;
                font-size: 14px;
                line-height: 18px;
            }

            input[type=text],
            input[type=email],
            input[type=search],
            input[type=password],
            input[type=number],
            input[type=tel],
            textarea,
            select,
            .stripe-filed {
                padding: 0 3.2vw;
                border: 1px solid #DEDEDE;
                border-radius: 4px;
                line-height: normal;
                text-align: left;
                font: 600 14px Montserrat;
                line-height: normal;
            }

            input[type=text]:hover,
            input[type=text]:focus,
            input[type=email]:hover,
            input[type=email]:focus,
            input[type=search]:hover,
            input[type=search]:focus,
            input[type=password]:hover,
            input[type=password]:focus,
            input[type=number]:hover,
            input[type=number]:focus,
            input[type=tel]:hover,
            input[type=tel]:focus,
            textarea:hover,
            textarea:focus,
            select:hover,
            select:focus,
            .stripe-filed:hover,
            .stripe-filed:focus {
                border: 1px solid #005FFF;
            }

            .stripe-filed {
                padding: 15px 12px;
            }

            input[type=radio] {
                padding: 4px;
                width: 22px;
                height: 22px;
                border: 1px solid #A8A8A8;
            }

            textarea {
                padding: 10px 3.2vw;
            }

            .uni-dialog-box .container,
            .uni-action-sheet .container {
                width: 90vw;
                height: 340px;
            }

            .uni-dialog-box .container i.close,
            .uni-action-sheet .container i.close {
                top: 11px;
                right: 12px;
                width: 36px;
                height: 36px;
            }

            .uni-dialog-box .container .content,
            .uni-action-sheet .container .content {
                padding: 4vw;
            }

            .uni-dialog-box .container .content .model-box .btn,
            .uni-action-sheet .container .content .model-box .btn {
                height: 50px;
            }

            .uni-dialog-box .container .content .model-box .title i.icon,
            .uni-action-sheet .container .content .model-box .title i.icon {
                margin-top: 20px;
                width: 60px;
                height: 60px;
            }

            .uni-dialog-box .container .content .model-box .title h3,
            .uni-action-sheet .container .content .model-box .title h3 {
                padding-top: 10px;
                font: 600 22px Montserrat;
            }

            .uni-dialog-box .container .content .model-box p.note,
            .uni-action-sheet .container .content .model-box p.note {
                font: 400 14px Montserrat;
            }

            .uni-dialog-box .container .content .model-box .input,
            .uni-action-sheet .container .content .model-box .input {
                height: 56px;
            }

            .uni-dialog-box .container .content .model-box .login-register .login-register__form label,
            .uni-action-sheet .container .content .model-box .login-register .login-register__form label {
                width: 82vw;
                height: 48px;
            }

            .uni-dialog-box .container .content .model-box .login-register .login-register__form label:after,
            .uni-action-sheet .container .content .model-box .login-register .login-register__form label:after {
                left: 12px;
                width: 12px;
                height: 100%;
            }

            .uni-dialog-box .container .content .model-box .login-register .login-register__form label.username input,
            .uni-dialog-box .container .content .model-box .login-register .login-register__form label.email input,
            .uni-dialog-box .container .content .model-box .login-register .login-register__form label.password input,
            .uni-action-sheet .container .content .model-box .login-register .login-register__form label.username input,
            .uni-action-sheet .container .content .model-box .login-register .login-register__form label.email input,
            .uni-action-sheet .container .content .model-box .login-register .login-register__form label.password input {
                padding-left: 33px;
            }

            .uni-dialog-box .container .content .model-box .login-register .login-register__form label.msg,
            .uni-action-sheet .container .content .model-box .login-register .login-register__form label.msg {
                font: 500 13px/18px Montserrat;
            }

            .uni-dialog-box .container .content .model-box .login-register .login-register__form label a,
            .uni-action-sheet .container .content .model-box .login-register .login-register__form label a {
                font: 400 13px Montserrat;
            }

            .uni-dialog-box .container .content .model-box .login-register .login-register__form label.links-row,
            .uni-action-sheet .container .content .model-box .login-register .login-register__form label.links-row {
                margin-top: 10px;
            }

            .uni-dialog-box .container .loading-puff-type-1,
            .uni-action-sheet .container .loading-puff-type-1 {
                width: 30%;
                height: 30%;
            }

            .uni-dialog-box .container.login .content .model-box .title i.icon,
            .uni-dialog-box .container.register .content .model-box .title i.icon,
            .uni-action-sheet .container.login .content .model-box .title i.icon,
            .uni-action-sheet .container.register .content .model-box .title i.icon {
                margin-top: 0;
            }

            .uni-dialog-box .container.login .content .model-box .title h3,
            .uni-dialog-box .container.register .content .model-box .title h3,
            .uni-action-sheet .container.login .content .model-box .title h3,
            .uni-action-sheet .container.register .content .model-box .title h3 {
                padding-top: 8px;
            }

            .uni-dialog-box .container.login,
            .uni-action-sheet .container.login {
                height: 450px;
            }

            .uni-dialog-box .container.register,
            .uni-action-sheet .container.register {
                height: 560px;
            }

            .uni-dialog-box .container.register .content .model-box .title h3,
            .uni-action-sheet .container.register .content .model-box .title h3 {
                font-size: 16px;
            }

            .uni-dialog-box .loading-progress-container,
            .uni-action-sheet .loading-progress-container {
                width: 72vw;
                max-width: 280px;
                height: 40px;
            }

            .uni-dialog-box .loading-progress-container p,
            .uni-action-sheet .loading-progress-container p {
                margin-top: 4%;
                font-size: 14px;
            }

            .uni-dialog-box.stripe-iframe .container,
            .uni-action-sheet.stripe-iframe .container {
                max-width: 90%;
                max-height: 90%;
                border-radius: 6px;
            }

            .uni-dialog-box.stripe-iframe .container .content,
            .uni-action-sheet.stripe-iframe .container .content {
                padding: 0;
            }

            .uni-action-sheet .container {
                width: 92%;
                border-radius: 32px 32px 0 0;
                -webkit-box-shadow: 0 2px 12px rgba(0, 0, 0, 0.18);
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.18);
                opacity: 1;
                -webkit-transform: scale(1) translateY(100%);
                transform: scale(1) translateY(100%);
            }

            .uni-action-sheet .container .content {
                padding-bottom: max(4vw, env(safe-area-inset-bottom));
            }

            .uni-action-sheet.enter-box .container {
                -webkit-transform: scale(1) translateY(0);
                transform: scale(1) translateY(0);
            }

            .post-container .post-list {
                width: 100%;
            }

            .post-container .post-list .post-list-wrapper {
                margin-left: -2vw;
                width: 88vw;
            }

            .post-container .post-list .img-container {
                margin: 2vw;
                width: 25.333vw;
                height: 25.333vw;
                border-radius: 9px;
            }

            .post-container .post-list .img-container .mark {
                border-width: 3px;
                border-radius: 9px;
            }

            .post-container .post-list .img-container .mark i {
                width: 19px;
                height: 16px;
            }

            .post-container .post-list .img-container .mark p {
                margin-top: 5px;
                font: 600 10px Montserrat;
            }

            .post-container .load-more {
                margin-top: -5px;
                font: 600 12px/60px Montserrat;
            }

            .post-container .load-more.loading:before {
                width: 30px;
                height: 30px;
            }

            .post-container .post-blank {
                width: 100%;
                height: 30px;
            }

            .pkg-container .package {
                margin-top: 19px;
                padding: 8px 32px 8px 12px !important;
                min-height: 55.5px;
                border: 1px solid rgba(168, 168, 168, 0.2);
                border-radius: 6px;
                -webkit-box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.16);
                box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.16);
            }

            .pkg-container .package:after,
            .pkg-container .package:before {
                top: 0;
                right: 0;
                width: 26px;
                height: 26px;
            }

            .pkg-container .package:after {
                right: -2px !important;
                top: -2px !important;
            }

            .pkg-container .package:before {
                width: 49px;
                height: 49px;
            }

            .pkg-container .package.selected {
                padding: 7px 31px 7px 11px !important;
                border-width: 2px !important;
            }

            .pkg-container .package.selected:after {
                right: -2px !important;
                top: -2px !important;
            }

            .pkg-container .package.selected.hot:before {
                right: -2px;
                top: -2px;
            }

            .pkg-container .package.hot:before {
                right: -1px;
                top: -1px;
            }

            .pkg-container .package.follow i.num-i {
                width: 20px;
                height: 14px;
            }

            .pkg-container .package.like i.num-i {
                width: 15px;
                height: 13px;
            }

            .pkg-container .package span.num {
                margin-left: 10px;
            }

            .pkg-container .package span.num i {
                margin-right: 10px;
            }

            .pkg-container .package span.num b {
                font: 800 14px Montserrat;
            }

            .pkg-container .package span.num span {
                font: 500 14px Montserrat;
            }

            .pkg-container .package span.likes span {
                font: 500 14px Montserrat;
            }

            .pkg-container .package span.likes i {
                margin-left: 7px;
                width: 14px;
                height: 14px;
            }

            .pkg-container .package span.coins sup {
                font: 500 13px Montserrat;
            }

            .pkg-container .package span.coins sub {
                font: 500 10px Montserrat;
            }

            .pkg-container .package span.num-m {
                font-size: 0;
            }

            .pkg-container .package span.num-m .num-text-m {
                margin-left: 11px;
                display: inline-block;
                vertical-align: middle;
            }

            .pkg-container .package span.num-m .num-text-m p.top b {
                font: 800 14px Montserrat;
            }

            .pkg-container .package span.num-m .num-text-m p.top span {
                font: 500 14px Montserrat;
            }

            .pkg-container .package span.num-m .num-text-m p.bottom {
                margin-top: 2px;
            }

            .pkg-container .package.skeleton span.s {
                height: 18px;
            }

            .pkg-extra {
                margin-top: 21px;
            }

            .pkg-extra h2:before {
                margin-right: 5px;
                width: 17px;
                height: 17px;
            }

            .pkg-extra .img {
                margin: 30px auto 0;
                width: 100px;
                height: 100px;
            }

            .pkg-extra .img img {
                border-radius: 10px;
            }

            .pkg-extra p {
                margin-top: 8px;
            }

            .pkg-extra p span {
                font: 600 10px Montserrat;
            }

            .pkg-extra p i {
                margin-right: 4px;
                width: 13.5px;
                height: 12px;
            }

            .control-search_ins {
                width: 100%;
                height: 56px;
                -webkit-box-shadow: 0 2px 10px #000A3D1C;
                box-shadow: 0 2px 10px #000A3D1C;
                border-radius: 4px;
            }

            .control-search_ins label input {
                padding-left: 44px;
                border-radius: 4px 0 0 4px;
                background: url(img/icon_search_username.svg) no-repeat 14px 17px;
                background-size: 17px 19px;
                font-size: 14px;
            }

            .control-search_ins .search_btn {
                border-radius: 0 4px 4px 0;
            }

            .control-btn__bottom-buy {
                position: fixed;
                left: 0;
                bottom: 0;
                z-index: 10;
                padding: 10px 4vw;
                padding-bottom: env(safe-area-inset-bottom);
                padding-bottom: max(10px, env(safe-area-inset-bottom));
                -webkit-box-sizing: content-box;
                box-sizing: content-box;
                width: 92vw;
                height: 55px;
                background-color: rgba(255, 255, 255, 0.8);
                -webkit-backdrop-filter: saturate(180%) blur(30px);
                backdrop-filter: saturate(180%) blur(30px);
                -webkit-box-shadow: 0 3px 24px rgba(0, 0, 0, 0.16);
                box-shadow: 0 3px 24px rgba(0, 0, 0, 0.16);
                -webkit-transform: translateY(100%);
                transform: translateY(100%);
                -webkit-transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
                transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .control-btn__bottom-buy.on {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            #wrapper-translate {
                position: absolute;
                top: 230px;
                left: 0;
                width: 100%;
                height: auto;
            }

            #google_translate_element {
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
            }

            #google_translate_element .goog-te-gadget .goog-te-gadget-simple {
                border: 1px solid rgba(255, 255, 255, 0.6);
            }

            #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value {
                color: rgba(255, 255, 255, 0.6) !important;
            }

            #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value span {
                border-color: rgba(255, 255, 255, 0.6) !important;
            }

            #at-share-dock.at-share-dock.atss {
                background-color: rgba(255, 255, 255, 0.8);
                -webkit-backdrop-filter: blur(4px);
                backdrop-filter: blur(4px);
                padding-bottom: env(safe-area-inset-bottom);
            }

            .vue-go-top {
                right: 12px !important;
                width: 30px !important;
                height: 30px !important;
            }
        }

        .blog-detail__content {
            padding-top: 40px;
            color: #2A2A2A;
        }

        .blog-detail__content p {
            margin: 16px 0;
            font: 400 16px/1.75 Montserrat;
        }

        .blog-detail__content p a {
            color: #005fff;
            text-decoration: underline;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .blog-detail__content p a:hover {
            color: #2128BD;
        }

        .blog-detail__content h2 {
            margin: 36px 0 16px;
            font: 600 24px Montserrat;
        }

        .blog-detail__content h3 {
            margin: 28px 0 12px;
            font: 600 18px Montserrat;
        }

        .blog-detail__content strong,
        .blog-detail__content b {
            font-weight: 600;
            font-style: normal;
        }

        .blog-detail__content em {
            font-style: italic !important;
            font-weight: 400 !important;
        }

        .blog-detail__content em strong {
            font-style: italic !important;
            font-weight: 600 !important;
        }

        .blog-detail__content ul {
            margin: 16px 0;
            padding-left: 26px;
            font: 400 16px/1.75 Montserrat;
        }

        .blog-detail__content ul li {
            list-style: outside disc;
        }

        .blog-detail__content ul li p {
            margin-bottom: 0;
        }

        .blog-detail__content .tips {
            position: relative;
            margin: 50px 0;
            padding: 20px 30px;
            width: 100%;
            background: #FBF8F1;
            border-radius: 12px;
            font: 400 16px/20px Montserrat;
            color: #AC7300;
        }

        .blog-detail__content .tips:before {
            position: absolute;
            top: -28px;
            left: 18px;
            display: block;
            width: 74px;
            height: 28px;
            background-image: url(img/blog__icon_tips.svg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            content: "";
        }

        .blog-detail__content .download {
            margin: 42px 0;
            padding: 30px 34px 34px;
            background: #FFFFFF;
            -webkit-box-shadow: 0 3px 6px #00000014;
            box-shadow: 0 3px 6px #00000014;
            border: 1px solid #CECECE;
            border-radius: 12px;
            color: #2A2A2A;
        }

        .blog-detail__content .download .download__left {
            display: inline-block;
            vertical-align: top;
            width: 480px;
        }

        .blog-detail__content .download .download__left h3 {
            font: 600 20px/24px Montserrat;
        }

        .blog-detail__content .download .download__left ul {
            margin-top: 24px;
        }

        .blog-detail__content .download .download__left ul li {
            font: 400 12px/18px Montserrat;
            list-style: inside url(img/icon_ul_star.svg);
        }

        .blog-detail__content .download .download__right {
            margin-left: 40px;
            display: inline-block;
            vertical-align: top;
            width: 210px;
            text-align: center;
        }

        .blog-detail__content .download .download__right p.star {
            margin-top: 0;
        }

        .blog-detail__content .download .download__right p.star q {
            margin: 0 3px;
            display: inline-block;
            width: 17px;
            height: 16px;
            background-image: url(img/68761814_406547376656235_6673091594033299456_n.jpg);
            background-size: contain;
            vertical-align: top;
        }

        .blog-detail__content .download .download__right .btn-container {
            margin-top: 22px;
            width: 100%;
            height: 60px;
        }

        .blog-detail__content .download .download__right .btn-container a {
            width: 100%;
            height: 100%;
        }

        .blog-detail__content .download .download__right p.note {
            margin-top: 16px;
            font: 400 12px Montserrat;
        }

        .blog-detail__content .download button {
            padding: 0 10%;
            width: 100%;
            height: 100%;
            background-color: #00BE52;
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            -webkit-box-shadow: 0 12px 24px #00000029;
            box-shadow: 0 12px 24px #00000029;
            color: #ffffff;
        }

        .blog-detail__content .download button span {
            font-weight: 600;
            font-size: 16px;
            word-break: break-word;
        }

        .blog-detail__content .download button:hover {
            background-color: #00e257;
        }

        .blog-detail__content .download .btn-apps {
            width: 100%;
            min-width: auto;
            height: 100%;
            min-height: auto;
            border-radius: 64px;
        }

        .blog-detail__content .download .btn-apps .btn-apps__links:first-child .btn-download-green {
            padding-left: 20%;
        }

        .blog-detail__content .download .btn-apps .btn-apps__links:last-child .btn-download-green {
            padding-right: 20%;
        }

        .blog-detail__content .index {
            margin: 40px 0;
            padding: 22px 40px;
            background: #F1F4FB;
            border-radius: 12px;
        }

        .blog-detail__content .index ul {
            margin-bottom: 0;
            padding-left: 0;
            font-size: 0;
        }

        .blog-detail__content .index ul li {
            position: relative;
            margin-top: 24px;
            padding-left: 12px;
            list-style: none;
            display: inline-block;
            vertical-align: top;
            width: 100%;
            font: 600 16px/20px Montserrat;
            color: #2A2A2A;
            cursor: pointer;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .blog-detail__content .index ul li:before {
            position: absolute;
            top: 0;
            left: 0;
            content: "";
            display: inline-block;
            width: 5px;
            height: 20px;
            background: url(img/punctuation__bullet.svg) no-repeat center;
            background-size: contain;
        }

        .blog-detail__content .index ul li:hover {
            color: #005fff;
        }

        .blog-detail__content .index ul li:first-child {
            margin-top: 0;
        }

        .blog-detail__content .index.double {
            padding: 26px 30px;
        }

        .blog-detail__content .index.double ul li {
            margin-top: 16px;
            display: inline-block;
            width: 50%;
            font-size: 14px;
        }

        .blog-detail__content .index.double ul li:first-child {
            margin-top: 16px;
        }

        .blog-detail__content .index.double ul li:nth-child(1),
        .blog-detail__content .index.double ul li:nth-child(2) {
            margin-top: 0;
        }

        .blog-detail__content .index.double ul li:nth-child(odd) {
            padding-right: 20px;
        }

        .blog-detail__content .index.double ul li:nth-child(even) {
            padding-left: 20px;
        }

        .blog-detail__content .index.double ul li:nth-child(even):before {
            left: 10px;
        }

        .blog-detail__content table {
            margin: 40px 0;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #E5E5E5;
            text-align: center;
            background-color: #F9F9F9;
            font: 400 14px Montserrat;
        }

        .blog-detail__content table tr th,
        .blog-detail__content table tr td {
            padding: 0 10px;
            border: 1px solid #E5E5E5;
            height: 48px;
            vertical-align: middle;
        }

        .blog-detail__content table tr th:first-child,
        .blog-detail__content table tr td:first-child {
            text-align: left;
            background-color: #fff;
        }

        .blog-detail__content table tr th b,
        .blog-detail__content table tr td b {
            font-weight: 800;
            font-style: italic;
        }

        .blog-detail__content table tr th i,
        .blog-detail__content table tr td i {
            display: inline-block;
            background-size: contain;
        }

        .blog-detail__content table tr th i.check,
        .blog-detail__content table tr td i.check {
            width: 19px;
            height: 13px;
            background-image: url(img/icon_table_mark_check.svg);
        }

        .blog-detail__content table tr th i.cross,
        .blog-detail__content table tr td i.cross {
            width: 15px;
            height: 15px;
            background-image: url(img/icon_table_mark_cross.svg);
        }

        .blog-detail__content table tr th {
            font-weight: 600;
            font-size: 16px;
        }

        .blog-detail__content table tr:first-child th,
        .blog-detail__content table tr:first-child td {
            font-weight: 600;
            font-size: 16px;
        }

        .blog-detail__content * {
            max-width: 100%;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .blog-detail__content *:first-child {
            margin-top: 0;
        }

        .blog-detail__content .btn-container {
            font-size: 0;
        }

        .blog-detail__content .btn-container a {
            display: inline-block;
            vertical-align: middle;
        }

        .blog-detail__content .btn-container a.btn-buy {
            margin-left: 24px;
        }

        .blog-detail__content.windows .btn-windows {
            display: inline-block;
        }

        .blog-detail__content.windows .btn-android {
            display: none;
        }

        .blog-detail__content.windows .btn-ios {
            display: none;
        }

        .blog-detail__content.android .btn-windows {
            display: none;
        }

        .blog-detail__content.android .btn-android {
            display: inline-block;
        }

        .blog-detail__content.android .btn-ios {
            display: none;
        }

        .blog-detail__content.ios .btn-windows {
            display: none;
        }

        .blog-detail__content.ios .btn-android {
            display: none;
        }

        .blog-detail__content.ios .btn-ios {
            display: inline-block;
        }

        .blog-detail__content button {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            overflow: hidden;
            vertical-align: middle;
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .blog-detail__content button.btn-download-green {
            padding: 0 22px 0 24px;
            min-width: 240px;
            height: 64px;
            background: #00BE52;
            -webkit-box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            border-radius: 5px;
        }

        .blog-detail__content button.btn-download-green:hover {
            background-color: #14D567;
        }

        .blog-detail__content button.btn-download-green:hover .icon q {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        .blog-detail__content button.btn-download-green:hover .icon g {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .blog-detail__content button.btn-download-green.icon-windows .icon q {
            background-image: url(img/icon__btn-download_logo_windows.svg);
        }

        .blog-detail__content button.btn-download-green.icon-android .icon g {
            background-image: url(img/icon__btn-download_logo_android_white.svg);
        }

        .blog-detail__content button.btn-download-green.icon-ios .icon q {
            background-image: url(img/icon__btn-download_logo_apple_white.svg);
        }

        .blog-detail__content button.btn-download-green.icon-windows .icon,
        .blog-detail__content button.btn-download-green.icon-android .icon,
        .blog-detail__content button.btn-download-green.icon-ios .icon {
            display: block;
        }

        .blog-detail__content button.btn-download-green .icon {
            position: relative;
            margin-right: 8%;
            width: 30px;
            height: 30px;
            display: none;
        }

        .blog-detail__content button.btn-download-green .icon q,
        .blog-detail__content button.btn-download-green .icon g {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .blog-detail__content button.btn-download-green .icon g {
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            background-image: url(img/icon__btn-download_dl_white.svg);
        }

        .blog-detail__content button.btn-download-green .text {
            font: 600 18px Montserrat;
            color: #FFFFFF;
        }

        .blog-detail__content button.buy {
            padding: 0 10%;
            min-width: 132px;
            height: 64px;
            background-color: transparent;
            border: 2px solid #FFFFFF;
            border-radius: 5px;
            opacity: 1;
            font: 600 16px Montserrat;
            color: #FFFFFF;
            white-space: nowrap;
        }

        .blog-detail__content button.buy:hover {
            background-color: #FF9C39;
            border-color: #FF9C39;
        }

        .blog-detail__content .download-type-1 {
            padding: 52px 20px 40px 300px;
            width: 800px;
            background: url(img/blog__download-type-1_bg.png) no-repeat center;
            background-size: cover;
            border-radius: 12px;
            overflow: hidden;
        }

        .blog-detail__content .download-type-1 h2 {
            font: 600 19px/24px Montserrat;
            color: #FFFFFF;
        }

        .blog-detail__content .download-type-1 ul {
            margin: 18px 0 30px;
            padding-left: 0;
            font-size: 0;
        }

        .blog-detail__content .download-type-1 ul li {
            position: relative;
            margin-top: 14px;
            padding-left: 20px;
            font: 500 12px/14px Montserrat;
            color: #FFFFFF;
            list-style: none;
        }

        .blog-detail__content .download-type-1 ul li:before {
            position: absolute;
            top: 0;
            left: 0;
            content: "";
            display: inline-block;
            width: 10px;
            height: 100%;
            background: url(img/icon_ul_star_white.svg) no-repeat center;
            background-size: contain;
        }

        .blog-detail__content .download-type-1 ul li:first-child {
            margin-top: 0;
        }

        .blog-detail__content .download-type-1 .btn-apps {
            width: 240px;
            height: 64px;
            border-radius: 5px;
        }

        .blog-detail__content .download-type-2 hr {
            display: none;
            margin: 30px auto 50px;
            border-top: 1px solid #E8E8E8;
            width: 100%;
        }

        .blog-detail__content .download-type-2 .btn-container {
            text-align: center;
        }

        .blog-detail__content .download-type-2 .btn-container button.buy {
            width: 240px;
            border-color: #A8A8A8;
            color: #2A2A2A;
        }

        .blog-detail__content .download-type-2 .btn-container button.buy:hover {
            border-color: #FF9C39;
            color: #fff;
        }

        .blog-detail__content .download-type-2 p.note {
            margin: 22px 0 0;
            text-align: center;
            font: 500 20px Montserrat;
            color: #A8A8A8;
        }

        .blog-detail__content .download-type-2 .btn-apps {
            width: 240px;
            height: 64px;
            border-radius: 5px;
        }

        .blog-detail__content .btn-apps {
            position: relative;
            display: inline-block;
            min-width: 240px;
            height: 64px;
            font-size: 0;
            overflow: hidden;
            -webkit-box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            vertical-align: middle;
        }

        .blog-detail__content .btn-apps:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            display: block;
            width: 1px;
            height: 33.333%;
            background-color: rgba(0, 0, 0, 0.25);
        }

        .blog-detail__content .btn-apps .btn-apps__links {
            display: inline-block;
            width: 50% !important;
            height: 100% !important;
        }

        .blog-detail__content .btn-apps .btn-apps__links .btn-download-green {
            padding: 0 10%;
            min-width: auto;
            width: 100%;
            height: 100%;
            border-radius: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .blog-detail__content .btn-apps .btn-apps__links .btn-download-green .icon {
            margin-right: 0;
        }

        @media (max-width: 768px) {
            .blog-detail__content {
                padding-top: 25px;
            }

            .blog-detail__content p {
                margin: 14px 0;
                font: 400 14px/1.75 Montserrat;
            }

            .blog-detail__content h2 {
                margin-top: 30px;
                margin-bottom: 14px;
                font: 600 18px Montserrat;
            }

            .blog-detail__content h3 {
                margin: 14px 0 6px;
                font: 600 15px Montserrat;
            }

            .blog-detail__content ul {
                margin: 14px 0;
                padding-left: 26px;
                font: 400 14px/1.75 Montserrat;
            }

            .blog-detail__content .tips {
                margin: 25px 0;
                padding: 3vw 4vw;
                font: 400 14px/17px Montserrat;
            }

            .blog-detail__content .tips:before {
                position: absolute;
                top: -24px;
                left: 10px;
                width: 63.5px;
                height: 24px;
            }

            .blog-detail__content .download {
                margin: 21px 0;
                padding: 4vw;
            }

            .blog-detail__content .download .download__left {
                width: 100%;
            }

            .blog-detail__content .download .download__left h3 {
                font: 600 16px/20px Montserrat;
            }

            .blog-detail__content .download .download__right {
                margin: 30px auto 0;
                display: block;
                width: 70vw;
            }

            .blog-detail__content .index {
                margin: 30px 0;
                padding: 3vw 6vw 3vw;
            }

            .blog-detail__content .index ul li {
                margin-top: 12px;
                font: 600 14px/18px Montserrat;
            }

            .blog-detail__content .index ul li:before {
                height: 18px;
            }

            .blog-detail__content .index.double {
                padding: 3vw 6vw 3vw;
            }

            .blog-detail__content .index.double ul li {
                display: inline-block;
                width: 100%;
                font-size: 14px;
            }

            .blog-detail__content .index.double ul li:first-child {
                margin-top: 0;
            }

            .blog-detail__content .index.double ul li:nth-child(1) {
                margin-top: 0;
            }

            .blog-detail__content .index.double ul li:nth-child(2) {
                margin-top: 12px;
            }

            .blog-detail__content .index.double ul li:nth-child(odd) {
                padding-right: 0;
            }

            .blog-detail__content .index.double ul li:nth-child(even) {
                padding-left: 12px;
            }

            .blog-detail__content .index.double ul li:nth-child(even):before {
                left: 0;
            }

            .blog-detail__content table {
                margin: 20px 0;
                font: 400 8px Montserrat;
            }

            .blog-detail__content table tr th,
            .blog-detail__content table tr td {
                padding: 0 10px;
                height: 48px;
                font-size: 7px;
            }

            .blog-detail__content table tr th i.check,
            .blog-detail__content table tr td i.check {
                width: 9.5px;
                height: 6.5px;
            }

            .blog-detail__content table tr th i.cross,
            .blog-detail__content table tr td i.cross {
                width: 7.5px;
                height: 7.5px;
            }

            .blog-detail__content table tr:first-child th,
            .blog-detail__content table tr:first-child td {
                font-weight: 600;
                font-size: 8px;
            }

            .blog-detail__content .btn-container {
                text-align: center;
            }

            .blog-detail__content .btn-container a.btn-buy {
                margin-left: 0;
                margin-top: 16px;
                width: 64vw;
            }

            .blog-detail__content button {
                margin: 0 auto;
            }

            .blog-detail__content button.btn-download-green {
                padding: 0;
                width: 64vw;
                min-width: 0;
                height: 56px;
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.16);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.16);
                border-radius: 56px;
            }

            .blog-detail__content button.btn-download-green .icon {
                position: relative;
                width: 10.4%;
                height: 44px;
            }

            .blog-detail__content button.btn-download-green .text {
                font: 600 14px Montserrat;
            }

            .blog-detail__content button.buy {
                width: 64vw;
                height: 56px;
                border: 2px solid #2A2A2A;
                border-radius: 56px;
                opacity: 1;
                font: 600 16px Montserrat;
                color: #2A2A2A;
            }

            .blog-detail__content button.buy:hover {
                color: #fff;
            }

            .blog-detail__content .download-type-1 {
                padding: 0 0 30px;
                width: 100%;
                background: #F2F2F2;
                border-radius: 6px;
            }

            .blog-detail__content .download-type-1 h2 {
                position: relative;
                padding: 24px 21px 21px 89px;
                display: inline-block;
                width: 100%;
                font: 600 16px/20px Montserrat;
                background-image: -webkit-gradient(linear, left top, right top, from(#FF81E2), to(#2C85FF));
                background-image: linear-gradient(to right, #FF81E2, #2C85FF);
            }

            .blog-detail__content .download-type-1 h2:before {
                position: absolute;
                top: 20px;
                left: 21px;
                content: "";
                display: inline-block;
                width: 50px;
                height: 50px;
                background: url(img/logo.svg) no-repeat center;
                background-size: contain;
                vertical-align: middle;
            }

            .blog-detail__content .download-type-1 ul {
                margin: 12px 4vw 32px;
            }

            .blog-detail__content .download-type-1 ul li {
                margin-top: 14px;
                font: 500 12px/14px Montserrat;
                color: #2a2a2a;
            }

            .blog-detail__content .download-type-1 ul li:before {
                width: 14px;
                height: 14px;
                background-image: url(img/icon_ul_star.svg);
            }

            .blog-detail__content .download-type-2 hr {
                margin: 15px auto 25px;
            }

            .blog-detail__content .download-type-2 .btn-container button.buy {
                width: 64vw;
            }

            .blog-detail__content .download-type-2 p.note {
                margin: 16px 0 0;
                font: 500 12px Montserrat;
            }
        }

        .addthis-hide .addthis-smartlayers {
            display: none !important;
        }

        .locale-switch {
            position: fixed;
            z-index: 10000;
            top: 66%;
            right: 0;
        }

        .locale-switch button {
            display: block;
            padding: 6px;
            width: 36px;
            background-color: rgba(232, 232, 232, 0.6);
            -webkit-backdrop-filter: blur(3px);
            backdrop-filter: blur(3px);
        }
    </style>
    <style type="text/css">
        /* Make clicks pass-through */
        #nprogress {
            pointer-events: none;
        }

        #nprogress .bar {
            background: #29d;

            position: fixed;
            z-index: 1031;
            top: 0;
            left: 0;

            width: 100%;
            height: 2px;
        }

        /* Fancy blur effect */
        #nprogress .peg {
            display: block;
            position: absolute;
            right: 0px;
            width: 100px;
            height: 100%;
            -webkit-box-shadow: 0 0 10px #29d, 0 0 5px #29d;
            box-shadow: 0 0 10px #29d, 0 0 5px #29d;
            opacity: 1.0;

            -webkit-transform: rotate(3deg) translate(0px, -4px);
            transform: rotate(3deg) translate(0px, -4px);
        }

        /* Remove these to get rid of the spinner */
        #nprogress .spinner {
            display: block;
            position: fixed;
            z-index: 1031;
            top: 15px;
            right: 15px;
        }

        #nprogress .spinner-icon {
            width: 18px;
            height: 18px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;

            border: solid 2px transparent;
            border-top-color: #29d;
            border-left-color: #29d;
            border-radius: 50%;

            -webkit-animation: nprogress-spinner 400ms linear infinite;
            animation: nprogress-spinner 400ms linear infinite;
        }

        .nprogress-custom-parent {
            overflow: hidden;
            position: relative;
        }

        .nprogress-custom-parent #nprogress .spinner,
        .nprogress-custom-parent #nprogress .bar {
            position: absolute;
        }

        @-webkit-keyframes nprogress-spinner {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes nprogress-spinner {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
    <style type="text/css">
        button[data-v-46f9cf14] {
            padding: 0 6%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: #FF9C39;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 64px;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button span[data-v-46f9cf14] {
            color: #ffffff;
            font-weight: 600;
            font-size: 24px;
            word-break: break-word;
        }

        button.icon-android[data-v-46f9cf14],
        button.icon-ios[data-v-46f9cf14],
        button.icon-windows[data-v-46f9cf14] {
            -webkit-box-shadow: 0 12px 24px #A528003D;
            box-shadow: 0 12px 24px #A528003D;
        }

        button.icon-android[data-v-46f9cf14]:before,
        button.icon-ios[data-v-46f9cf14]:before,
        button.icon-windows[data-v-46f9cf14]:before {
            display: inline-block;
        }

        button[data-v-46f9cf14]:before {
            margin-right: 8%;
            display: none;
            width: 10.4%;
            height: 44px;
            background: url(img/icon__android_logo.svg) no-repeat center;
            background-size: contain;
            content: "";
        }

        button.icon-android[data-v-46f9cf14]:before {
            background-image: url(img/icon__android_logo.svg);
        }

        button.icon-ios[data-v-46f9cf14]:before {
            background-image: url(img/icon__btn-download_logo_apple_white.svg);
        }

        button.icon-windows[data-v-46f9cf14]:before {
            background-image: url(img/icon__btn-download_logo_windows.svg);
        }

        button[data-v-46f9cf14]:hover {
            background-color: rgba(255, 156, 57, 0.8);
        }

        button.header-small span[data-v-46f9cf14] {
            font-size: 16px;
        }

        button.size-16 span[data-v-46f9cf14] {
            font-size: 16px;
        }

        button.size-20 span[data-v-46f9cf14] {
            font-size: 20px;
        }

        button.square[data-v-46f9cf14] {
            border-radius: 5px;
        }

        button.theme-blue[data-v-46f9cf14] {
            background-color: #005FFF;
        }

        button.theme-blue[data-v-46f9cf14]:hover {
            background-color: #2070F6;
        }

        button.shadow[data-v-46f9cf14] {
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
        }

        @media (max-width: 768px) {
            button span[data-v-46f9cf14] {
                font-size: 14px;
            }

            button.header-small span[data-v-46f9cf14] {
                font-size: 14px;
            }

            button.size-16 span[data-v-46f9cf14] {
                font-size: 14px;
            }

            button.size-20 span[data-v-46f9cf14] {
                font-size: 16px;
            }

            button.bottom-cta span[data-v-46f9cf14] {
                font-size: 12px;
            }

            button.icon-android[data-v-46f9cf14],
            button.icon-ios[data-v-46f9cf14],
            button.icon-windows[data-v-46f9cf14] {
                -webkit-box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.16);
                box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.16);
            }
        }
    </style>
    <style type="text/css">
        button[data-v-340c5186] {
            position: relative;
            padding: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background: url(img/btn_dialog-alert-icon__bg.svg) no-repeat center;
            background-size: 100% 100%;
            -webkit-box-shadow: 0 3px 6px #00000029;
            box-shadow: 0 3px 6px #00000029;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button[data-v-340c5186]:hover {
            opacity: 0.7;
        }

        button span[data-v-340c5186] {
            color: #ffffff;
            font-weight: 600;
            font-size: 16px;
            word-break: break-word;
            vertical-align: middle;
        }

        button .left[data-v-340c5186],
        button .right[data-v-340c5186] {
            display: inline-block;
        }

        button .left[data-v-340c5186] {
            width: 66%;
        }

        button .left span[data-v-340c5186] {
            font-size: 16px;
        }

        button .right[data-v-340c5186] {
            width: 34%;
            font-size: 0;
        }

        button .right span[data-v-340c5186] {
            font-size: 20px;
        }

        button .right i[data-v-340c5186] {
            margin-left: 8px;
            display: inline-block;
            width: 24px;
            height: 24px;
            background: url(img/btn_dialog-alert-icon__coin.svg) no-repeat center;
            background-size: contain;
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            button span[data-v-340c5186] {
                font-size: 14px;
            }

            button .left span[data-v-340c5186] {
                font-size: 14px;
            }

            button .right span[data-v-340c5186] {
                font-size: 16px;
            }
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: Montserrat;
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            src: local("Montserrat Regular"), local("Montserrat-Regular"), url(/fonts/Montserrat-Regular.woff2) format("woff2"), url(/fonts/Montserrat-Regular.ttf) format("ttf");
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 400;
            font-style: italic;
            font-display: swap;
            src: local("Montserrat Italic"), local("Montserrat-Italic"), url(/fonts/Montserrat-Italic.woff2) format("woff2"), url(/fonts/Montserrat-Italic.ttf) format("ttf");
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 500;
            font-style: normal;
            font-display: swap;
            src: local("Montserrat Medium"), local("Montserrat-Medium"), url(/fonts/Montserrat-Medium.woff2) format("woff2"), url(/fonts/Montserrat-Medium.ttf) format("ttf");
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 600;
            font-style: normal;
            font-display: swap;
            src: local("Montserrat SemiBold"), local("Montserrat-SemiBold"), url(/fonts/Montserrat-SemiBold.woff2) format("woff2"), url(/fonts/Montserrat-SemiBold.ttf) format("ttf");
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 600;
            font-style: italic;
            font-display: swap;
            src: local("Montserrat SemiBoldItalic"), local("Montserrat-SemiBoldItalic"), url(/fonts/Montserrat-SemiBoldItalic.woff2) format("woff2"), url(/fonts/Montserrat-SemiBoldItalic.ttf) format("ttf");
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 700;
            font-style: normal;
            font-display: swap;
            src: local("Montserrat Bold"), local("Montserrat-Bold"), url(/fonts/Montserrat-Bold.woff2) format("woff2"), url(/fonts/Montserrat-Bold.ttf) format("ttf");
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 800;
            font-style: italic;
            font-display: swap;
            src: local("Montserrat ExtraBoldItalic"), local("Montserrat-ExtraBoldItalic"), url(/fonts/Montserrat-ExtraBoldItalic.woff2) format("woff2"), url(/fonts/Montserrat-ExtraBoldItalic.ttf) format("ttf");
        }
    </style>
    <style type="text/css">
        .list-empty[data-v-b3dc3fc6] {
            padding: 80px 0;
            text-align: center;
        }

        .list-empty i[data-v-b3dc3fc6] {
            display: inline-block;
            width: 80px;
            height: 80px;
            background: url(img/dialog__icon_alert_grey.svg) no-repeat center;
            background-size: contain;
        }

        .list-empty p[data-v-b3dc3fc6] {
            margin-top: 30px;
            font: 400 16px/20px Montserrat;
            color: #a2a2a2;
        }
    </style>
    <style type="text/css">
        button[data-v-0e41dec2] {
            position: relative;
            padding: 0 6%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: #FF9C39;
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button *[data-v-0e41dec2],
        button[data-v-0e41dec2]:before,
        button[data-v-0e41dec2]:after {
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button span[data-v-0e41dec2] {
            color: #ffffff;
            font-weight: 600;
            font-size: 24px;
            word-break: break-word;
        }

        button[data-v-0e41dec2]:before {
            margin-right: 24px;
            display: none;
            width: 30px;
            height: 36px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            content: "";
        }

        button[data-v-0e41dec2]:hover {
            background-color: rgba(255, 156, 57, 0.8);
        }

        button[data-v-0e41dec2]:after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 100%;
            height: 100%;
            background: url(img/loading-puff-white.svg) no-repeat center;
            background-size: contain;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            opacity: 0;
        }

        button.loading[data-v-0e41dec2] {
            cursor: default;
        }

        button.loading[data-v-0e41dec2]:hover {
            background-color: #FF9C39;
        }

        button.loading[data-v-0e41dec2]:after {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
        }

        button.loading span[data-v-0e41dec2],
        button.loading[data-v-0e41dec2]:before {
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
            opacity: 0;
        }

        button.cart[data-v-0e41dec2]:before {
            display: inline-block;
            background-image: url(img/icon__cart_white.svg);
        }

        button.header-small span[data-v-0e41dec2] {
            font-size: 16px;
        }

        button.size-16 span[data-v-0e41dec2] {
            font-size: 16px;
        }

        button.size-20 span[data-v-0e41dec2] {
            font-size: 20px;
        }

        @media (max-width: 768px) {
            button span[data-v-0e41dec2] {
                font-size: 14px;
            }

            button[data-v-0e41dec2]:before {
                margin-right: 4.8vw;
                width: 4.8vw;
                height: 4.8vw;
            }

            button.header-small span[data-v-0e41dec2] {
                font-size: 14px;
            }

            button.size-16 span[data-v-0e41dec2] {
                font-size: 14px;
            }

            button.size-16 span[data-v-0e41dec2] {
                font-size: 16px;
            }

            button.icon[data-v-0e41dec2] {
                -webkit-box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.16);
                box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.16);
            }
        }
    </style>
    <style type="text/css">
        .checkout[data-v-134dcc33] {
            position: relative;
            padding-top: 80px;
            padding-bottom: 100px;
            background-color: #F8F8F8;
        }

        .checkout[data-v-134dcc33]:before {
            display: none;
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 380px;
            background-color: #F8F8F8;
        }

        .checkout.client[data-v-134dcc33] {
            padding-top: 0;
        }

        .checkout.client[data-v-134dcc33]:before {
            height: 300px;
        }

        .checkout .wrapper[data-v-134dcc33] {
            -webkit-transition: -webkit-filter 0.5s;
            transition: -webkit-filter 0.5s;
            transition: filter 0.5s;
            transition: filter 0.5s, -webkit-filter 0.5s;
        }

        .checkout .wrapper.processing[data-v-134dcc33] {
            -webkit-filter: blur(8px) !important;
            filter: blur(8px) !important;
        }

        .checkout .wrapper h1[data-v-134dcc33] {
            margin: 60px 0 42px;
            font: 600 28px/34px Montserrat;
            color: #2A2A2A;
        }

        .checkout .wrapper .checkout__main[data-v-134dcc33] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            width: 100%;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper[data-v-134dcc33] {
            margin-top: 48px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper.left[data-v-134dcc33] {
            width: 670px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper.left .checkout__main_wrapper_container[data-v-134dcc33] {
            padding: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper.left .checkout__main_wrapper_container h2 span[data-v-134dcc33] {
            font-size: 28px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper.right[data-v-134dcc33] {
            margin-left: 66px;
            width: 572px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper.right .checkout__main_wrapper_container[data-v-134dcc33] {
            background-color: #fff;
            -webkit-box-shadow: 0 0 20px rgba(0, 19, 97, 0.07);
            box-shadow: 0 0 20px rgba(0, 19, 97, 0.07);
            border-radius: 12px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper.right .checkout__main_wrapper_container h2[data-v-134dcc33] {
            padding: 0 24px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container[data-v-134dcc33] {
            padding: 32px 0;
            width: 100%;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container h2[data-v-134dcc33] {
            font-size: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container h2 span[data-v-134dcc33] {
            font: 600 24px Montserrat;
            color: #2A2A2A;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container h2 i[data-v-134dcc33] {
            margin-right: 20px;
            display: inline-block;
            width: 32px;
            height: 32px;
            text-align: center;
            line-height: 32px;
            background-color: #005FFF;
            border-radius: 50%;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            color: #fff;
            vertical-align: top;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart[data-v-134dcc33] {
            margin-top: 32px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit[data-v-134dcc33] {
            position: relative;
            padding: 12px 52px 12px 88px;
            width: 100%;
            height: 92px;
            border-top: 1px solid #E6E6E6;
            font-size: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit[data-v-134dcc33]:last-child {
            height: 93px;
            border-bottom: 1px solid #E6E6E6;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit img[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .img[data-v-134dcc33] {
            position: absolute;
            left: 24px;
            top: 12px;
            width: 64px;
            height: 64px;
            border-radius: 50%;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text[data-v-134dcc33] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            padding-left: 16px;
            width: 100%;
            height: 100%;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text p[data-v-134dcc33] {
            margin: 3px 0;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text p span[data-v-134dcc33] {
            width: 100%;
            font: 600 16px Montserrat;
            color: #2A2A2A;
            vertical-align: middle;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text p.gifts span[data-v-134dcc33] {
            color: #FF9C39;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text p.gifts[data-v-134dcc33]:after {
            margin-left: 5px;
            content: "";
            display: inline-block;
            width: 14px;
            height: 14px;
            background: url(img/user-center__icon_giftbox.svg) no-repeat center;
            background-size: contain;
            vertical-align: middle;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit i[data-v-134dcc33] {
            position: absolute;
            right: 12px;
            top: 12px;
            display: inline-block;
            width: 40px;
            height: 64px;
            background: url(img/payment__icon-delete.svg) no-repeat center;
            background-size: 13px 16px;
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit i[data-v-134dcc33]:hover {
            opacity: 0.7;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit.skeleton[data-v-134dcc33] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit.skeleton *[data-v-134dcc33] {
            background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
            background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
            background-size: 200% 100%;
            -webkit-animation: shimmer-data-v-134dcc33 4s infinite linear;
            animation: shimmer-data-v-134dcc33 4s infinite linear;
        }

        @-webkit-keyframes shimmer-data-v-134dcc33 {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        @keyframes shimmer-data-v-134dcc33 {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit.skeleton .p[data-v-134dcc33] {
            margin-left: 24px;
            width: 60%;
            height: 19px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-total[data-v-134dcc33] {
            margin-top: 32px;
            padding: 0 32px;
            text-align: right;
            font: 400 18px Montserrat;
            color: #A8A8A8;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-total b[data-v-134dcc33] {
            font-weight: 600;
            color: #2A2A2A;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form[data-v-134dcc33] {
            margin-top: 50px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form.loading[data-v-134dcc33] {
            padding: 10%;
            text-align: center;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form.loading img[data-v-134dcc33] {
            width: 14%;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row[data-v-134dcc33] {
            margin-top: 30px;
            font-size: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row.radio-group[data-v-134dcc33] {
            margin-top: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row.radio-group label.radio[data-v-134dcc33] {
            margin-top: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row input[type=number][data-v-134dcc33] {
            -moz-appearance: textfield;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row input[type=number][data-v-134dcc33]::-webkit-outer-spin-button,
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row input[type=number][data-v-134dcc33]::-webkit-inner-spin-button {
            -webkit-appearance: none !important;
            margin: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .double[data-v-134dcc33] {
            display: inline-block;
            width: 300px;
            vertical-align: top;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .double[data-v-134dcc33]:last-child {
            margin-left: 17px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label[data-v-134dcc33] {
            display: inline-block;
            width: 100%;
            height: 60px;
            vertical-align: middle;
            /*&.expiry {*/
            /*  width: 224px;*/
            /*}*/
            /*&.cvc {*/
            /*  margin-left: 20px;*/
            /*  width: 228px;*/
            /*}*/
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio[data-v-134dcc33] {
            margin-top: 22px;
            width: 60%;
            height: 32px;
            cursor: pointer;
            font-size: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio[data-v-134dcc33]:first-child {
            margin-top: 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio.PayPal[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio.PayOp[data-v-134dcc33] {
            width: 40%;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio *[data-v-134dcc33] {
            vertical-align: middle;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio input[type=radio][data-v-134dcc33] {
            margin-right: 12px;
            vertical-align: middle;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio span[data-v-134dcc33] {
            font: 600 16px/19px Montserrat;
            color: #2A2A2A;
            vertical-align: middle;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i[data-v-134dcc33] {
            margin-right: 6px;
            display: inline-block;
            height: 32px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            vertical-align: middle;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.CreditCard[data-v-134dcc33] {
            width: 43px;
            background-image: url(img/payment__icon-credit_card.svg);
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.PayPal[data-v-134dcc33] {
            width: 93px;
            background-image: url(img/payment__icon-paypal.svg);
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.VISA[data-v-134dcc33] {
            margin-left: 10px;
            width: 50px;
            background-image: url(img/payment__icon_card-issuer_visa.svg);
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.MasterCard[data-v-134dcc33] {
            width: 46px;
            background-image: url(img/payment__icon_card-issuer_master-card.svg);
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.AmericanExpress[data-v-134dcc33] {
            width: 26px;
            background-image: url(img/payment__icon_card-issuer_american-express.svg);
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.JCB[data-v-134dcc33] {
            width: 38px;
            background-image: url(img/payment__icon_card-issuer_jcb.svg);
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.PayOp[data-v-134dcc33] {
            width: 72px;
            background-image: url(img/payment__icon-payop.png);
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.title[data-v-134dcc33] {
            margin-bottom: 10px;
            height: auto;
            font: 400 16px/20px Montserrat;
            color: #A8A8A8;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .month[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .year[data-v-134dcc33] {
            display: inline-block;
            vertical-align: top;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .month input[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .year input[data-v-134dcc33] {
            text-align: center;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .month input[data-v-134dcc33]:focus,
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .month input[data-v-134dcc33]:hover,
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .year input[data-v-134dcc33]:focus,
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .year input[data-v-134dcc33]:hover {
            z-index: 1;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .month[data-v-134dcc33] {
            width: 124px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .month input[data-v-134dcc33] {
            border-radius: 6px 0 0 6px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .year[data-v-134dcc33] {
            margin-left: -2px;
            width: 178px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .year input[data-v-134dcc33] {
            border-radius: 0 6px 6px 0;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row i.error[data-v-134dcc33] {
            padding: 0 12px;
            margin: 0 auto;
            display: block;
            width: 94%;
            height: 0;
            background-color: #FF4444;
            border-radius: 0 0 6px 6px;
            font: 500 15px/40px Montserrat;
            color: #FFFFFF;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row p.note[data-v-134dcc33] {
            font: 400 16px/24px Montserrat;
            color: #2A2A2A;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row.invalid label input[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row.invalid label select[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row.invalid label.stripe-filed[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .invalid label input[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .invalid label select[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .invalid label.stripe-filed[data-v-134dcc33] {
            z-index: 1;
            border-color: #FF3939;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row.invalid i.error[data-v-134dcc33],
        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .invalid i.error[data-v-134dcc33] {
            height: 40px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .radio-fieldset .fieldset[data-v-134dcc33] {
            overflow: hidden;
            -webkit-transition: all 0.3s cubic-bezier(0.76, 0, 0.24, 1);
            transition: all 0.3s cubic-bezier(0.76, 0, 0.24, 1);
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .radio-fieldset .fieldset.height-0[data-v-134dcc33] {
            height: 190px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .radio-fieldset .fieldset.height-0.height-card-error[data-v-134dcc33] {
            height: 230px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .radio-fieldset .fieldset.height-1[data-v-134dcc33] {
            height: 44px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .radio-fieldset .fieldset .row.has-title[data-v-134dcc33] {
            margin-top: 20px;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_p[data-v-134dcc33] {
            margin-top: 36px;
            font: 400 14px/24px Montserrat;
            color: #A8A8A8;
        }

        .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_btn-container[data-v-134dcc33] {
            margin-top: 36px;
            height: 80px;
        }

        .stripe-card-container[data-v-134dcc33] {
            margin: 50px auto;
            width: 400px;
        }

        .credit-card-inputs.complete[data-v-134dcc33] {
            border: 2px solid green;
        }

        @media (max-width: 768px) {
            .checkout[data-v-134dcc33] {
                padding-top: 44px;
                padding-bottom: 50px;
            }

            .checkout.client[data-v-134dcc33] {
                padding-top: 0;
            }

            .checkout.client[data-v-134dcc33]:before {
                height: 176px;
            }

            .checkout[data-v-134dcc33]:before {
                display: block;
                height: 220px;
                background-color: #005FFF;
            }

            .checkout .wrapper[data-v-134dcc33] {
                padding: 0 4vw;
            }

            .checkout .wrapper h1[data-v-134dcc33] {
                margin: 32px 0 28px;
                font: 700 22px/28px Montserrat;
                color: #fff;
                text-align: center;
            }

            .checkout .wrapper .checkout__main[data-v-134dcc33] {
                display: block;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper[data-v-134dcc33] {
                width: 100%;
                margin-top: 32px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper[data-v-134dcc33]:first-child {
                margin-top: 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper.left[data-v-134dcc33] {
                width: 100%;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper.left .checkout__main_wrapper_container[data-v-134dcc33] {
                padding: 4vw;
                background-color: #fff;
                -webkit-box-shadow: 0 0 10px rgba(0, 19, 97, 0.07);
                box-shadow: 0 0 10px rgba(0, 19, 97, 0.07);
                border-radius: 6px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper.right[data-v-134dcc33] {
                margin-left: 0;
                width: 100%;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper.right .checkout__main_wrapper_container[data-v-134dcc33] {
                background-color: #fff;
                -webkit-box-shadow: 0 0 10px rgba(0, 19, 97, 0.07);
                box-shadow: 0 0 10px rgba(0, 19, 97, 0.07);
                border-radius: 6px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper.right .checkout__main_wrapper_container h2[data-v-134dcc33] {
                padding: 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container[data-v-134dcc33] {
                padding: 6vw 4vw;
                -webkit-box-shadow: 0 0 10px rgba(0, 19, 97, 0.07);
                box-shadow: 0 0 10px rgba(0, 19, 97, 0.07);
                border-radius: 6px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container h2[data-v-134dcc33] {
                font-size: 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container h2 span[data-v-134dcc33] {
                font: 600 16px/28px Montserrat;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container h2 i[data-v-134dcc33] {
                margin-right: 10px;
                width: 28px;
                height: 28px;
                line-height: 28px;
                font-size: 12px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart[data-v-134dcc33] {
                margin-top: 16px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit[data-v-134dcc33] {
                margin-top: 10px;
                padding: 8px 48px;
                height: 58px;
                border: 1px solid #DEDEDE;
                border-radius: 6px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit[data-v-134dcc33]:last-child {
                height: 59px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit img[data-v-134dcc33],
            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .img[data-v-134dcc33] {
                top: 8px;
                left: 8px;
                width: 40px;
                height: 40px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text[data-v-134dcc33] {
                padding-left: 10px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text p[data-v-134dcc33] {
                margin: 2px 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text p span[data-v-134dcc33] {
                font: 600 14px Montserrat;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit .text p.gifts[data-v-134dcc33]:after {
                margin-left: 5px;
                width: 14px;
                height: 14px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_cart .checkout__main_cart-list .unit i[data-v-134dcc33] {
                top: 8px;
                right: 8px;
                width: 40px;
                height: 40px;
                background-size: 13px 16px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form[data-v-134dcc33] {
                margin-top: 0;
                /*.pay-method {*/
                /*  .row {*/
                /*    &.radio-group {*/
                /*      margin-top: 0;*/
                /*    }*/
                /*  }*/
                /*}*/
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form.loading[data-v-134dcc33] {
                padding: 10%;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form.loading img[data-v-134dcc33] {
                width: 18%;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row[data-v-134dcc33] {
                margin-top: 16px;
                font-size: 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row.first[data-v-134dcc33] {
                margin-top: 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .double[data-v-134dcc33] {
                width: 40vw;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .double[data-v-134dcc33]:last-child {
                margin-left: 4vw;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label[data-v-134dcc33] {
                display: inline-block;
                width: 100%;
                height: 56px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio[data-v-134dcc33] {
                margin-top: 14px;
                height: 28px;
                width: 100%;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio.PayOp[data-v-134dcc33] {
                width: 100%;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio.PayPal[data-v-134dcc33] {
                margin-top: 14px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio input[type=radio][data-v-134dcc33] {
                margin-right: 9px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio span[data-v-134dcc33] {
                font: 600 14px/17px Montserrat;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i[data-v-134dcc33] {
                margin-right: 4px;
                height: 28px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.CreditCard[data-v-134dcc33] {
                width: 29px;
                height: 22px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.PayPal[data-v-134dcc33] {
                width: 78px;
                height: 22px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.PayOp[data-v-134dcc33] {
                width: 54px;
                height: 28px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.radio i.VISA[data-v-134dcc33] {
                margin-left: 10px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.title[data-v-134dcc33] {
                margin-bottom: 8px;
                font: 400 14px/17px Montserrat;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.month[data-v-134dcc33] {
                width: 15.733vw;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.month input[data-v-134dcc33] {
                border-radius: 3px 0 0 3px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.year[data-v-134dcc33] {
                margin-left: -1px;
                width: 24.8vw;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row label.year input[data-v-134dcc33] {
                border-radius: 0 3px 3px 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row i.error[data-v-134dcc33] {
                padding: 0 6px;
                border-radius: 0 0 3px 3px;
                font: 500 14px/35px Montserrat;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row p.note[data-v-134dcc33] {
                font: 400 14px/17px Montserrat;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .month[data-v-134dcc33] {
                width: 46%;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .month input[data-v-134dcc33] {
                border-radius: 4px 0 0 4px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .year[data-v-134dcc33] {
                margin-left: -1px;
                width: 54%;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .year input[data-v-134dcc33] {
                border-radius: 0 4px 4px 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row.invalid i.error[data-v-134dcc33],
            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .row .invalid i.error[data-v-134dcc33] {
                height: 35px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .radio-fieldset .fieldset[data-v-134dcc33] {
                /*.row {*/
                /*  margin-top: 20px;*/
                /*}*/
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .radio-fieldset .fieldset.height-0[data-v-134dcc33] {
                height: 178px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_form .radio-fieldset .fieldset.height-1[data-v-134dcc33] {
                height: 54px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_order .checkout__main_order-list[data-v-134dcc33] {
                font-size: 0;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_order .checkout__main_order-list .unit[data-v-134dcc33] {
                margin-top: 17px;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_order .checkout__main_order-list .unit *[data-v-134dcc33] {
                vertical-align: middle;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_order .checkout__main_order-list .unit i[data-v-134dcc33] {
                display: inline-block;
                width: 16px;
                height: 16px;
                background: url(img/payment__icon_check.svg) no-repeat center;
                background-size: contain;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_order .checkout__main_order-list .unit p[data-v-134dcc33] {
                margin-left: 12px;
                display: inline-block;
                font: 600 14px/17px Montserrat;
                color: #A8A8A8;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_order .checkout__main_order-total[data-v-134dcc33] {
                margin-top: 24px;
                padding-top: 24px;
                border-top: 0.5px solid #E5E5E5;
                text-align: right;
                font: 400 14px/15px Montserrat;
                color: #A8A8A8;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_container .checkout__main_order .checkout__main_order-total b[data-v-134dcc33] {
                margin-left: 10px;
                font-weight: 600;
                color: #2A2A2A;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_p[data-v-134dcc33] {
                font: 400 11px/15px Montserrat;
            }

            .checkout .wrapper .checkout__main .checkout__main_wrapper .checkout__main_wrapper_btn-container[data-v-134dcc33] {
                margin-top: 16px;
                height: 56px;
            }
        }
    </style>
    <style type="text/css">
        .at-icon {
            fill: #fff;
            border: 0
        }

        .at-icon-wrapper {
            display: inline-block;
            overflow: hidden
        }

        a .at-icon-wrapper {
            cursor: pointer
        }

        .at-rounded,
        .at-rounded-element .at-icon-wrapper {
            border-radius: 12%
        }

        .at-circular,
        .at-circular-element .at-icon-wrapper {
            border-radius: 50%
        }

        .addthis_32x32_style .at-icon {
            width: 2pc;
            height: 2pc
        }

        .addthis_24x24_style .at-icon {
            width: 24px;
            height: 24px
        }

        .addthis_20x20_style .at-icon {
            width: 20px;
            height: 20px
        }

        .addthis_16x16_style .at-icon {
            width: 1pc;
            height: 1pc
        }

        #at16lb {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1001;
            background-color: #000;
            opacity: .001
        }

        #at_complete,
        #at_error,
        #at_share,
        #at_success {
            position: static !important
        }

        .at15dn {
            display: none
        }

        #at15s,
        #at16p,
        #at16p form input,
        #at16p label,
        #at16p textarea,
        #at_share .at_item {
            font-family: arial, helvetica, tahoma, verdana, sans-serif !important;
            font-size: 9pt !important;
            outline-style: none;
            outline-width: 0;
            line-height: 1em
        }

        * html #at15s.mmborder {
            position: absolute !important
        }

        #at15s.mmborder {
            position: fixed !important;
            width: 250px !important
        }

        #at15s {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABtJREFUeNpiZGBgaGAgAjAxEAlGFVJHIUCAAQDcngCUgqGMqwAAAABJRU5ErkJggg==);
            float: none;
            line-height: 1em;
            margin: 0;
            overflow: visible;
            padding: 5px;
            text-align: left;
            position: absolute
        }

        #at15s a,
        #at15s span {
            outline: 0;
            direction: ltr;
            text-transform: none
        }

        #at15s .at-label {
            margin-left: 5px
        }

        #at15s .at-icon-wrapper {
            width: 1pc;
            height: 1pc;
            vertical-align: middle
        }

        #at15s .at-icon {
            width: 1pc;
            height: 1pc
        }

        .at4-icon {
            display: inline-block;
            background-repeat: no-repeat;
            background-position: top left;
            margin: 0;
            overflow: hidden;
            cursor: pointer
        }

        .addthis_16x16_style .at4-icon,
        .addthis_default_style .at4-icon,
        .at4-icon,
        .at-16x16 {
            width: 1pc;
            height: 1pc;
            line-height: 1pc;
            background-size: 1pc !important
        }

        .addthis_32x32_style .at4-icon,
        .at-32x32 {
            width: 2pc;
            height: 2pc;
            line-height: 2pc;
            background-size: 2pc !important
        }

        .addthis_24x24_style .at4-icon,
        .at-24x24 {
            width: 24px;
            height: 24px;
            line-height: 24px;
            background-size: 24px !important
        }

        .addthis_20x20_style .at4-icon,
        .at-20x20 {
            width: 20px;
            height: 20px;
            line-height: 20px;
            background-size: 20px !important
        }

        .at4-icon.circular,
        .circular .at4-icon,
        .circular.aticon {
            border-radius: 50%
        }

        .at4-icon.rounded,
        .rounded .at4-icon {
            border-radius: 4px
        }

        .at4-icon-left {
            float: left
        }

        #at15s .at4-icon {
            text-indent: 20px;
            padding: 0;
            overflow: visible;
            white-space: nowrap;
            background-size: 1pc;
            width: 1pc;
            height: 1pc;
            background-position: top left;
            display: inline-block;
            line-height: 1pc
        }

        .addthis_vertical_style .at4-icon,
        .at4-follow-container .at4-icon {
            margin-right: 5px
        }

        html > body #at15s {
            width: 250px !important
        }

        #at15s.atm {
            background: none !important;
            padding: 0 !important;
            width: 10pc !important
        }

        #at15s_inner {
            background: #fff;
            border: 1px solid #fff;
            margin: 0
        }

        #at15s_head {
            position: relative;
            background: #f2f2f2;
            padding: 4px;
            cursor: default;
            border-bottom: 1px solid #e5e5e5
        }

        .at15s_head_success {
            background: #cafd99 !important;
            border-bottom: 1px solid #a9d582 !important
        }

        .at15s_head_success a,
        .at15s_head_success span {
            color: #000 !important;
            text-decoration: none
        }

        #at15s_brand,
        #at15sptx,
        #at16_brand {
            position: absolute
        }

        #at15s_brand {
            top: 4px;
            right: 4px
        }

        .at15s_brandx {
            right: 20px !important
        }

        a#at15sptx {
            top: 4px;
            right: 4px;
            text-decoration: none;
            color: #4c4c4c;
            font-weight: 700
        }

        #at15sptx:hover {
            text-decoration: underline
        }

        #at16_brand {
            top: 5px;
            right: 30px;
            cursor: default
        }

        #at_hover {
            padding: 4px
        }

        #at_hover .at_item,
        #at_share .at_item {
            background: #fff !important;
            float: left !important;
            color: #4c4c4c !important
        }

        #at_share .at_item .at-icon-wrapper {
            margin-right: 5px
        }

        #at_hover .at_bold {
            font-weight: 700;
            color: #000 !important
        }

        #at_hover .at_item {
            width: 7pc !important;
            padding: 2px 3px !important;
            margin: 1px;
            text-decoration: none !important
        }

        #at_hover .at_item.athov,
        #at_hover .at_item:focus,
        #at_hover .at_item:hover {
            margin: 0 !important
        }

        #at_hover .at_item.athov,
        #at_hover .at_item:focus,
        #at_hover .at_item:hover,
        #at_share .at_item.athov,
        #at_share .at_item:hover {
            background: #f2f2f2 !important;
            border: 1px solid #e5e5e5;
            color: #000 !important;
            text-decoration: none
        }

        .ipad #at_hover .at_item:focus {
            background: #fff !important;
            border: 1px solid #fff
        }

        .at15t {
            display: block !important;
            height: 1pc !important;
            line-height: 1pc !important;
            padding-left: 20px !important;
            background-position: 0 0;
            text-align: left
        }

        .addthis_button,
        .at15t {
            cursor: pointer
        }

        .addthis_toolbox a.at300b,
        .addthis_toolbox a.at300m {
            width: auto
        }

        .addthis_toolbox a {
            margin-bottom: 5px;
            line-height: initial
        }

        .addthis_toolbox.addthis_vertical_style {
            width: 200px
        }

        .addthis_button_facebook_like .fb_iframe_widget {
            line-height: 100%
        }

        .addthis_button_facebook_like iframe.fb_iframe_widget_lift {
            max-width: none
        }

        .addthis_toolbox a.addthis_button_counter,
        .addthis_toolbox a.addthis_button_facebook_like,
        .addthis_toolbox a.addthis_button_facebook_send,
        .addthis_toolbox a.addthis_button_facebook_share,
        .addthis_toolbox a.addthis_button_foursquare,
        .addthis_toolbox a.addthis_button_linkedin_counter,
        .addthis_toolbox a.addthis_button_pinterest_pinit,
        .addthis_toolbox a.addthis_button_tweet {
            display: inline-block
        }

        .addthis_toolbox span.addthis_follow_label {
            display: none
        }

        .addthis_toolbox.addthis_vertical_style span.addthis_follow_label {
            display: block;
            white-space: nowrap
        }

        .addthis_toolbox.addthis_vertical_style a {
            display: block
        }

        .addthis_toolbox.addthis_vertical_style.addthis_32x32_style a {
            line-height: 2pc;
            height: 2pc
        }

        .addthis_toolbox.addthis_vertical_style .at300bs {
            margin-right: 4px;
            float: left
        }

        .addthis_toolbox.addthis_20x20_style span {
            line-height: 20px
        }

        .addthis_toolbox.addthis_32x32_style span {
            line-height: 2pc
        }

        .addthis_toolbox.addthis_pill_combo_style .addthis_button_compact .at15t_compact,
        .addthis_toolbox.addthis_pill_combo_style a {
            float: left
        }

        .addthis_toolbox.addthis_pill_combo_style a.addthis_button_tweet {
            margin-top: -2px
        }

        .addthis_toolbox.addthis_pill_combo_style .addthis_button_compact .at15t_compact {
            margin-right: 4px
        }

        .addthis_default_style .addthis_separator {
            margin: 0 5px;
            display: inline
        }

        div.atclear {
            clear: both
        }

        .addthis_default_style .addthis_separator,
        .addthis_default_style .at4-icon,
        .addthis_default_style .at300b,
        .addthis_default_style .at300bo,
        .addthis_default_style .at300bs,
        .addthis_default_style .at300m {
            float: left
        }

        .at300b img,
        .at300bo img {
            border: 0
        }

        a.at300b .at4-icon,
        a.at300m .at4-icon {
            display: block
        }

        .addthis_default_style .at300b,
        .addthis_default_style .at300bo,
        .addthis_default_style .at300m {
            padding: 0 2px
        }

        .at300b,
        .at300bo,
        .at300bs,
        .at300m {
            cursor: pointer
        }

        .addthis_button_facebook_like.at300b:hover,
        .addthis_button_facebook_like.at300bs:hover,
        .addthis_button_facebook_send.at300b:hover,
        .addthis_button_facebook_send.at300bs:hover {
            opacity: 1
        }

        .addthis_20x20_style .at15t,
        .addthis_20x20_style .at300bs {
            overflow: hidden;
            display: block;
            height: 20px !important;
            width: 20px !important;
            line-height: 20px !important
        }

        .addthis_32x32_style .at15t,
        .addthis_32x32_style .at300bs {
            overflow: hidden;
            display: block;
            height: 2pc !important;
            width: 2pc !important;
            line-height: 2pc !important
        }

        .at300bs {
            overflow: hidden;
            display: block;
            background-position: 0 0;
            height: 1pc;
            width: 1pc;
            line-height: 1pc !important
        }

        .addthis_default_style .at15t_compact,
        .addthis_default_style .at15t_expanded {
            margin-right: 4px
        }

        #at_share .at_item {
            width: 123px !important;
            padding: 4px;
            margin-right: 2px;
            border: 1px solid #fff
        }

        #at16p {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABtJREFUeNpiZGBgaGAgAjAxEAlGFVJHIUCAAQDcngCUgqGMqwAAAABJRU5ErkJggg==);
            z-index: 10000001;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            padding: 10px;
            margin: 0 auto;
            margin-top: -185px;
            margin-left: -155px;
            font-family: arial, helvetica, tahoma, verdana, sans-serif;
            font-size: 9pt;
            color: #5e5e5e
        }

        #at_share {
            margin: 0;
            padding: 0
        }

        #at16pt {
            position: relative;
            background: #f2f2f2;
            height: 13px;
            padding: 5px 10px
        }

        #at16pt a,
        #at16pt h4 {
            font-weight: 700
        }

        #at16pt h4 {
            display: inline;
            margin: 0;
            padding: 0;
            font-size: 9pt;
            color: #4c4c4c;
            cursor: default
        }

        #at16pt a {
            position: absolute;
            top: 5px;
            right: 10px;
            color: #4c4c4c;
            text-decoration: none;
            padding: 2px
        }

        #at15sptx:focus,
        #at16pt a:focus {
            outline: thin dotted
        }

        #at15s #at16pf a {
            top: 1px
        }

        #_atssh {
            width: 1px !important;
            height: 1px !important;
            border: 0 !important
        }

        .atm {
            width: 10pc !important;
            padding: 0;
            margin: 0;
            line-height: 9pt;
            letter-spacing: normal;
            font-family: arial, helvetica, tahoma, verdana, sans-serif;
            font-size: 9pt;
            color: #444;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABtJREFUeNpiZGBgaGAgAjAxEAlGFVJHIUCAAQDcngCUgqGMqwAAAABJRU5ErkJggg==);
            padding: 4px
        }

        .atm-f {
            text-align: right;
            border-top: 1px solid #ddd;
            padding: 5px 8px
        }

        .atm-i {
            background: #fff;
            border: 1px solid #d5d6d6;
            padding: 0;
            margin: 0;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, .15)
        }

        .atm-s {
            margin: 0 !important;
            padding: 0 !important
        }

        .atm-s a:focus {
            border: transparent;
            outline: 0;
            transition: none
        }

        #at_hover.atm-s a,
        .atm-s a {
            display: block;
            text-decoration: none;
            padding: 4px 10px;
            color: #235dab !important;
            font-weight: 400;
            font-style: normal;
            transition: none
        }

        #at_hover.atm-s .at_bold {
            color: #235dab !important
        }

        #at_hover.atm-s a:hover,
        .atm-s a:hover {
            background: #2095f0;
            text-decoration: none;
            color: #fff !important
        }

        #at_hover.atm-s .at_bold {
            font-weight: 700
        }

        #at_hover.atm-s a:hover .at_bold {
            color: #fff !important
        }

        .atm-s a .at-label {
            vertical-align: middle;
            margin-left: 5px;
            direction: ltr
        }

        .at_PinItButton {
            display: block;
            width: 40px;
            height: 20px;
            padding: 0;
            margin: 0;
            background-image: url(//s7.addthis.com/static/t00/pinit00.png);
            background-repeat: no-repeat
        }

        .at_PinItButton:hover {
            background-position: 0 -20px
        }

        .addthis_toolbox .addthis_button_pinterest_pinit {
            position: relative
        }

        .at-share-tbx-element .fb_iframe_widget span {
            vertical-align: baseline !important
        }

        #at16pf {
            height: auto;
            text-align: right;
            padding: 4px 8px
        }

        .at-privacy-info {
            position: absolute;
            left: 7px;
            bottom: 7px;
            cursor: pointer;
            text-decoration: none;
            font-family: helvetica, arial, sans-serif;
            font-size: 10px;
            line-height: 9pt;
            letter-spacing: .2px;
            color: #666
        }

        .at-privacy-info:hover {
            color: #000
        }

        .body .wsb-social-share .wsb-social-share-button-vert {
            padding-top: 0;
            padding-bottom: 0
        }

        .body .wsb-social-share.addthis_counter_style .addthis_button_tweet.wsb-social-share-button {
            padding-top: 40px
        }

        .body .wsb-social-share.addthis_counter_style .addthis_button_facebook_like.wsb-social-share-button {
            padding-top: 21px
        }

        @media print {

            #at4-follow,
            #at4-share,
            #at4-thankyou,
            #at4-whatsnext,
            #at4m-mobile,
            #at15s,
            .at4,
            .at4-recommended {
                display: none !important
            }
        }

        @media screen and (max-width: 400px) {
            .at4win {
                width: 100%
            }
        }

        @media screen and (max-height: 700px) and (max-width: 400px) {
            .at4-thankyou-inner .at4-recommended-container {
                height: 122px;
                overflow: hidden
            }

            .at4-thankyou-inner .at4-recommended .at4-recommended-item:first-child {
                border-bottom: 1px solid #c5c5c5
            }
        }
    </style>
    <style type="text/css">
        .at-branding-logo {
            font-family: helvetica, arial, sans-serif;
            text-decoration: none;
            font-size: 10px;
            display: inline-block;
            margin: 2px 0;
            letter-spacing: .2px
        }

        .at-branding-logo .at-branding-icon {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAMAAAC67D+PAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAZQTFRF////+GlNUkcc1QAAAB1JREFUeNpiYIQDBjQmAwMmkwEM0JnY1WIxFyDAABGeAFEudiZsAAAAAElFTkSuQmCC")
        }

        .at-branding-logo .at-branding-icon,
        .at-branding-logo .at-privacy-icon {
            display: inline-block;
            height: 10px;
            width: 10px;
            margin-left: 4px;
            margin-right: 3px;
            margin-bottom: -1px;
            background-repeat: no-repeat
        }

        .at-branding-logo .at-privacy-icon {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAKCAMAAABR24SMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABhQTFRF8fr9ot/xXcfn2/P5AKva////////AKTWodjhjAAAAAd0Uk5T////////ABpLA0YAAAA6SURBVHjaJMzBDQAwCAJAQaj7b9xifV0kUKJ9ciWxlzWEWI5gMF65KUTv0VKkjVeTerqE/x7+9BVgAEXbAWI8QDcfAAAAAElFTkSuQmCC")
        }

        .at-branding-logo span {
            text-decoration: none
        }

        .at-branding-logo .at-branding-addthis,
        .at-branding-logo .at-branding-powered-by {
            color: #666
        }

        .at-branding-logo .at-branding-addthis:hover {
            color: #333
        }

        .at-cv-with-image .at-branding-addthis,
        .at-cv-with-image .at-branding-addthis:hover {
            color: #fff
        }

        a.at-branding-logo:visited {
            color: initial
        }

        .at-branding-info {
            display: inline-block;
            padding: 0 5px;
            color: #666;
            border: 1px solid #666;
            border-radius: 50%;
            font-size: 10px;
            line-height: 9pt;
            opacity: .7;
            transition: all .3s ease;
            text-decoration: none
        }

        .at-branding-info span {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px
        }

        .at-branding-info:before {
            content: 'i';
            font-family: Times New Roman
        }

        .at-branding-info:hover {
            color: #0780df;
            border-color: #0780df
        }
    </style>
    <style type="text/css">
        .at-share-dock.atss {
            top: auto;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            max-width: 100%;
            z-index: 1000200;
            box-shadow: 0 0 1px 1px #e2dfe2
        }

        .at-share-dock.at-share-dock-zindex-hide {
            z-index: -1 !important
        }

        .at-share-dock.atss-top {
            bottom: auto;
            top: 0
        }

        .at-share-dock a {
            width: auto;
            transition: none;
            color: #fff;
            text-decoration: none;
            box-sizing: content-box;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box
        }

        .at-share-dock a:hover {
            width: auto
        }

        .at-share-dock .at4-count {
            height: 43px;
            padding: 5px 0 0;
            line-height: 20px;
            background: #fff;
            font-family: Helvetica neue, arial
        }

        .at-share-dock .at4-count span {
            width: 100%
        }

        .at-share-dock .at4-count .at4-share-label {
            color: #848484;
            font-size: 10px;
            letter-spacing: 1px
        }

        .at-share-dock .at4-count .at4-counter {
            top: 2px;
            position: relative;
            display: block;
            color: #222;
            font-size: 22px
        }

        .at-share-dock.at-shfs-medium .at4-count {
            height: 36px;
            line-height: 1pc;
            padding-top: 4px
        }

        .at-share-dock.at-shfs-medium .at4-count .at4-counter {
            font-size: 18px
        }

        .at-share-dock.at-shfs-medium .at-share-btn .at-icon-wrapper,
        .at-share-dock.at-shfs-medium a .at-icon-wrapper {
            padding: 6px 0
        }

        .at-share-dock.at-shfs-small .at4-count {
            height: 26px;
            line-height: 1;
            padding-top: 3px
        }

        .at-share-dock.at-shfs-small .at4-count .at4-share-label {
            font-size: 8px
        }

        .at-share-dock.at-shfs-small .at4-count .at4-counter {
            font-size: 14px
        }

        .at-share-dock.at-shfs-small .at-share-btn .at-icon-wrapper,
        .at-share-dock.at-shfs-small a .at-icon-wrapper {
            padding: 4px 0
        }
    </style>
    <style type="text/css">
        div.at-share-close-control.ats-dark,
        div.at-share-open-control-left.ats-dark,
        div.at-share-open-control-right.ats-dark {
            background: #262b30
        }

        div.at-share-close-control.ats-light,
        div.at-share-open-control-left.ats-light,
        div.at-share-open-control-right.ats-light {
            background: #fff
        }

        div.at-share-close-control.ats-gray,
        div.at-share-open-control-left.ats-gray,
        div.at-share-open-control-right.ats-gray {
            background: #f2f2f2
        }

        .atss {
            position: fixed;
            top: 20%;
            width: 3pc;
            z-index: 100020;
            background: none
        }

        .at-share-close-control {
            position: relative;
            width: 3pc;
            overflow: auto
        }

        .at-share-open-control-left {
            position: fixed;
            top: 20%;
            z-index: 100020;
            left: 0;
            width: 22px
        }

        .at-share-close-control .at4-arrow.at-left {
            float: right
        }

        .atss-left {
            left: 0;
            float: left;
            right: auto
        }

        .atss-right {
            left: auto;
            float: right;
            right: 0
        }

        .atss-right.at-share-close-control .at4-arrow.at-right {
            position: relative;
            right: 0;
            overflow: auto
        }

        .atss-right.at-share-close-control .at4-arrow {
            float: left
        }

        .at-share-open-control-right {
            position: fixed;
            top: 20%;
            z-index: 100020;
            right: 0;
            width: 22px;
            float: right
        }

        .atss-right .at-share-close-control .at4-arrow {
            float: left
        }

        .atss.atss-right a {
            float: right
        }

        .atss.atss-right .at4-share-title {
            float: right;
            overflow: hidden
        }

        .atss .at-share-btn,
        .atss a {
            position: relative;
            display: block;
            width: 3pc;
            margin: 0;
            outline-offset: -1px;
            text-align: center;
            float: left;
            transition: width .15s ease-in-out;
            overflow: hidden;
            background: #e8e8e8;
            z-index: 100030;
            cursor: pointer
        }

        .at-share-btn::-moz-focus-inner {
            border: 0;
            padding: 0
        }

        .atss-right .at-share-btn {
            float: right
        }

        .atss .at-share-btn {
            border: 0;
            padding: 0
        }

        .atss .at-share-btn:focus,
        .atss .at-share-btn:hover,
        .atss a:focus,
        .atss a:hover {
            width: 4pc
        }

        .atss .at-share-btn .at-icon-wrapper,
        .atss a .at-icon-wrapper {
            display: block;
            padding: 8px 0
        }

        .atss .at-share-btn:last-child,
        .atss a:last-child {
            border: none
        }

        .atss .at-share-btn span .at-icon,
        .atss a span .at-icon {
            position: relative;
            top: 0;
            left: 0;
            display: block;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            width: 2pc;
            height: 2pc;
            line-height: 2pc;
            border: none;
            padding: 0;
            margin: 0 auto;
            overflow: hidden;
            cursor: pointer;
            cursor: hand
        }

        .at4-share .at-custom-sidebar-counter {
            font-family: Helvetica neue, arial;
            vertical-align: top;
            margin-right: 4px;
            display: inline-block;
            text-align: center
        }

        .at4-share .at-custom-sidebar-count {
            font-size: 17px;
            line-height: 1.25em;
            color: #222
        }

        .at4-share .at-custom-sidebar-text {
            font-size: 9px;
            line-height: 1.25em;
            color: #888;
            letter-spacing: 1px
        }

        .at4-share .at4-share-count-container {
            position: absolute;
            left: 0;
            right: auto;
            top: auto;
            bottom: 0;
            width: 100%;
            color: #fff;
            background: inherit
        }

        .at4-share .at4-share-count,
        .at4-share .at4-share-count-container {
            line-height: 1pc;
            font-size: 10px
        }

        .at4-share .at4-share-count {
            text-indent: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-weight: 200;
            width: 100%;
            height: 1pc
        }

        .at4-share .at4-share-count-anchor {
            padding-bottom: 8px;
            text-decoration: none;
            transition: padding .15s ease-in-out .15s, width .15s ease-in-out
        }
    </style>
    <style type="text/css">
        #at4-drawer-outer-container {
            top: 0;
            width: 20pc;
            position: fixed
        }

        #at4-drawer-outer-container.at4-drawer-inline {
            position: relative
        }

        #at4-drawer-outer-container.at4-drawer-inline.at4-drawer-right {
            float: right;
            right: 0;
            left: auto
        }

        #at4-drawer-outer-container.at4-drawer-inline.at4-drawer-left {
            float: left;
            left: 0;
            right: auto
        }

        #at4-drawer-outer-container.at4-drawer-shown,
        #at4-drawer-outer-container.at4-drawer-shown * {
            z-index: 999999
        }

        #at4-drawer-outer-container,
        #at4-drawer-outer-container .at4-drawer-outer,
        #at-drawer {
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden
        }

        .at4-drawer-push-content-right-back {
            position: relative;
            right: 0
        }

        .at4-drawer-push-content-right {
            position: relative;
            left: 20pc !important
        }

        .at4-drawer-push-content-left-back {
            position: relative;
            left: 0
        }

        .at4-drawer-push-content-left {
            position: relative;
            right: 20pc !important
        }

        #at4-drawer-outer-container.at4-drawer-right {
            left: auto;
            right: -20pc
        }

        #at4-drawer-outer-container.at4-drawer-left {
            right: auto;
            left: -20pc
        }

        #at4-drawer-outer-container.at4-drawer-shown.at4-drawer-right {
            left: auto;
            right: 0
        }

        #at4-drawer-outer-container.at4-drawer-shown.at4-drawer-left {
            right: auto;
            left: 0
        }

        #at-drawer {
            top: 0;
            z-index: 9999999;
            height: 100%;
            animation-duration: .4s
        }

        #at-drawer.drawer-push.at-right {
            right: -20pc
        }

        #at-drawer.drawer-push.at-left {
            left: -20pc
        }

        #at-drawer .at-recommended-label {
            padding: 0 0 0 20px;
            color: #999;
            line-height: 3pc;
            font-size: 18px;
            font-weight: 300;
            cursor: default
        }

        #at-drawer-arrow {
            width: 30px;
            height: 5pc
        }

        #at-drawer-arrow.ats-dark {
            background: #262b30
        }

        #at-drawer-arrow.ats-gray {
            background: #f2f2f2
        }

        #at-drawer-open-arrow {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAABcCAYAAAC1OT8uAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjk3ODNCQjdERUQ3QjExRTM5NjFGRUZBODc3MTIwMTNCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjk3ODNCQjdFRUQ3QjExRTM5NjFGRUZBODc3MTIwMTNCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6OTc4M0JCN0JFRDdCMTFFMzk2MUZFRkE4NzcxMjAxM0IiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OTc4M0JCN0NFRDdCMTFFMzk2MUZFRkE4NzcxMjAxM0IiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7kstzCAAAB4ElEQVR42uyWv0oDQRDGb9dYimgVjliID2Ca9AGfwtZob2Grja1PIFj7EhGCYK99VPBPOkVMp8X5rc6FeN7dfjOksMjAxwXZ3667OzvfLKRr682l5ZV9aDh+fxsnRHhoDzqGLjFBi4XOoFtoAxowoB893o/w7WpAl/+QgQMBwwRdTPhUC2lAV/wDA7qy5WOgq9psHejqTqkKdLE7KYCv0JZjMgBgB58raBG6mP1K6j2pT099T+qMUOeeOss1wDcEIA1PnQXy576rAUI0oFMoC7VCnn40Gs8Pd4lAiXNUKmJ0lh1mPzGEWiyUCqAGW3Pwv4IvUJsFO9CHgP3Zr6Te0xwgAf3LxaAjS241pbikCRkOg+nSJdV4p8HOPl3vvRYI5dtrgVDvvcWovcWovcWovcWovcWovcWovQChWNywNpqvdAKtQp/QNmPUIQ6kwwqt2Xmsxf6GMPM1Pptsbz45CPmXqKb+15Gz4J/LZcDSNIqBlQlbB0afe1mmUDWiCNKFZRq0VKMeXY1CTDq2sJLWsCmoaBBRqNRR6qBKC6qCaj2rDIqaXBGiXHEaom00h1S+K3fVlr6HNuqgvgCh0+owt21bybQn8+mZ78mcEebcM2e5+T2ZX24ZqCph0qn1vgQYAJ/KDpLQr2tPAAAAAElFTkSuQmCC);
            background-repeat: no-repeat;
            width: 13px;
            height: 23px;
            margin: 28px 0 0 8px
        }

        .at-left #at-drawer-open-arrow {
            background-position: 0 -46px
        }

        .ats-dark #at-drawer-open-arrow {
            background-position: 0 -23px
        }

        .ats-dark.at-left #at-drawer-open-arrow {
            background-position: 0 -69px
        }

        #at-drawer-arrow.at4-drawer-modern-browsers {
            position: fixed;
            top: 40%;
            background-repeat: no-repeat;
            background-position: 0 0 !important;
            z-index: 9999999
        }

        .at4-drawer-inline #at-drawer-arrow {
            position: absolute
        }

        #at-drawer-arrow.at4-drawer-modern-browsers.at-right {
            right: 0
        }

        #at-drawer-arrow.at4-drawer-modern-browsers.at-left {
            left: 0
        }

        .at4-drawer-push-animation-left {
            transition: left .4s ease-in-out .15s
        }

        .at4-drawer-push-animation-right {
            transition: right .4s ease-in-out .15s
        }

        #at-drawer.drawer-push.at4-drawer-push-animation-right {
            right: 0
        }

        #at-drawer.drawer-push.at4-drawer-push-animation-right-back {
            right: -20pc !important
        }

        #at-drawer.drawer-push.at4-drawer-push-animation-left {
            left: 0
        }

        #at-drawer.drawer-push.at4-drawer-push-animation-left-back {
            left: -20pc !important
        }

        #at-drawer .at4-closebutton.drawer-close {
            content: 'X';
            color: #999;
            display: block;
            position: absolute;
            margin: 0;
            top: 0;
            right: 0;
            width: 3pc;
            height: 45px;
            line-height: 45px;
            overflow: hidden;
            opacity: .5
        }

        #at-drawer.ats-dark .at4-closebutton.drawer-close {
            color: #fff
        }

        #at-drawer .at4-closebutton.drawer-close:hover {
            opacity: 1
        }

        #at-drawer.ats-dark.at4-recommended .at4-logo-container a {
            color: #666
        }

        #at-drawer.at4-recommended .at4-recommended-vertical {
            padding: 0
        }

        #at-drawer.at4-recommended .at4-recommended-item .sponsored-label {
            margin: 2px 0 0 21px;
            color: #ddd
        }

        #at-drawer.at4-recommended .at4-recommended-vertical .at4-recommended-item {
            position: relative;
            padding: 0;
            width: 20pc;
            height: 180px;
            margin: 0
        }

        #at-drawer.at4-recommended .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-img a:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, .65);
            z-index: 1000000;
            transition: all .2s ease-in-out
        }

        #at-drawer.at4-recommended .at4-recommended-vertical .at4-recommended-item.at-hover .at4-recommended-item-img a:after {
            background: rgba(0, 0, 0, .8)
        }

        #at-drawer .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-img,
        #at-drawer .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-img a,
        #at-drawer .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-img img {
            width: 20pc;
            height: 180px;
            float: none
        }

        #at-drawer .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-caption {
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            height: 70px
        }

        #at-drawer .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-caption .at-h4 {
            color: #fff;
            position: absolute;
            height: 52px;
            top: 0;
            left: 20px;
            right: 20px;
            margin: 0;
            padding: 0;
            line-height: 25px;
            font-size: 20px;
            font-weight: 600;
            z-index: 1000001;
            text-decoration: none;
            text-transform: none
        }

        #at-drawer.at4-recommended .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-caption .at-h4 a:hover {
            text-decoration: none
        }

        #at-drawer.at4-recommended .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-caption .at-h4 a:link {
            color: #fff
        }

        #at-drawer.at4-recommended .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-caption small {
            position: absolute;
            top: auto;
            bottom: 10px;
            left: 20px;
            width: auto;
            color: #ccc
        }

        #at-drawer.at4-recommended .at4-logo-container {
            margin-left: 20px
        }

        #at-drawer.ats-dark.at4-recommended .at4-logo-container a:hover {
            color: #fff
        }

        #at-drawer.at4-recommended .at-logo {
            margin: 0
        }
    </style>
    <style type="text/css">
        .at4-follow.at-mobile {
            display: none !important
        }

        .at4-follow {
            position: fixed;
            top: 0;
            right: 0;
            font-weight: 400;
            color: #666;
            cursor: default;
            z-index: 10001
        }

        .at4-follow .at4-follow-inner {
            position: relative;
            padding: 10px 24px 10px 15px
        }

        .at4-follow-inner,
        .at-follow-open-control {
            border: 0 solid #c5c5c5;
            border-width: 1px 0 1px 1px;
            margin-top: -1px
        }

        .at4-follow .at4-follow-container {
            margin-left: 9pt
        }

        .at4-follow.at4-follow-24 .at4-follow-container {
            height: 24px;
            line-height: 23px;
            font-size: 13px
        }

        .at4-follow.at4-follow-32 .at4-follow-container {
            width: 15pc;
            height: 2pc;
            line-height: 2pc;
            font-size: 14px
        }

        .at4-follow .at4-follow-container .at-follow-label {
            display: inline-block;
            height: 24px;
            line-height: 24px;
            margin-right: 10px;
            padding: 0;
            cursor: default;
            float: left
        }

        .at4-follow .at4-follow-container .at-icon-wrapper {
            height: 24px;
            width: 24px
        }

        .at4-follow.ats-transparent .at4-follow-inner,
        .at-follow-open-control.ats-transparent {
            border-color: transparent
        }

        .at4-follow.ats-dark .at4-follow-inner,
        .at-follow-open-control.ats-dark {
            background: #262b30;
            border-color: #000;
            color: #fff
        }

        .at4-follow.ats-dark .at-follow-close-control {
            background-color: #262b30
        }

        .at4-follow.ats-light .at4-follow-inner {
            background: #fff;
            border-color: #c5c5c5
        }

        .at4-follow.ats-gray .at4-follow-inner,
        .at-follow-open-control.ats-gray {
            background: #f2f2f2;
            border-color: #c5c5c5
        }

        .at4-follow.ats-light .at4-follow-close-control,
        .at-follow-open-control.ats-light {
            background: #e5e5e5
        }

        .at4-follow .at4-follow-inner .at4-follow-close-control {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 20px;
            cursor: pointer;
            display: none
        }

        .at4-follow .at4-follow-inner .at4-follow-close-control div {
            display: block;
            line-height: 20px;
            text-indent: -9999em;
            margin-top: calc(50% + 1px);
            overflow: hidden
        }

        .at-follow-open-control div.at4-arrow.at-left {
            background-position: 0 -2px
        }

        .at-follow-open-control {
            position: fixed;
            height: 35px;
            top: 0;
            right: 0;
            padding-top: 10px;
            z-index: 10002
        }

        .at-follow-btn {
            margin: 0 5px 5px 0;
            padding: 0;
            outline-offset: -1px;
            display: inline-block;
            box-sizing: content-box;
            transition: all .2s ease-in-out
        }

        .at-follow-btn:focus,
        .at-follow-btn:hover {
            transform: translateY(-4px)
        }

        .at4-follow-24 .at-follow-btn {
            height: 25px;
            line-height: 0;
            width: 25px
        }
    </style>
    <style type="text/css">
        .at-follow-tbx-element .at300b,
        .at-follow-tbx-element .at300m {
            display: inline-block;
            width: auto;
            padding: 0;
            margin: 0 2px 5px;
            outline-offset: -1px;
            transition: all .2s ease-in-out
        }

        .at-follow-tbx-element .at300b:focus,
        .at-follow-tbx-element .at300b:hover,
        .at-follow-tbx-element .at300m:focus,
        .at-follow-tbx-element .at300m:hover {
            transform: translateY(-4px)
        }

        .at-follow-tbx-element .addthis_vertical_style .at300b,
        .at-follow-tbx-element .addthis_vertical_style .at300m {
            display: block
        }

        .at-follow-tbx-element .addthis_vertical_style .at300b .addthis_follow_label,
        .at-follow-tbx-element .addthis_vertical_style .at300b .at-icon-wrapper,
        .at-follow-tbx-element .addthis_vertical_style .at300m .addthis_follow_label,
        .at-follow-tbx-element .addthis_vertical_style .at300m .at-icon-wrapper {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px
        }

        .at-follow-tbx-element .addthis_vertical_style .at300b:focus,
        .at-follow-tbx-element .addthis_vertical_style .at300b:hover,
        .at-follow-tbx-element .addthis_vertical_style .at300m:focus,
        .at-follow-tbx-element .addthis_vertical_style .at300m:hover {
            transform: none
        }
    </style>
    <style type="text/css">
        .at4-jumboshare .at-share-btn {
            display: inline-block;
            margin-right: 13px;
            margin-top: 13px
        }

        .at4-jumboshare .at-share-btn .at-icon {
            float: left
        }

        .at4-jumboshare .at-share-btn .at300bs {
            display: inline-block;
            float: left;
            cursor: pointer
        }

        .at4-jumboshare .at4-mobile .at-share-btn .at-icon,
        .at4-jumboshare .at4-mobile .at-share-btn .at-icon-wrapper {
            margin: 0;
            padding: 0
        }

        .at4-jumboshare .at4-mobile .at-share-btn {
            padding: 0
        }

        .at4-jumboshare .at4-mobile .at-share-btn .at-label {
            display: none
        }

        .at4-jumboshare .at4-count {
            font-size: 60px;
            line-height: 60px;
            font-family: Helvetica neue, arial;
            font-weight: 700
        }

        .at4-jumboshare .at4-count-container {
            display: table-cell;
            text-align: center;
            min-width: 200px;
            vertical-align: middle;
            border-right: 1px solid #ccc;
            padding-right: 20px
        }

        .at4-jumboshare .at4-share-container {
            display: table-cell;
            vertical-align: middle;
            padding-left: 20px
        }

        .at4-jumboshare .at4-share-container.at-share-tbx-element {
            padding-top: 0
        }

        .at4-jumboshare .at4-title {
            position: relative;
            font-size: 18px;
            line-height: 18px;
            bottom: 2px
        }

        .at4-jumboshare .at4-spacer {
            height: 1px;
            display: block;
            visibility: hidden;
            opacity: 0
        }

        .at4-jumboshare .at-share-btn {
            display: inline-block;
            margin: 0 2px;
            line-height: 0;
            padding: 0;
            overflow: hidden;
            text-decoration: none;
            text-transform: none;
            color: #fff;
            cursor: pointer;
            transition: all .2s ease-in-out;
            border: 0;
            background-color: transparent
        }

        .at4-jumboshare .at-share-btn:focus,
        .at4-jumboshare .at-share-btn:hover {
            transform: translateY(-4px);
            color: #fff;
            text-decoration: none
        }

        .at4-jumboshare .at-label {
            font-family: helvetica neue, helvetica, arial, sans-serif;
            font-size: 9pt;
            padding: 0 15px 0 0;
            margin: 0;
            height: 2pc;
            line-height: 2pc;
            background: none
        }

        .at4-jumboshare .at-share-btn:hover,
        .at4-jumboshare .at-share-btn:link {
            text-decoration: none
        }

        .at4-jumboshare .at-share-btn::-moz-focus-inner {
            border: 0;
            padding: 0
        }

        .at4-jumboshare.at-mobile .at-label {
            display: none
        }
    </style>
    <style type="text/css">
        .at4-recommendedbox-outer-container {
            display: inline
        }

        .at4-recommended-outer {
            position: static
        }

        .at4-recommended {
            top: 20%;
            margin: 0;
            text-align: center;
            font-weight: 400;
            font-size: 13px;
            line-height: 17px;
            color: #666
        }

        .at4-recommended.at-inline .at4-recommended-horizontal {
            text-align: left
        }

        .at4-recommended-recommendedbox {
            padding: 0;
            z-index: inherit
        }

        .at4-recommended-recommended {
            padding: 40px 0
        }

        .at4-recommended-horizontal {
            max-height: 340px
        }

        .at4-recommended.at-medium .at4-recommended-horizontal {
            max-height: 15pc
        }

        .at4-recommended.at4-minimal.at-medium .at4-recommended-horizontal {
            padding-top: 10px;
            max-height: 230px
        }

        .at4-recommended-text-only .at4-recommended-horizontal {
            max-height: 130px
        }

        .at4-recommended-horizontal {
            padding-top: 5px;
            overflow-y: hidden
        }

        .at4-minimal {
            background: none;
            color: #000;
            border: none !important;
            box-shadow: none !important
        }

        @media screen and (max-width: 900px) {

            .at4-recommended-horizontal .at4-recommended-item,
            .at4-recommended-horizontal .at4-recommended-item .at4-recommended-item-img {
                width: 15pc
            }
        }

        .at4-recommended.at4-minimal .at4-recommended-horizontal .at4-recommended-item .at4-recommended-item-caption {
            padding: 0 0 10px
        }

        .at4-recommended.at4-minimal .at4-recommended-horizontal .at4-recommended-item-caption {
            padding: 20px 0 0 !important
        }

        .addthis-smartlayers .at4-recommended .at-h3.at-recommended-label {
            margin: 0;
            padding: 0;
            font-weight: 300;
            font-size: 18px;
            line-height: 24px;
            color: #464646;
            width: 100%;
            display: inline-block;
            zoom: 1
        }

        .addthis-smartlayers .at4-recommended.at-inline .at-h3.at-recommended-label {
            text-align: left
        }

        #at4-thankyou .addthis-smartlayers .at4-recommended.at-inline .at-h3.at-recommended-label {
            text-align: center
        }

        .at4-recommended .at4-recommended-item {
            display: inline-block;
            zoom: 1;
            position: relative;
            background: #fff;
            border: 1px solid #c5c5c5;
            width: 200px;
            margin: 10px
        }

        .addthis_recommended_horizontal .at4-recommended-item {
            border: none
        }

        .at4-recommended .at4-recommended-item .sponsored-label {
            color: #666;
            font-size: 9px;
            position: absolute;
            top: -20px
        }

        .at4-recommended .at4-recommended-item-img .at-tli,
        .at4-recommended .at4-recommended-item-img a {
            position: absolute;
            left: 0
        }

        .at4-recommended.at-inline .at4-recommended-horizontal .at4-recommended-item {
            margin: 10px 20px 0 0
        }

        .at4-recommended.at-medium .at4-recommended-horizontal .at4-recommended-item {
            margin: 10px 10px 0 0
        }

        .at4-recommended.at-medium .at4-recommended-item {
            width: 140px;
            overflow: hidden
        }

        .at4-recommended .at4-recommended-item .at4-recommended-item-img {
            position: relative;
            text-align: center;
            width: 100%;
            height: 200px;
            line-height: 0;
            overflow: hidden
        }

        .at4-recommended .at4-recommended-item .at4-recommended-item-img a {
            display: block;
            width: 100%;
            height: 200px
        }

        .at4-recommended.at-medium .at4-recommended-item .at4-recommended-item-img,
        .at4-recommended.at-medium .at4-recommended-item .at4-recommended-item-img a {
            height: 140px
        }

        .at4-recommended .at4-recommended-item .at4-recommended-item-img img {
            position: absolute;
            top: 0;
            left: 0;
            min-height: 0;
            min-width: 0;
            max-height: none;
            max-width: none;
            margin: 0;
            padding: 0
        }

        .at4-recommended .at4-recommended-item .at4-recommended-item-caption {
            height: 74px;
            overflow: hidden;
            padding: 20px;
            text-align: left;
            -ms-box-sizing: content-box;
            -o-box-sizing: content-box;
            box-sizing: content-box
        }

        .at4-recommended.at-medium .at4-recommended-item .at4-recommended-item-caption {
            height: 50px;
            padding: 15px
        }

        .at4-recommended .at4-recommended-item .at4-recommended-item-caption .at-h4 {
            height: 54px;
            margin: 0 0 5px;
            padding: 0;
            overflow: hidden;
            word-wrap: break-word;
            font-size: 14px;
            font-weight: 400;
            line-height: 18px;
            text-align: left
        }

        .at4-recommended.at-medium .at4-recommended-item .at4-recommended-item-caption .at-h4 {
            font-size: 9pt;
            line-height: 1pc;
            height: 33px
        }

        .at4-recommended .at4-recommended-item:hover .at4-recommended-item-caption .at-h4 {
            text-decoration: underline
        }

        .at4-recommended a:link,
        .at4-recommended a:visited {
            text-decoration: none;
            color: #464646
        }

        .at4-recommended .at4-recommended-item .at4-recommended-item-caption .at-h4 a:hover {
            text-decoration: underline;
            color: #000
        }

        .at4-recommended .at4-recommended-item .at4-recommended-item-caption small {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 11px;
            color: #666
        }

        .at4-recommended.at-medium .at4-recommended-item .at4-recommended-item-caption small {
            font-size: 9px
        }

        .at4-recommended .at4-recommended-vertical {
            padding: 15px 0 0
        }

        .at4-recommended .at4-recommended-vertical .at4-recommended-item {
            display: block;
            width: auto;
            max-width: 100%;
            height: 60px;
            border: none;
            margin: 0 0 15px;
            box-shadow: none;
            background: none
        }

        .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-img,
        .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-img img {
            width: 60px;
            height: 60px;
            float: left
        }

        .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-caption {
            border-top: none;
            margin: 0;
            height: 60px;
            padding: 3px 5px
        }

        .at4-recommended .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-caption .at-h4 {
            height: 38px;
            margin: 0
        }

        .at4-recommended .at4-recommended-vertical .at4-recommended-item .at4-recommended-item-caption small {
            position: absolute;
            bottom: 0
        }

        .at4-recommended .at-recommended-label.at-vertical {
            text-align: left
        }

        .at4-no-image-light-recommended,
        .at4-no-image-minimal-recommended {
            background-color: #f2f2f2 !important
        }

        .at4-no-image-gray-recommended {
            background-color: #e6e6e5 !important
        }

        .at4-no-image-dark-recommended {
            background-color: #4e555e !important
        }

        .at4-recommended .at4-recommended-item-placeholder-img {
            background-repeat: no-repeat !important;
            background-position: center !important;
            width: 100% !important;
            height: 100% !important
        }

        .at4-recommended-horizontal .at4-no-image-dark-recommended .at4-recommended-item-placeholder-img {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAfCAYAAACCox+xAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjlFNUUyQTg3MTI0RDExRTM4NzAwREJDRjlCQzAyMUVFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjlFNUUyQTg4MTI0RDExRTM4NzAwREJDRjlCQzAyMUVFIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6OUU1RTJBODUxMjREMTFFMzg3MDBEQkNGOUJDMDIxRUUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OUU1RTJBODYxMjREMTFFMzg3MDBEQkNGOUJDMDIxRUUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6oCfPiAAABfUlEQVR42uyWTU/DMAyGm3bdBxp062hHe+PC//9HCIkDYpNAO7CPAuWN5Eohyhpno2GHWqq8pO78xHHsiLquH4L/l6cwuBAZaOPKs//YBFIJIR59UiAt7huYi90aE/UQakTDLaL26RUEAAJqiefm93T9Bpj1X4O0bY0OIUXCpYBJvYDAUWyAUCWliHGTcnpqRMaM72ImRAJVknYG+eb4YEDIBeU0zGnsBLK1ODogYSsLhDwIJeVVk18lzfNA4ERGZNXi59UCIQhiYDilpSm/jp4awLxDvWhlf4/nGe8+LLuSt+SZul28ggaHG6gNVhDR+IuRFzOoxGKWwG7vVFm5AAQxgcqYpzrjFjR9zwPH5LSuT7XlNr2MQm5LzqjLpncNNaM+s8M27Y60g3FwhoSMzrtUQllgLtRs5pZ2cB4IhbvQbGRZv1NsrhyS8+SI5Mo9RJWpjAI1xqKL+0iEP180vy214JbeR12AyOgsHI7e0NfFyKv0ID1ID+IqPwIMAOeljGQOryBmAAAAAElFTkSuQmCC) !important
        }

        .at4-recommended-vertical .at4-no-image-dark-recommended .at4-recommended-item-placeholder-img {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAOCAYAAADwikbvAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjAzREMyNTM2MTI0RjExRTM4NzAwREJDRjlCQzAyMUVFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjAzREMyNTM3MTI0RjExRTM4NzAwREJDRjlCQzAyMUVFIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDNEQzI1MzQxMjRGMTFFMzg3MDBEQkNGOUJDMDIxRUUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDNEQzI1MzUxMjRGMTFFMzg3MDBEQkNGOUJDMDIxRUUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5GfbtkAAAAxklEQVR42qRSTQvCMAxduk53mEOHKFPP/v8/5cGTiIibivVFUomlG7gFHvloXpKmJefcPhkmNyvGEWj+IOZA6ckPImoxxVwOLvCvXUzkpayNCpRQK64IbOBnAYGAXMeMslNlU+CzrIEdCkxi5DPAoz6BE8ZuVNdKJuL8rS9sv62IXlCHyP0KqKUKZXK9uwkSLVArfwpVR3b225kXwovibcP+jC4jUtfWPZmfqJJnYlkAM128j1z0nHWKSUbIKDL/msHktwADAPptQo+vkZNLAAAAAElFTkSuQmCC) !important
        }

        .at4-recommended-horizontal .at4-no-image-gray-recommended .at4-recommended-item-placeholder-img,
        .at4-recommended-horizontal .at4-no-image-light-recommended .at4-recommended-item-placeholder-img,
        .at4-recommended-horizontal .at4-no-image-minimal-recommended .at4-recommended-item-placeholder-img {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAfCAYAAACCox+xAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjAzREMyNTMyMTI0RjExRTM4NzAwREJDRjlCQzAyMUVFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjAzREMyNTMzMTI0RjExRTM4NzAwREJDRjlCQzAyMUVFIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6OUU1RTJBODkxMjREMTFFMzg3MDBEQkNGOUJDMDIxRUUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OUU1RTJBOEExMjREMTFFMzg3MDBEQkNGOUJDMDIxRUUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6dfDQvAAABg0lEQVR42uyWS0vDQBDH82jaKNW0qUltbl68e/Di98eLBz+CCB5EBaWIpUat/4UJLMuame1j7SEDYbqbKfPLvHbDi8ur8+D/5T4K9kR6xrr27D+xgdS3N9d3PilQFmcNzN6mxkbdhxrQcoGofXkFAUAINcVzrG2vsP8KmJdtg7SlxoRQouBywOReQOAosUDoklPEpEU5XDciqeB/iRAig6pIO4P8CHysBBDqg0palrR2Alkwjj5RsDUDoRqhorpq6quifRkInKiIPLf4eWIgQoLoWbq0stXXn10DmDeoR2PsL/E84N0Hk5Wypc70dMkGGhzOoeb4gpjW34K6GEFljFkGu6XTZJUCEMQBVCHs6kI60MycB47FyUmo20oPvYJCzhVnvIsR3zg5ghoRTNpyHKTBBhIJTt6pFsoZ9iLDZswcB5uBULhnho0a66eazaFDca59Hym1e4guQ4rCO4Fu/T4Sw8Gk+c3MghN6H+8CRKVg4tB6fV8XI6/SgXQgHYir/AowAMU5TskhKVUNAAAAAElFTkSuQmCC) !important
        }

        .at4-recommended-vertical .at4-no-image-gray-recommended .at4-recommended-item-placeholder-img,
        .at4-recommended-vertical .at4-no-image-light-recommended .at4-recommended-item-placeholder-img,
        .at4-recommended-vertical .at4-no-image-minimal-recommended .at4-recommended-item-placeholder-img {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAOCAYAAADwikbvAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjAzREMyNTNBMTI0RjExRTM4NzAwREJDRjlCQzAyMUVFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjAzREMyNTNCMTI0RjExRTM4NzAwREJDRjlCQzAyMUVFIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDNEQzI1MzgxMjRGMTFFMzg3MDBEQkNGOUJDMDIxRUUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDNEQzI1MzkxMjRGMTFFMzg3MDBEQkNGOUJDMDIxRUUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz65Fr9cAAAA0ElEQVR42qRRuQrCQBDd3SSaIgYNosSrtLew8f+xsfAnYmEVRMR4YHwjExjCbsBk4DHHzptjR2+2u7VqJ3efjTNQ/EEMgbgiv46H/QNTDPnhCv/mYiLPI21EIIaaUEVgBj+oETQQypgRtidsXfNJpsACBXo28gWgUd9AjrEL0TXhiSh/XhWudlZI/kCdLPtFUGMRCni9p6kl+kAq/D5UavmzX2fNd87obsCSfztnrOR0rjvTiRImkoyAQQNRyZ2jhjenGNVBOpF1WZatyV8BBgBJ+irgS/KHdAAAAABJRU5ErkJggg==) !important
        }

        #at-drawer.ats-dark,
        .at4-recommended.ats-dark .at4-recommended-horizontal .at4-recommended-item-caption,
        .at4-recommended.ats-dark .at4-recommended-vertical .at4-recommended-item-caption {
            background: #262b30
        }

        #at-drawer.ats-gray,
        .at4-recommended.ats-gray .at4-recommended-horizontal .at4-recommended-item-caption {
            background: #f2f2f2
        }

        #at-drawer.ats-light,
        .at4-recommended.ats-light .at4-recommended-horizontal .at4-recommended-item-caption {
            background: #fff
        }

        .at4-recommended.ats-dark .at4-recommended-vertical .at4-recommended-item {
            background: none
        }

        .at4-recommended.ats-dark .at4-recommended-item .at4-recommended-item-caption a:hover,
        .at4-recommended.ats-dark .at4-recommended-item .at4-recommended-item-caption a:link,
        .at4-recommended.ats-dark .at4-recommended-item .at4-recommended-item-caption a:visited,
        .at4-recommended.ats-dark .at4-recommended-item .at4-recommended-item-caption small,
        .at4-recommended.ats-dark .at4-recommended-item-caption,
        .at4-recommended.ats-dark .at-logo a:hover,
        .at4-recommended.ats-dark .at-recommended-label.at-vertical {
            color: #fff
        }

        .at4-recommended-vertical-logo {
            padding-top: 0;
            text-align: left
        }

        .at4-recommended-vertical-logo .at4-logo-container {
            line-height: 10px
        }

        .at4-recommended-horizontal-logo {
            text-align: center
        }

        .at4-recommended.at-inline .at4-recommended-horizontal-logo {
            text-align: left
        }

        #at4-thankyou .at4-recommended.at-inline .at4-recommended-horizontal {
            text-align: center
        }

        .at4-recommended .at-logo {
            margin: 10px 0 0;
            padding: 0;
            height: 25px;
            overflow: auto;
            -ms-box-sizing: content-box;
            -o-box-sizing: content-box;
            box-sizing: content-box
        }

        .at4-recommended.at-inline .at4-recommended-horizontal .at-logo {
            text-align: left
        }

        .at4-recommended .at4-logo-container a.at-sponsored-link {
            color: #666
        }

        .at4-recommended-class .at4-logo-container a:hover,
        .at4-recommendedbox-outer-container .at4-recommended-recommendedbox .at4-logo-container a:hover {
            color: #000
        }
    </style>
    <style type="text/css">
        .at-recommendedjumbo-outer-container {
            margin: 0;
            padding: 0;
            border: 0;
            background: none;
            color: #000
        }

        .at-recommendedjumbo-footer {
            position: relative;
            width: 100%;
            height: 510px;
            overflow: hidden;
            transition: all .3s ease-in-out
        }

        .at-mobile .at-recommendedjumbo-footer {
            height: 250px
        }

        .at-recommendedjumbo-footer #bg-link:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, .75)
        }

        .at-recommendedjumbo-footer:hover #bg-link:after {
            background: rgba(0, 0, 0, .85)
        }

        .at-recommendedjumbo-footer *,
        .at-recommendedjumbo-footer :after,
        .at-recommendedjumbo-footer :before {
            box-sizing: border-box
        }

        .at-recommendedjumbo-footer:hover #at-recommendedjumbo-footer-bg {
            animation: atRecommendedJumboAnimatedBackground 1s ease-in-out 1;
            animation-fill-mode: forwards
        }

        .at-recommendedjumbo-footer #at-recommendedjumbo-top-holder {
            position: absolute;
            top: 0;
            padding: 0 40px;
            width: 100%
        }

        .at-mobile .at-recommendedjumbo-footer #at-recommendedjumbo-top-holder {
            padding: 0 20px
        }

        .at-recommendedjumbo-footer .at-recommendedjumbo-footer-inner {
            position: relative;
            text-align: center;
            font-family: helvetica, arial, sans-serif;
            z-index: 2;
            width: 100%
        }

        .at-recommendedjumbo-footer #at-recommendedjumbo-label-holder {
            margin: 40px 0 0;
            max-height: 30px
        }

        .at-mobile .at-recommendedjumbo-footer #at-recommendedjumbo-label-holder {
            margin: 20px 0 0;
            max-height: 20px
        }

        .at-recommendedjumbo-footer #at-recommendedjumbo-label {
            font-weight: 300;
            font-size: 24px;
            line-height: 24px;
            color: #fff;
            margin: 0
        }

        .at-mobile .at-recommendedjumbo-footer #at-recommendedjumbo-label {
            font-weight: 150;
            font-size: 14px;
            line-height: 14px
        }

        .at-recommendedjumbo-footer #at-recommendedjumbo-title-holder {
            margin: 20px 0 0;
            min-height: 3pc;
            max-height: 78pt
        }

        .at-mobile .at-recommendedjumbo-footer #at-recommendedjumbo-title-holder {
            margin: 10px 0 0;
            min-height: 24px;
            max-height: 54px
        }

        .at-recommendedjumbo-footer #at-recommendedjumbo-content-title {
            font-size: 3pc;
            line-height: 52px;
            font-weight: 700;
            margin: 0
        }

        .at-mobile .at-recommendedjumbo-footer #at-recommendedjumbo-content-title {
            font-size: 24px;
            line-height: 27px
        }

        .at-recommendedjumbo-footer a {
            text-decoration: none;
            color: #fff
        }

        .at-recommendedjumbo-footer a:visited {
            color: #fff
        }

        .at-recommendedjumbo-footer small {
            margin: 20px 0 0;
            display: inline-block;
            height: 2pc;
            line-height: 2pc;
            font-size: 14px;
            color: #ccc;
            cursor: default
        }

        .at-mobile .at-recommendedjumbo-footer small {
            margin: 10px 0 0;
            height: 14px;
            line-height: 14px;
            font-size: 9pt
        }

        .at-recommendedjumbo-footer .at-logo-container {
            position: absolute;
            bottom: 20px;
            margin: auto;
            left: 0;
            right: 0
        }

        .at-mobile .at-recommendedjumbo-footer .at-logo-container {
            bottom: 10px
        }

        .at-recommendedjumbo-footer a.at-sponsored-link {
            color: #ccc
        }

        .at-recommendedjumbo-footer div #at-recommendedjumbo-logo-link {
            padding: 2px 0 0 11px;
            text-decoration: none;
            line-height: 20px;
            font-family: helvetica, arial, sans-serif;
            font-size: 9px;
            color: #ccc
        }

        @keyframes atRecommendedJumboAnimatedBackground {
            0% {
                transform: scale(1, 1)
            }

            to {
                transform: scale(1.1, 1.1)
            }
        }
    </style>
    <style type="text/css">
        .at-resp-share-element {
            position: relative;
            padding: 0;
            margin: 0;
            font-size: 0;
            line-height: 0
        }

        .at-resp-share-element:after,
        .at-resp-share-element:before {
            content: " ";
            display: table
        }

        .at-resp-share-element.at-mobile .at4-share-count-container,
        .at-resp-share-element.at-mobile .at-label {
            display: none
        }

        .at-resp-share-element .at-share-btn {
            display: inline-block;
            *display: inline;
            *zoom: 1;
            margin: 0 2px 5px;
            padding: 0;
            overflow: hidden;
            line-height: 0;
            text-decoration: none;
            text-transform: none;
            color: #fff;
            cursor: pointer;
            transition: all .2s ease-in-out;
            border: 0;
            font-family: helvetica neue, helvetica, arial, sans-serif;
            background-color: transparent
        }

        .at-resp-share-element .at-share-btn::-moz-focus-inner {
            border: 0;
            padding: 0
        }

        .at-resp-share-element .at-share-btn:focus,
        .at-resp-share-element .at-share-btn:hover {
            transform: translateY(-4px);
            color: #fff;
            text-decoration: none
        }

        .at-resp-share-element .at-share-btn .at-icon-wrapper {
            float: left
        }

        .at-resp-share-element .at-share-btn.at-share-btn.at-svc-compact:hover {
            transform: none
        }

        .at-resp-share-element .at-share-btn .at-label {
            font-family: helvetica neue, helvetica, arial, sans-serif;
            font-size: 9pt;
            padding: 0 15px 0 0;
            margin: 0 0 0 5px;
            height: 2pc;
            line-height: 2pc;
            background: none
        }

        .at-resp-share-element .at-icon,
        .at-resp-share-element .at-label {
            cursor: pointer
        }

        .at-resp-share-element .at4-share-count-container {
            text-decoration: none;
            float: right;
            padding-right: 15px;
            font-size: 9pt
        }

        .at-mobile .at-resp-share-element .at-label {
            display: none
        }

        .at-resp-share-element.at-mobile .at-share-btn {
            margin-right: 5px
        }

        .at-mobile .at-resp-share-element .at-share-btn {
            padding: 5px;
            margin-right: 5px
        }
    </style>
    <style type="text/css">
        .at-share-tbx-element {
            position: relative;
            margin: 0;
            color: #fff;
            font-size: 0
        }

        .at-share-tbx-element,
        .at-share-tbx-element .at-share-btn {
            font-family: helvetica neue, helvetica, arial, sans-serif;
            padding: 0;
            line-height: 0
        }

        .at-share-tbx-element .at-share-btn {
            cursor: pointer;
            margin: 0 5px 5px 0;
            display: inline-block;
            overflow: hidden;
            border: 0;
            text-decoration: none;
            text-transform: none;
            background-color: transparent;
            color: inherit;
            transition: all .2s ease-in-out
        }

        .at-share-tbx-element .at-share-btn:focus,
        .at-share-tbx-element .at-share-btn:hover {
            transform: translateY(-4px);
            outline-offset: -1px;
            color: inherit
        }

        .at-share-tbx-element .at-share-btn::-moz-focus-inner {
            border: 0;
            padding: 0
        }

        .at-share-tbx-element .at-share-btn.at-share-btn.at-svc-compact:hover {
            transform: none
        }

        .at-share-tbx-element .at-icon-wrapper {
            vertical-align: middle
        }

        .at-share-tbx-element .at4-share-count,
        .at-share-tbx-element .at-label {
            margin: 0 7.5px 0 2.5px;
            text-decoration: none;
            vertical-align: middle;
            display: inline-block;
            background: none;
            height: 0;
            font-size: inherit;
            line-height: inherit;
            color: inherit
        }

        .at-share-tbx-element.at-mobile .at4-share-count,
        .at-share-tbx-element.at-mobile .at-label {
            display: none
        }

        .at-share-tbx-element .at_native_button {
            vertical-align: middle
        }

        .at-share-tbx-element .addthis_counter.addthis_bubble_style {
            margin: 0 2px;
            vertical-align: middle;
            display: inline-block
        }

        .at-share-tbx-element .fb_iframe_widget {
            display: block
        }

        .at-share-tbx-element.at-share-tbx-native .at300b {
            vertical-align: middle
        }

        .at-style-responsive .at-share-btn {
            padding: 5px
        }

        .at-style-jumbo {
            display: table
        }

        .at-style-jumbo .at4-spacer {
            height: 1px;
            display: block;
            visibility: hidden;
            opacity: 0
        }

        .at-style-jumbo .at4-count-container {
            display: table-cell;
            text-align: center;
            min-width: 200px;
            vertical-align: middle;
            border-right: 1px solid #ccc;
            padding-right: 20px
        }

        .at-style-jumbo .at4-count {
            font-size: 60px;
            line-height: 60px;
            font-weight: 700
        }

        .at-style-jumbo .at4-count-title {
            position: relative;
            font-size: 18px;
            line-height: 18px;
            bottom: 2px
        }

        .at-style-jumbo .at-share-btn-elements {
            display: table-cell;
            vertical-align: middle;
            padding-left: 20px
        }

        .at_flat_counter {
            cursor: pointer;
            font-family: helvetica, arial, sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-block;
            position: relative;
            vertical-align: top;
            height: auto;
            margin: 0 5px;
            padding: 0 6px;
            left: -1px;
            background: #ebebeb;
            color: #32363b;
            transition: all .2s ease
        }

        .at_flat_counter:after {
            top: 30%;
            left: -4px;
            content: "";
            position: absolute;
            border-width: 5px 8px 5px 0;
            border-style: solid;
            border-color: transparent #ebebeb transparent transparent;
            display: block;
            width: 0;
            height: 0;
            transform: translateY(360deg)
        }

        .at_flat_counter:hover {
            background: #e1e2e2
        }
    </style>
    <style type="text/css">
        .at4-thankyou-background {
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            -webkit-overflow-scrolling: touch;
            z-index: 9999999;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABtJREFUeNpizCuu/sRABGBiIBKMKqSOQoAAAwC8KgJipENhxwAAAABJRU5ErkJggg==);
            background: hsla(217, 6%, 46%, .95)
        }

        .at4-thankyou-background.at-thankyou-shown {
            position: fixed
        }

        .at4-thankyou-inner {
            position: absolute;
            width: 100%;
            top: 10%;
            left: 50%;
            margin-left: -50%;
            text-align: center
        }

        .at4-thankyou-mobile .at4-thankyou-inner {
            top: 5%
        }

        .thankyou-description {
            font-weight: 400
        }

        .at4-thankyou-background .at4lb-inner {
            position: relative;
            width: 100%;
            height: 100%
        }

        .at4-thankyou-background .at4lb-inner .at4x {
            position: absolute;
            top: 15px;
            right: 15px;
            display: block;
            width: 20px;
            height: 20px;
            padding: 20px;
            margin: 0;
            cursor: pointer;
            transition: opacity .25s ease-in;
            opacity: .4;
            background: url("data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNui8sowAAAAWdEVYdENyZWF0aW9uIFRpbWUAMTEvMTMvMTKswDp5AAAAd0lEQVQ4jb2VQRLAIAgDE///Z3qqY1FAhalHMCsCIkVEAIAkkVgvp2lDBgYAnAyHkWotLccNrEd4A7X2TqIdqLfnWBAdaF5rJdyJfjtPH5GT37CaGhoVq3nOm/XflUuLUto2pY1d+vRKh0Pp+MrAVtDe2JkvYNQ+jVSEEFmOkggAAAAASUVORK5CYII=") no-repeat center center;
            overflow: hidden;
            text-indent: -99999em;
            border: 1px solid transparent
        }

        .at4-thankyou-background .at4lb-inner .at4x:focus,
        .at4-thankyou-background .at4lb-inner .at4x:hover {
            border: 1px solid #fff;
            border-radius: 50%;
            outline: 0
        }

        .at4-thankyou-background .at4lb-inner #at4-palogo {
            position: absolute;
            bottom: 10px;
            display: inline-block;
            text-decoration: none;
            font-family: helvetica, arial, sans-serif;
            font-size: 11px;
            cursor: pointer;
            -webkit-transition: opacity .25s ease-in;
            moz-transition: opacity .25s ease-in;
            transition: opacity .25s ease-in;
            opacity: .5;
            z-index: 100020;
            color: #fff;
            padding: 2px 0 0 13px
        }

        .at4-thankyou-background .at4lb-inner #at4-palogo .at-branding-addthis,
        .at4-thankyou-background .at4lb-inner #at4-palogo .at-branding-info {
            color: #fff
        }

        .at4-thankyou-background .at4lb-inner #at4-palogo:hover,
        .at4-thankyou-background.ats-dark .at4lb-inner a#at4-palogo:hover {
            text-decoration: none;
            color: #fff;
            opacity: 1
        }

        .at4-thankyou-background.ats-dark {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABtJREFUeNpiZGBgeMZABGBiIBKMKqSOQoAAAwB+cQD6hqlbCwAAAABJRU5ErkJggg==");
            background: rgba(0, 0, 0, .85)
        }

        .at4-thankyou-background .thankyou-title {
            color: #fff;
            font-size: 38.5px;
            margin: 10px 20px;
            line-height: 38.5px;
            font-family: helvetica neue, helvetica, arial, sans-serif;
            font-weight: 300
        }

        .at4-thankyou-background.ats-dark .thankyou-description,
        .at4-thankyou-background.ats-dark .thankyou-title {
            color: #fff
        }

        .at4-thankyou-background .thankyou-description {
            color: #fff;
            font-size: 18px;
            margin: 10px 0;
            line-height: 24px;
            padding: 0;
            font-family: helvetica neue, helvetica, arial, sans-serif;
            font-weight: 300
        }

        .at4-thankyou-background .at4-thanks-icons {
            padding-top: 10px
        }

        .at4-thankyou-mobile * {
            -webkit-overflow-scrolling: touch
        }

        #at4-thankyou .at4-recommended-recommendedbox .at-logo {
            display: none
        }

        .at4-thankyou .at-h3 {
            height: 49px;
            line-height: 49px;
            margin: 0 50px 0 20px;
            padding: 1px 0 0;
            font-family: helvetica neue, helvetica, arial, sans-serif;
            font-size: 1pc;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 1px #000
        }

        .at4-thanks {
            padding-top: 50px;
            text-align: center
        }

        .at4-thanks label {
            display: block;
            margin: 0 0 15px;
            font-size: 1pc;
            line-height: 1pc
        }

        .at4-thanks .at4-h2 {
            background: none;
            border: none;
            margin: 0 0 10px;
            padding: 0;
            font-family: helvetica neue, helvetica, arial, sans-serif;
            font-size: 28px;
            font-weight: 300;
            color: #000
        }

        .at4-thanks .at4-thanks-icons {
            position: relative;
            height: 2pc
        }

        .at4-thanks .at4-thanks-icons .at-thankyou-label {
            display: block;
            padding-bottom: 10px;
            font-size: 14px;
            color: #666
        }

        .at4-thankyou-layer .at-follow .at-icon-wrapper {
            width: 2pc;
            height: 2pc
        }
    </style>
    <style type="text/css">
        .at4-recommended-toaster {
            position: fixed;
            top: auto;
            bottom: 0;
            right: 0;
            z-index: 100021
        }

        .at4-recommended-toaster.ats-light {
            border: 1px solid #c5c5c5;
            background: #fff
        }

        .at4-recommended-toaster.ats-gray {
            border: 1px solid #c5c5c5;
            background: #f2f2f2
        }

        .at4-recommended-toaster.ats-dark {
            background: #262b30;
            color: #fff
        }

        .at4-recommended-toaster .at4-recommended-container {
            padding-top: 0;
            margin: 0
        }

        .at4-recommended.at4-recommended-toaster div.at-recommended-label {
            line-height: 1pc;
            font-size: 1pc;
            text-align: left;
            padding: 20px 0 0 20px
        }

        .at4-toaster-outer .at4-recommended .at4-recommended-item .at4-recommended-item-caption .at-h4 {
            font-size: 11px;
            line-height: 11px;
            margin: 10px 0 6px;
            height: 30px
        }

        .at4-recommended.at4-recommended-toaster div.at-recommended-label.ats-gray,
        .at4-recommended.at4-recommended-toaster div.at-recommended-label.ats-light {
            color: #464646
        }

        .at4-recommended.at4-recommended-toaster div.at-recommended-label.ats-dark {
            color: #fff
        }

        .at4-toaster-close-control {
            position: absolute;
            top: 0;
            right: 0;
            display: block;
            width: 20px;
            height: 20px;
            line-height: 20px;
            margin: 5px 5px 0 0;
            padding: 0;
            text-indent: -9999em
        }

        .at4-toaster-open-control {
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 100020
        }

        .at4-toaster-outer .at4-recommended-item {
            width: 90pt;
            border: 0;
            margin: 9px 10px 0
        }

        .at4-toaster-outer .at4-recommended-item:first-child {
            margin-left: 20px
        }

        .at4-toaster-outer .at4-recommended-item:last-child {
            margin-right: 20px
        }

        .at4-toaster-outer .at4-recommended-item .at4-recommended-item-img {
            max-height: 90pt;
            max-width: 90pt
        }

        .at4-toaster-outer .at4-recommended-item .at4-recommended-item-img img {
            height: 90pt;
            width: 90pt
        }

        .at4-toaster-outer .at4-recommended-item .at4-recommended-item-caption {
            height: 30px;
            padding: 0;
            margin: 0;
            height: initial
        }

        .at4-toaster-outer .ats-dark .at4-recommended-item .at4-recommended-item-caption {
            background: #262b30
        }

        .at4-toaster-outer .at4-recommended .at4-recommended-item .at4-recommended-item-caption small {
            width: auto;
            line-height: 14px;
            margin: 0
        }

        .at4-toaster-outer .at4-recommended.ats-dark .at4-recommended-item .at4-recommended-item-caption small {
            color: #fff
        }

        .at4-recommended-toaster .at-logo {
            margin: 0 0 3px 20px;
            text-align: left
        }

        .at4-recommended-toaster .at-logo .at4-logo-container.at-sponsored-logo {
            position: relative
        }

        .at4-toaster-outer .at4-recommended-item .sponsored-label {
            text-align: right;
            font-size: 10px;
            color: #666;
            float: right;
            position: fixed;
            bottom: 6px;
            right: 20px;
            top: initial;
            z-index: 99999
        }
    </style>
    <style type="text/css">
        .at4-whatsnext {
            position: fixed;
            bottom: 0 !important;
            right: 0;
            background: #fff;
            border: 1px solid #c5c5c5;
            margin: -1px;
            width: 390px;
            height: 90pt;
            overflow: hidden;
            font-size: 9pt;
            font-weight: 400;
            color: #000;
            z-index: 1800000000
        }

        .at4-whatsnext a {
            color: #666
        }

        .at4-whatsnext .at-whatsnext-content {
            height: 90pt;
            position: relative
        }

        .at4-whatsnext .at-whatsnext-content .at-branding {
            position: absolute;
            bottom: 15px;
            right: 10px;
            padding-left: 9px;
            text-decoration: none;
            line-height: 10px;
            font-family: helvetica, arial, sans-serif;
            font-size: 10px;
            color: #666
        }

        .at4-whatsnext .at-whatsnext-content .at-whatsnext-content-inner {
            position: absolute;
            top: 15px;
            right: 20px;
            bottom: 15px;
            left: 140px;
            text-align: left;
            height: 105px
        }

        .at4-whatsnext .at-whatsnext-content-inner a {
            display: inline-block
        }

        .at4-whatsnext .at-whatsnext-content-inner div.at-h6 {
            text-align: left;
            margin: 0;
            padding: 0 0 3px;
            font-size: 11px;
            color: #666;
            cursor: default
        }

        .at4-whatsnext .at-whatsnext-content .at-h3 {
            text-align: left;
            margin: 5px 0;
            padding: 0;
            line-height: 1.2em;
            font-weight: 400;
            font-size: 14px;
            height: 3pc
        }

        .at4-whatsnext .at-whatsnext-content-inner a:link,
        .at4-whatsnext .at-whatsnext-content-inner a:visited {
            text-decoration: none;
            font-weight: 400;
            color: #464646
        }

        .at4-whatsnext .at-whatsnext-content-inner a:hover {
            color: #000
        }

        .at4-whatsnext .at-whatsnext-content-inner small {
            position: absolute;
            bottom: 15px;
            line-height: 10px;
            font-size: 11px;
            color: #666;
            cursor: default;
            text-align: left
        }

        .at4-whatsnext .at-whatsnext-content .at-whatsnext-content-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 90pt;
            height: 90pt;
            overflow: hidden
        }

        .at4-whatsnext .at-whatsnext-content .at-whatsnext-content-img img {
            position: absolute;
            top: 0;
            left: 0;
            max-height: none;
            max-width: none
        }

        .at4-whatsnext .at-whatsnext-close-control {
            position: absolute;
            top: 0;
            right: 0;
            display: block;
            width: 20px;
            height: 20px;
            line-height: 20px;
            margin: 0 5px 0 0;
            padding: 0;
            text-indent: -9999em
        }

        .at-whatsnext-open-control {
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 100020
        }

        .at4-whatsnext.ats-dark {
            background: #262b30
        }

        .at4-whatsnext.ats-dark .at-whatsnext-content .at-h3,
        .at4-whatsnext.ats-dark .at-whatsnext-content a.at4-logo:hover,
        .at4-whatsnext.ats-dark .at-whatsnext-content-inner a:link,
        .at4-whatsnext.ats-dark .at-whatsnext-content-inner a:visited {
            color: #fff
        }

        .at4-whatsnext.ats-light {
            background: #fff
        }

        .at4-whatsnext.ats-gray {
            background: #f2f2f2
        }

        .at4-whatsnext.at-whatsnext-nophoto {
            width: 270px
        }

        .at4-whatsnext.at-whatsnext-nophoto .at-whatsnext-content-img {
            display: none
        }

        .at4-whatsnext.at-whatsnext-nophoto .at-whatsnext-content .at-whatsnext-content-inner {
            top: 15px;
            right: 0;
            left: 20px
        }

        .at4-whatsnext.at-whatsnext-nophoto .at-whatsnext-content .at-whatsnext-content-inner.addthis_32x32_style {
            top: 0;
            right: 0;
            left: 0;
            padding: 45px 20px 0;
            font-size: 20px
        }

        .at4-whatsnext.at-whatsnext-nophoto .at-whatsnext-content .at-whatsnext-content-inner .at4-icon,
        .at4-whatsnext.at-whatsnext-nophoto .at-whatsnext-content .at-whatsnext-content-inner .at4-icon-fw,
        .at4-whatsnext.at-whatsnext-nophoto .at-whatsnext-content .at-whatsnext-content-inner .whatsnext-msg {
            vertical-align: middle
        }

        .at-whatsnext-img,
        .at-whatsnext-img-lnk {
            position: absolute;
            left: 0
        }
    </style>
    <style type="text/css">
        .at4-whatsnextmobile {
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
            background: #fff;
            z-index: 9999998;
            height: 170px;
            font-size: 28px
        }

        .at4-whatsnextmobile .col-2 {
            height: 100%;
            font-size: 1em
        }

        .at4-whatsnextmobile .col-2:first-child {
            max-width: 200px;
            display: inline-block;
            float: left
        }

        .at4-whatsnextmobile .col-2:last-child {
            position: absolute;
            left: 200px;
            right: 50px;
            top: 0;
            bottom: 0;
            display: inline-block
        }

        .at4-whatsnextmobile .at-whatsnext-content-inner {
            font-size: 1em
        }

        .at4-whatsnextmobile .at-whatsnext-content-img img {
            height: 100%;
            width: 100%
        }

        .at4-whatsnextmobile .at-close-control {
            font-size: 1em;
            position: absolute;
            top: 0;
            right: 0;
            width: 50px;
            height: 50px
        }

        .at4-whatsnextmobile .at-close-control button {
            width: 100%;
            height: 100%;
            font-size: 1em;
            font-weight: 400;
            text-decoration: none;
            opacity: .5;
            padding: 0;
            cursor: pointer;
            background: 0 0;
            border: 0;
            -webkit-appearance: none
        }

        .at4-whatsnextmobile .at-h3,
        .at4-whatsnextmobile .at-h6 {
            font-size: 1em;
            margin: 0;
            color: #a1a1a1;
            margin-left: 2.5%;
            margin-top: 25px
        }

        .at4-whatsnextmobile .at-h3 {
            font-size: 1em;
            line-height: 1em;
            font-weight: 500;
            height: 50%
        }

        .at4-whatsnextmobile .at-h3 a {
            font-size: 1em;
            text-decoration: none
        }

        .at4-whatsnextmobile .at-h6 {
            font-size: .8em;
            line-height: .8em;
            font-weight: 500
        }

        .at4-whatsnextmobile .footer {
            position: absolute;
            bottom: 2px;
            left: 200px;
            right: 0;
            padding-left: 2.5%;
            font-size: 1em;
            line-height: .6em
        }

        .at4-whatsnextmobile .footer small {
            font-size: .6em;
            color: #a1a1a1
        }

        .at4-whatsnextmobile .footer small:first-child {
            margin-right: 5%;
            float: left
        }

        .at4-whatsnextmobile .footer small:last-child {
            margin-right: 2.5%;
            float: right
        }

        .at4-whatsnextmobile .at-whatsnext-content {
            height: 100%
        }

        .at4-whatsnextmobile.ats-dark {
            background: #262b30;
            color: #fff
        }

        .at4-whatsnextmobile .at-close-control button {
            color: #bfbfbf
        }

        .at4-whatsnextmobile.ats-dark a:link,
        .at4-whatsnextmobile.ats-dark a:visited {
            color: #fff
        }

        .at4-whatsnextmobile.ats-gray {
            background: #f2f2f2;
            color: #262b30
        }

        .at4-whatsnextmobile.ats-light {
            background: #fff;
            color: #262b30
        }

        .at4-whatsnextmobile.ats-dark .footer a:link,
        .at4-whatsnextmobile.ats-dark .footer a:visited,
        .at4-whatsnextmobile.ats-gray .footer a:link,
        .at4-whatsnextmobile.ats-gray .footer a:visited,
        .at4-whatsnextmobile.ats-light .footer a:link,
        .at4-whatsnextmobile.ats-light .footer a:visited {
            color: #a1a1a1
        }

        .at4-whatsnextmobile.ats-gray a:link,
        .at4-whatsnextmobile.ats-gray a:visited,
        .at4-whatsnextmobile.ats-light a:link,
        .at4-whatsnextmobile.ats-light a:visited {
            color: #262b30
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            .at4-whatsnextmobile {
                height: 85px;
                font-size: 14px
            }

            .at4-whatsnextmobile .col-2:first-child {
                width: 75pt
            }

            .at4-whatsnextmobile .col-2:last-child {
                right: 25px;
                left: 75pt
            }

            .at4-whatsnextmobile .footer {
                left: 75pt
            }

            .at4-whatsnextmobile .at-close-control {
                width: 25px;
                height: 25px
            }

            .at4-whatsnextmobile .at-h3,
            .at4-whatsnextmobile .at-h6 {
                margin-top: 12.5px
            }
        }
    </style>
    <style type="text/css">
        .at-custom-mobile-bar {
            left: 0;
            right: 0;
            width: 100%;
            height: 56px;
            position: fixed;
            text-align: center;
            z-index: 100020;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, .2);
            font: initial;
            line-height: normal;
            top: auto;
            bottom: 0
        }

        .at-custom-mobile-bar.at-custom-mobile-bar-zindex-hide {
            z-index: -1 !important
        }

        .at-custom-mobile-bar.atss-top {
            top: 0;
            bottom: auto
        }

        .at-custom-mobile-bar.atss-bottom {
            top: auto;
            bottom: 0
        }

        .at-custom-mobile-bar .at-custom-mobile-bar-btns {
            display: inline-block;
            text-align: center
        }

        .at-custom-mobile-bar .at-custom-mobile-bar-counter,
        .at-custom-mobile-bar .at-share-btn {
            margin-top: 4px
        }

        .at-custom-mobile-bar .at-share-btn {
            display: inline-block;
            text-decoration: none;
            transition: none;
            box-sizing: content-box
        }

        .at-custom-mobile-bar .at-custom-mobile-bar-counter {
            font-family: Helvetica neue, arial;
            vertical-align: top;
            margin-left: 4px;
            margin-right: 4px;
            display: inline-block
        }

        .at-custom-mobile-bar .at-custom-mobile-bar-count {
            font-size: 26px;
            line-height: 1.25em;
            color: #222
        }

        .at-custom-mobile-bar .at-custom-mobile-bar-text {
            font-size: 9pt;
            line-height: 1.25em;
            color: #888;
            letter-spacing: 1px
        }

        .at-custom-mobile-bar .at-icon-wrapper {
            text-align: center;
            height: 3pc;
            width: 3pc;
            margin: 0 4px
        }

        .at-custom-mobile-bar .at-icon {
            vertical-align: top;
            margin: 8px;
            width: 2pc;
            height: 2pc
        }

        .at-custom-mobile-bar.at-shfs-medium {
            height: 3pc
        }

        .at-custom-mobile-bar.at-shfs-medium .at-custom-mobile-bar-counter {
            margin-top: 6px
        }

        .at-custom-mobile-bar.at-shfs-medium .at-custom-mobile-bar-count {
            font-size: 18px
        }

        .at-custom-mobile-bar.at-shfs-medium .at-custom-mobile-bar-text {
            font-size: 10px
        }

        .at-custom-mobile-bar.at-shfs-medium .at-icon-wrapper {
            height: 40px;
            width: 40px
        }

        .at-custom-mobile-bar.at-shfs-medium .at-icon {
            margin: 6px;
            width: 28px;
            height: 28px
        }

        .at-custom-mobile-bar.at-shfs-small {
            height: 40px
        }

        .at-custom-mobile-bar.at-shfs-small .at-custom-mobile-bar-counter {
            margin-top: 3px
        }

        .at-custom-mobile-bar.at-shfs-small .at-custom-mobile-bar-count {
            font-size: 1pc
        }

        .at-custom-mobile-bar.at-shfs-small .at-custom-mobile-bar-text {
            font-size: 10px
        }

        .at-custom-mobile-bar.at-shfs-small .at-icon-wrapper {
            height: 2pc;
            width: 2pc
        }

        .at-custom-mobile-bar.at-shfs-small .at-icon {
            margin: 4px;
            width: 24px;
            height: 24px
        }
    </style>
    <style type="text/css">
        .at-custom-sidebar {
            top: 20%;
            width: 58px;
            position: fixed;
            text-align: center;
            z-index: 100020;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, .2);
            font: initial;
            line-height: normal;
            top: auto;
            bottom: 0
        }

        .at-custom-sidebar.at-custom-sidebar-zindex-hide {
            z-index: -1 !important
        }

        .at-custom-sidebar.atss-left {
            left: 0;
            right: auto;
            float: left;
            border-radius: 0 4px 4px 0
        }

        .at-custom-sidebar.atss-right {
            left: auto;
            right: 0;
            float: right;
            border-radius: 4px 0 0 4px
        }

        .at-custom-sidebar .at-custom-sidebar-btns {
            display: inline-block;
            text-align: center;
            padding-top: 4px
        }

        .at-custom-sidebar .at-custom-sidebar-counter {
            margin-bottom: 8px
        }

        .at-custom-sidebar .at-share-btn {
            display: inline-block;
            text-decoration: none;
            transition: none;
            box-sizing: content-box
        }

        .at-custom-sidebar .at-custom-sidebar-counter {
            font-family: Helvetica neue, arial;
            vertical-align: top;
            margin-left: 4px;
            margin-right: 4px;
            display: inline-block
        }

        .at-custom-sidebar .at-custom-sidebar-count {
            font-size: 21px;
            line-height: 1.25em;
            color: #222
        }

        .at-custom-sidebar .at-custom-sidebar-text {
            font-size: 10px;
            line-height: 1.25em;
            color: #888;
            letter-spacing: 1px
        }

        .at-custom-sidebar .at-icon-wrapper {
            text-align: center;
            margin: 0 4px
        }

        .at-custom-sidebar .at-icon {
            vertical-align: top;
            margin: 9px;
            width: 2pc;
            height: 2pc
        }

        .at-custom-sidebar .at-icon-wrapper {
            position: relative
        }

        .at-custom-sidebar .at4-share-count,
        .at-custom-sidebar .at4-share-count-container {
            line-height: 1pc;
            font-size: 10px
        }

        .at-custom-sidebar .at4-share-count {
            text-indent: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-weight: 200;
            width: 100%;
            height: 1pc
        }

        .at-custom-sidebar .at4-share-count-anchor .at-icon {
            margin-top: 3px
        }

        .at-custom-sidebar .at4-share-count-container {
            position: absolute;
            left: 0;
            right: auto;
            top: auto;
            bottom: 0;
            width: 100%;
            color: #fff;
            background: inherit
        }
    </style>
    <style type="text/css">
        .at-image-sharing-mobile-icon {
            position: absolute;
            background: #000 url(https://s7.addthis.com/static/44a36d35bafef33aa9455b7d3039a771.png) no-repeat top center;
            background-color: rgba(0, 0, 0, .9);
            background-image: url(https://s7.addthis.com/static/10db525181ee0bbe1a515001be1c7818.svg), none;
            border-radius: 3px;
            width: 50px;
            height: 40px;
            top: -9999px;
            left: -9999px
        }

        .at-image-sharing-tool {
            display: block;
            position: absolute;
            text-align: center;
            z-index: 9001;
            background: none;
            overflow: hidden;
            top: -9999px;
            left: -9999px;
            font: initial;
            line-height: 0
        }

        .at-image-sharing-tool.addthis-animated {
            animation-duration: .15s
        }

        .at-image-sharing-tool.at-orientation-vertical .at-share-btn {
            display: block
        }

        .at-image-sharing-tool.at-orientation-horizontal .at-share-btn {
            display: inline-block
        }

        .at-image-sharing-tool.at-image-sharing-tool-size-big .at-icon {
            width: 43px;
            height: 43px
        }

        .at-image-sharing-tool.at-image-sharing-tool-size-mobile .at-share-btn {
            margin: 0 !important
        }

        .at-image-sharing-tool.at-image-sharing-tool-size-mobile .at-icon-wrapper {
            height: 60px;
            width: 100%;
            border-radius: 0 !important
        }

        .at-image-sharing-tool.at-image-sharing-tool-size-mobile .at-icon {
            max-width: 100%;
            height: 54px !important;
            width: 54px !important
        }

        .at-image-sharing-tool .at-custom-shape.at-image-sharing-tool-btns {
            margin-right: 8px;
            margin-bottom: 8px
        }

        .at-image-sharing-tool .at-custom-shape .at-share-btn {
            margin-top: 8px;
            margin-left: 8px
        }

        .at-image-sharing-tool .at-share-btn {
            line-height: 0;
            text-decoration: none;
            transition: none;
            box-sizing: content-box
        }

        .at-image-sharing-tool .at-icon-wrapper {
            text-align: center;
            height: 100%;
            width: 100%
        }

        .at-image-sharing-tool .at-icon {
            vertical-align: top;
            width: 2pc;
            height: 2pc;
            margin: 3px
        }
    </style>
    <style type="text/css">
        .at-expanding-share-button {
            box-sizing: border-box;
            position: fixed;
            z-index: 9999
        }

        .at-expanding-share-button[data-position=bottom-right] {
            bottom: 10px;
            right: 10px
        }

        .at-expanding-share-button[data-position=bottom-right] .at-expanding-share-button-toggle-bg,
        .at-expanding-share-button[data-position=bottom-right] .at-expanding-share-button-toggle-btn[data-name]:after,
        .at-expanding-share-button[data-position=bottom-right] .at-icon-wrapper,
        .at-expanding-share-button[data-position=bottom-right] [data-name]:after {
            float: right
        }

        .at-expanding-share-button[data-position=bottom-right] [data-name]:after {
            margin-right: 10px
        }

        .at-expanding-share-button[data-position=bottom-right] .at-expanding-share-button-toggle-btn[data-name]:after {
            margin-right: 5px
        }

        .at-expanding-share-button[data-position=bottom-right] .at-icon-wrapper {
            margin-right: -3px
        }

        .at-expanding-share-button[data-position=bottom-left] {
            bottom: 10px;
            left: 10px
        }

        .at-expanding-share-button[data-position=bottom-left] .at-expanding-share-button-toggle-bg,
        .at-expanding-share-button[data-position=bottom-left] .at-expanding-share-button-toggle-btn[data-name]:after,
        .at-expanding-share-button[data-position=bottom-left] .at-icon-wrapper,
        .at-expanding-share-button[data-position=bottom-left] [data-name]:after {
            float: left
        }

        .at-expanding-share-button[data-position=bottom-left] [data-name]:after {
            margin-left: 10px
        }

        .at-expanding-share-button[data-position=bottom-left] .at-expanding-share-button-toggle-btn[data-name]:after {
            margin-left: 5px
        }

        .at-expanding-share-button *,
        .at-expanding-share-button :after,
        .at-expanding-share-button :before {
            box-sizing: border-box
        }

        .at-expanding-share-button .at-expanding-share-button-services-list {
            display: none;
            list-style: none;
            margin: 0 5px;
            overflow: visible;
            padding: 0
        }

        .at-expanding-share-button .at-expanding-share-button-services-list > li {
            display: block;
            height: 45px;
            position: relative;
            overflow: visible
        }

        .at-expanding-share-button .at-expanding-share-button-toggle-btn,
        .at-expanding-share-button .at-share-btn {
            transition: .1s;
            text-decoration: none
        }

        .at-expanding-share-button .at-share-btn {
            display: block;
            height: 40px;
            padding: 0 3px 0 0
        }

        .at-expanding-share-button .at-expanding-share-button-toggle-btn {
            position: relative;
            overflow: auto
        }

        .at-expanding-share-button .at-expanding-share-button-toggle-btn.at-expanding-share-button-hidden[data-name]:after {
            display: none
        }

        .at-expanding-share-button .at-expanding-share-button-toggle-bg {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
            border-radius: 50%;
            position: relative
        }

        .at-expanding-share-button .at-expanding-share-button-toggle-bg > span {
            background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2232px%22%20height%3D%2232px%22%20viewBox%3D%220%200%2032%2032%22%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Ctitle%3Eshare%3C%2Ftitle%3E%3Cg%20stroke%3D%22none%22%20stroke-width%3D%221%22%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23FFFFFF%22%3E%3Cpath%20d%3D%22M26%2C13.4285714%20C26%2C13.6220248%2025.9293162%2C13.7894338%2025.7879464%2C13.9308036%20L20.0736607%2C19.6450893%20C19.932291%2C19.786459%2019.7648819%2C19.8571429%2019.5714286%2C19.8571429%20C19.3779752%2C19.8571429%2019.2105662%2C19.786459%2019.0691964%2C19.6450893%20C18.9278267%2C19.5037195%2018.8571429%2C19.3363105%2018.8571429%2C19.1428571%20L18.8571429%2C16.2857143%20L16.3571429%2C16.2857143%20C15.6279725%2C16.2857143%2014.9750773%2C16.3080355%2014.3984375%2C16.3526786%20C13.8217977%2C16.3973217%2013.2488868%2C16.477306%2012.6796875%2C16.5926339%20C12.1104882%2C16.7079619%2011.6157015%2C16.8660704%2011.1953125%2C17.0669643%20C10.7749235%2C17.2678581%2010.3824423%2C17.5264121%2010.0178571%2C17.8426339%20C9.65327199%2C18.1588557%209.35565592%2C18.534596%209.125%2C18.9698661%20C8.89434408%2C19.4051361%208.71391434%2C19.9203839%208.58370536%2C20.515625%20C8.45349637%2C21.1108661%208.38839286%2C21.7842224%208.38839286%2C22.5357143%20C8.38839286%2C22.9449425%208.40699386%2C23.4025272%208.44419643%2C23.9084821%20C8.44419643%2C23.9531252%208.45349693%2C24.0405499%208.47209821%2C24.1707589%20C8.4906995%2C24.3009679%208.5%2C24.3995532%208.5%2C24.4665179%20C8.5%2C24.5781256%208.46837829%2C24.6711306%208.40513393%2C24.7455357%20C8.34188956%2C24.8199408%208.25446484%2C24.8571429%208.14285714%2C24.8571429%20C8.02380893%2C24.8571429%207.9196433%2C24.7938994%207.83035714%2C24.6674107%20C7.77827355%2C24.6004461%207.72991094%2C24.5186017%207.68526786%2C24.421875%20C7.64062478%2C24.3251483%207.59040206%2C24.2135423%207.53459821%2C24.0870536%20C7.47879436%2C23.9605648%207.43973225%2C23.87128%207.41741071%2C23.8191964%20C6.47246551%2C21.6986501%206%2C20.0208395%206%2C18.7857143%20C6%2C17.3050521%206.19717065%2C16.0662252%206.59151786%2C15.0691964%20C7.79688103%2C12.0706695%2011.0520568%2C10.5714286%2016.3571429%2C10.5714286%20L18.8571429%2C10.5714286%20L18.8571429%2C7.71428571%20C18.8571429%2C7.52083237%2018.9278267%2C7.35342333%2019.0691964%2C7.21205357%20C19.2105662%2C7.07068382%2019.3779752%2C7%2019.5714286%2C7%20C19.7648819%2C7%2019.932291%2C7.07068382%2020.0736607%2C7.21205357%20L25.7879464%2C12.9263393%20C25.9293162%2C13.067709%2026%2C13.2351181%2026%2C13.4285714%20L26%2C13.4285714%20Z%22%3E%3C%2Fpath%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E");
            background-position: center center;
            background-repeat: no-repeat;
            transition: transform .4s ease;
            border-radius: 50%;
            display: block
        }

        .at-expanding-share-button .at-icon-wrapper {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
            border-radius: 50%;
            display: inline-block;
            height: 40px;
            line-height: 40px;
            text-align: center;
            width: 40px
        }

        .at-expanding-share-button .at-icon {
            display: inline-block;
            height: 34px;
            margin: 3px 0;
            vertical-align: top;
            width: 34px
        }

        .at-expanding-share-button [data-name]:after {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
            transform: translate(0, -50%);
            transition: .4s;
            background-color: #fff;
            border-radius: 3px;
            color: #666;
            content: attr(data-name);
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 9pt;
            line-height: 9pt;
            font-weight: 500;
            opacity: 0;
            padding: 3px 5px;
            position: relative;
            top: 20px;
            white-space: nowrap
        }

        .at-expanding-share-button.at-expanding-share-button-show-icons .at-expanding-share-button-services-list {
            display: block
        }

        .at-expanding-share-button.at-expanding-share-button-animate-in .at-expanding-share-button-toggle-bg > span {
            transform: rotate(270deg);
            background-image: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cg%3E%3Cpath%20d%3D%22M18%2014V8h-4v6H8v4h6v6h4v-6h6v-4h-6z%22%20fill-rule%3D%22evenodd%22%20fill%3D%22white%22%3E%3C%2Fpath%3E%3C%2Fg%3E%3C%2Fsvg%3E");
            background-position: center center;
            background-repeat: no-repeat
        }

        .at-expanding-share-button.at-expanding-share-button-animate-in [data-name]:after {
            opacity: 1
        }

        .at-expanding-share-button.at-hide-label [data-name]:after {
            display: none
        }

        .at-expanding-share-button.at-expanding-share-button-desktop .at-expanding-share-button-toggle {
            height: 50px
        }

        .at-expanding-share-button.at-expanding-share-button-desktop .at-icon-wrapper:hover {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .5)
        }

        .at-expanding-share-button.at-expanding-share-button-desktop .at-expanding-share-button-toggle-bg {
            height: 50px;
            line-height: 50px;
            width: 50px
        }

        .at-expanding-share-button.at-expanding-share-button-desktop .at-expanding-share-button-toggle-bg > span {
            height: 50px;
            width: 50px
        }

        .at-expanding-share-button.at-expanding-share-button-desktop .at-expanding-share-button-toggle-bg:after {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .2);
            transition: opacity .2s ease;
            border-radius: 50%;
            content: '';
            height: 100%;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%
        }

        .at-expanding-share-button.at-expanding-share-button-desktop .at-expanding-share-button-toggle-bg:hover:after {
            opacity: 1
        }

        .at-expanding-share-button.at-expanding-share-button-desktop .at-expanding-share-button-toggle-btn[data-name]:after {
            top: 25px
        }

        .at-expanding-share-button.at-expanding-share-button-mobile .at-expanding-share-button-services-list {
            margin: 0
        }

        .at-expanding-share-button.at-expanding-share-button-mobile .at-expanding-share-button-toggle-btn,
        .at-expanding-share-button.at-expanding-share-button-mobile .at-share-btn {
            outline: 0
        }

        .at-expanding-share-button.at-expanding-share-button-mobile .at-expanding-share-button-toggle {
            height: 40px;
            -webkit-tap-highlight-color: transparent
        }

        .at-expanding-share-button.at-expanding-share-button-mobile .at-expanding-share-button-toggle-bg,
        .at-expanding-share-button.at-expanding-share-button-mobile .at-expanding-share-button-toggle-bg span {
            height: 40px;
            line-height: 40px;
            width: 40px
        }

        .at-expanding-share-button.at-expanding-share-button-mobile .at-expanding-share-button-click-flash {
            transform: scale(0);
            transition: transform ease, opacity ease-in;
            background-color: hsla(0, 0%, 100%, .3);
            border-radius: 50%;
            height: 40px;
            opacity: 1;
            position: absolute;
            width: 40px;
            z-index: 10000
        }

        .at-expanding-share-button.at-expanding-share-button-mobile .at-expanding-share-button-click-flash.at-expanding-share-button-click-flash-animate {
            transform: scale(1);
            opacity: 0
        }

        .at-expanding-share-button.at-expanding-share-button-mobile + .at-expanding-share-button-mobile-overlay {
            transition: opacity ease;
            bottom: 0;
            background-color: hsla(0, 0%, 87%, .7);
            display: block;
            height: auto;
            left: 0;
            opacity: 0;
            position: fixed;
            right: 0;
            top: 0;
            width: auto;
            z-index: 9998
        }

        .at-expanding-share-button.at-expanding-share-button-mobile + .at-expanding-share-button-mobile-overlay.at-expanding-share-button-hidden {
            height: 0;
            width: 0;
            z-index: -10000
        }

        .at-expanding-share-button.at-expanding-share-button-mobile.at-expanding-share-button-animate-in + .at-expanding-share-button-mobile-overlay {
            transition: opacity ease;
            opacity: 1
        }
    </style>
    <style type="text/css">
        .at-tjin-element .at300b,
        .at-tjin-element .at300m {
            display: inline-block;
            width: auto;
            padding: 0;
            margin: 0 2px 5px;
            outline-offset: -1px;
            transition: all .2s ease-in-out
        }

        .at-tjin-element .at300b:focus,
        .at-tjin-element .at300b:hover,
        .at-tjin-element .at300m:focus,
        .at-tjin-element .at300m:hover {
            transform: translateY(-4px)
        }

        .at-tjin-element .addthis_tjin_label {
            display: none
        }

        .at-tjin-element .addthis_vertical_style .at300b,
        .at-tjin-element .addthis_vertical_style .at300m {
            display: block
        }

        .at-tjin-element .addthis_vertical_style .at300b .addthis_tjin_label,
        .at-tjin-element .addthis_vertical_style .at300b .at-icon-wrapper,
        .at-tjin-element .addthis_vertical_style .at300m .addthis_tjin_label,
        .at-tjin-element .addthis_vertical_style .at300m .at-icon-wrapper {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px
        }

        .at-tjin-element .addthis_vertical_style .at300b:focus,
        .at-tjin-element .addthis_vertical_style .at300b:hover,
        .at-tjin-element .addthis_vertical_style .at300m:focus,
        .at-tjin-element .addthis_vertical_style .at300m:hover {
            transform: none
        }

        .at-tjin-element .at-tjin-btn {
            margin: 0 5px 5px 0;
            padding: 0;
            outline-offset: -1px;
            display: inline-block;
            box-sizing: content-box;
            transition: all .2s ease-in-out
        }

        .at-tjin-element .at-tjin-btn:focus,
        .at-tjin-element .at-tjin-btn:hover {
            transform: translateY(-4px)
        }

        .at-tjin-element .at-tjin-title {
            margin: 0 0 15px
        }
    </style>
    <style type="text/css">
        #addthissmartlayerscssready {
            color: #bada55 !important
        }

        .addthis-smartlayers,
        div#at4-follow,
        div#at4-share,
        div#at4-thankyou,
        div#at4-whatsnext {
            padding: 0;
            margin: 0
        }

        #at4-follow-label,
        #at4-share-label,
        #at4-whatsnext-label,
        .at4-recommended-label.hidden {
            padding: 0;
            border: none;
            background: none;
            position: absolute;
            top: 0;
            left: 0;
            height: 0;
            width: 0;
            overflow: hidden;
            text-indent: -9999em
        }

        .addthis-smartlayers .at4-arrow:hover {
            cursor: pointer
        }

        .addthis-smartlayers .at4-arrow:after,
        .addthis-smartlayers .at4-arrow:before {
            content: none
        }

        a.at4-logo {
            background: url(data:image/gif;base64,R0lGODlhBwAHAJEAAP9uQf///wAAAAAAACH5BAkKAAIALAAAAAAHAAcAAAILFH6Ge8EBH2MKiQIAOw==) no-repeat left center
        }

        .at4-minimal a.at4-logo {
            background: url(data:image/gif;base64,R0lGODlhBwAHAJEAAP9uQf///wAAAAAAACH5BAkKAAIALAAAAAAHAAcAAAILFH6Ge8EBH2MKiQIAOw==) no-repeat left center !important
        }

        button.at4-closebutton {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0;
            margin-right: 10px;
            cursor: pointer;
            background: transparent;
            border: 0;
            -webkit-appearance: none;
            font-size: 19px;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .2
        }

        button.at4-closebutton:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            opacity: .5
        }

        div.at4-arrow {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAAAoCAYAAABpYH0BAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAV1JREFUeNrsmesOgyAMhQfxwfrofTM3E10ME2i5Oeppwr9a5OMUCrh1XV+wcvNAAIAA+BiAzrmtUWln27dbjEcC3AdODfo0BdEPhmcO4nIDvDNELi2jggk4/k8dT7skfeKzWIEd4VUpMQKvNB7X+OZSmAZkATWC1xvipbpnLmOosbJZC08CkAeA4E6qFUEMwLAGnlSBPCE8lW8CYnZTcimH2HoT7kSFOx5HBmCnDhTIu1p5s98G+QZrxGPhZVMY1vgyAQaAAAiAAAgDQACcBOD+BvJtBWfRy7NpJK5tBe4FNzXokywV734wPHMQlxvgnSGyNoUP/2ACjv/7iSeYKO3YWKzAjvCqlBiBVxqPa3ynexNJwOsN8TJbzL6JNIYYXWpMv4lIIAZgWANPqkCeEJ7KNwExu8lpLlSpAVQarO77TyKdBsyRPuwV0h0gmoGnTWFYzVkYBoAA+I/2FmAAt6+b5XM9mFkAAAAASUVORK5CYII=);
            background-repeat: no-repeat;
            width: 20px;
            height: 20px;
            margin: 0;
            padding: 0;
            overflow: hidden;
            text-indent: -9999em;
            text-align: left;
            cursor: pointer
        }

        #at4-recommendedpanel-outer-container .at4-arrow.at-right,
        div.at4-arrow.at-right {
            background-position: -20px 0
        }

        #at4-recommendedpanel-outer-container .at4-arrow.at-left,
        div.at4-arrow.at-left {
            background-position: 0 0
        }

        div.at4-arrow.at-down {
            background-position: -60px 0
        }

        div.at4-arrow.at-up {
            background-position: -40px 0
        }

        .ats-dark div.at4-arrow.at-right {
            background-position: -20px -20px
        }

        .ats-dark div.at4-arrow.at-left {
            background-position: 0 -20px
        }

        .ats-dark div.at4-arrow.at-down {
            background-position: -60px -20px
        }

        .ats-dark div.at4-arrow.at-up {
            background-position: -40px -20
        }

        .at4-opacity-hidden {
            opacity: 0 !important
        }

        .at4-opacity-visible {
            opacity: 1 !important
        }

        .at4-visually-hidden {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
            padding: 0;
            border: 0;
            overflow: hidden
        }

        .at4-hidden-off-screen,
        .at4-hidden-off-screen * {
            position: absolute !important;
            top: -9999px !important;
            left: -9999px !important
        }

        .at4-show {
            display: block !important;
            opacity: 1 !important
        }

        .at4-show-content {
            opacity: 1 !important;
            visibility: visible
        }

        .at4-hide {
            display: none !important;
            opacity: 0 !important
        }

        .at4-hide-content {
            opacity: 0 !important;
            visibility: hidden
        }

        .at4-visible {
            display: block !important;
            opacity: 0 !important
        }

        .at-wordpress-hide {
            display: none !important;
            opacity: 0 !important
        }

        .addthis-animated {
            animation-fill-mode: both;
            animation-timing-function: ease-out;
            animation-duration: .3s
        }

        .slideInDown.addthis-animated,
        .slideInLeft.addthis-animated,
        .slideInRight.addthis-animated,
        .slideInUp.addthis-animated,
        .slideOutDown.addthis-animated,
        .slideOutLeft.addthis-animated,
        .slideOutRight.addthis-animated,
        .slideOutUp.addthis-animated {
            animation-duration: .4s
        }

        @keyframes fadeIn {
            0% {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .fadeIn {
            animation-name: fadeIn
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .fadeInUp {
            animation-name: fadeInUp
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .fadeInDown {
            animation-name: fadeInDown
        }

        @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(-20px)
            }

            to {
                opacity: 1;
                transform: translateX(0)
            }
        }

        .fadeInLeft {
            animation-name: fadeInLeft
        }

        @keyframes fadeInRight {
            0% {
                opacity: 0;
                transform: translateX(20px)
            }

            to {
                opacity: 1;
                transform: translateX(0)
            }
        }

        .fadeInRight {
            animation-name: fadeInRight
        }

        @keyframes fadeOut {
            0% {
                opacity: 1
            }

            to {
                opacity: 0
            }
        }

        .fadeOut {
            animation-name: fadeOut
        }

        @keyframes fadeOutUp {
            0% {
                opacity: 1;
                transform: translateY(0)
            }

            to {
                opacity: 0;
                transform: translateY(-20px)
            }
        }

        .fadeOutUp {
            animation-name: fadeOutUp
        }

        @keyframes fadeOutDown {
            0% {
                opacity: 1;
                transform: translateY(0)
            }

            to {
                opacity: 0;
                transform: translateY(20px)
            }
        }

        .fadeOutDown {
            animation-name: fadeOutDown
        }

        @keyframes fadeOutLeft {
            0% {
                opacity: 1;
                transform: translateX(0)
            }

            to {
                opacity: 0;
                transform: translateX(-20px)
            }
        }

        .fadeOutLeft {
            animation-name: fadeOutLeft
        }

        @keyframes fadeOutRight {
            0% {
                opacity: 1;
                transform: translateX(0)
            }

            to {
                opacity: 0;
                transform: translateX(20px)
            }
        }

        .fadeOutRight {
            animation-name: fadeOutRight
        }

        @keyframes slideInUp {
            0% {
                transform: translateY(1500px)
            }

            0%,
            to {
                opacity: 1
            }

            to {
                transform: translateY(0)
            }
        }

        .slideInUp {
            animation-name: slideInUp
        }

        .slideInUp.addthis-animated {
            animation-duration: .4s
        }

        @keyframes slideInDown {
            0% {
                transform: translateY(-850px)
            }

            0%,
            to {
                opacity: 1
            }

            to {
                transform: translateY(0)
            }
        }

        .slideInDown {
            animation-name: slideInDown
        }

        @keyframes slideOutUp {
            0% {
                transform: translateY(0)
            }

            0%,
            to {
                opacity: 1
            }

            to {
                transform: translateY(-250px)
            }
        }

        .slideOutUp {
            animation-name: slideOutUp
        }

        @keyframes slideOutUpFast {
            0% {
                transform: translateY(0)
            }

            0%,
            to {
                opacity: 1
            }

            to {
                transform: translateY(-1250px)
            }
        }

        #at4m-menu.slideOutUp {
            animation-name: slideOutUpFast
        }

        @keyframes slideOutDown {
            0% {
                transform: translateY(0)
            }

            0%,
            to {
                opacity: 1
            }

            to {
                transform: translateY(350px)
            }
        }

        .slideOutDown {
            animation-name: slideOutDown
        }

        @keyframes slideOutDownFast {
            0% {
                transform: translateY(0)
            }

            0%,
            to {
                opacity: 1
            }

            to {
                transform: translateY(1250px)
            }
        }

        #at4m-menu.slideOutDown {
            animation-name: slideOutDownFast
        }

        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-850px)
            }

            to {
                transform: translateX(0)
            }
        }

        .slideInLeft {
            animation-name: slideInLeft
        }

        @keyframes slideInRight {
            0% {
                opacity: 0;
                transform: translateX(1250px)
            }

            to {
                transform: translateX(0)
            }
        }

        .slideInRight {
            animation-name: slideInRight
        }

        @keyframes slideOutLeft {
            0% {
                transform: translateX(0)
            }

            to {
                opacity: 0;
                transform: translateX(-350px)
            }
        }

        .slideOutLeft {
            animation-name: slideOutLeft
        }

        @keyframes slideOutRight {
            0% {
                transform: translateX(0)
            }

            to {
                opacity: 0;
                transform: translateX(350px)
            }
        }

        .slideOutRight {
            animation-name: slideOutRight
        }

        .at4win {
            margin: 0 auto;
            background: #fff;
            border: 1px solid #ebeced;
            width: 25pc;
            box-shadow: 0 0 10px rgba(0, 0, 0, .3);
            border-radius: 8px;
            font-family: helvetica neue, helvetica, arial, sans-serif;
            text-align: left;
            z-index: 9999
        }

        .at4win .at4win-header {
            position: relative;
            border-bottom: 1px solid #f2f2f2;
            background: #fff;
            height: 49px;
            -webkit-border-top-left-radius: 8px;
            -webkit-border-top-right-radius: 8px;
            -moz-border-radius-topleft: 8px;
            -moz-border-radius-topright: 8px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            cursor: default
        }

        .at4win .at4win-header .at-h3,
        .at4win .at4win-header h3 {
            height: 49px;
            line-height: 49px;
            margin: 0 50px 0 0;
            padding: 1px 0 0;
            margin-left: 20px;
            font-family: helvetica neue, helvetica, arial, sans-serif;
            font-size: 1pc;
            font-weight: 700;
            text-shadow: 0 1px #fff;
            color: #333
        }

        .at4win .at4win-header .at-h3 img,
        .at4win .at4win-header h3 img {
            display: inline-block;
            margin-right: 4px
        }

        .at4win .at4win-header .at4-close {
            display: block;
            position: absolute;
            top: 0;
            right: 0;
            background: url("data:image/gif;base64,R0lGODlhFAAUAIABAAAAAP///yH5BAEAAAEALAAAAAAUABQAAAIzBIKpG+YMm5Enpodw1HlCfnkKOIqU1VXk55goVb2hi7Y0q95lfG70uurNaqLgTviyyUoFADs=") no-repeat center center;
            background-repeat: no-repeat;
            background-position: center center;
            border-left: 1px solid #d2d2d1;
            width: 49px;
            height: 49px;
            line-height: 49px;
            overflow: hidden;
            text-indent: -9999px;
            text-shadow: none;
            cursor: pointer;
            opacity: .5;
            border: 0;
            transition: opacity .15s ease-in
        }

        .at4win .at4win-header .at4-close::-moz-focus-inner {
            border: 0;
            padding: 0
        }

        .at4win .at4win-header .at4-close:hover {
            opacity: 1;
            background-color: #ebeced;
            border-top-right-radius: 7px
        }

        .at4win .at4win-content {
            position: relative;
            background: #fff;
            min-height: 220px
        }

        #at4win-footer {
            position: relative;
            background: #fff;
            border-top: 1px solid #d2d2d1;
            -webkit-border-bottom-right-radius: 8px;
            -webkit-border-bottom-left-radius: 8px;
            -moz-border-radius-bottomright: 8px;
            -moz-border-radius-bottomleft: 8px;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
            height: 11px;
            line-height: 11px;
            padding: 5px 20px;
            font-size: 11px;
            color: #666;
            -ms-box-sizing: content-box;
            -o-box-sizing: content-box;
            box-sizing: content-box
        }

        #at4win-footer a {
            margin-right: 10px;
            text-decoration: none;
            color: #666
        }

        #at4win-footer a:hover {
            text-decoration: none;
            color: #000
        }

        #at4win-footer a.at4-logo {
            top: 5px;
            padding-left: 10px
        }

        #at4win-footer a.at4-privacy {
            position: absolute;
            top: 5px;
            right: 10px;
            padding-right: 14px
        }

        .at4win.ats-dark {
            border-color: #555;
            box-shadow: none
        }

        .at4win.ats-dark .at4win-header {
            background: #1b1b1b;
            -webkit-border-top-left-radius: 6px;
            -webkit-border-top-right-radius: 6px;
            -moz-border-radius-topleft: 6px;
            -moz-border-radius-topright: 6px;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px
        }

        .at4win.ats-dark .at4win-header .at4-close {
            background: url("data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNui8sowAAAAWdEVYdENyZWF0aW9uIFRpbWUAMTEvMTMvMTKswDp5AAAAd0lEQVQ4jb2VQRLAIAgDE///Z3qqY1FAhalHMCsCIkVEAIAkkVgvp2lDBgYAnAyHkWotLccNrEd4A7X2TqIdqLfnWBAdaF5rJdyJfjtPH5GT37CaGhoVq3nOm/XflUuLUto2pY1d+vRKh0Pp+MrAVtDe2JkvYNQ+jVSEEFmOkggAAAAASUVORK5CYII=") no-repeat center center;
            background-image: url(https://s7.addthis.com/static/fb08f6d50887bd0caacc86a62bcdcf68.svg), none;
            border-color: #333
        }

        .at4win.ats-dark .at4win-header .at4-close:hover {
            background-color: #000
        }

        .at4win.ats-dark .at4win-header .at-h3,
        .at4win.ats-dark .at4win-header h3 {
            color: #fff;
            text-shadow: 0 1px #000
        }

        .at4win.ats-gray .at4win-header {
            background: #fff;
            border-color: #d2d2d1;
            -webkit-border-top-left-radius: 6px;
            -webkit-border-top-right-radius: 6px;
            -moz-border-radius-topleft: 6px;
            -moz-border-radius-topright: 6px;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px
        }

        .at4win.ats-gray .at4win-header a.at4-close {
            border-color: #d2d2d1
        }

        .at4win.ats-gray .at4win-header a.at4-close:hover {
            background-color: #ebeced
        }

        .at4win.ats-gray #at4win-footer {
            border-color: #ebeced
        }

        .at4win .clear {
            clear: both
        }

        .at4win ::selection {
            background: #fe6d4c;
            color: #fff
        }

        .at4win ::-moz-selection {
            background: #fe6d4c;
            color: #fff
        }

        .at4-icon-fw {
            display: inline-block;
            background-repeat: no-repeat;
            background-position: 0 0;
            margin: 0 5px 0 0;
            overflow: hidden;
            text-indent: -9999em;
            cursor: pointer;
            padding: 0;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%
        }

        .at44-follow-container a.aticon {
            height: 2pc;
            margin: 0 5px 5px 0
        }

        .at44-follow-container .at4-icon-fw {
            margin: 0
        }
    </style>
    <style id="at4-share-offset" type="text/css" media="screen">
        #at4-share,
        #at4-soc {
            top: 20% !important;
            bottom: auto
        }
    </style>
    <style type="text/css">
        button[data-v-515ba318],
        .button[data-v-515ba318] {
            position: relative;
            z-index: 2;
            padding: 0 1%;
            display: inline-block;
            min-width: 240px;
            height: 80px;
            font-size: 0;
            background-color: #fff;
            border: 2px solid #A8A8A8;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon[data-v-515ba318],
        .button .icon[data-v-515ba318] {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 40px;
            vertical-align: middle;
            overflow: hidden;
        }

        button .icon i[data-v-515ba318],
        button .icon b[data-v-515ba318],
        .button .icon i[data-v-515ba318],
        .button .icon b[data-v-515ba318] {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            display: inline-block;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon i[data-v-515ba318],
        .button .icon i[data-v-515ba318] {
            width: 100%;
            height: 100%;
        }

        button .icon b[data-v-515ba318],
        .button .icon b[data-v-515ba318] {
            width: 100%;
            height: 88%;
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            background-image: url(img/icon__btn-download_dl_black.svg);
        }

        button .text[data-v-515ba318],
        .button .text[data-v-515ba318] {
            margin-left: 10%;
            display: inline-block;
            min-width: 126px;
            vertical-align: middle;
            text-align: left;
            color: #2A2A2A;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .text p[data-v-515ba318],
        .button .text p[data-v-515ba318] {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font: 700 24px Montserrat;
        }

        button .text p.single[data-v-515ba318],
        .button .text p.single[data-v-515ba318] {
            display: none;
        }

        button .text p[data-v-515ba318]:first-child,
        .button .text p[data-v-515ba318]:first-child {
            font: 600 12px Montserrat;
        }

        button.ios .icon i[data-v-515ba318],
        .button.ios .icon i[data-v-515ba318] {
            background-image: url(img/icon__btn-download_logo_apple.svg);
        }

        button.android .icon i[data-v-515ba318],
        .button.android .icon i[data-v-515ba318] {
            background-image: url(img/icon__btn-download_logo_android.svg);
        }

        button[data-v-515ba318]:hover,
        button[data-v-515ba318]:active,
        .button[data-v-515ba318]:hover,
        .button[data-v-515ba318]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button:hover i[data-v-515ba318],
        button:active i[data-v-515ba318],
        .button:hover i[data-v-515ba318],
        .button:active i[data-v-515ba318] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button:hover b[data-v-515ba318],
        button:active b[data-v-515ba318],
        .button:hover b[data-v-515ba318],
        .button:active b[data-v-515ba318] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.footer[data-v-515ba318],
        .button.footer[data-v-515ba318] {
            min-width: 200px;
            height: 50px;
            background-color: transparent;
        }

        button.footer[data-v-515ba318]:hover,
        button.footer[data-v-515ba318]:active,
        .button.footer[data-v-515ba318]:hover,
        .button.footer[data-v-515ba318]:active {
            background-color: #DDD;
            border-color: #DDD;
        }

        button.footer .icon[data-v-515ba318],
        .button.footer .icon[data-v-515ba318] {
            width: 25px;
            height: 30px;
        }

        button.footer .icon b[data-v-515ba318],
        .button.footer .icon b[data-v-515ba318] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.footer .text[data-v-515ba318],
        .button.footer .text[data-v-515ba318] {
            min-width: 105px;
        }

        button.footer .text p[data-v-515ba318]:last-child,
        .button.footer .text p[data-v-515ba318]:last-child {
            font: 700 20px/20px Montserrat;
        }

        button.footer:hover i[data-v-515ba318],
        button.footer:active i[data-v-515ba318],
        .button.footer:hover i[data-v-515ba318],
        .button.footer:active i[data-v-515ba318] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.footer:hover b[data-v-515ba318],
        button.footer:active b[data-v-515ba318],
        .button.footer:hover b[data-v-515ba318],
        .button.footer:active b[data-v-515ba318] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.header[data-v-515ba318],
        .button.header[data-v-515ba318] {
            padding: 0 10px;
            min-width: 175px;
            height: 52px;
        }

        button.header .icon[data-v-515ba318],
        .button.header .icon[data-v-515ba318] {
            width: 25px;
            height: 30px;
        }

        button.header .icon b[data-v-515ba318],
        .button.header .icon b[data-v-515ba318] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.header .text[data-v-515ba318],
        .button.header .text[data-v-515ba318] {
            margin-left: 22px;
            min-width: 86px;
        }

        button.header .text p[data-v-515ba318],
        .button.header .text p[data-v-515ba318] {
            display: none;
        }

        button.header .text p.single[data-v-515ba318],
        .button.header .text p.single[data-v-515ba318] {
            display: inline-block;
            font: 600 16px Montserrat;
        }

        button.header[data-v-515ba318]:hover,
        button.header[data-v-515ba318]:active,
        .button.header[data-v-515ba318]:hover,
        .button.header[data-v-515ba318]:active {
            background-color: #FFA850;
            border-color: #FFA850;
        }

        button.header:hover i[data-v-515ba318],
        button.header:active i[data-v-515ba318],
        .button.header:hover i[data-v-515ba318],
        .button.header:active i[data-v-515ba318] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.header:hover b[data-v-515ba318],
        button.header:active b[data-v-515ba318],
        .button.header:hover b[data-v-515ba318],
        .button.header:active b[data-v-515ba318] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.transparent[data-v-515ba318],
        .button.transparent[data-v-515ba318] {
            background-color: transparent;
            border-color: #fff;
        }

        button.transparent .text[data-v-515ba318],
        .button.transparent .text[data-v-515ba318] {
            color: #fff;
        }

        button.transparent[data-v-515ba318]:hover,
        button.transparent[data-v-515ba318]:active,
        .button.transparent[data-v-515ba318]:hover,
        .button.transparent[data-v-515ba318]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button.transparent:hover .text[data-v-515ba318],
        button.transparent:active .text[data-v-515ba318],
        .button.transparent:hover .text[data-v-515ba318],
        .button.transparent:active .text[data-v-515ba318] {
            color: #2A2A2A;
        }

        button.transparent:hover i[data-v-515ba318],
        button.transparent:active i[data-v-515ba318],
        .button.transparent:hover i[data-v-515ba318],
        .button.transparent:active i[data-v-515ba318] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button.transparent:hover b[data-v-515ba318],
        button.transparent:active b[data-v-515ba318],
        .button.transparent:hover b[data-v-515ba318],
        .button.transparent:active b[data-v-515ba318] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            button[data-v-515ba318] {
                padding: 0 20px;
                min-width: 211px;
                height: 56px;
                border-width: 1px;
                border-radius: 4px;
            }

            button .icon[data-v-515ba318] {
                width: 24px;
                height: 28px;
            }

            button .icon b[data-v-515ba318] {
                width: 20px;
                height: 28px;
            }

            button .text[data-v-515ba318] {
                margin-left: 24px;
                min-width: 120px;
            }

            button .text p[data-v-515ba318] {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            button .text p[data-v-515ba318]:first-child {
                font: 600 10px Montserrat;
            }

            button .text p[data-v-515ba318]:last-child {
                font: 700 22px/22px Montserrat;
            }
        }
    </style>
    <style type="text/css">
        .button-download-drop-menu[data-v-515ba318] {
            position: relative;
            font-size: 0;
        }

        .button-download-drop-menu *[data-v-515ba318] {
            vertical-align: middle;
        }

        .button-download-drop-menu .arrow[data-v-515ba318] {
            position: relative;
            display: inline-block;
            min-width: 60px;
            height: 80px;
            background-color: #FF9C39;
            border-left: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .button-download-drop-menu .arrow[data-v-515ba318]:hover {
            background-color: #FFA850;
        }

        .button-download-drop-menu .arrow i[data-v-515ba318] {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 20px;
            height: 14px;
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .button-download-drop-menu .arrow i[data-v-515ba318]:before {
            content: "";
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 10px 14px 10px;
            border-color: transparent transparent #fff transparent;
        }

        .button-download-drop-menu .arrow.on i[data-v-515ba318] {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }

        .button-download-drop-menu button[data-v-515ba318],
        .button-download-drop-menu .button[data-v-515ba318] {
            padding: 10px 24px;
            border: none;
            text-align: left;
        }

        .button-download-drop-menu .relative-dom button[data-v-515ba318] {
            background-color: #FF9C39;
            border-radius: 5px 0 0 5px;
        }

        .button-download-drop-menu .relative-dom button .icon i[data-v-515ba318] {
            background-image: url(img/icon__btn-download_logo_windows.svg);
        }

        .button-download-drop-menu .relative-dom button .icon b[data-v-515ba318] {
            background-image: url(img/icon__btn-download_dl_white.svg);
        }

        .button-download-drop-menu .relative-dom button .text[data-v-515ba318] {
            color: #FFFFFF;
        }

        .button-download-drop-menu .relative-dom button[data-v-515ba318]:hover {
            background-color: #FFA850;
        }

        .button-download-drop-menu .absolute-dom[data-v-515ba318] {
            position: absolute;
            top: 80px;
            left: 0;
            z-index: 1;
            padding: 10px 0;
            width: 100%;
            background-color: #FFFFFF;
            border-radius: 5px;
            overflow: hidden;
            opacity: 0;
            -webkit-transform: scaleY(0);
            transform: scaleY(0);
            -webkit-transform-origin: top center;
            transform-origin: top center;
            -webkit-transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .button-download-drop-menu .absolute-dom .button[data-v-515ba318] {
            width: 100%;
            height: 64px;
            border-radius: 0;
        }

        .button-download-drop-menu .absolute-dom .button.android i[data-v-515ba318] {
            background-image: url(img/icon__btn-download_logo_android.svg);
        }

        .button-download-drop-menu .absolute-dom .button.ios i[data-v-515ba318] {
            background-image: url(img/icon__btn-download_logo_apple.svg);
        }

        .button-download-drop-menu .absolute-dom.on[data-v-515ba318] {
            opacity: 1;
            -webkit-transform: scaleY(1);
            transform: scaleY(1);
        }
    </style>
    <style type="text/css">
        button[data-v-34b1ad1f] {
            position: relative;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: transparent;
            border-radius: 60px;
            cursor: pointer;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        button span[data-v-34b1ad1f] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0 6%;
            width: 100%;
            height: 100%;
            border: 3px solid #2A2A2A;
            border-radius: 60px;
            font-size: 24px;
            font-weight: 600;
            font-style: normal;
            color: #2A2A2A;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button[data-v-34b1ad1f]:hover,
        button[data-v-34b1ad1f]:active {
            background-color: #FF9C39;
        }

        button:hover span[data-v-34b1ad1f],
        button:active span[data-v-34b1ad1f] {
            border-color: #FF9C39;
            color: #fff;
        }

        button:hover.white span[data-v-34b1ad1f],
        button:active.white span[data-v-34b1ad1f] {
            border-color: #FF9C39;
        }

        button.white span[data-v-34b1ad1f] {
            border-color: #FFFFFF;
            color: #ffffff;
        }

        button.square[data-v-34b1ad1f] {
            border-radius: 5px;
        }

        button.square span[data-v-34b1ad1f] {
            border-radius: 5px;
        }

        button.size-16 span[data-v-34b1ad1f] {
            font-size: 16px;
        }

        button.size-20 span[data-v-34b1ad1f] {
            font-size: 20px;
        }

        @media (max-width: 768px) {
            button[data-v-34b1ad1f] {
                -webkit-transition: all 0.1s;
                transition: all 0.1s;
            }

            button span[data-v-34b1ad1f] {
                border-width: 1.5px;
                font-size: 16px;
                -webkit-transition: all 0.1s;
                transition: all 0.1s;
            }

            button[data-v-34b1ad1f]:hover {
                background-color: transparent;
            }

            button:hover span[data-v-34b1ad1f] {
                border-color: #2A2A2A;
                color: #fff;
            }

            button:hover.white span[data-v-34b1ad1f] {
                border-color: #FFFFFF;
                color: #ffffff;
            }

            button[data-v-34b1ad1f]:active {
                background-color: #FF9C39;
            }

            button:active span[data-v-34b1ad1f] {
                border-color: #FF9C39;
                color: #fff;
            }

            button:active.white span[data-v-34b1ad1f] {
                border-color: #FF9C39;
            }

            button.size-16 span[data-v-34b1ad1f] {
                font-size: 14px;
            }

            button.size-20 span[data-v-34b1ad1f] {
                font-size: 16px;
            }
        }
    </style>
    <style type="text/css">
        button[data-v-5320dc88],
        .button[data-v-5320dc88] {
            position: relative;
            z-index: 2;
            padding: 0 1%;
            display: inline-block;
            min-width: 240px;
            height: 80px;
            font-size: 0;
            background-color: #fff;
            border: 2px solid #A8A8A8;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon[data-v-5320dc88],
        .button .icon[data-v-5320dc88] {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 40px;
            vertical-align: middle;
            overflow: hidden;
        }

        button .icon i[data-v-5320dc88],
        button .icon b[data-v-5320dc88],
        .button .icon i[data-v-5320dc88],
        .button .icon b[data-v-5320dc88] {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            display: inline-block;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .icon i[data-v-5320dc88],
        .button .icon i[data-v-5320dc88] {
            width: 100%;
            height: 100%;
        }

        button .icon b[data-v-5320dc88],
        .button .icon b[data-v-5320dc88] {
            width: 100%;
            height: 88%;
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            background-image: url(img/icon__btn-download_dl_black.svg);
        }

        button .text[data-v-5320dc88],
        .button .text[data-v-5320dc88] {
            margin-left: 10%;
            display: inline-block;
            min-width: 126px;
            vertical-align: middle;
            text-align: left;
            color: #2A2A2A;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        button .text p[data-v-5320dc88],
        .button .text p[data-v-5320dc88] {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font: 700 24px Montserrat;
        }

        button .text p.single[data-v-5320dc88],
        .button .text p.single[data-v-5320dc88] {
            display: none;
        }

        button .text p[data-v-5320dc88]:first-child,
        .button .text p[data-v-5320dc88]:first-child {
            font: 600 12px Montserrat;
        }

        button.ios .icon i[data-v-5320dc88],
        .button.ios .icon i[data-v-5320dc88] {
            background-image: url(img/icon__btn-download_logo_apple.svg);
        }

        button.android .icon i[data-v-5320dc88],
        .button.android .icon i[data-v-5320dc88] {
            background-image: url(img/icon__btn-download_logo_android.svg);
        }

        button[data-v-5320dc88]:hover,
        button[data-v-5320dc88]:active,
        .button[data-v-5320dc88]:hover,
        .button[data-v-5320dc88]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button:hover i[data-v-5320dc88],
        button:active i[data-v-5320dc88],
        .button:hover i[data-v-5320dc88],
        .button:active i[data-v-5320dc88] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button:hover b[data-v-5320dc88],
        button:active b[data-v-5320dc88],
        .button:hover b[data-v-5320dc88],
        .button:active b[data-v-5320dc88] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.footer[data-v-5320dc88],
        .button.footer[data-v-5320dc88] {
            min-width: 200px;
            height: 50px;
            background-color: transparent;
        }

        button.footer[data-v-5320dc88]:hover,
        button.footer[data-v-5320dc88]:active,
        .button.footer[data-v-5320dc88]:hover,
        .button.footer[data-v-5320dc88]:active {
            background-color: #DDD;
            border-color: #DDD;
        }

        button.footer .icon[data-v-5320dc88],
        .button.footer .icon[data-v-5320dc88] {
            width: 25px;
            height: 30px;
        }

        button.footer .icon b[data-v-5320dc88],
        .button.footer .icon b[data-v-5320dc88] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.footer .text[data-v-5320dc88],
        .button.footer .text[data-v-5320dc88] {
            min-width: 105px;
        }

        button.footer .text p[data-v-5320dc88]:last-child,
        .button.footer .text p[data-v-5320dc88]:last-child {
            font: 700 20px/20px Montserrat;
        }

        button.footer:hover i[data-v-5320dc88],
        button.footer:active i[data-v-5320dc88],
        .button.footer:hover i[data-v-5320dc88],
        .button.footer:active i[data-v-5320dc88] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.footer:hover b[data-v-5320dc88],
        button.footer:active b[data-v-5320dc88],
        .button.footer:hover b[data-v-5320dc88],
        .button.footer:active b[data-v-5320dc88] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.header[data-v-5320dc88],
        .button.header[data-v-5320dc88] {
            padding: 0 10px;
            min-width: 175px;
            height: 52px;
        }

        button.header .icon[data-v-5320dc88],
        .button.header .icon[data-v-5320dc88] {
            width: 25px;
            height: 30px;
        }

        button.header .icon b[data-v-5320dc88],
        .button.header .icon b[data-v-5320dc88] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        button.header .text[data-v-5320dc88],
        .button.header .text[data-v-5320dc88] {
            margin-left: 22px;
            min-width: 86px;
        }

        button.header .text p[data-v-5320dc88],
        .button.header .text p[data-v-5320dc88] {
            display: none;
        }

        button.header .text p.single[data-v-5320dc88],
        .button.header .text p.single[data-v-5320dc88] {
            display: inline-block;
            font: 600 16px Montserrat;
        }

        button.header[data-v-5320dc88]:hover,
        button.header[data-v-5320dc88]:active,
        .button.header[data-v-5320dc88]:hover,
        .button.header[data-v-5320dc88]:active {
            background-color: #FFA850;
            border-color: #FFA850;
        }

        button.header:hover i[data-v-5320dc88],
        button.header:active i[data-v-5320dc88],
        .button.header:hover i[data-v-5320dc88],
        .button.header:active i[data-v-5320dc88] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }

        button.header:hover b[data-v-5320dc88],
        button.header:active b[data-v-5320dc88],
        .button.header:hover b[data-v-5320dc88],
        .button.header:active b[data-v-5320dc88] {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        button.transparent[data-v-5320dc88],
        .button.transparent[data-v-5320dc88] {
            background-color: transparent;
            border-color: #fff;
        }

        button.transparent .text[data-v-5320dc88],
        .button.transparent .text[data-v-5320dc88] {
            color: #fff;
        }

        button.transparent[data-v-5320dc88]:hover,
        button.transparent[data-v-5320dc88]:active,
        .button.transparent[data-v-5320dc88]:hover,
        .button.transparent[data-v-5320dc88]:active {
            background-color: #DBDBDB;
            border-color: #DBDBDB;
        }

        button.transparent:hover .text[data-v-5320dc88],
        button.transparent:active .text[data-v-5320dc88],
        .button.transparent:hover .text[data-v-5320dc88],
        .button.transparent:active .text[data-v-5320dc88] {
            color: #2A2A2A;
        }

        button.transparent:hover i[data-v-5320dc88],
        button.transparent:active i[data-v-5320dc88],
        .button.transparent:hover i[data-v-5320dc88],
        .button.transparent:active i[data-v-5320dc88] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        button.transparent:hover b[data-v-5320dc88],
        button.transparent:active b[data-v-5320dc88],
        .button.transparent:hover b[data-v-5320dc88],
        .button.transparent:active b[data-v-5320dc88] {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            button[data-v-5320dc88] {
                padding: 0 20px;
                min-width: 211px;
                height: 56px;
                border-width: 1px;
                border-radius: 4px;
            }

            button .icon[data-v-5320dc88] {
                width: 24px;
                height: 28px;
            }

            button .icon b[data-v-5320dc88] {
                width: 20px;
                height: 28px;
            }

            button .text[data-v-5320dc88] {
                margin-left: 24px;
                min-width: 120px;
            }

            button .text p[data-v-5320dc88] {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            button .text p[data-v-5320dc88]:first-child {
                font: 600 10px Montserrat;
            }

            button .text p[data-v-5320dc88]:last-child {
                font: 700 22px/22px Montserrat;
            }
        }
    </style>
    <style type="text/css">
        .button-download-two-apps[data-v-5320dc88] {
            position: relative;
            font-size: 0;
            border-radius: 5px;
            overflow: hidden;
        }

        .button-download-two-apps *[data-v-5320dc88] {
            vertical-align: middle;
        }

        .button-download-two-apps[data-v-5320dc88]:after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 2;
            margin: auto;
            display: block;
            width: 1px;
            height: 24px;
            background-color: rgba(0, 0, 0, 0.25);
        }

        .button-download-two-apps .inline-wrapper[data-v-5320dc88] {
            display: inline-block;
            width: 50%;
        }

        .button-download-two-apps .inline-wrapper .unit[data-v-5320dc88] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            min-width: auto;
            background-color: #FF9C39;
            border: none;
            border-radius: 0;
        }

        .button-download-two-apps .inline-wrapper .unit[data-v-5320dc88]:hover {
            background-color: #FFA850;
            border-color: #FF9C39;
        }

        .button-download-two-apps .inline-wrapper .unit .text[data-v-5320dc88] {
            display: none;
        }

        .button-download-two-apps .inline-wrapper .unit .icon b[data-v-5320dc88] {
            background-image: url(img/icon__btn-download_dl_white.svg);
        }

        .button-download-two-apps .inline-wrapper .unit.ios .icon i[data-v-5320dc88] {
            background-image: url(img/icon__btn-download_logo_apple_white.svg);
        }

        .button-download-two-apps .inline-wrapper .unit.android .icon i[data-v-5320dc88] {
            background-image: url(img/icon__btn-download_logo_android_white.svg);
        }
    </style>
    <style type="text/css">
        .blog-0-title[data-v-3f05ff73] {
            height: 420px;
            background: linear-gradient(258deg, #111EC5 0%, #AD34D8 57%, #FF9161 100%);
            font-size: 0;
        }

        .blog-0-title .unit[data-v-3f05ff73] {
            display: inline-block;
            vertical-align: top;
            color: #FFFFFF;
        }

        .blog-0-title .unit.left[data-v-3f05ff73] {
            padding-top: 100px;
            width: 910px;
        }

        .blog-0-title .unit.right[data-v-3f05ff73] {
            padding-top: 80px;
            width: 300px;
            text-align: center;
        }

        .blog-0-title .unit h1[data-v-3f05ff73] {
            font: 700 40px/47px Montserrat;
        }

        .blog-0-title .unit h2[data-v-3f05ff73] {
            margin-top: 18px;
            font: 400 16px/19px Montserrat;
        }

        .blog-0-title .unit .btn-container[data-v-3f05ff73] {
            width: 300px;
            height: 80px;
        }

        .blog-0-title .unit .btn-container.second[data-v-3f05ff73] {
            margin-top: 16px;
        }

        .blog-0-title .unit .btn-container .btn-c[data-v-3f05ff73]:first-child {
            margin-top: 0;
        }

        .blog-0-title .unit p[data-v-3f05ff73] {
            margin-top: 22px;
            font: 400 16px Montserrat;
        }

        @media (max-width: 768px) {
            .blog-0-title[data-v-3f05ff73] {
                padding-bottom: 70px;
                height: auto;
                font-size: 0;
            }

            .blog-0-title .wrapper[data-v-3f05ff73] {
                padding: 0 4vw;
                width: 100%;
            }

            .blog-0-title .unit[data-v-3f05ff73] {
                text-align: center;
            }

            .blog-0-title .unit.left[data-v-3f05ff73] {
                padding-top: 50px;
                width: 100%;
            }

            .blog-0-title .unit.right[data-v-3f05ff73] {
                padding-top: 33px;
                width: 100%;
            }

            .blog-0-title .unit h1[data-v-3f05ff73] {
                font: 700 27px/28px Montserrat;
            }

            .blog-0-title .unit h2[data-v-3f05ff73] {
                margin-top: 16px;
                font: 400 14px/17px Montserrat;
            }

            .blog-0-title .unit .btn-container[data-v-3f05ff73] {
                display: inline-block;
                width: 61.33vw;
                height: 56px;
            }

            .blog-0-title .unit p[data-v-3f05ff73] {
                margin-top: 22px;
                font: 400 16px Montserrat;
            }
        }
    </style>
    <style type="text/css">
        .blog-1-content[data-v-e60eea56] {
            padding-bottom: 80px;
            font-size: 0;
        }

        .blog-1-content .hot-list[data-v-e60eea56] {
            margin-top: 62px;
        }

        .blog-1-content .hot-list h2[data-v-e60eea56] {
            font: 600 20px/47px Montserrat;
            color: #2A2A2A;
        }

        .blog-1-content .hot-list .links a[data-v-e60eea56] {
            margin-top: 20px;
            padding-bottom: 14px;
            display: block;
            border-bottom: 1px solid #E8E8E8;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .blog-1-content .hot-list .links a span[data-v-e60eea56] {
            font: 500 16px/20px Montserrat;
            color: #7E7E7E;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .blog-1-content .hot-list .links a:hover span[data-v-e60eea56] {
            color: #005fff;
        }

        .blog-1-content .left[data-v-e60eea56] {
            margin-top: -40px;
            display: inline-block;
            vertical-align: top;
            width: 342px;
        }

        .blog-1-content .left .search-category[data-v-e60eea56] {
            background: #FFFFFF;
            -webkit-box-shadow: 0 5px 10px #00136112;
            box-shadow: 0 5px 10px #00136112;
            border-radius: 6px;
        }

        .blog-1-content .left .search-category .search[data-v-e60eea56] {
            padding: 40px 30px;
        }

        .blog-1-content .left .search-category .search label.search-container[data-v-e60eea56] {
            display: inline-block;
            width: 280px;
            height: 56px;
        }

        .blog-1-content .left .search-category .category[data-v-e60eea56] {
            padding-bottom: 40px;
        }

        .blog-1-content .left .search-category .category a[data-v-e60eea56] {
            position: relative;
            padding: 0 30px;
            display: inline-block;
            width: 100%;
            height: 60px;
            background-color: transparent;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .blog-1-content .left .search-category .category a span[data-v-e60eea56] {
            display: inline-block;
            width: 100%;
            height: 100%;
            font: 700 16px/60px Montserrat;
            color: #2A2A2A;
            border-bottom: 1px solid #E8E8E8;
        }

        .blog-1-content .left .search-category .category a[data-v-e60eea56]:after {
            position: absolute;
            top: 26px;
            right: 20px;
            display: inline-block;
            width: 34px;
            height: 8px;
            background-image: url(img/icon_navgation_right.svg);
            content: "";
            opacity: 0;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .blog-1-content .left .search-category .category a[data-v-e60eea56]:hover {
            background-color: #7C56FF;
        }

        .blog-1-content .left .search-category .category a:hover span[data-v-e60eea56] {
            color: #FFFFFF;
            border-color: transparent;
        }

        .blog-1-content .left .search-category .category a[data-v-e60eea56]:hover:after {
            opacity: 1;
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        .blog-1-content .left .search-category .category .skeleton-list .skeleton a[data-v-e60eea56] {
            display: block;
            width: 100%;
        }

        .blog-1-content .left .search-category .category .skeleton-list .skeleton a[data-v-e60eea56]:hover:after {
            display: none;
        }

        .blog-1-content .left .search-category .category .skeleton-list .skeleton a span[data-v-e60eea56] {
            margin-top: 22px;
            display: inline-block;
            width: 100%;
            height: 16px;
        }

        .blog-1-content .left .search-category .category .skeleton-list .skeleton span[data-v-e60eea56] {
            background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
            background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
            background-size: 200% 100%;
            -webkit-animation: shimmer-data-v-e60eea56 4s infinite linear;
            animation: shimmer-data-v-e60eea56 4s infinite linear;
        }

        @-webkit-keyframes shimmer-data-v-e60eea56 {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        @keyframes shimmer-data-v-e60eea56 {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        .blog-1-content .right[data-v-e60eea56] {
            margin-left: 60px;
            display: inline-block;
            vertical-align: top;
            width: 808px;
        }

        .blog-1-content .right .breadcrumb[data-v-e60eea56] {
            line-height: 80px;
            border-bottom: 1px solid #E8E8E8;
        }

        .blog-1-content .right .breadcrumb a[data-v-e60eea56],
        .blog-1-content .right .breadcrumb span[data-v-e60eea56] {
            margin: 0 2px;
            display: inline-block;
            font: 500 16px/82px Montserrat;
            color: #7E7E7E;
        }

        .blog-1-content .right .breadcrumb a b[data-v-e60eea56],
        .blog-1-content .right .breadcrumb span b[data-v-e60eea56] {
            color: #000000;
            font-weight: 600;
        }

        .blog-1-content .right .article-list[data-v-e60eea56] {
            margin-top: 40px;
        }

        .blog-1-content .right .article-list .unit[data-v-e60eea56] {
            margin-top: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #E8E8E8;
            cursor: pointer;
            font-size: 0;
        }

        .blog-1-content .right .article-list .unit *[data-v-e60eea56] {
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .blog-1-content .right .article-list .unit h3[data-v-e60eea56] {
            font: 600 20px/24px Montserrat;
            color: #2A2A2A;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .blog-1-content .right .article-list .unit p[data-v-e60eea56] {
            margin-top: 12px;
            font: 400 16px/19px Montserrat;
            color: #2A2A2A;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .blog-1-content .right .article-list .unit:hover *[data-v-e60eea56] {
            color: #005fff;
        }

        .blog-1-content .right .article-list .skeleton-list .skeleton[data-v-e60eea56] {
            margin-top: 20px;
            padding-bottom: 34px;
            border-bottom: 1px solid #E8E8E8;
        }

        .blog-1-content .right .article-list .skeleton-list .skeleton .h3[data-v-e60eea56] {
            margin-top: 12px;
            width: 78%;
            height: 20px;
        }

        .blog-1-content .right .article-list .skeleton-list .skeleton .p[data-v-e60eea56] {
            margin-top: 32px;
            width: 96.5%;
            height: 20px;
        }

        .blog-1-content .right .article-list .skeleton-list .skeleton .p[data-v-e60eea56]:last-child {
            margin-top: 6px;
            width: 88.8%;
        }

        .blog-1-content .right .article-list .skeleton-list .skeleton *[data-v-e60eea56] {
            background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
            background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
            background-size: 200% 100%;
            -webkit-animation: shimmer-data-v-e60eea56 4s infinite linear;
            animation: shimmer-data-v-e60eea56 4s infinite linear;
        }

        @keyframes shimmer-data-v-e60eea56 {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        @media (max-width: 768px) {
            .blog-1-content[data-v-e60eea56] {
                padding-bottom: 60px;
                font-size: 0;
            }

            .blog-1-content .wrapper[data-v-e60eea56] {
                padding: 4vw;
                width: 100%;
            }

            .blog-1-content .hot-list[data-v-e60eea56] {
                margin-top: 56px;
            }

            .blog-1-content .hot-list h2[data-v-e60eea56] {
                margin-bottom: 36px;
                font: 600 16px/24px Montserrat;
            }

            .blog-1-content .hot-list .links a[data-v-e60eea56] {
                margin-top: 16px;
                padding-bottom: 16px;
                font: 500 16px/20px Montserrat;
                color: #005fff;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }

            .blog-1-content .left[data-v-e60eea56] {
                margin-top: -40px;
                width: 100%;
            }

            .blog-1-content .left .search-category .search[data-v-e60eea56] {
                padding: 4vw;
            }

            .blog-1-content .left .search-category .search label.search-container[data-v-e60eea56] {
                display: inline-block;
                width: 100%;
                height: 44px;
            }

            .blog-1-content .left .search-category .category[data-v-e60eea56] {
                position: relative;
                padding-bottom: 0;
                height: 71px;
                border-radius: 0 0 12px 12px;
                overflow: hidden;
                -webkit-transition: all 0.3s;
                transition: all 0.3s;
            }

            .blog-1-content .left .search-category .category[data-v-e60eea56]:before {
                position: absolute;
                top: 30px;
                right: 28px;
                z-index: 2;
                content: "";
                display: block;
                width: 14.5px;
                height: 7.5px;
                background: url(img/blog__icon_triangle.svg) no-repeat center;
                background-size: contain;
                -webkit-transition: all 0.3s;
                transition: all 0.3s;
            }

            .blog-1-content .left .search-category .category.on[data-v-e60eea56] {
                padding-top: 71px;
            }

            .blog-1-content .left .search-category .category.on[data-v-e60eea56]:before {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
            }

            .blog-1-content .left .search-category .category a[data-v-e60eea56] {
                padding: 0;
                height: 71px;
                background-color: #fff;
            }

            .blog-1-content .left .search-category .category a span[data-v-e60eea56] {
                padding: 0 4vw;
                font: 700 16px/70px Montserrat;
                color: #2A2A2A;
                border-top: 1px solid #E8E8E8;
                border-bottom: none;
            }

            .blog-1-content .left .search-category .category a[data-v-e60eea56]:after {
                display: none;
            }

            .blog-1-content .left .search-category .category a[data-v-e60eea56]:hover {
                background-color: #fff;
            }

            .blog-1-content .left .search-category .category a:hover span[data-v-e60eea56] {
                color: #2A2A2A;
                border-color: #E8E8E8;
            }

            .blog-1-content .left .search-category .category a.active[data-v-e60eea56] {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
            }

            .blog-1-content .left .search-category .category .skeleton-list .skeleton a[data-v-e60eea56] {
                padding: 0 20vw 0 4vw;
            }

            .blog-1-content .left .search-category .category .skeleton-list .skeleton a[data-v-e60eea56]:hover:after {
                display: none;
            }

            .blog-1-content .left .search-category .category .skeleton-list .skeleton a span[data-v-e60eea56] {
                margin-top: 26px;
                height: 16px;
            }

            .blog-1-content .left .search-category .category .skeleton-list .skeleton span[data-v-e60eea56] {
                background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
                background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
                background-size: 200% 100%;
                -webkit-animation: shimmer-data-v-e60eea56 4s infinite linear;
                animation: shimmer-data-v-e60eea56 4s infinite linear;
            }

            @-webkit-keyframes shimmer-data-v-e60eea56 {
                0% {
                    background-position: 200% 100%;
                }

                100% {
                    background-position: -200% 100%;
                }
            }

            @keyframes shimmer-data-v-e60eea56 {
                0% {
                    background-position: 200% 100%;
                }

                100% {
                    background-position: -200% 100%;
                }
            }

            .blog-1-content .right[data-v-e60eea56] {
                margin-left: 0;
                vertical-align: top;
                width: 100%;
            }

            .blog-1-content .right .breadcrumb[data-v-e60eea56] {
                display: none;
            }

            .blog-1-content .right .article-list[data-v-e60eea56] {
                margin-top: 40px;
            }

            .blog-1-content .right .article-list .unit *[data-v-e60eea56] {
                -webkit-transition: all 0.1s;
                transition: all 0.1s;
            }

            .blog-1-content .right .article-list .unit h3[data-v-e60eea56] {
                font: 600 16px/20px Montserrat;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }

            .blog-1-content .right .article-list .unit p[data-v-e60eea56] {
                margin-top: 11px;
                font: 400 16px/20px Montserrat;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }

            .blog-1-content .right .article-list .unit:hover *[data-v-e60eea56] {
                color: #005fff;
            }

            .blog-1-content .right .article-list .skeleton-list .skeleton[data-v-e60eea56] {
                margin-top: 20px;
                padding-bottom: 34px;
            }

            .blog-1-content .right .article-list .skeleton-list .skeleton .h3[data-v-e60eea56] {
                margin-top: 12px;
                width: 78%;
                height: 20px;
            }

            .blog-1-content .right .article-list .skeleton-list .skeleton .p[data-v-e60eea56] {
                margin-top: 16px;
                width: 96.5%;
                height: 20px;
            }

            .blog-1-content .right .article-list .skeleton-list .skeleton .p[data-v-e60eea56]:last-child {
                margin-top: 6px;
                width: 88.8%;
            }

            .blog-1-content .right .article-list .skeleton-list .skeleton *[data-v-e60eea56] {
                background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
                background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
                background-size: 200% 100%;
                -webkit-animation: shimmer-data-v-e60eea56 4s infinite linear;
                animation: shimmer-data-v-e60eea56 4s infinite linear;
            }

            @keyframes shimmer-data-v-e60eea56 {
                0% {
                    background-position: 200% 100%;
                }

                100% {
                    background-position: -200% 100%;
                }
            }
        }
    </style>
    <style type="text/css">
        .blog-detail[data-v-23970af3] {
            padding-bottom: 100px;
        }

        .blog-detail .wrapper[data-v-23970af3] {
            padding-top: 32px;
        }

        .blog-detail .left[data-v-23970af3] {
            display: inline-block;
            vertical-align: top;
            width: 800px;
        }

        .blog-detail .left .breadcrumb[data-v-23970af3] {
            padding: 18px 0;
            border-bottom: 1px solid #E8E8E8;
            line-height: 24px;
        }

        .blog-detail .left .breadcrumb a[data-v-23970af3],
        .blog-detail .left .breadcrumb span[data-v-23970af3] {
            margin: 0 2px;
            display: inline-block;
            font: 500 16px Montserrat;
            color: #7E7E7E;
        }

        .blog-detail .left .breadcrumb a b[data-v-23970af3],
        .blog-detail .left .breadcrumb span b[data-v-23970af3] {
            color: #000000;
            font-weight: 600;
        }

        .blog-detail .left .meta-info[data-v-23970af3] {
            padding-top: 28px;
        }

        .blog-detail .left .meta-info h1[data-v-23970af3] {
            font: 600 40px/50px Montserrat;
            color: #2128BD;
        }

        .blog-detail .left .meta-info p.intro[data-v-23970af3] {
            margin-top: 40px;
            font: 400 16px/20px Montserrat;
            color: #2A2A2A;
        }

        .blog-detail .left .meta-info hr[data-v-23970af3] {
            margin-top: 30px;
            border-top: 1px solid #E8E8E8;
        }

        .blog-detail .left .meta-info p.info[data-v-23970af3] {
            margin-top: 20px;
            font: Regular 16px/20px Montserrat;
            letter-spacing: 0;
            color: #A8A8A8;
        }

        .blog-detail .left .related-list[data-v-23970af3] {
            margin-top: 60px;
        }

        .blog-detail .left .related-list h2[data-v-23970af3] {
            font: 600 20px/46px Montserrat;
            color: #2A2A2A;
        }

        .blog-detail .left .related-list a[data-v-23970af3] {
            display: inline-block;
            width: 100%;
            border-bottom: 1px solid #E8E8E8;
            font: 500 16px/64px Montserrat;
            color: #005fff;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .blog-detail .left .related-list a[data-v-23970af3]:hover {
            color: #2128BD;
        }

        .blog-detail .right[data-v-23970af3] {
            position: -webkit-sticky;
            position: sticky;
            top: 112px;
            margin-left: 56px;
            display: inline-block;
            vertical-align: top;
            width: 342px;
        }

        .blog-detail .right .mix-container[data-v-23970af3] {
            padding: 32px 20px 32px;
            width: 100%;
            background: -webkit-gradient(linear, right top, left top, from(#6924F2), to(#6213FC));
            background: linear-gradient(270deg, #6924F2 0%, #6213FC 100%);
            -webkit-box-shadow: 0 3px 6px #00000029;
            box-shadow: 0 3px 6px #00000029;
            border-radius: 12px;
            text-align: center;
        }

        .blog-detail .right .mix-container h2[data-v-23970af3] {
            margin-top: 20px;
            font: 800 italic 28px Montserrat;
            color: #fff;
        }

        .blog-detail .right .mix-container p[data-v-23970af3] {
            margin-top: 16px;
            font-size: 0;
        }

        .blog-detail .right .mix-container p.b[data-v-23970af3] {
            margin-top: 32px;
        }

        .blog-detail .right .mix-container p *[data-v-23970af3] {
            vertical-align: middle;
        }

        .blog-detail .right .mix-container p span[data-v-23970af3] {
            font: 400 16px/20px Montserrat;
            color: #FFFFFF;
        }

        .blog-detail .right .mix-container p i[data-v-23970af3] {
            margin-right: 16px;
            display: inline-block;
            width: 19px;
            height: 24px;
            background: url(img/icon_safe.svg) no-repeat center;
            background-size: contain;
            vertical-align: middle;
        }

        .blog-detail .right .mix-container .btn[data-v-23970af3] {
            margin-top: 22px;
            display: inline-block;
        }

        .blog-detail .right .mix-container .btn .btn-c[data-v-23970af3] {
            margin-top: 16px;
        }

        .blog-detail .right .mix-container .btn .btn-c[data-v-23970af3]:first-child {
            margin-top: 0;
        }

        .blog-detail .right .mix-container img.qr[data-v-23970af3] {
            margin-top: 22px;
            width: 100px;
        }

        .blog-detail .right .hot-list[data-v-23970af3] {
            margin-top: 62px;
        }

        .blog-detail .right .hot-list h2[data-v-23970af3] {
            font: 600 20px/47px Montserrat;
            color: #2A2A2A;
        }

        .blog-detail .right .hot-list .links a[data-v-23970af3] {
            margin-top: 20px;
            padding-bottom: 14px;
            display: block;
            border-bottom: 1px solid #E8E8E8;
        }

        .blog-detail .right .hot-list .links a:hover span[data-v-23970af3] {
            color: #2128BD;
        }

        .blog-detail .right .hot-list .links a span[data-v-23970af3] {
            font: 500 16px/19px Montserrat;
            color: #7E7E7E;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .blog-detail .skeleton-blog-detail .breadcrumb span[data-v-23970af3] {
            width: 80%;
            height: 20px;
        }

        .blog-detail .skeleton-blog-detail .meta-info h1 span[data-v-23970af3] {
            width: 100%;
            height: 40px;
        }

        .blog-detail .skeleton-blog-detail .meta-info p.intro span[data-v-23970af3] {
            width: 86%;
            height: 16px;
        }

        .blog-detail .skeleton-blog-detail .meta-info p.info span[data-v-23970af3] {
            width: 30%;
            height: 16px;
        }

        .blog-detail .skeleton-blog-detail .blog-detail__content p span[data-v-23970af3] {
            width: 100%;
            height: 16px;
        }

        .blog-detail .skeleton-blog-detail .blog-detail__content h2 span[data-v-23970af3] {
            width: 60%;
            height: 24px;
        }

        .blog-detail .skeleton-blog-detail span[data-v-23970af3] {
            display: inline-block;
            background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
            background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
            background-size: 200% 100%;
            -webkit-animation: shimmer-data-v-23970af3 4s infinite linear;
            animation: shimmer-data-v-23970af3 4s infinite linear;
        }

        @-webkit-keyframes shimmer-data-v-23970af3 {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        @keyframes shimmer-data-v-23970af3 {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        .blog-detail .skeleton-hot-list h2 span[data-v-23970af3] {
            width: 40%;
            height: 20px;
        }

        .blog-detail .skeleton-hot-list a span[data-v-23970af3] {
            margin-bottom: 5px;
            width: 100%;
            height: 16px;
        }

        .blog-detail .skeleton-hot-list a span[data-v-23970af3]:last-child {
            width: 80%;
        }

        .blog-detail .skeleton-hot-list span[data-v-23970af3] {
            display: inline-block;
            background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
            background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
            background-size: 200% 100%;
            -webkit-animation: shimmer-data-v-23970af3 4s infinite linear;
            animation: shimmer-data-v-23970af3 4s infinite linear;
        }

        @keyframes shimmer-data-v-23970af3 {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        @media (max-width: 768px) {
            .blog-detail[data-v-23970af3] {
                padding-bottom: 60px;
            }

            .blog-detail .wrapper[data-v-23970af3] {
                padding: 0 4vw;
            }

            .blog-detail .left[data-v-23970af3] {
                width: 100%;
            }

            .blog-detail .left .breadcrumb[data-v-23970af3] {
                padding-top: 20px;
                line-height: normal;
                border-bottom: none;
            }

            .blog-detail .left .breadcrumb a[data-v-23970af3],
            .blog-detail .left .breadcrumb span[data-v-23970af3] {
                display: inline-block;
                font: 500 14px Montserrat;
            }

            .blog-detail .left .meta-info[data-v-23970af3] {
                padding-top: 22px;
            }

            .blog-detail .left .meta-info h1[data-v-23970af3] {
                font: 600 22px/27px Montserrat;
            }

            .blog-detail .left .meta-info p.intro[data-v-23970af3] {
                margin-top: 16px;
                font: 400 14px/17px Montserrat;
            }

            .blog-detail .left .meta-info hr[data-v-23970af3] {
                margin-top: 16px;
            }

            .blog-detail .left .meta-info p.info[data-v-23970af3] {
                margin-top: 12px;
                font: 400 12px/14px Montserrat;
            }

            .blog-detail .left .related-list[data-v-23970af3] {
                margin-top: 40px;
            }

            .blog-detail .left .related-list h2[data-v-23970af3] {
                margin-bottom: 18px;
                font: 600 16px/24px Montserrat;
            }

            .blog-detail .left .related-list a[data-v-23970af3] {
                margin-top: 10px;
                padding-bottom: 10px;
                font: 500 14px/20px Montserrat;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }

            .blog-detail .right[data-v-23970af3] {
                margin-left: 0;
                margin-top: 60px;
                width: 100%;
            }

            .blog-detail .right .mix-container[data-v-23970af3] {
                padding: 4vw;
            }

            .blog-detail .right .mix-container .btn[data-v-23970af3] {
                margin-top: 22px;
                width: 72vw;
                height: 50px;
            }

            .blog-detail .right .hot-list[data-v-23970af3] {
                margin-top: 62px;
            }

            .blog-detail .right .hot-list h2[data-v-23970af3] {
                font: 600 16px/24px Montserrat;
            }

            .blog-detail .right .hot-list .links a[data-v-23970af3] {
                margin-top: 20px;
                padding-bottom: 14px;
            }

            .blog-detail .right .hot-list .links a span[data-v-23970af3] {
                font: 500 16px Montserrat;
            }
        }
    </style>
    <link data-vue-meta="1" ref="canonical" href="https://www.easygetinsta.com/blog/-2">
    <meta data-vue-meta="1"
          description="What do you think about your iPhone/iPad’s battery performance after updating to iOS9? Some reports say few users experience battery life problems after upgrading to iOS 9, Here&#39;s how to fix it!">
</head>

<?= $content ?>

<?php else : ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link type="image/x-icon" href="https://www.yiichina.com/favicon.ico?v=1528501659" rel="shortcut icon">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        q:before,
        q:after {
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        a {
            color: #7e8c8d;
            text-decoration: none;
            -webkit-backface-visibility: hidden;
        }

        li {
            list-style: none;
        }

        html,
        body {
            width: 100%;
        }

        body {
            -webkit-text-size-adjust: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        button {
            -webkit-appearance: none;
            border-radius: 0;
            outline: none;
            border: none;
        }

        a:hover {
            color: #2128BD;
        }

        hr {
            border: none;
        }

        @-webkit-keyframes loading-progress-move {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 600px 0;
            }
        }

        @keyframes loading-progress-move {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 600px 0;
            }
        }

        .uni-dialog-box .loading-progress-container p,
        .uni-action-sheet .loading-progress-container p {
            margin-top: 6%;
            text-align: center;
            font-weight: 500;
            font-size: 18px;
        }

        .uni-dialog-box.stripe-iframe .container,
        .uni-action-sheet.stripe-iframe .container {
            width: auto;
            height: auto;
            max-width: 600px;
            max-height: 600px;
            border-radius: 12px;
            overflow: hidden;
        }

        .uni-dialog-box.stripe-iframe .container .content,
        .uni-action-sheet.stripe-iframe .container .content {
            padding: 0;
        }

        .uni-dialog-box.stripe-iframe .container .content iframe,
        .uni-action-sheet.stripe-iframe .container .content iframe {
            background: url(img/loading-puff-type-1.svg) no-repeat center;
            background-size: 30% 30%;
        }

        .uni-dialog-box.enter-box .container,
        .uni-action-sheet.enter-box .container {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        .uni-dialog-box.enter-mask .mask,
        .uni-action-sheet.enter-mask .mask {
            background-color: rgba(255, 255, 255, 0.4);
            -webkit-backdrop-filter: saturate(140%) blur(8px);
            backdrop-filter: saturate(140%) blur(8px);
        }

        .uni-action-sheet .container {
            position: absolute;
            top: auto;
            bottom: 0;
            width: 500px;
            border-radius: 32px 32px 0 0;
            opacity: 1;
            -webkit-transform: scale(1) translateY(100%);
            transform: scale(1) translateY(100%);
        }

        .uni-action-sheet.enter-box .container {
            -webkit-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0);
        }


        .uni-tip-container-qr-code img {
            position: relative;
            z-index: 7;
            width: 100%;
            height: 100%;
        }


        .loading-animation i {
            display: block;
            width: 60px;
            height: 60px;
            background: url(img/loading-puff-black.svg) no-repeat center;
            background-size: contain;
        }

        .loading-animation p {
            font-size: 15px;
            font-weight: 500;
        }


        .post-container .post-list .img-container img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eaeaea), color-stop(18%, #e3e3e3), color-stop(33%, #eaeaea));
            background: linear-gradient(to right, #eaeaea 8%, #e3e3e3 18%, #eaeaea 33%);
            -webkit-animation: post-img-container-move 2s linear infinite;
            animation: post-img-container-move 2s linear infinite;
        }

        @-webkit-keyframes post-img-container-move {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 320px 0;
            }
        }

        @keyframes post-img-container-move {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 320px 0;
            }
        }

        .post-container .post-list .img-container .mark i {
            display: inline-block;
            width: 36px;
            height: 32px;
            background-image: url(img/icon_favorite.svg);
            background-size: contain;
            background-repeat: no-repeat;
        }

        .post-container .post-list .img-container .mark p {
            margin-top: 8px;
            font: 600 20px Montserrat;
            color: #FFFFFF;
        }

        .post-container .load-more {
            display: inline-block;
            width: 100%;
            font: 600 20px/120px Montserrat;
            color: #2A2A2A;
            text-align: center;
            text-decoration: underline;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }


        .pkg-container .package i {
            display: inline-block;
            vertical-align: middle;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .pkg-container .package.follow i.num-i {
            width: 39px;
            height: 28px;
            background-image: url(img/user-center__icon_follow_black.svg);
        }

        .pkg-container .package.like i.num-i {
            width: 30px;
            height: 26px;
            background-image: url(img/user__task_icon_like.svg);
        }

        .pkg-container .package span.num {
            font-size: 0;
        }

        .pkg-container .package span.num i,
        .pkg-container .package span.num b,
        .pkg-container .package span.num span {
            vertical-align: middle;
        }

        .pkg-container .package span.num i {
            margin-right: 20px;
        }

        .pkg-container .package span.num b {
            font: 800 24px Montserrat;
        }

        .pkg-container .package span.num span {
            font: 500 24px Montserrat;
            color: #2A2A2A;
        }

        .pkg-container .package span.likes {
            font-size: 0;
        }

        .pkg-container .package span.likes span {
            font: 500 20px Montserrat;
            color: #FF6F00;
            vertical-align: middle;
        }

        .pkg-container .package span.likes i {
            margin-left: 14px;
            content: "";
            display: inline-block;
            width: 26px;
            height: 26px;
            background-image: url(img/user-center__icon_giftbox.svg);
            vertical-align: middle;
        }

        .pkg-container .package span.coins {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            text-align: right;
        }

        .pkg-container .package span.coins sup {
            font: 500 24px Montserrat;
            color: #FF6F00;
        }

        .pkg-container .package span.coins sub {
            font: 500 16px Montserrat;
            color: #A8A8A8;
            text-decoration: line-through;
        }

        .pkg-container .package.skeleton {
            cursor: default;
        }

        .pkg-container .package.skeleton span.s {
            display: inline-block;
            width: 100%;
            height: 28px;
        }

        .pkg-container .package.skeleton span.num {
            width: 34%;
        }

        .pkg-container .package.skeleton span.likes {
            width: 26%;
        }

        .pkg-container .package.skeleton span.coins {
            width: 20%;
        }

        .pkg-container .package.skeleton:hover {
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.06);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.06);
        }

        .pkg-extra {
            margin-top: 86px;
        }

        .pkg-extra h2:before {
            margin-right: 10px;
            display: inline-block;
            vertical-align: middle;
            width: 34px;
            height: 34px;
            background: url(img/user-center__icon_giftbox.svg) no-repeat;
            background-size: contain;
            content: "";
        }

        .pkg-extra .img {
            margin: 60px auto 0;
            width: 200px;
            height: 200px;
        }

        .pkg-extra .img img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: 20px;
        }

        .pkg-extra p {
            margin-top: 16px;
            font-size: 0;
            text-align: center;
        }

        .pkg-extra p span {
            font: 600 20px Montserrat;
            color: #2A2A2A;
            vertical-align: middle;
        }

        .pkg-extra p i {
            margin-right: 8px;
            display: inline-block;
            vertical-align: middle;
            width: 27px;
            height: 24px;
            background: url(img/user__task_icon_like.svg) no-repeat;
            background-size: contain;
        }

        .control-search_ins {
            display: inline-block;
            width: 700px;
            height: 80px;
            -webkit-box-shadow: 0 5px 20px #000A3D1C;
            box-shadow: 0 5px 20px #000A3D1C;
            border-radius: 8px;
        }

        .control-search_ins label {
            width: 72%;
            height: 100%;
            display: inline-block;
            vertical-align: top;
        }


        .control-search_ins label input:hover,
        .control-search_ins label input:focus {
            border-color: #005FFF !important;
        }

        .control-search_ins .search_btn {
            display: inline-block;
            vertical-align: top;
            width: 28%;
            height: 100%;
            border-radius: 0 8px 8px 0;
            overflow: hidden;
        }

        .img-preloader {
            display: none;
        }

        .banner-animate-loading {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 60px;
            height: 60px;
            background: url(img/loading-puff-white.svg) no-repeat center;
            background-size: contain;
        }

        .skeleton-bg {
            background: -webkit-gradient(linear, left top, right top, color-stop(4%, #eff1f3), color-stop(25%, #e2e2e2), color-stop(36%, #eff1f3));
            background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
            background-size: 200% 100%;
            -webkit-animation: skeleton-bg-shimmer 4s infinite linear;
            animation: skeleton-bg-shimmer 4s infinite linear;
        }

        @-webkit-keyframes skeleton-bg-shimmer {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        @keyframes skeleton-bg-shimmer {
            0% {
                background-position: 200% 100%;
            }

            100% {
                background-position: -200% 100%;
            }
        }

        .VuePagination {
            margin-top: 40px;
            text-align: center;
        }

        .VuePagination .page-item {
            position: relative;
            margin: 0 4px;
            display: inline-block;
            -webkit-transition: color 0.3s;
            transition: color 0.3s;
        }

        .VuePagination .page-item:active {
            top: 1px;
            -webkit-box-shadow: 0 2px 4px #0000000F !important;
            box-shadow: 0 2px 4px #0000000F !important;
        }

        .VuePagination .page-item a {
            padding: 4px 8px;
            display: inline-block;
            font: 600 16px/20px Montserrat;
            color: #7A7A7A;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .VuePagination .page-item a:hover {
            color: #005fff;
        }

        .VuePagination .page-item.active a {
            color: #005fff;
        }

        .VuePagination .page-item.active a:hover {
            cursor: default;
        }

        .VuePagination .page-item.disabled a {
            color: #d6d6d6;
        }

        .VuePagination .VuePagination__pagination-item-prev-page,
        .VuePagination .VuePagination__pagination-item-prev-chunk,
        .VuePagination .VuePagination__pagination-item-next-page,
        .VuePagination .VuePagination__pagination-item-next-chunk {
            margin: 0 8px;
            -webkit-box-shadow: 0 3px 6px #0000000F;
            box-shadow: 0 3px 6px #0000000F;
            border: 1px solid #DFDFDF;
            border-radius: 3px;
        }

        .VuePagination .VuePagination__pagination-item-prev-page a,
        .VuePagination .VuePagination__pagination-item-prev-chunk a,
        .VuePagination .VuePagination__pagination-item-next-page a,
        .VuePagination .VuePagination__pagination-item-next-chunk a {
            color: #2A2A2A;
        }

        .VuePagination .VuePagination__pagination-item-prev-page:hover,
        .VuePagination .VuePagination__pagination-item-prev-chunk:hover,
        .VuePagination .VuePagination__pagination-item-next-page:hover,
        .VuePagination .VuePagination__pagination-item-next-chunk:hover {
            -webkit-box-shadow: 0 3px 6px #00000036;
            box-shadow: 0 3px 6px #00000036;
        }

        .VuePagination .VuePagination__pagination-item-prev-page:hover a,
        .VuePagination .VuePagination__pagination-item-prev-chunk:hover a,
        .VuePagination .VuePagination__pagination-item-next-page:hover a,
        .VuePagination .VuePagination__pagination-item-next-chunk:hover a {
            color: #2A2A2A;
        }

        .VuePagination .VuePagination__pagination-item-prev-page.disabled,
        .VuePagination .VuePagination__pagination-item-prev-chunk.disabled,
        .VuePagination .VuePagination__pagination-item-next-page.disabled,
        .VuePagination .VuePagination__pagination-item-next-chunk.disabled {
            -webkit-box-shadow: 0 3px 6px #0000000F;
            box-shadow: 0 3px 6px #0000000F;
        }

        .VuePagination .VuePagination__pagination-item-prev-page.disabled a,
        .VuePagination .VuePagination__pagination-item-prev-chunk.disabled a,
        .VuePagination .VuePagination__pagination-item-next-page.disabled a,
        .VuePagination .VuePagination__pagination-item-next-chunk.disabled a {
            color: #d6d6d6;
            cursor: default;
        }

        #footer-translate-blank {
            margin-top: 24px;
            height: 32px;
        }

        #wrapper-translate {
            position: relative;
            margin: 0 auto;
            width: 1210px;
            height: 0;
        }

        #google_translate_element {
            position: absolute;
            right: 0;
            bottom: 48px;
            text-align: center;
        }

        #google_translate_element .goog-te-gadget {
            display: inline-block;
            text-align: left;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple {
            background-color: transparent;
            border: 1px solid rgba(0, 0, 0, 0.4);
            border-radius: 4px;
            font-size: 16px;
            padding: 0;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-gadget-icon {
            display: none;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value {
            margin-left: 12px;
            margin-right: 10px;
            display: inline-block;
            color: rgba(0, 0, 0, 0.6) !important;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value span {
            display: inline-block;
            height: 30px;
            line-height: 30px;
            border-color: rgba(0, 0, 0, 0.4) !important;
        }

        #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value img {
            width: 8px !important;
        }

        body {
            top: 0 !important;
            min-height: 0 !important;
        }

        @-webkit-keyframes pulse {
            from {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            50% {
                -webkit-transform: scale3d(1.05, 1.05, 1.05);
                transform: scale3d(1.05, 1.05, 1.05);
            }

            to {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes pulse {
            from {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            50% {
                -webkit-transform: scale3d(1.05, 1.05, 1.05);
                transform: scale3d(1.05, 1.05, 1.05);
            }

            to {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @-webkit-keyframes tada {
            from {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            10%,
            20% {
                -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
                transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
            }

            30%,
            50%,
            70%,
            90% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
            }

            40%,
            60%,
            80% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
            }

            to {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes tada {
            from {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            10%,
            20% {
                -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
                transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
            }

            30%,
            50%,
            70%,
            90% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
            }

            40%,
            60%,
            80% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
            }

            to {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @-webkit-keyframes hinge {
            0% {
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
            }

            20%,
            60% {
                -webkit-transform: rotate3d(0, 0, 1, 80deg);
                transform: rotate3d(0, 0, 1, 80deg);
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
            }

            40%,
            80% {
                -webkit-transform: rotate3d(0, 0, 1, 60deg);
                transform: rotate3d(0, 0, 1, 60deg);
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
                opacity: 1;
            }

            to {
                -webkit-transform: translate3d(0, 700px, 0);
                transform: translate3d(0, 700px, 0);
                opacity: 0;
            }
        }

        @keyframes hinge {
            0% {
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
            }

            20%,
            60% {
                -webkit-transform: rotate3d(0, 0, 1, 80deg);
                transform: rotate3d(0, 0, 1, 80deg);
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
            }

            40%,
            80% {
                -webkit-transform: rotate3d(0, 0, 1, 60deg);
                transform: rotate3d(0, 0, 1, 60deg);
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
                opacity: 1;
            }

            to {
                -webkit-transform: translate3d(0, 700px, 0);
                transform: translate3d(0, 700px, 0);
                opacity: 0;
            }
        }

        .goog-te-banner-frame {
            display: none;
        }

        @media (min-width: 769px) {
            .mobile {
                display: none !important;
            }

            .wrapper {
                width: 1210px;
            }

            .header-blank {
                height: 80px;
            }
        }

        @media (max-width: 768px) {
            a:hover {
                color: #005fff;
            }

            a:active {
                color: #2128BD;
            }

            .pc {
                display: none !important;
            }

            .wrapper {
                width: 100%;
            }

            .index-loading {
                padding: 80px 8vw;
            }

            .banner-animate-loading {
                width: 50px;
                height: 50px;
            }

            .header-blank {
                height: 44px;
            }

            .home__sec {
                padding: 85px 0 73px;
            }

            .home__sec .home__sec_h2 {
                padding: 0 15px;
                font-size: 22px;
                font-weight: 700;
                line-height: 27px;
            }

            .home__sec .home__sec_p {
                margin-top: 10px;
                padding: 0 15px;
                font-size: 14px;
                line-height: 18px;
            }

            input[type=text],
            input[type=email],
            input[type=search],
            input[type=password],
            input[type=number],
            input[type=tel],
            textarea,
            select,
            .stripe-filed {
                padding: 0 3.2vw;
                border: 1px solid #DEDEDE;
                border-radius: 4px;
                line-height: normal;
                text-align: left;
                font: 600 14px Montserrat;
                line-height: normal;
            }

            .pkg-container .package span.num i {
                margin-right: 10px;
            }

            .pkg-container .package span.num b {
                font: 800 14px Montserrat;
            }

            .pkg-container .package span.num span {
                font: 500 14px Montserrat;
            }

            .pkg-container .package span.likes span {
                font: 500 14px Montserrat;
            }

            .pkg-container .package span.likes i {
                margin-left: 7px;
                width: 14px;
                height: 14px;
            }

            .pkg-container .package span.coins sup {
                font: 500 13px Montserrat;
            }

            .pkg-container .package span.coins sub {
                font: 500 10px Montserrat;
            }


            .pkg-container .package span.num-m .num-text-m p.top b {
                font: 800 14px Montserrat;
            }

            .pkg-container .package span.num-m .num-text-m p.top span {
                font: 500 14px Montserrat;
            }

            .pkg-extra h2:before {
                margin-right: 5px;
                width: 17px;
                height: 17px;
            }


            .pkg-extra .img img {
                border-radius: 10px;
            }

            .pkg-extra p {
                margin-top: 8px;
            }

            .pkg-extra p span {
                font: 600 10px Montserrat;
            }

            .pkg-extra p i {
                margin-right: 4px;
                width: 13.5px;
                height: 12px;
            }

            .control-search_ins label input {
                padding-left: 44px;
                border-radius: 4px 0 0 4px;
                background: url(img/icon_search_username.svg) no-repeat 14px 17px;
                background-size: 17px 19px;
                font-size: 14px;
            }


            #google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value span {
                border-color: rgba(255, 255, 255, 0.6) !important;
            }

        }

        .blog-detail__content .tips {
            position: relative;
            margin: 50px 0;
            padding: 20px 30px;
            width: 100%;
            background: #FBF8F1;
            border-radius: 12px;
            font: 400 16px/20px Montserrat;
            color: #AC7300;
        }

        .blog-detail__content .tips:before {
            position: absolute;
            top: -28px;
            left: 18px;
            display: block;
            width: 74px;
            height: 28px;
            background-image: url(img/blog__icon_tips.svg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            content: "";
        }

        .blog-detail__content p {
            margin: 16px 0;
            font: 400 16px/1.75 Montserrat;
        }

        .blog-detail__content p a {
            color: #005fff;
            text-decoration: underline;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .blog-detail__content p a:hover {
            color: #2128BD;
        }

        .blog-detail__content h2 {
            margin: 36px 0 16px;
            font: 600 24px Montserrat;
        }

        .blog-detail__content h3 {
            margin: 28px 0 12px;
            font: 600 18px Montserrat;
        }

        .blog-detail__content strong,
        .blog-detail__content b {
            font-weight: 600;
            font-style: normal;
        }

        .blog-detail__content em {
            font-style: italic !important;
            font-weight: 400 !important;
        }

        .blog-detail__content em strong {
            font-style: italic !important;
            font-weight: 600 !important;
        }

        .blog-detail__content ul {
            margin: 16px 0;
            padding-left: 26px;
            font: 400 16px/1.75 Montserrat;
        }

        .blog-detail__content ul li {
            list-style: outside disc;
        }

        .blog-detail__content ul li p {
            margin-bottom: 0;
        }


        .blog-detail__content .download {
            margin: 42px 0;
            padding: 30px 34px 34px;
            background: #FFFFFF;
            -webkit-box-shadow: 0 3px 6px #00000014;
            box-shadow: 0 3px 6px #00000014;
            border: 1px solid #CECECE;
            border-radius: 12px;
            color: #2A2A2A;
        }

        .blog-detail__content .download .download__left {
            display: inline-block;
            vertical-align: top;
            width: 480px;
        }

        .blog-detail__content .download .download__left h3 {
            font: 600 20px/24px Montserrat;
        }

        .blog-detail__content .download .download__left ul {
            margin-top: 24px;
        }

        .blog-detail__content .download .download__left ul li {
            font: 400 12px/18px Montserrat;
            list-style: inside url(img/icon_ul_star.svg);
        }

        .blog-detail__content .download .download__right {
            margin-left: 40px;
            display: inline-block;
            vertical-align: top;
            width: 210px;
            text-align: center;
        }

        .blog-detail__content .download .download__right p.star {
            margin-top: 0;
        }

        .blog-detail__content .download .download__right p.star q {
            margin: 0 3px;
            display: inline-block;
            width: 17px;
            height: 16px;
            background-image: url(img/icon__btn-download_logo_windows.svg);
            background-size: contain;
            vertical-align: top;
        }

        .blog-detail__content .download .download__right .btn-container {
            margin-top: 22px;
            width: 100%;
            height: 60px;
        }

        .blog-detail__content .download .download__right .btn-container a {
            width: 100%;
            height: 100%;
        }

        .blog-detail__content .download .download__right p.note {
            margin-top: 16px;
            font: 400 12px Montserrat;
        }

        .blog-detail__content .download button {
            padding: 0 10%;
            width: 100%;
            height: 100%;
            background-color: #00BE52;
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            -webkit-box-shadow: 0 12px 24px #00000029;
            box-shadow: 0 12px 24px #00000029;
            color: #ffffff;
        }

        .blog-detail__content .download button span {
            font-weight: 600;
            font-size: 16px;
            word-break: break-word;
        }

        .blog-detail__content .download button:hover {
            background-color: #00e257;
        }

        .blog-detail__content .download .btn-apps {
            width: 100%;
            min-width: auto;
            height: 100%;
            min-height: auto;
            border-radius: 64px;
        }


        .blog-detail__content .index ul {
            margin-bottom: 0;
            padding-left: 0;
            font-size: 0;
        }

        .blog-detail__content .index ul li {
            position: relative;
            margin-top: 24px;
            padding-left: 12px;
            list-style: none;
            display: inline-block;
            vertical-align: top;
            width: 100%;
            font: 600 16px/20px Montserrat;
            color: #2A2A2A;
            cursor: pointer;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
        }

        .blog-detail__content .index ul li:before {
            position: absolute;
            top: 0;
            left: 0;
            content: "";
            display: inline-block;
            width: 5px;
            height: 20px;
            background: url(img/punctuation__bullet.svg) no-repeat center;
            background-size: contain;
        }

        .blog-detail__content .index ul li:hover {
            color: #005fff;
        }

        .blog-detail__content .index ul li:first-child {
            margin-top: 0;
        }

        .blog-detail__content .index.double ul li {
            margin-top: 16px;
            display: inline-block;
            width: 50%;
            font-size: 14px;
        }

        .blog-detail__content .index.double ul li:first-child {
            margin-top: 16px;
        }

        .blog-detail__content .index.double ul li:nth-child(1),
        .blog-detail__content .index.double ul li:nth-child(2) {
            margin-top: 0;
        }

        .blog-detail__content .index.double ul li:nth-child(odd) {
            padding-right: 20px;
        }

        .blog-detail__content .index.double ul li:nth-child(even) {
            padding-left: 20px;
        }

        .blog-detail__content .index.double ul li:nth-child(even):before {
            left: 10px;
        }

        .blog-detail__content table {
            margin: 40px 0;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #E5E5E5;
            text-align: center;
            background-color: #F9F9F9;
            font: 400 14px Montserrat;
        }

        .blog-detail__content table tr th,
        .blog-detail__content table tr td {
            padding: 0 10px;
            border: 1px solid #E5E5E5;
            height: 48px;
            vertical-align: middle;
        }

        .blog-detail__content table tr th:first-child,
        .blog-detail__content table tr td:first-child {
            text-align: left;
            background-color: #fff;
        }

        .blog-detail__content table tr th b,
        .blog-detail__content table tr td b {
            font-weight: 800;
            font-style: italic;
        }

        .blog-detail__content table tr th i,
        .blog-detail__content table tr td i {
            display: inline-block;
            background-size: contain;
        }


        .blog-detail__content table tr th {
            font-weight: 600;
            font-size: 16px;
        }

        .blog-detail__content table tr:first-child th,
        .blog-detail__content table tr:first-child td {
            font-weight: 600;
            font-size: 16px;
        }

        .blog-detail__content * {
            max-width: 100%;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .blog-detail__content *:first-child {
            margin-top: 0;
        }


        .blog-detail__content .btn-container a {
            display: inline-block;
            vertical-align: middle;
        }


        .blog-detail__content.windows .btn-windows {
            display: inline-block;
        }

        .blog-detail__content.windows .btn-android {
            display: none;
        }

        .blog-detail__content.windows .btn-ios {
            display: none;
        }

        .blog-detail__content.android .btn-windows {
            display: none;
        }

        .blog-detail__content.android .btn-android {
            display: inline-block;
        }

        .blog-detail__content.android .btn-ios {
            display: none;
        }

        .blog-detail__content.ios .btn-windows {
            display: none;
        }

        .blog-detail__content.ios .btn-android {
            display: none;
        }

        .blog-detail__content.ios .btn-ios {
            display: inline-block;
        }

        .blog-detail__content button {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            overflow: hidden;
            vertical-align: middle;
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .blog-detail__content .download .btn-apps .btn-apps__links:first-child .btn-download-green {
            padding-left: 20%;
        }

        .blog-detail__content .download .btn-apps .btn-apps__links:last-child .btn-download-green {
            padding-right: 20%;
        }

        .blog-detail__content button.btn-download-green {
            padding: 0 22px 0 24px;
            min-width: 240px;
            height: 64px;
            background: #00BE52;
            -webkit-box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            border-radius: 5px;
        }

        a.btn-windows {
            text-decoration: none
        }

        a.btn-buy {
            text-decoration: none
        }

        .blog-detail__content button.btn-download-green:hover {
            background-color: #14D567;
        }

        .blog-detail__content button.btn-download-green:hover .icon q {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        .blog-detail__content button.btn-download-green:hover .icon g {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .blog-detail__content button.btn-download-green.icon-windows .icon q {
            background-image: url(img/icon__btn-download_logo_windows.svg);
        }

        .blog-detail__content button.btn-download-green.icon-android .icon q {
            background-image: url(img/icon__btn-download_logo_android_white.svg);
        }

        .blog-detail__content button.btn-download-green.icon-ios .icon q {
            background-image: url(img/icon__btn-download_logo_apple_white.svg);
        }

        .blog-detail__content button.btn-download-green.icon-windows .icon,
        .blog-detail__content button.btn-download-green.icon-android .icon,
        .blog-detail__content button.btn-download-green.icon-ios .icon {
            display: block;
        }

        .blog-detail__content button.btn-download-green .icon {
            position: relative;
            margin-right: 8%;
            width: 30px;
            height: 30px;
            display: none;
        }

        .blog-detail__content button.btn-download-green .icon q,
        .blog-detail__content button.btn-download-green .icon g {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .blog-detail__content button.btn-download-green .icon g {
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            background-image: url(img/icon__btn-download_dl_white.svg);
        }

        .blog-detail__content button.btn-download-green .text {
            font: 600 18px Montserrat;
            color: #FFFFFF;
        }

        .blog-detail__content button.buy {
            padding: 0 10%;
            min-width: 132px;
            height: 64px;
            background-color: transparent;
            border: 2px solid #FFFFFF;
            border-radius: 5px;
            opacity: 1;
            font: 600 16px Montserrat;
            color: #FFFFFF;
            white-space: nowrap;
        }

        .blog-detail__content button.buy:hover {
            background-color: #FF9C39;
            border-color: #FF9C39;
        }

        .blog-detail__content .download-type-1 {
            padding: 52px 20px 40px 300px;
            width: 800px;
            background: url(img/blog__download-type-1_bg.png) no-repeat center;
            background-size: cover;
            border-radius: 12px;
            overflow: hidden;
        }

        .blog-detail__content .download-type-1 h2 {
            font: 600 19px/24px Montserrat;
            color: #FFFFFF;
        }

        .blog-detail__content .download-type-1 ul {
            margin: 18px 0 30px;
            padding-left: 0;
            font-size: 0;
        }

        .blog-detail__content .download-type-1 ul li {
            position: relative;
            margin-top: 14px;
            padding-left: 20px;
            font: 500 12px/14px Montserrat;
            color: #FFFFFF;
            list-style: none;
        }

        .blog-detail__content .download-type-1 ul li:before {
            position: absolute;
            top: 0;
            left: 0;
            content: "";
            display: inline-block;
            width: 10px;
            height: 100%;
            background: url(img/icon_ul_star_white.svg) no-repeat center;
            background-size: contain;
        }

        .blog-detail__content .download-type-1 ul li:first-child {
            margin-top: 0;
        }

        .blog-detail__content .download-type-1 .btn-apps {
            width: 240px;
            height: 64px;
            border-radius: 5px;
        }

        .blog-detail__content .download-type-2 hr {
            display: none;
            margin: 30px auto 50px;
            border-top: 1px solid #E8E8E8;
            width: 100%;
        }

        .blog-detail__content .download-type-2 .btn-container {
            text-align: center;
        }

        .blog-detail__content .download-type-2 .btn-container button.buy {
            width: 240px;
            border-color: #A8A8A8;
            color: #2A2A2A;
        }

        .blog-detail__content .download-type-2 .btn-container button.buy:hover {
            border-color: #FF9C39;
            color: #fff;
        }

        .blog-detail__content .download-type-2 p.note {
            margin: 22px 0 0;
            text-align: center;
            font: 500 20px Montserrat;
            color: #A8A8A8;
        }

        .blog-detail__content .download-type-2 .btn-apps {
            width: 240px;
            height: 64px;
            border-radius: 5px;
        }

        .blog-detail__content .btn-apps {
            position: relative;
            display: inline-block;
            min-width: 240px;
            height: 64px;
            font-size: 0;
            overflow: hidden;
            -webkit-box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            vertical-align: middle;
        }

        .blog-detail__content .btn-apps:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            display: block;
            width: 1px;
            height: 33.333%;
            background-color: rgba(0, 0, 0, 0.25);
        }

        .blog-detail__content .btn-apps .btn-apps__links {
            display: inline-block;
            width: 50% !important;
            height: 100% !important;
        }

        .blog-detail__content .btn-apps .btn-apps__links .btn-download-green {
            padding: 0 10%;
            min-width: auto;
            width: 100%;
            height: 100%;
            border-radius: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .blog-detail__content .btn-apps .btn-apps__links .btn-download-green .icon {
            margin-right: 0;
        }

        @media (max-width: 768px) {
            .blog-detail__content {
                padding-top: 25px;
            }

            .blog-detail__content p {
                margin: 14px 0;
                font: 400 14px/1.75 Montserrat;
            }

            .blog-detail__content h2 {
                margin-top: 30px;
                margin-bottom: 14px;
                font: 600 18px Montserrat;
            }

            .blog-detail__content h3 {
                margin: 14px 0 6px;
                font: 600 15px Montserrat;
            }

            .blog-detail__content ul {
                margin: 14px 0;
                padding-left: 26px;
                font: 400 14px/1.75 Montserrat;
            }

            .blog-detail__content .tips {
                margin: 25px 0;
                padding: 3vw 4vw;
                font: 400 14px/17px Montserrat;
            }

            .blog-detail__content .tips:before {
                position: absolute;
                top: -24px;
                left: 10px;
                width: 63.5px;
                height: 24px;
            }

            .blog-detail__content .download {
                margin: 21px 0;
                padding: 4vw;
            }

            .blog-detail__content .download .download__left {
                width: 100%;
            }

            .blog-detail__content .download .download__left h3 {
                font: 600 16px/20px Montserrat;
            }

            .blog-detail__content .download .download__right {
                margin: 30px auto 0;
                display: block;
                width: 70vw;
            }

            .blog-detail__content .index {
                margin: 30px 0;
                padding: 3vw 6vw 3vw;
            }

            .blog-detail__content .index ul li {
                margin-top: 12px;
                font: 600 14px/18px Montserrat;
            }

            .blog-detail__content .index ul li:before {
                height: 18px;
            }

            .blog-detail__content .index.double {
                padding: 3vw 6vw 3vw;
            }

            .blog-detail__content .index.double ul li {
                display: inline-block;
                width: 100%;
                font-size: 14px;
            }

            .blog-detail__content .index.double ul li:first-child {
                margin-top: 0;
            }

            .blog-detail__content .index.double ul li:nth-child(1) {
                margin-top: 0;
            }

            .blog-detail__content .index.double ul li:nth-child(2) {
                margin-top: 12px;
            }

            .blog-detail__content .index.double ul li:nth-child(odd) {
                padding-right: 0;
            }

            .blog-detail__content .index.double ul li:nth-child(even) {
                padding-left: 12px;
            }

            .blog-detail__content .index.double ul li:nth-child(even):before {
                left: 0;
            }

            .blog-detail__content table {
                margin: 20px 0;
                font: 400 8px Montserrat;
            }

            .blog-detail__content table tr th,
            .blog-detail__content table tr td {
                padding: 0 10px;
                height: 48px;
                font-size: 7px;
            }

            .blog-detail__content table tr th i.check,
            .blog-detail__content table tr td i.check {
                width: 9.5px;
                height: 6.5px;
            }

            .blog-detail__content table tr th i.cross,
            .blog-detail__content table tr td i.cross {
                width: 7.5px;
                height: 7.5px;
            }

            .blog-detail__content table tr:first-child th,
            .blog-detail__content table tr:first-child td {
                font-weight: 600;
                font-size: 8px;
            }

            .blog-detail__content .btn-container {
                text-align: center;
            }

            .blog-detail__content .btn-container a.btn-buy {
                margin-left: 0;
                margin-top: 16px;
                width: 64vw;
            }

            .blog-detail__content button {
                margin: 0 auto;
            }

            .blog-detail__content button.btn-download-green {
                padding: 0;
                width: 64vw;
                min-width: 0;
                height: 56px;
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.16);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.16);
                border-radius: 56px;
            }

            .blog-detail__content button.btn-download-green .icon {
                position: relative;
                width: 10.4%;
                height: 44px;
            }

            .blog-detail__content button.btn-download-green .text {
                font: 600 14px Montserrat;
            }

            .blog-detail__content button.buy {
                width: 64vw;
                height: 56px;
                border: 2px solid #2A2A2A;
                border-radius: 56px;
                opacity: 1;
                font: 600 16px Montserrat;
                color: #2A2A2A;
            }

            .blog-detail__content button.buy:hover {
                color: #fff;
            }

            .blog-detail__content .download-type-1 {
                padding: 0 0 30px;
                width: 100%;
                background: #F2F2F2;
                border-radius: 6px;
            }

            .blog-detail__content .download-type-1 h2 {
                position: relative;
                padding: 24px 21px 21px 89px;
                display: inline-block;
                width: 100%;
                font: 600 16px/20px Montserrat;
                background-image: -webkit-gradient(linear, left top, right top, from(#FF81E2), to(#2C85FF));
                background-image: linear-gradient(to right, #FF81E2, #2C85FF);
            }

            .blog-detail__content .download-type-1 h2:before {
                position: absolute;
                top: 20px;
                left: 21px;
                content: "";
                display: inline-block;
                width: 50px;
                height: 50px;
                background: url(img/logo.svg) no-repeat center;
                background-size: contain;
                vertical-align: middle;
            }

            .blog-detail__content .download-type-1 ul {
                margin: 12px 4vw 32px;
            }

            .blog-detail__content .download-type-1 ul li {
                margin-top: 14px;
                font: 500 12px/14px Montserrat;
                color: #2a2a2a;
            }

            .blog-detail__content .download-type-1 ul li:before {
                width: 14px;
                height: 14px;
                background-image: url(img/icon_ul_star.svg);
            }

            .blog-detail__content .download-type-2 hr {
                margin: 15px auto 25px;
            }

            .blog-detail__content .download-type-2 .btn-container button.buy {
                width: 64vw;
            }

            .blog-detail__content .download-type-2 p.note {
                margin: 16px 0 0;
                font: 500 12px Montserrat;
            }
        }

        .addthis-hide .addthis-smartlayers {
            display: none !important;
        }

        .locale-switch {
            position: fixed;
            z-index: 10000;
            top: 66%;
            right: 0;
        }

        .locale-switch button {
            display: block;
            padding: 6px;
            width: 36px;
            background-color: rgba(232, 232, 232, 0.6);
            -webkit-backdrop-filter: blur(3px);
            backdrop-filter: blur(3px);
        }
    </style>
</head>

<body>
<?php $this->beginBody();
//        NavBar::begin([
//            'brandLabel' => 'BackStage',
//            'brandUrl' => Yii::$app->homeUrl,
//            'options' => [
//                'class' => 'navbar-inverse navbar-fixed-top',
//            ],
//        ]);
//        echo Nav::widget([
//            'options' => ['class' => 'navbar-nav navbar-right'],
//            'items' => [
//                ['label' => 'Home', 'url'=> ['/']],
//                ['label' => 'Article', 'url' => ['/admin/article/index']],
//                ['label' => Yii::$app->user->identity['username'], 'items'=>[
//                        ['label' => 'Profile', 'url' => ['/admin/assignment/update','id'=>Yii::$app->user->identity['id']]],
//                        ['label' => 'Log Out', 'url'=> ['/site/logout'], 'options' => ["data-method"=>"post"]],
//                    ]
//                ],
//            ],
//        ]);
//        NavBar::end();
?>

<section id="container">
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href="<?= Url::home() ?>" class="logo">My<span>Backend</span></a>
        <div class="top-nav ">
            <ul class="nav pull-right top-menu">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username"><?= Yii::$app->user->identity['username'] ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/index.php?r=admin%2Fassignment%2Fupdate&id=<?= Yii::$app->user->identity['id'] ?>">
                                <i class=" fa fa-suitcase">Profile</i>
                            </a>
                        </li>
                        <li><a href="<?= Url::toRoute('/site/logout') ?>" data-method="post"><i class="fa fa-key"></i>
                                Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>

    <aside>
        <div id="sidebar" class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="<?= ($controllerName == 'site' ? 'active' : '') ?>" href="<?= Url::home() ?>">
                        <i class="fa fa-dashboard"></i>
                        <span><?= Yii::t('admin', 'dashboard') ?></span>
                    </a>
                </li>
                <?php
                if (isset($menuRows)) {

                    $isSubUrl = false;
                    foreach ($menuRows as $menuRow) {

                        $isSubUrl = isSubUrl($menuRow, $route);

                        if ($isSubUrl) {
                            break;
                        }
                    }
                    foreach ($menuRows as $menuRow) {

                        initMenu($menuRow, $controllerName, $isSubUrl, true);
                    }
                }
                ?>
            </ul>
        </div>
    </aside>
    <section id="main-content">
        <?= $content ?>
    </section>
    <footer class="site-footer">
        <div class="text-center">
            back to top
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php endif; ?>

