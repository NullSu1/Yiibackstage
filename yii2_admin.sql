-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2020-09-08 11:11:40
-- 服务器版本： 8.0.18
-- PHP 版本： 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `yii2_admin`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'r0SIpb_Ilduyp77CEm2MsAnGqC75Z_Wm', '$2y$13$YV0C48GrHCOzMx48APyX4OAU5Ow4ZX/GdRwuM3XDCfDtomUX3iaxi', NULL, '123@gmail.com', 10, 1591172467, 1591768365),
(2, 'demo', '-us22suy_9Y8FBJ8X2sp18gHkbTLMw09', '$2y$13$ghrnbNY0HolJUyvFIzbMHuciwUVq6UwuBDQ3ueFQVEvdn3FgaPYzm', NULL, '1234@gmail.com', 10, 1591173599, 1591259842),
(4, 'test', 'lYd2PnT7zg7IRy_QvOz3JKgWuxXHGnaY', '$2y$13$Nh3mhqRl220F1Ff5PurViOHqovVPMxN65CA/DHk6MV06sEspXTdwe', NULL, '123@132.com', 10, 1597199334, 1597199334);

-- --------------------------------------------------------

--
-- 表的结构 `admin_log`
--

DROP TABLE IF EXISTS `admin_log`;
CREATE TABLE IF NOT EXISTS `admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gets` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `posts` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5683 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin_log`
--

INSERT INTO `admin_log` (`id`, `route`, `url`, `user_agent`, `gets`, `posts`, `admin_id`, `admin_email`, `ip`, `created_at`, `updated_at`) VALUES
(27, 'admin/assignment/index', 'http://127.0.0.1/YII2.0RABC/backend/web/index.php?r=admin%2Fassignment%2Findex', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', '{\"r\":\"admin\\/assignment\\/index\"}', '[]', 1, '123@gmail.com', '127.0.0.1', 1591173581, 1591173581),
(28, 'admin/assignment/update', 'http://127.0.0.1/YII2.0RABC/backend/web/index.php?r=admin%2Fassignment%2Fupdate&id=1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', '{\"r\":\"admin\\/assignment\\/update\",\"id\":\"1\"}', '[]', 1, '123@gmail.com', '127.0.0.1', 1591173584, 1591173584),
(29, 'admin/assignment/update', 'http://127.0.0.1/YII2.0RABC/backend/web/index.php?r=admin%2Fassignment%2Fupdate&id=1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', '{\"r\":\"admin\\/assignment\\/update\",\"id\":\"1\"}', '{\"_csrf\":\"U2rgaKi_CXSkCfpDWfrYM4oFPqeUACyG4zMyco_3MD46LLgGzcU-Dut5oCYzw4xs2jBn4ud5WLKbfQA455IJSA==\",\"AdminModel\":{\"username\":\"admin\",\"email\":\"123@gmail.com\",\"password\":\"123123\"}}', 1, '123@gmail.com', '127.0.0.1', 1591173587, 1591173587),
(30, 'admin/assignment/index', 'http://127.0.0.1/YII2.0RABC/backend/web/index.php?r=admin%2Fassignment%2Findex', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', '{\"r\":\"admin\\/assignment\\/index\"}', '[]', 1, '123@gmail.com', '127.0.0.1', 1591173587, 1591173587),
(31, 'admin/assignment/create', 'http://127.0.0.1/YII2.0RABC/backend/web/index.php?r=admin%2Fassignment%2Fcreate', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', '{\"r\":\"admin\\/assignment\\/create\"}', '[]', 1, '123@gmail.com', '127.0.0.1', 1591173589, 1591173589),
(32, 'admin/assignment/create', 'http://127.0.0.1/YII2.0RABC/backend/web/index.php?r=admin%2Fassignment%2Fcreate', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', '{\"r\":\"admin\\/assignment\\/create\"}', '{\"_csrf\":\"S2urB1cYA81_TkB0KkSXpcM9HhVX9FKGASLdduhjnEMiLfNpMmI0tzA-GhFAfcP6kwhHUCSNJrJ5bO88gAalNQ==\",\"AdminModel\":{\"username\":\"demo\",\"email\":\"123@gmail.com\",\"password\":\"123123\"}}', 1, '123@gmail.com', '127.0.0.1', 1591173595, 1591173595),

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(3) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `SEO_title` text NOT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `softdelete` int(11) DEFAULT '1',
  `category` varchar(255) NOT NULL,
  `SEO_url` varchar(255) NOT NULL,
  `TAG` varchar(255) DEFAULT NULL,
  `mate_description` text NOT NULL,
  `user` varchar(12) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT '0',
  `hot_article` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `language`, `article_title`, `SEO_title`, `content`, `created_at`, `updated_at`, `author`, `softdelete`, `category`, `SEO_url`, `TAG`, `mate_description`, `user`, `publish`, `hot_article`) VALUES
(10, 'en', '​Instagram Follow Request', '​Instagram Follow Request', '<section class=\"related-list\">\r\n<h2>Related Readings for <a href=\"#\" title=\"123\" data-id=\"\">Reference</a></h2><a href=\"/blog/#\" class=\"\"> link text </a></section><p><a href=\"#\" title=\"123\" data-id=\"\"><span id=\"123\">111222333132<br></span></a>\r\n</p><span id=\"123\">kkk</span><iframe src=\"https://www.youtube.com/embed/1qgqFL3wj28\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" width=\"560\" height=\"315\" frameborder=\"0\"></iframe><span id=\"123\"><p>123</p><p><br></p><iframe src=\"https://www.youtube.com/embed/9QJiohZ36cg\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" width=\"560\" height=\"315\" frameborder=\"0\"></iframe></span><span id=\"123\"></span><span id=\"123\"></span><span id=\"123\"></span><span id=\"123\"></span><span id=\"123\"></span><span id=\"123\"></span><span id=\"123\"></span><span id=\"123\"></span><br>', '2020-06-05 13:40:35', '2020-09-01 18:49:48', 'admin', 1, 'Update Category ', '123', 'qwe', 'qweqweqwe', '', 0, 0),
(34, 'en', '​Instagram Follow Request', '123', '<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table><p><br></p>', '2020-08-12 10:40:35', '2020-08-27 18:46:57', 'test', 1, 'Update Category ', '123', '', '', NULL, 1, 1),
(30, 'en', 'Best Way to Get Organic Instagram followers 100% Working', 'Best Way to Get Organic Instagram followers', '<p><strong></strong><br>\r\n</p><section data-v-57ce008d=\"\" class=\"related-list\">\r\n<h2 data-v-57ce008d=\"\">Title Name</h2><a data-v-57ce008d=\"\" href=\"/blog/#\" class=\"\" title=\"\" textvalue=\"your Instagram business.\">your Instagram business.</a><br><a data-v-57ce008d=\"\" href=\"http://192.168.6.146/blog/#\" class=\"\" title=\"\">your Instagram business.</a><br><a data-v-57ce008d=\"\" href=\"http://192.168.6.146/blog/#\" class=\"\" title=\"\">your Instagram business.</a><span class=\"redactor-invisible-space\"><br></span><span class=\"redactor-invisible-space\"><br></span><a data-v-57ce008d=\"\" href=\"/blog/#\" class=\"\" title=\"\" textvalue=\"your Instagram business.\"></a></section><section class=\"related-list\">\r\n<h2>Related Readings for Reference</h2><a href=\"/blog/#\" class=\"\"> link text</a><br><a href=\"http://backend/blog/#\" class=\"\">link text </a><br><a href=\"http://backend/blog/#\" class=\"\">link text </a><span class=\"redactor-invisible-space\"><br><a href=\"http://backend/blog/#\" class=\"\">link text </a><span class=\"redactor-invisible-space\"><br><a href=\"http://backend/blog/#\" class=\"\">link text </a><span class=\"redactor-invisible-space\"><br><a href=\"http://backend/blog/#\" class=\"\">link text </a><span class=\"redactor-invisible-space\"><br></span></span></span></span><a href=\"/blog/#\" class=\"\"></a></section><p>your Instagram business.<br>\r\n</p>', '2020-08-07 14:40:15', '2020-08-12 15:08:32', 'admin', 1, 'Instagram followers', 'get-organic-instagram-likes', 'followers', ' Instagram has been starting to clear likes, followers, comments from unreal people. This makes', NULL, 0, 0),
(31, 'en', 'Redmi K30 Pro 5G', 'Get First 1000 Followers', '<section class=\"download-type-1\"> <h2>GetInsta - Get Free Instagram Followers &amp; Likes</h2> <ul><li>Free high-quality Instagram followers &amp; likes from 100% real person.</li><li>Getting followers and also get the same amount of additional free likes.</li><li>Instant delivery guaranteed and 24/7 customer support.</li></ul> <section class=\"btn-container\"> <a class=\"btn-windows\" download=\"\" href=\"https://www.easygetinsta.com/downloadpc\"> <button class=\"btn-download-green icon-windows\"> <section class=\"icon\"> <q></q> <g></g> </section> <section class=\"text\">Free Download</section></button></a> <a class=\"btn-android\" download=\"\" href=\"https://www.easygetinsta.com/downloadcenter\"> <button class=\"btn-download-green icon-android\"> <section class=\"icon\"> <q></q> <g></g> </section> <section class=\"text\">Free Download</section></button> </a> <a class=\"btn-ios\" href=\"https://apps.apple.com/app/app-store/id1498558125\"> <button class=\"btn-download-green icon-ios\"> <section class=\"icon\"> <q></q> <g></g> </section> <section class=\"text\">Free Download</section></button> </a> <a class=\"btn-buy\" href=\"https://www.easygetinsta.com/buy-instagram-followers\"> <button class=\"buy\">Buy Now</button></a> </section> </section> <section style=\"height: 60px;\"></section><p><br><br></p>', '2020-08-07 14:43:17', '2020-08-12 15:12:05', 'admin', 1, 'Update Category ', 'Get First 1000 Followers', '', '', NULL, 0, 0),
(28, 'en', 'Get First 1000 Followers', 'Get First 1000 Followers in 2020', '<p>Getting the first 1000<strong> followers on Instagram</strong> can be challenging. People prefer to follow the Instagram accounts who have a lot of followers and pay no attention to the ones who have fewer followers. If you are new to Instagram, you should learn how to get your first 1000 followers on Instagram. In this post, we will show you the traditional and quick method to help you get the first 1000 followers on Instagram for free.</p><section class=\"download-type-2\"><hr><section class=\"btn-container\"><a class=\"btn-windows\" download=\"\" href=\"https://www.easygetinsta.com/downloadpc\"><button class=\"btn-download-green icon-windows\"><section class=\"icon\"><q></q><g></g></section><section class=\"text\">Free Download</section></button></a><a class=\"btn-android\" download=\"\" href=\"https://www.easygetinsta.com/downloadcenter\"><button class=\"btn-download-green icon-android\"><section class=\"icon\"><q></q><g></g></section><section class=\"text\">Free Download</section></button></a><a class=\"btn-ios\" href=\"https://apps.apple.com/app/app-store/id1498558125\"><button class=\"btn-download-green icon-ios\"><section class=\"icon\"><q></q><g></g></section><section class=\"text\">Free Download</section></button></a><a class=\"btn-buy\" href=\"https://www.easygetinsta.com/buy-instagram-followers\"><button class=\"buy\">Buy Now</button></a></section><p class=\"note\">100% safe &amp; clean</p><hr></section><section style=\"height: 60px;\"><br></section><section class=\"download-type-1\"> <h2>GetInsta - Get Free Instagram Followers &amp; Likes</h2> <ul><li>Free high-quality Instagram followers &amp; likes from 100% real person.</li><li>Getting followers and also get the same amount of additional free likes.</li><li>Instant delivery guaranteed and 24/7 customer support.</li></ul> <section class=\"btn-container\"> <a class=\"btn-windows\" download=\"\" href=\"https://www.easygetinsta.com/downloadpc\"> <button class=\"btn-download-green icon-windows\"> <section class=\"icon\"> <q></q> <g></g> </section> <section class=\"text\">Free Download</section></button></a> <a class=\"btn-android\" download=\"\" href=\"https://www.easygetinsta.com/downloadcenter\"> <button class=\"btn-download-green icon-android\"> <section class=\"icon\"> <q></q> <g></g> </section> <section class=\"text\">Free Download</section></button> </a> <a class=\"btn-ios\" href=\"https://apps.apple.com/app/app-store/id1498558125\"> <button class=\"btn-download-green icon-ios\"> <section class=\"icon\"> <q></q> <g></g> </section> <section class=\"text\">Free Download</section></button> </a> <a class=\"btn-buy\" href=\"https://www.easygetinsta.com/buy-instagram-followers\"> <button class=\"buy\">Buy Now</button></a> </section> </section><section style=\"height: 60px;\"><br></section><ol>\r\n	<li>Part 1: How to Get First 1000 Followers on Instagram with 6 Traditional Methods</li>\r\n	<li>Part 1: How to Get First 1000 Followers on Instagram with 6 Traditional Methods</li>\r\n	<li>Part 1: How to Get First 1000 Followers on Instagram with 6 Traditional Methods</li><li>&gt;&gt;also <a href=\"https://www.easygetinsta.com/\">read&gt;&gt;&gt;</a></li><li></li><li></li></ol><br><section class=\"related-list\">   <h2>Related Readings for Reference</h2>   <a href=\"/blog/#\" class=\"\"> link text 1</a><br>   <a href=\"/blog/#\" class=\"\"> link text 2</a><br>   <a href=\"/blog/#\" class=\"\"> link text 3</a><br>   <a href=\"/blog/#\" class=\"\"> link text 4</a><br></section>', '2020-08-04 13:31:38', '2020-08-18 18:36:16', 'admin', 1, 'Update Category ', 'get-first-1000-followers', '', 'Getting the first 1000 followers on Instagram can be challenging.', NULL, 1, 1),
(29, 'en', 'Redmi K30 Pro 5G', 'Redmi K30 Pro 5G', '<section data-v-7e641664=\"\" class=\"download\"><section data-v-7e641664=\"\" class=\"download__left\"><h3 data-v-7e641664=\"\">GetInsta - Ultimate Tool to Get Free Instagram Followers &amp; Likes</h3><ul data-v-7e641664=\"\"><li data-v-7e641664=\"\">Get followers and likes from 1 00% real and activated Instagram users.</li><li data-v-7e641664=\"\">Organically increasing of followers or likes day by day.</li><li data-v-7e641664=\"\">Unlimited free and 100% safe. No payment. No password. No survey.</li></ul></section><section data-v-7e641664=\"\" class=\"download__right\"><p data-v-7e641664=\"\" class=\"star\"><q data-v-7e641664=\"\"></q><q data-v-7e641664=\"\"></q><q data-v-7e641664=\"\"></q><q data-v-7e641664=\"\"></q><q data-v-7e641664=\"\"></q></p><section data-v-7e641664=\"\" class=\"btn-container\"><a data-v-7e641664=\"\" download=\"\" href=\"https://www.easygetinsta.com/downloadpc\" onclick=\"ga(\'send\',\'event\',\'insdl\',\'download\',\'blogwindl2-240\')\" class=\"btn-windows\"><button data-v-bda4fb4c=\"\" data-v-7e641664=\"\" style=\"border-radius: 64px;\"><span data-v-bda4fb4c=\"\">Free Download</span></button></a><a data-v-7e641664=\"\" download=\"\" href=\"https://www.easygetinsta.com/downloadcenter\" onclick=\"ga(\'send\',\'event\',\'insdl\',\'download\',\'blogappdl2-240\')\" class=\"btn-android\"><button data-v-bda4fb4c=\"\" data-v-7e641664=\"\" style=\"border-radius: 64px;\"><span data-v-bda4fb4c=\"\">Free Download</span></button></a><a data-v-7e641664=\"\" href=\"https://apps.apple.com/us/app/getinsta-find-your-hot-posts/id1498558125\" onclick=\"ga(\'send\',\'event\',\'insdl\',\'download\',\'blogiosdl2-240\')\" class=\"btn-ios\"><button data-v-bda4fb4c=\"\" data-v-7e641664=\"\" style=\"border-radius: 64px;\"><span data-v-bda4fb4c=\"\">Free Download</span></button></a></section><p data-v-7e641664=\"\" class=\"note\">100% safe &amp; clean</p></section></section><p><br><br></p>', '2020-08-07 14:29:52', '2020-08-12 10:21:59', 'admin', 1, 'Update Category ', 'Redmi K30 Pro 5G', '', '', NULL, 0, 0),
(32, 'en', '345', '123', '<section class=\"title_list_box\">title list</section>\r\n<p><br><br>\r\n</p>\r\n<h2 class=\"title-list\"></h2>\r\n<h2 class=\"title-list\">Part 1</h2>\r\n<p>aaaaaaaaaaaa<br>\r\n</p>\r\n<h2 class=\"title-list\">Part 2</h2>bbbbbbbbbbbbbb\r\n<p><br>\r\n</p>\r\n<h2 class=\"title-list\">Part 3</h2>cccccccccccccccc\r\n<p><br><br>\r\n</p>', '2020-08-11 10:28:03', '2020-08-12 15:11:53', 'admin', 1, 'Instagram followers', '', '', '', NULL, 1, 0),
(33, 'en', 'Best Instagram Followers Gainer App', 'How to get free (and real) Instagram followers in 2020', '<p>Instagram quickly outgrew its first impression as a fun app for kids and has become a serious content marketing, selling, networking and audience building tool for individuals and brands. It\'s one of the most popular social networking sites on the planet, with over 200 million active monthly members sharing 60 million images and 1.6 billion likes per day.<br>\r\n</p><section class=\"title_list_box\">title list</section><p><br>\r\n</p><h2 class=\"title-list\">1. Cross-promote your dedicated hashtag. <br></h2><p>That\'s nice that you created a #joesgarage hashtag for your company, but who knows to use it to share content about you? Make sure it\'s in your profile, but take the game offline and have it printed on your receipts, in print ads, on signage in your store and at relevant events.<br>\r\n</p><h2 class=\"title-list\">2.  Get creative with hashtagging.</h2><p>When it comes to Instagram caption ideas, you need to look beyond the one-word, obvious hashtags. Sure, you want to use those, too, but mix it up and use hashtags to tell part of your story. Be funny, ironic, or outrageous--just don\'t be BORING. Collaborative workspace company WeWork is great at this, and they include a fun mix of Instagram content, too.\r\n</p><p style=\"text-align: center;\"><img src=\"http://192.168.6.146/Backstage/backend/web/upload/image/20200811/e7e6b7cd53-111.png\" style=\"\">\r\n</p><h2 class=\"title-list\">3. Participate in massively popular conversations</h2><p>For every post, use a mix of topically relevant hashtags such as #woodworking for a carpentry company, for example, as well as trending, super-popular hashtags wherever you can.<br>\r\n</p><section class=\"related-list\"><br><p><br></p>\r\n<section class=\"related-list\">\r\n<h2>Related Readings for Reference</h2><a href=\"/blog/#\" class=\"\"> link text </a></section><br><br><a href=\"/blog/#\" class=\"\"> </a></section><p><br><br>\r\n</p>', '2020-08-11 15:53:41', '2020-08-11 17:06:29', 'admin', 1, 'Instagram followers', '', '', 'How to Get 300 Real, Targeted Instagram Followers Per Day', NULL, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1457092343),
('Editor', '4', 1597199848),
('修改用户', '2', 1591173624),
('图片上传', '1', 1592809902),
('图片上传', '2', 1594881929),
('文章管理', '2', 1591672922),
('新增用户', '2', 1591259900),
('用户管理', '2', 1591609887);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1594881774, 1594881774),
('/admin/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/article/*', 2, NULL, NULL, NULL, 1591178626, 1591178626),
('/admin/article/assign', 2, NULL, NULL, NULL, 1591339389, 1591339389),
('/admin/article/create', 2, NULL, NULL, NULL, 1591178632, 1591178632),
('/admin/article/delete', 2, NULL, NULL, NULL, 1591178629, 1591178629),
('/admin/article/index', 2, NULL, NULL, NULL, 1591175862, 1591175862),
('/admin/article/recycle', 2, NULL, NULL, NULL, 1591766621, 1591766621),
('/admin/article/retrieve', 2, NULL, NULL, NULL, 1591766619, 1591766619),
('/admin/article/softdelete', 2, NULL, NULL, NULL, 1591766615, 1591766615),
('/admin/article/update', 2, NULL, NULL, NULL, 1591178630, 1591178630),
('/admin/article/upload', 2, NULL, NULL, NULL, 1591339388, 1591339388),
('/admin/article/view', 2, NULL, NULL, NULL, 1591178633, 1591178633),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/assignment/create', 2, NULL, NULL, NULL, 1457521995, 1457521995),
('/admin/assignment/delete', 2, NULL, NULL, NULL, 1458010804, 1458010804),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/assignment/search', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/assignment/update', 2, NULL, NULL, NULL, 1458010804, 1458010804),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/category/create', 2, NULL, NULL, NULL, 1457331368, 1457331368),
('/admin/category/delete', 2, NULL, NULL, NULL, 1457331368, 1457331368),
('/admin/category/index', 2, NULL, NULL, NULL, 1457331368, 1457331368),
('/admin/category/update', 2, NULL, NULL, NULL, 1457331368, 1457331368),
('/admin/category/view', 2, NULL, NULL, NULL, 1457331368, 1457331368),
('/admin/default/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/default/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/log/*', 2, NULL, NULL, NULL, 1468288689, 1468288689),
('/admin/log/index', 2, NULL, NULL, NULL, 1468288689, 1468288689),
('/admin/log/view', 2, NULL, NULL, NULL, 1468288689, 1468288689),
('/admin/menu/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/menu/create', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/menu/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/menu/update', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/menu/view', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/permission/*', 2, NULL, NULL, NULL, 1457948575, 1457948575),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/permission/create', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/permission/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/permission/search', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/permission/update', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/permission/view', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/role/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/role/assign', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/role/create', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/role/delete', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/role/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/role/search', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/role/update', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/role/view', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/route/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/route/assign', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/route/create', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/route/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1457947924, 1457947924),
('/admin/route/search', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/rule/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/rule/create', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/rule/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/rule/update', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/admin/rule/view', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/debug/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/debug/default/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/debug/default/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/debug/default/view', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/debug/user/*', 2, NULL, NULL, NULL, 1594881772, 1594881772),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1594881768, 1594881768),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1594881770, 1594881770),
('/gii/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/gii/default/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/gii/default/action', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/gii/default/diff', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/gii/default/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/gii/default/preview', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/gii/default/view', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/redactor/*', 2, NULL, NULL, NULL, 1592810534, 1592810534),
('/site/*', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/site/error', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/site/index', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/site/login', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('/site/logout', 2, NULL, NULL, NULL, 1457330826, 1457330826),
('Admin', 1, 'Administrators', NULL, NULL, 1457084487, 1457947508),
('Editor', 1, 'Editor', NULL, NULL, 1457331368, 1457331368),
('修改用户', 2, NULL, NULL, NULL, 1457522051, 1457522051),
('修改菜单', 2, NULL, NULL, NULL, 1457330464, 1457405433),
('删除文章', 2, NULL, NULL, NULL, 1591178632, 1591178632),
('删除权限', 2, NULL, NULL, NULL, 1457331320, 1457331320),
('删除菜单', 2, NULL, NULL, NULL, 1457330485, 1457330485),
('删除规则', 2, NULL, NULL, NULL, 1457331677, 1457331677),
('删除角色', 2, NULL, NULL, NULL, 1457331161, 1457331161),
('删除路由', 2, NULL, NULL, NULL, 1457331499, 1457331499),
('回收站', 2, NULL, NULL, NULL, 1457333742, 1457331368),
('图片上传', 2, NULL, NULL, NULL, 1457331368, 1457331368),
('操作日志', 2, NULL, NULL, NULL, 1468288713, 1468288713),
('文章管理', 2, NULL, NULL, NULL, 1591178626, 1591178626),
('新增权限', 2, NULL, NULL, NULL, 1457331279, 1457331279),
('新增用户', 2, NULL, NULL, NULL, 1457433802, 1457433802),
('新增菜单', 2, NULL, NULL, NULL, 1457330445, 1457330445),
('新增规则', 2, NULL, NULL, NULL, 1457331552, 1457331610),
('新增角色', 2, NULL, NULL, NULL, 1457331075, 1457331075),
('新增路由', 2, NULL, NULL, NULL, 1457331386, 1457331386),
('更新权限', 2, NULL, NULL, NULL, 1457331303, 1457331303),
('更新规则', 2, NULL, NULL, NULL, 1457331647, 1457331647),
('更新角色', 2, NULL, NULL, NULL, 1457331126, 1457331126),
('更新路由', 2, NULL, NULL, NULL, 1457331492, 1457331492),
('权限分配', 2, NULL, NULL, NULL, 1457418746, 1457418746),
('权限管理', 2, NULL, NULL, NULL, 1457331258, 1457331258),
('查看操作日志', 2, NULL, NULL, NULL, 1468294314, 1468294314),
('查看权限', 2, NULL, NULL, NULL, 1457331342, 1457331342),
('查看用户权限', 2, NULL, NULL, NULL, 1457331965, 1457331965),
('查看菜单', 2, NULL, NULL, NULL, 1457330619, 1457330619),
('查看规则', 2, NULL, NULL, NULL, 1457331692, 1457331692),
('查看角色', 2, NULL, NULL, NULL, 1457331191, 1457331191),
('用户权限分配', 2, NULL, NULL, NULL, 1457333258, 1457333258),
('用户管理', 2, NULL, NULL, NULL, 1457079781, 1457331877),
('菜单管理', 2, NULL, NULL, NULL, 1457324314, 1457324314),
('规则管理', 2, NULL, NULL, NULL, 1457331529, 1457331529),
('角色权限分配', 2, NULL, NULL, NULL, 1457333688, 1457333688),
('角色管理', 2, NULL, NULL, NULL, 1457330790, 1457330790),
('路由分配', 2, NULL, NULL, NULL, 1457333742, 1457333742),
('路由管理', 2, NULL, NULL, NULL, 1457331368, 1457331368);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('文章管理', '/admin/article/*'),
('文章管理', '/admin/article/assign'),
('文章管理', '/admin/article/create'),
('删除文章', '/admin/article/delete'),
('文章管理', '/admin/article/delete'),
('文章管理', '/admin/article/index'),
('Admin', '/admin/article/update'),
('文章管理', '/admin/article/update'),
('文章管理', '/admin/article/upload'),
('用户权限分配', '/admin/assignment/assign'),
('新增用户', '/admin/assignment/create'),
('Admin', '/admin/assignment/delete'),
('用户管理', '/admin/assignment/index'),
('查看用户权限', '/admin/assignment/search'),
('修改用户', '/admin/assignment/update'),
('查看用户权限', '/admin/assignment/view'),
('Admin', '/admin/category/create'),
('Editor', '/admin/category/create'),
('Admin', '/admin/category/delete'),
('Editor', '/admin/category/delete'),
('Admin', '/admin/category/index'),
('Editor', '/admin/category/index'),
('Admin', '/admin/category/update'),
('Editor', '/admin/category/update'),
('Admin', '/admin/category/view'),
('Editor', '/admin/category/view'),
('操作日志', '/admin/log/index'),
('查看操作日志', '/admin/log/view'),
('新增菜单', '/admin/menu/create'),
('删除菜单', '/admin/menu/delete'),
('菜单管理', '/admin/menu/index'),
('修改菜单', '/admin/menu/update'),
('查看菜单', '/admin/menu/view'),
('权限分配', '/admin/permission/assign'),
('新增权限', '/admin/permission/create'),
('删除权限', '/admin/permission/delete'),
('权限管理', '/admin/permission/index'),
('查看权限', '/admin/permission/search'),
('更新权限', '/admin/permission/update'),
('查看权限', '/admin/permission/view'),
('角色权限分配', '/admin/role/assign'),
('新增角色', '/admin/role/create'),
('删除角色', '/admin/role/delete'),
('角色管理', '/admin/role/index'),
('查看角色', '/admin/role/search'),
('更新角色', '/admin/role/update'),
('查看角色', '/admin/role/view'),
('路由分配', '/admin/route/assign'),
('新增路由', '/admin/route/create'),
('查看规则', '/admin/route/index'),
('路由管理', '/admin/route/index'),
('查看规则', '/admin/route/search'),
('新增规则', '/admin/rule/create'),
('删除规则', '/admin/rule/delete'),
('规则管理', '/admin/rule/index'),
('更新规则', '/admin/rule/update'),
('Admin', '/gii/*'),
('图片上传', '/redactor/*'),
('Admin', '修改用户'),
('Editor', '修改用户'),
('Admin', '修改菜单'),
('Editor', '修改菜单'),
('Admin', '删除文章'),
('Editor', '删除文章'),
('Admin', '删除权限'),
('Admin', '删除菜单'),
('Admin', '删除规则'),
('Admin', '删除角色'),
('Admin', '删除路由'),
('Admin', '回收站'),
('Editor', '回收站'),
('Admin', '图片上传'),
('Editor', '图片上传'),
('Admin', '文章管理'),
('Editor', '文章管理'),
('Admin', '新增权限'),
('Admin', '新增用户'),
('Admin', '新增菜单'),
('Admin', '新增规则'),
('Admin', '新增角色'),
('Admin', '新增路由'),
('Admin', '更新权限'),
('Admin', '更新规则'),
('Admin', '更新角色'),
('Admin', '更新路由'),
('Admin', '权限分配'),
('Admin', '权限管理'),
('Admin', '查看操作日志'),
('Admin', '查看权限'),
('Admin', '查看用户权限'),
('Admin', '查看菜单'),
('Admin', '查看规则'),
('Admin', '查看角色'),
('Admin', '用户权限分配'),
('Admin', '用户管理'),
('Admin', '规则管理'),
('Admin', '角色权限分配'),
('Admin', '角色管理'),
('Admin', '路由分配');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(255) DEFAULT NULL,
  `language` varchar(3) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `sortname`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Update Category ', 'en', '2020-08-04 16:36:29', '2020-08-07 10:05:30'),
(7, 'Instagram followers', 'en', '2020-08-07 14:34:27', '2020-08-07 14:35:12'),
(8, '234234', 'en', '2020-08-07 15:49:38', '2020-08-07 15:49:38');

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, '系统管理', NULL, NULL, NULL, NULL),
(2, '用户管理', 1, '/admin/assignment/index', 0, NULL),
(3, '权限管理', 1, '/admin/permission/index', NULL, NULL),
(4, '角色管理', 1, '/admin/role/index', NULL, NULL),
(5, '路由管理', 1, '/admin/route/index', NULL, NULL),
(6, '规则管理', 1, '/admin/rule/index', NULL, NULL),
(7, '文章管理', 1, '', 100, NULL),
(8, '操作日志', 1, '/admin/log/index', NULL, NULL),
(9, '菜单管理', 1, '/admin/menu/index', NULL, NULL),
(10, 'blog list', 7, '/admin/article/index', NULL, NULL),
(11, 'create category', 7, '/admin/category/index', NULL, NULL),
(12, 'blog recycle', 7, '/admin/article/recycle', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1591172448),
('m140506_102106_rbac_init', 1591172456),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1591172456),
('m160608_050000_create_admin', 1591172467),
('m160712_034501_create_admin_log', 1591172467),
('m160712_111327_create_menu_table', 1591172467);

--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
