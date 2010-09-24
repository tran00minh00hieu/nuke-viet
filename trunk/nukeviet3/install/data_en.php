<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 31/05/2010, 00:36
 */

function nv_create_table_news ( $catid )
{
    global $db, $db_config, $lang_data;
    $db->sql_query( "SET SQL_QUOTE_SHOW_CREATE = 1" );
    $result = $db->sql_query( "SHOW CREATE TABLE `" . $db_config['prefix'] . "_" . $lang_data . "_news_rows`" );
    $show = $db->sql_fetchrow( $result );
    $db->sql_freeresult( $result );
    $show = preg_replace( '/(KEY[^\(]+)(\([^\)]+\))[\s\r\n\t]+(USING BTREE)/i', '\\1\\3 \\2', $show[1] );
    $sql = preg_replace( '/(default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP|DEFAULT CHARSET=\w+|COLLATE=\w+|character set \w+|collate \w+|AUTO_INCREMENT=\w+)/i', ' \\1', $show );
    $sql = str_replace( $db_config['prefix'] . "_" . $lang_data . "_news_rows", $db_config['prefix'] . "_" . $lang_data . "_news_" . $catid, $sql );
    $db->sql_query( $sql );
}

$sql_create_table = array();

$sql_create_table[] = "TRUNCATE TABLE `" . $db_config['prefix'] . "_" . $lang_data . "_modfuncs`";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_modfuncs` (`func_id`, `func_name`, `func_custom_name`, `in_module`, `show_func`, `in_submenu`, `subweight`, `layout`, `setting`, `rss`) VALUES
(1, 'main', 'Main', 'about', 1, 0, 1, 'left-body-right', ''),
(2, 'comment', 'Comment', 'news', 0, 0, 0, 'left-body-right', ''),
(3, 'detail', 'Detail', 'news', 1, 0, 4, 'left-body-right', ''),
(4, 'main', 'Main', 'news', 1, 0, 1, 'left-body-right', ''),
(5, 'postcomment', 'Postcomment', 'news', 0, 0, 0, 'left-body-right', ''),
(6, 'print', 'Print', 'news', 0, 0, 0, 'left-body-right', ''),
(7, 'rating', 'Rating', 'news', 0, 0, 0, 'left-body-right', ''),
(8, 'savefile', 'Savefile', 'news', 0, 0, 0, 'left-body-right', ''),
(9, 'search', 'Search', 'news', 1, 0, 5, 'left-body-right', ''),
(10, 'sendmail', 'Sendmail', 'news', 0, 0, 0, 'left-body-right', ''),
(11, 'topic', 'Topic', 'news', 1, 0, 3, 'left-body-right', ''),
(12, 'viewcat', 'Viewcat', 'news', 1, 0, 2, 'left-body-right', ''),
(13, 'down', 'Down', 'download', 1, 0, 4, 'left-body-right', ''),
(14, 'getcomment', 'Getcomment', 'download', 0, 0, 0, 'left-body-right', ''),
(15, 'main', 'Main', 'download', 1, 0, 1, 'left-body-right', ''),
(16, 'report', 'Report', 'download', 1, 0, 6, 'left-body-right', ''),
(17, 'upload', 'Upload', 'download', 1, 0, 5, 'left-body-right', ''),
(20, 'detail', 'Detail', 'weblinks', 1, 0, 3, 'left-body-right', ''),
(21, 'link', 'Link', 'weblinks', 0, 0, 0, 'left-body-right', ''),
(22, 'main', 'Main', 'weblinks', 1, 0, 1, 'left-body-right', ''),
(23, 'reportlink', 'Reportlink', 'weblinks', 0, 0, 0, 'left-body-right', ''),
(24, 'viewcat', 'Viewcat', 'weblinks', 1, 0, 2, 'left-body-right', ''),
(25, 'visitlink', 'Visitlink', 'weblinks', 0, 0, 0, 'left-body-right', ''),
(26, 'active', 'Active', 'users', 1, 0, 7, 'left-body-right', ''),
(27, 'changepass', 'Changepass', 'users', 1, 1, 6, 'left-body-right', ''),
(28, 'editinfo', 'Editinfo', 'users', 1, 0, 8, 'left-body-right', ''),
(29, 'login', 'Login', 'users', 1, 1, 2, 'left-body-right', ''),
(30, 'logout', 'Logout', 'users', 1, 0, 3, 'left-body-right', ''),
(31, 'lostactivelink', 'Lostactivelink', 'users', 1, 0, 9, 'left-body-right', ''),
(32, 'lostpass', 'Lostpass', 'users', 1, 1, 5, 'left-body-right', ''),
(33, 'main', 'Main', 'users', 1, 0, 1, 'left-body-right', ''),
(34, 'register', 'Register', 'users', 1, 1, 4, 'left-body-right', ''),
(35, 'main', 'Main', 'contact', 1, 0, 1, 'left-body-right', ''),
(36, 'allbots', 'Bots', 'statistics', 1, 1, 6, 'left-body', ''),
(37, 'allbrowsers', 'Browsers', 'statistics', 1, 1, 4, 'left-body', ''),
(38, 'allcountries', 'Countries', 'statistics', 1, 1, 3, 'left-body', ''),
(39, 'allos', 'Operating Systems ', 'statistics', 1, 1, 5, 'left-body', ''),
(40, 'allreferers', 'Referer', 'statistics', 1, 1, 2, 'left-body', ''),
(41, 'main', 'Main', 'statistics', 1, 0, 1, 'left-body', ''),
(42, 'referer', 'Referer', 'statistics', 1, 0, 7, 'left-body', ''),
(43, 'main', 'Main', 'voting', 0, 0, 0, 'left-body-right', ''),
(44, 'result', 'Result', 'voting', 0, 0, 0, 'left-body-right', ''),
(45, 'click', 'Click', 'banners', 0, 0, 0, 'left-body-right', ''),
(46, 'main', 'Main', 'banners', 1, 0, 1, 'left-body-right', ''),
(47, 'adv', 'Adv', 'search', 0, 0, 0, 'left-body-right', ''),
(48, 'main', 'Main', 'search', 1, 0, 1, 'left-body-right', ''),
(51, 'openid', 'Openid', 'users', 1, 1, 6, 'left-body-right', ''),
(54, 'main', 'Main', 'rss', 1, 0, 1, 'left-body-right', ''),
(55, 'rss', 'Rss', 'news', 0, 0, 0, '', ''),
(56, 'rss', 'Rss', 'download', 0, 0, 0, '', ''),
(57, 'rss', 'Rss', 'weblinks', 0, 0, 0, '', ''),
(58, 'addads', 'Addads', 'banners', 1, 0, 1, 'left-body-right', ''),
(59, 'cledit', 'Cledit', 'banners', 0, 0, 0, '', ''),
(60, 'clientinfo', 'Clientinfo', 'banners', 1, 0, 2, 'left-body-right', ''),
(61, 'clinfo', 'Clinfo', 'banners', 0, 0, 0, '', ''),
(62, 'logininfo', 'Logininfo', 'banners', 0, 0, 0, '', ''),
(63, 'stats', 'Stats', 'banners', 1, 0, 3, 'left-body-right', ''),
(64, 'viewmap', 'Viewmap', 'banners', 0, 0, 0, '', '')";

$sql_create_table[] = "TRUNCATE TABLE `" . $db_config['prefix'] . "_" . $lang_data . "_blocks`";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_blocks` (`bid`, `groupbl`, `title`, `link`, `type`, `file_path`, `theme`, `template`, `position`, `exp_time`, `active`, `groups_view`, `module`, `all_func`, `func_id`, `weight`) VALUES
(35, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 1, 2),
(36, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 46, 2),
(37, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 35, 2),
(38, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 15, 2),
(41, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 13, 2),
(42, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 17, 2),
(43, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 16, 2),
(44, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 4, 2),
(45, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 12, 2),
(46, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 11, 2),
(47, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 3, 2),
(48, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 9, 2),
(49, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 48, 2),
(50, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 41, 2),
(51, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 40, 2),
(52, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 38, 2),
(53, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 37, 2),
(54, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 39, 2),
(55, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 36, 2),
(56, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 42, 2),
(57, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 33, 2),
(58, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 29, 2),
(59, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 30, 2),
(60, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 34, 2),
(61, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 32, 2),
(62, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 27, 2),
(63, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 26, 2),
(64, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 28, 2),
(65, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 31, 2),
(66, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 22, 2),
(67, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 24, 2),
(68, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'global', 1, 20, 2),
(69, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 1, 1),
(70, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 46, 1),
(71, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 35, 1),
(72, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 15, 1),
(75, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 13, 1),
(76, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 17, 1),
(77, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 16, 1),
(78, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 4, 1),
(79, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 12, 1),
(80, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 11, 1),
(81, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 3, 1),
(82, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 9, 1),
(83, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 48, 1),
(84, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 41, 1),
(85, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 40, 1),
(86, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 38, 1),
(87, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 37, 1),
(88, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 39, 1),
(89, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 36, 1),
(90, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 42, 1),
(91, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 33, 1),
(92, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 29, 1),
(93, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 30, 1),
(94, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 34, 1),
(95, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 32, 1),
(96, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 27, 1),
(97, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 26, 1),
(98, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 28, 1),
(99, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 31, 1),
(100, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 22, 1),
(101, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 24, 1),
(102, 3, 'Login', '', 'file', 'global.login.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 20, 1),
(103, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 1, 2),
(104, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 46, 2),
(105, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 35, 2),
(106, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 15, 2),
(109, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 13, 2),
(110, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 17, 2),
(111, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 16, 2),
(112, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 4, 2),
(113, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 12, 2),
(114, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 11, 2),
(115, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 3, 2),
(116, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 9, 2),
(117, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 48, 2),
(118, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 41, 2),
(119, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 40, 2),
(120, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 38, 2),
(121, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 37, 2),
(122, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 39, 2),
(123, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 36, 2),
(124, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 42, 2),
(125, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 33, 2),
(126, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 29, 2),
(127, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 30, 2),
(128, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 34, 2),
(129, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 32, 2),
(130, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 27, 2),
(131, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 26, 2),
(132, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 28, 2),
(133, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 31, 2),
(134, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 22, 2),
(135, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 24, 2),
(136, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 20, 2),
(137, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 1, 3),
(138, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 46, 3),
(139, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 35, 3),
(140, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 15, 3),
(143, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 13, 3),
(144, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 17, 3),
(145, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 16, 3),
(146, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 4, 3),
(147, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 12, 3),
(148, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 11, 3),
(149, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 3, 3),
(150, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 9, 3),
(151, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 48, 3),
(152, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 41, 3),
(153, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 40, 3),
(154, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 38, 3),
(155, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 37, 3),
(156, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 39, 3),
(157, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 36, 3),
(158, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 42, 3),
(159, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 33, 3),
(160, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 29, 3),
(161, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 30, 3),
(162, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 34, 3),
(163, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 32, 3),
(164, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 27, 3),
(165, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 26, 3),
(166, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 28, 3),
(167, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 31, 3),
(168, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 22, 3),
(169, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 24, 3),
(170, 5, 'Voting', '', 'file', 'global.voting.php', 'default', 'default', '[RIGHT]', 0, '1', '0', 'global', 1, 20, 3),
(171, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 1, 3),
(172, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 46, 3),
(173, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 35, 3),
(174, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 15, 3),
(177, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 13, 3),
(178, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 17, 3),
(179, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 16, 3),
(180, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 4, 3),
(181, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 12, 3),
(182, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 11, 3),
(183, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 3, 3),
(184, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 9, 3),
(185, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 48, 3),
(186, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 41, 3),
(187, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 40, 3),
(188, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 38, 3),
(189, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 37, 3),
(190, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 39, 3),
(191, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 36, 3),
(192, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 42, 3),
(193, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 33, 3),
(194, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 29, 3),
(195, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 30, 3),
(196, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 34, 3),
(197, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 32, 3),
(198, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 27, 3),
(199, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 26, 3),
(200, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 28, 3),
(201, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 31, 3),
(202, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 22, 3),
(203, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 24, 3),
(204, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 20, 3),
(205, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 1, 1),
(206, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 46, 1),
(207, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 35, 1),
(208, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 15, 1),
(211, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 13, 1),
(212, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 17, 1),
(213, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 16, 1),
(214, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 4, 1),
(215, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 12, 1),
(216, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 11, 1),
(217, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 3, 1),
(218, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 9, 1),
(219, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 48, 1),
(220, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 41, 1),
(221, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 40, 1),
(222, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 38, 1),
(223, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 37, 1),
(224, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 39, 1),
(225, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 36, 1),
(226, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 42, 1),
(227, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 33, 1),
(228, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 29, 1),
(229, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 30, 1),
(230, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 34, 1),
(231, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 32, 1),
(232, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 27, 1),
(233, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 26, 1),
(234, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 28, 1),
(235, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 31, 1),
(236, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 22, 1),
(237, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 24, 1),
(238, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 20, 1),
(239, 8, 'Menu', '', 'file', 'module.block_category.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'news', 0, 4, 1),
(240, 8, 'Menu', '', 'file', 'module.block_category.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'news', 0, 12, 1),
(241, 8, 'Menu', '', 'file', 'module.block_category.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'news', 0, 11, 4),
(242, 8, 'Menu', '', 'file', 'module.block_category.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'news', 0, 3, 1),
(243, 8, 'Menu', '', 'file', 'module.block_category.php', 'default', 'default', '[LEFT]', 0, '1', '0', 'news', 0, 9, 1),
(245, 2, 'Statistics', '', 'file', 'global.counter.php', 'default', '', '[LEFT]', 0, '1', '0', 'global', 1, 51, 1),
(247, 3, 'Login', '', 'file', 'global.login.php', 'default', '', '[RIGHT]', 0, '1', '0', 'global', 1, 51, 1),
(249, 4, 'Newsletter', '', 'file', 'global.newsletter.php', 'default', 'orange', '[RIGHT]', 0, '1', '0', 'global', 1, 51, 2),
(251, 5, 'Voting', '', 'file', 'global.voting.php', 'default', '', '[RIGHT]', 0, '1', '0', 'global', 1, 51, 3),
(253, 6, 'Banner block feft', '', 'banner', '2', 'default', 'no_title', '[LEFT]', 0, '1', '0', '', 1, 51, 2),
(255, 7, 'Banner block top', '', 'banner', '1', 'default', 'no_title', '[TOP]', 0, '1', '0', '', 1, 51, 1)
";

$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_news_cat` VALUES
(1, 0, 'Co-operate', 'Co-operate', '', '', '', 2, 5, 0, 'viewcat_page_new', 2, '2,3', 1, 3, '', '', 1277689708, 1277689708, 1303689708, 0, ''), 
(2, 1, 'Careers at NukeViet', 'Careers-at-NukeViet', '', '', '', 1, 6, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690086, 1277690259, 1303690086, 0, ''), 
(3, 1, 'Partners', 'Partners', '', '', '', 2, 7, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690142, 1277690291, 1303690142, 0, ''), 
(4, 0, 'NukeViet news', 'NukeViet-news', '', '', '', 1, 1, 0, 'viewcat_page_new', 3, '5,6,7', 1, 3, '', '', 1277690451, 1277690451, 1303690451, 0, ''), 
(5, 4, 'Security issues', 'Security-issues', '', '', '', 1, 2, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690497, 1277690564, 1303690497, 0, ''), 
(6, 4, 'Release notes', 'Release-notes', '', '', '', 2, 3, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690588, 1277690588, 1303690588, 0, ''), 
(7, 4, 'Development team talk', 'Development-team-talk', '', '', '', 3, 4, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690652, 1277690652, 1303690652, 0, ''), 
(8, 0, 'NukeViet community', 'NukeViet-community', '', '', '', 3, 8, 0, 'viewcat_page_new', 3, '9,10,11', 1, 3, '', '', 1277690748, 1277690748, 1303690748, 0, ''), 
(9, 8, 'Activities', 'Activities', '', '', '', 1, 9, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690765, 1277690765, 1303690765, 0, ''), 
(10, 8, 'Events', 'Events', '', '', '', 2, 10, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690783, 1277690783, 1303690783, 0, ''), 
(11, 8, 'Faces of week &#x3A;D', 'Faces-of-week-D', '', '', '', 3, 11, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690821, 1277690821, 1303690821, 0, ''), 
(12, 0, 'Lastest technologies', 'Lastest-technologies', '', '', '', 4, 12, 0, 'viewcat_page_new', 2, '13,14', 1, 3, '', '', 1277690888, 1277690888, 1303690888, 0, ''), 
(13, 12, 'World wide web', 'World-wide-web', '', '', '', 1, 13, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690934, 1277690934, 1303690934, 0, ''), 
(14, 12, 'Around internet', 'Around-internet', '', '', '', 2, 14, 1, 'viewcat_page_new', 0, '', 1, 3, '', '', 1277690982, 1277690982, 1303690982, 0, '')";

$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_news_rows` VALUES
(1, '1', 0, 8, 'VINADES', 0, 1277689959, 1277690410, 1, 1277689920, 0, 2, 'Invite to co-operate announcement', 'Invite-to-co-operate-announcement', 'Advertisment, provide hosting services for NukeViet CMS development.', '', '', '', 1, '<p> <span style=\"color: black;\"><span style=\"color: black;\"><font size=\"2\"><span style=\"font-family: verdana,sans-serif;\">VIETNAM OPEN SOURCE DEVELOPMENT COMPANY (VINADES.,JSC)<br  /> Head office: 67b/35 Khuong Ha, Khuong Dinh, Thanh Xuan Dist, Hanoi.<br  /> Mobile: (+84)4 8587 2007<br  /> Fax: (+84) 4 3550 0914<br  /> Website: <a f8f55ee40942436149=\"true\" href=\"http://www.vinades.vn/\" target=\"_blank\">www.vinades.vn</a>&nbsp;â€“ <a f8f55ee40942436149=\"true\" href=\"http://www.nukeviet.vn/\" target=\"_blank\">www.nukeviet.vn</a></span></font></span></span></p><div h4f82558737983=\"nukeviet.vn\" style=\"display: inline; cursor: pointer; padding-right: 16px; width: 16px; height: 16px;\"> <span style=\"color: black;\"><span style=\"color: black;\"><font size=\"2\"><span style=\"font-family: verdana,sans-serif;\">&nbsp;</span></font></span></span></div><br  /><p> <span style=\"color: black;\"><span style=\"color: black;\"><font size=\"2\"><span style=\"font-family: verdana,sans-serif;\">Email: <a href=\"mailto:contact@vinades.vn\" target=\"_blank\">contact@vinades.vn</a><br  /> <br  /> <br  /> Dear valued customers and partners,<br  /> <br  /> VINADES.,JSC was founded in order to professionalize NukeViet opensource development and release. We also using NukeViet in our bussiness projects to make it continue developing.<br  /> <br  /> NukeViet is a Content Management System (CMS). 1st general purpose CMS developed by Vietnamese community. It have so many pros. Ex: Biggest community in VietNam, pure Vietnamese, easy to use, easy to develop...<br  /> <br  /> NukeViet 3 is lastest version of NukeViet and it still developing but almost complete with many advantage features.<br  /> <br  /> With respects to invite hosting - domain providers, and all company that pay attension to NukeViet in bussiness co-operate.<br  /> <br  /> Co-operate types:<br  /> <br  /> 1. Website advertisement, banners exchange, links:<br  /> a. Description:<br  /> Website advertising &amp; communication channels.<br  /> On each release version of NukeViet.<br  /> b. Benefits:<br  /> Broadcast to all end users on both side.<br  /> Reduce advertisement cost.<br  /> c. Warranties:<br  /> Place advertisement banner of partners on both side.<br  /> Open sub-forum at NukeViet.VN to support end users who using hosting services providing by partners.<br  /> <br  /> 2. Provide host packet for NukeViet development testing purpose:<br  /> <br  /> a. Description:<br  /> Sign the contract and agreements.<br  /> Partners provide all types of hosting packet for VINADES.,JSC. Each type at least 1 re-sale packet.<br  /> VINADES.,JSC provide an certificate verify host providing by partner compartable with NukeViet.<br  /> b. Benefits:<br  /> Expand market.<br  /> Reduce cost, improve bussiness value.<br  /> c. Warranties:<br  /> Partner provide free hosting packet for VINADES.,JSC to test NukeViet compatibility.<br  /> VINADES.JSC annoucement tested result to community.<br  /> <br  /> 3. Support end users:<br  /> a. Description:<br  /> Co-operate to solve problem of end user.<br  /> Partners send end user requires about NukeViet CMS to VINADES.,JSC. VINADES also send user requires about hosting services to partners.<br  /> b. Benefits:<br  /> Reduce cost, human resources to support end users.<br  /> Support end user more effective.<br  /> c. Warranties:<br  /> Solve end user requires as soon as possible.<br  /> <br  /> 4. Other types:<br  /> Besides, as a publisher of NukeViet CMS, we also place advertisements on software user interface, sample articles in each release version. With thousands of downloaded hits each release version, we believe that it is the most effective advertisement type to webmasters.<br  /> If partners have any ideas about new co-operate types. You are welcome and feel free to send specifics to us. Our slogan is &quot;Co-operate for development&quot;.<br  /> <br  /> We look forward to co-operating with you.<br  /> <br  /> Sincerely,<br  /> <br  /> VINADES.,JSC</span></font></span></span></p>', 1, 1, 2, 1, '0|0', 1, 1, 1, 2, 0, 0, ''), 
(2, '14', 0, 8, 'HungTM', 1, 1277691366, 1277691470, 1, 1277691360, 0, 2, 'What does WWW mean?', 'What-does-WWW-mean', 'WWW stand for World Wide Web', '', '', '', 1, '<p> The World Wide Web, abbreviated as WWW and commonly known as the Web, is a system of interlinked hypertext&nbsp; documents accessed via the Internet. With a web browser, one can view web pages&nbsp; that may contain text, images, videos, and other multimedia&nbsp; and navigate between them by using hyperlinks. Using concepts fr0m earlier hypertext systems, British engineer and computer scientist Sir Tim Berners-Lee, now the Director of the World Wide Web Consortium, wrote a proposal in March 1989 for what would eventually become the World Wide Web. He was later joined by Belgian computer scientist Robert Cailliau while both were working at CERN in Geneva, Switzerland. In 1990, they proposed using &quot;HyperText to link and access information of various kinds as a web of nodes in which the user can browse at will&quot;, and released that web in December.<br  /> <br  /> &quot;The World-Wide Web (W3) was developed to be a pool of human knowledge, which would allow collaborators in remote sites to share their ideas and all aspects of a common project.&quot;. If two projects are independently crea-ted, rather than have a central figure make the changes, the two bodies of information could form into one cohesive piece of work.</p><p> For more detail. See <a href=\"http://en.wikipedia.org/wiki/World_Wide_Web\" target=\"_blank\">Wikipedia</a></p>', 0, 1, 2, 1, '0|0', 1, 1, 1, 0, 0, 0, ''), 
(3, '12', 0, 8, 'HungTM', 2, 1277691851, 1277691851, 1, 1277691851, 0, 2, 'HTML 5 review', 'HTML-5-review', 'If you do not familiar with HTML 5. :). You can read more about this here [http://en.wikipedia.org/wiki/HTML_5] and here [http://dev.w3.org/html5/spec/Overview.html]', '', '', '', 1, '<p> I have to say that my money used to be on <span class=\"caps\">XHTML</span> 2.0 eventually winning the battle for the next great web standard. Either that, or the two titans would continue to battle it out for the forseable future, leading to an increasingly fragmented web.</p><p> But now that the W3C has admitted defeat, and abandoned <span class=\"caps\">XHTML</span> 2.0, thereâ€™s now no getting away fr0m the fact that <span class=\"caps\">HTML</span> 5 is the future. As such, Iâ€™ve now spent some time taking a look at this emerging standard, and hope youâ€™ll endulge my ego by taking a glance over my thoughts on the matter.</p><p> Before I get started though, I have to say that Iâ€™m very impressed by what Iâ€™ve seen. Itâ€™s a good set of standards that are being crea-ted, and I hope that they will gradually be adopted over the next few years.</p><h2> New markup</h2><p> <span class=\"caps\">HTML</span> 5 introduces some new markup elements to encourage better structure within documents. The most important of these is <section>, which is used to define a hierarchy within a document. Sections can be nested to define subsections, and each section can be broken up into <header> and <footer> areas.</footer></header></section></p><p> The important thing about this addition is that it removes the previous dependancy on</p><h1> ,</h1><h2> and related tags to define structure. Within each <section>, the top level heading is always </section></h2><h1> . You can use as many</h1><h1> tags as you like within your content, so long as they are correctly nested within <section> tags. <p> Thereâ€™s a plethora of other new tags, all of which seem pretty useful. The best thing about all of this, however, is that thereâ€™s no reason not to start using them right away. Thereâ€™s a small piece of JavaScript thatâ€™s needed to make Internet Explorer behave, but aside fr0m that itâ€™s all good. More details about this hack are available at <a href=\"http://www.diveintohtml5.org/\">http://www.diveintohtml5.org</a></p> </section></h1><h2> Easier media embedding</h2><p> <span class=\"caps\">HTML</span> 5 defines some new tags that will make it a lot easier to embed video and audio into pages. In the same way that images are embedded using <img  /> tags, so now can video and audio files be embedded using <video tabindex=\"0\"> and <audio>.</audio></video></p><p> I donâ€™t think than anyone is going to complain about these new features. They free us fr0m relying on third-party plugins, such as Adobe Flash, for such simple activities such as playing video.</p><p> Unfortunately, due to some annoying licensing conditions and a lack of support for the open-source Theora codec, actually using these tags at the moment requires that videos are encoded in two different formats. Even then, youâ€™ll still need to still provide an Adobe Flash fallback for Internet Explorer.</p><p> Youâ€™ll need to be pretty devoted to <span class=\"caps\">HTML</span> 5 to use these tags yetâ€¦</p><h2> Relaxed markup rules</h2><p> This is one thorny subject. You know how weâ€™ve all been so good recently with our well-formed <span class=\"caps\">XHTML</span>, quoting those attributes and closing those tags? Now thereâ€™s no need to, apparentlyâ€¦</p><p> On the surface, this seems like a big step backwards into the bad days of tag soup. However, if you dig deeper, the reasoning behind this decision goes something like this:</p><ol> <li> Itâ€™s unnacceptable to crash out an entire <span class=\"caps\">HTML</span> page just because of a simple <span class=\"caps\">XML</span> syntax error.</li> <li> This means that browsers cannot use an <span class=\"caps\">XML</span> parser, and must instead use a HTML-aware fault-tolerant parser.</li> <li> For consistency, all browsers should handle any such â€œsyntax errorsâ€� (such as unquoted attributes and unclosed tags), in the same way.</li> <li> If all browsers are behaving in the same way, then unquoted attributes and unclosed tags are not really syntax errors any more. In fact, by leaving them out of our pages, we can save a few bytes!</li></ol><p> This isnâ€™t to say that you have to throw away those <span class=\"caps\">XHTML</span> coding habits. Itâ€™s still all valid <span class=\"caps\">HTML</span> 5. In fact, if you really want to be strict, you can set a different content-type header to enforce well-formed <span class=\"caps\">XHTML</span>. But for most people, weâ€™ll just carry on coding well-formed <span class=\"caps\">HTML</span> with the odd typo, but no longer have to worry about clients screaming at us when the perfectly-rendered page doesnâ€™t validate.</p><h2> So what now?</h2><p> The <span class=\"caps\">HTML</span> 5 specification is getting pretty close to stable, so itâ€™s now safe to use bits of this new standard in your code. How much you use is entirely a personal choice. However, we should all get used to the new markup over the next few years, because <span class=\"caps\">HTML</span> 5 is assuredly here to stay.</p><p> Myself, Iâ€™ll be switching to the new doctype and using the new markup for document sections in my code. This step involves very little effort and does a good job of showing support for the new specification.</p><p> The new media tags are another matter. Until all platforms support a single video format, itâ€™s simply not sustainable to be transcoding all videos into two filetypes. When this is coupled with having to provide a Flash fallback, it all seems like a pretty poor return on investment.</p><p> These features will no doubt become more useable over the next few years, as newer browser take the place of old. One day, hopefully, weâ€™ll be able write clean, semantic pages without having to worry about backwards-compatibility.</p><p> Part of this progress relies on web developers using these new standards in our pages. By adopting new technology, we show our support for the standards it represents and place pressure on browser vendors to adhere to those standards. Itâ€™s a bit of effort in the short term, but in the long term it will pay dividends.</p>', 0, 1, 2, 1, '0|0', 1, 1, 1, 1, 0, 0, '')";

$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_news_block_cat` (`bid`, `adddefault`, `number`, `title`, `alias`, `image`, `thumbnail`, `description`, `weight`, `keywords`, `add_time`, `edit_time`) VALUES
(1, 0, 4,'Hot News', 'Hot-News', '', '', '', 1, '', 1279963759, 1279963759),
(2, 1, 4, 'Top News', 'Top-News', '', '', '', 2, '', 1279963766, 1279963766)";

$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_news_sources` VALUES
(1, 'Wikipedia', '', '', 1, 1277691366, 1277691366), 
(2, 'http://www.etianen.com/blog/developers/2010/2/html-5-review/', '', '', 2, 1277691851, 1277691851)";

$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_voting` VALUES
(2, 'Do you know about Nukeviet 3?', 1, 1, 0, '0', 1275318563, 0, 1), 
(3, 'What are you interested in open source', 1, 1, 0, '0', 1275318589, 0, 1)";

$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_voting_rows` VALUES
(5, 2, 'A whole new sourcecode for the web.', 0),
(6, 2, 'Open source, free to use.', 0),
(7, 2, 'Use of xHTML, CSS and Ajax support', 0),
(8, 2, 'All the comments on', 0),
(9, 3, 'constantly improved, modified by the whole world.', 0),
(10, 3, 'To use the free of charge.', 0),
(11, 3, 'The freedom to explore, modify at will.', 0),
(12, 3, 'Match to learning and research because the freedom to modify at will.', 0),
(13, 3, 'All comments on', 0)";

$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_" . $lang_data . "_about` (`id`, `title`, `alias`, `bodytext`, `keywords`, `weight`, `admin_id`, `add_time`, `edit_time`, `status`) VALUES
(1, 'Welcome to NukeViet 3.0', 'Welcome-to-NukeViet-3-0', '<p> NukeViet developed by Vietnamese and for Vietnamese. It&#039;s the 1st opensource CMS in Vietnam. Next generation of NukeViet, version 3.0 coding ground up. Support newest web technology, include xHTML, CSS 3, XTemplate, jQuery, AJAX...<br  /> <br  /> NukeViet&#039;s has it own core libraries build in. So, it&#039;s doesn&#039;t depend on other exists frameworks. With basic knowledge of PHP and MySQL, you can easily using NukeViet for your purposes.<br  /> <br  /> NukeViet 3 core is simply but powerful. It support modules can be multiply. We called it abstract modules. It help users automatic crea-te many modules without any line of code fr0m any exists module which support crea-te abstract modules.<br  /> <br  /> NukeViet 3 support automatic setup modules, blocks, themes at Admin Control Panel. It&#039;s also allow you to share your modules by packed it into packets.<br  /> <br  /> NukeViet 3 support multi languages in 2 types. Multi interface languages and multi database langguages. Had features support web master to build new languages. Many advance features still developing. Let use it, distribute it and feel about opensource.<br  /> <br  /> At last, NukeViet 3 is a thanksgiving gift fr0m VINADES., JSC to community for all of your supports. And we hoping we going to be a biggest opensource CMS not only in VietNam, but also in the world. :).<br  /> <br  /> If you had any feedbacks and ideas for NukeViet 3 close beta. Feel free to send email to admin@nukeviet.vn. All are welcome<br  /> <br  /> Best regard.</p>', '', 1, 1, 1277266815, 1277266815, 1), 
(2, 'NukeViet&#039;s versioning schemes', 'NukeViet-039-s-versioning-schemes', '<p> NukeViet using 2 versioning schemes:<br  /> <br  /> I. By numbers (technical purposes):<br  /> Structure for numbers is:<br  /> major.minor.revision<br  /> <br  /> 1.Major: Major up-date. Probably not backwards compatible with older version.<br  /> 2.Minor: Minor change, may introduce new features, but backwards compatibility is mostly retained.<br  /> 3.Revision: Minor bug fixes. Packed for testing or pre-release purposes... Closed beta, open beta, RC, Official release.<br  /> <br  /> II: By names (new version release management)<br  /> Main milestones: Closed beta, Open beta, Release candidate, Official.<br  /> 1. Closed beta: Limited testing.<br  /> ch@racteristics: New features testing. It may not include in official version if doesn&#039;t accord with community. Closed beta&#039;s name can contain unique numbers. Ex: Closed beta 1, closed beta 2,... Features of previous release may not include in it&#039;s next release. Time release is announced by development team. This milestone stop when system haven&#039;t any major changes.<br  /> Purposes: Pre-release version to receive feedbacks and ideas fr0m community. Bug fixes for release version.<br  /> Release to: Programmers, expert users.<br  /> Supports:<br  /> &nbsp;&nbsp;&nbsp; Using: None.<br  /> &nbsp;&nbsp;&nbsp; Testing: Documents, not include manual.<br  /> Upgrade: None.<br  /> <br  /> 2. Open beta: Public testing.<br  /> ch@racteristics: Features testing, contain full features of official version. It&#039;s almost include in official version even if it doesn&#039;t accord with community. This milestone start after closed beta milestone closed and release weekly to fix bugs. Open beta&#039;s name can contain unique numbers. Ex: Open beta 1, open beta 2,... Next release include all features of it&#039;s previous release. Open beta milestone stop when system haven&#039;t any critical issue.<br  /> Purposes: Bug fixed which not detect in closed beta.<br  /> Release to: All users of nukeviet.vn forum.<br  /> Supports:<br  /> &nbsp;&nbsp;&nbsp; Using: Limited. Manual and forum supports.<br  /> &nbsp;&nbsp;&nbsp; Testing: Full.<br  /> Upgrade: None.<br  /> <br  /> 3. Release Candidate:<br  /> ch@racteristics: Most stable version and prepare for official release. Release candidate&#039;s name can contain unique numbers.<br  /> Ex: RC 1, RC 2,... by released number.<br  /> If detect cretical issue in this milestone. Another Release Candidate version can be release sooner than release time announced by development team.<br  /> Purposes: Reduce bugs of using official version.<br  /> Release to: All people.<br  /> Supports: Full.<br  /> Upgrade: Yes.<br  /> <br  /> 4. Official:<br  /> ch@racteristics: 1st stable release of new version. It only using 1 time. Next release using numbers. Release about 2 weeks after Release Candidate milestone stoped.<br  /> Purposes: Stop testing and recommend users using new version.</p>', '', 2, 1, 1277267054, 1277693688, 1)";

$disable_site_content = "For technical reasons Web site temporary not available. we are very sorry for that inconvenience!";

$copyright = "Note: The above article reprinted at the website or other media sources not specify the source http://nukeviet.vn is copyright infringement";

$sql_create_table[] = "UPDATE `" . $db_config['prefix'] . "_config` SET `config_value` =  " . $db->dbescape_string( $disable_site_content ) . " WHERE `module` =  'global' AND `config_name` = 'disable_site_content' AND `lang`='" . $lang_data . "'";
$sql_create_table[] = "UPDATE `" . $db_config['prefix'] . "_config` SET `config_value` =  " . $db->dbescape_string( $copyright ) . " WHERE `module` =  'news' AND `config_name` = 'copyright' AND `lang`='" . $lang_data . "'";

$array_cron_name = array();
$array_cron_name[1] = 'Delete expired online status';
$array_cron_name[2] = 'Automatic backup database';
$array_cron_name[3] = 'Empty temporary files';
$array_cron_name[4] = 'Delete IP log files';
$array_cron_name[5] = 'Delete expired error_log log files';
$array_cron_name[6] = 'Send error logs to admin';
$array_cron_name[7] = 'Delete expired referer';

$result = $db->sql_query( "SELECT `id`, `run_func` FROM `" . $db_config['prefix'] . "_cronjobs` ORDER BY `id` ASC" );
while ( list( $id, $run_func ) = $db->sql_fetchrow( $result ) )
{
    $cron_name = ( isset( $array_cron_name[$id] ) ) ? $array_cron_name[$id] : $run_func;
    $sql_create_table[] = "UPDATE `" . $db_config['prefix'] . "_cronjobs` SET `" . $lang_data . "_cron_name` =  " . $db->dbescape_string( $cron_name ) . " WHERE `id`=" . $id;
}
$db->sql_freeresult();
?>