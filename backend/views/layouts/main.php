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

        input,
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

        .blog-detail__content .download .download__right p.star i {
            margin: 0 3px;
            display: inline-block;
            width: 17px;
            height: 16px;
            background-image: url(img/icon_star.svg);
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

        .blog-detail__content button.btn-download-green:hover .icon i {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        .blog-detail__content button.btn-download-green:hover .icon b {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .blog-detail__content button.btn-download-green.icon-windows .icon i {
            background-image: url(img/icon__btn-download_logo_windows.svg);
        }

        .blog-detail__content button.btn-download-green.icon-android .icon i {
            background-image: url(img/icon__btn-download_logo_android_white.svg);
        }

        .blog-detail__content button.btn-download-green.icon-ios .icon i {
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

        .blog-detail__content button.btn-download-green .icon i,
        .blog-detail__content button.btn-download-green .icon b {
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

        .blog-detail__content button.btn-download-green .icon b {
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
<?php $this->beginBody() ?>

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
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="/index.php?r=admin%2Fassignment%2Fupdate&id=<?= Yii::$app->user->identity['id'] ?>">
                                <i class=" fa fa-suitcase"></i>Profile</a></li>
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
