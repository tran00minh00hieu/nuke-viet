<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES., JSC. All rights reserved
 * @Createdate 3-6-2010 0:14
 */
if ( ! defined( 'NV_IS_MOD_NEWS' ) ) die( 'Stop!!!' );

$contents = "";
$publtime = 0;
$func_who_view = $global_array_cat[$catid]['who_view'];
$allowed = false;
if ( $func_who_view == 0 )
{
    $allowed = true;
}
if ( $func_who_view == 1 and defined( 'NV_IS_USER' ) )
{
    $allowed = true;
}
elseif ( $func_who_view == 2 and defined( 'NV_IS_MODADMIN' ) )
{
    $allowed = true;
}
elseif ( $func_who_view == 3 and defined( 'NV_IS_USER' ) and nv_is_in_groups( $user_info['in_groups'], $global_array_cat[$catid]['groups_view'] ) )
{
    $allowed = true;
}

if ( $allowed )
{
    $query = $db->sql_query( "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_" . $catid . "` WHERE `id` = " . $id . "" );
    $news_contents = $db->sql_fetchrow( $query );
    if ( $news_contents['id'] > 0 )
    {
        if ( defined( 'NV_IS_MODADMIN' ) or ( $news_contents['status'] == 1 and $news_contents['publtime'] < NV_CURRENTTIME and ( $news_contents['exptime'] == 0 or $news_contents['exptime'] > NV_CURRENTTIME ) ) )
        {
            $time_set = $nv_Request->get_int( $module_name . '_' . $op . '_' . $id, 'session' );
            if ( empty( $time_set ) )
            {
                $nv_Request->set_Session( $module_name . '_' . $op . '_' . $id, NV_CURRENTTIME );
                $query = "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_rows` SET hitstotal=hitstotal+1 WHERE `id`=" . $id;
                $db->sql_query( $query );
            }
            $news_contents['showhometext'] = $module_config[$module_name]['showhometext'];
            $news_contents['homeimgalt'] = ( empty( $news_contents['homeimgalt'] ) ) ? $news_contents['title'] : $news_contents['homeimgalt'];
            if ( ! empty( $news_contents['homeimgfile'] ) and file_exists( NV_UPLOADS_REAL_DIR . '/' . $module_name . '/' . $news_contents['homeimgfile'] ) )
            {
                $src = $alt = $note = "";
                $width = 0;
                $height = 0;
                $array_img = explode( "|", $news_contents['homeimgthumb'] );
                $news_contents['homeimgthumb'] = $array_img[0];
                if ( $news_contents['imgposition'] == 1 )
                {
                    if ( file_exists( NV_UPLOADS_REAL_DIR . '/' . $module_name . '/' . $array_img[0] ) )
                    {
                        $size = @getimagesize( NV_UPLOADS_REAL_DIR . '/' . $module_name . '/' . $array_img[0] );
                        if ( $size[0] > 0 )
                        {
                            $homewidth = $module_config[$module_name]['homewidth'];
                            if ( $size[0] > $homewidth )
                            {
                                $size[1] = round( ( $homewidth / $size[0] ) * $size[1] );
                                $size[0] = $homewidth;
                            }
                            $width = $size[0];
                            $height = $size[1];
                            $alt = $news_contents['homeimgalt'];
                            $note = $news_contents['homeimgalt'];
                            $src = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $array_img[0];
                        }
                    }
                }
                elseif ( $news_contents['imgposition'] == 2 )
                {
                    $size = @getimagesize( NV_UPLOADS_REAL_DIR . '/' . $module_name . '/' . $news_contents['homeimgfile'] );
                    if ( $size[0] > 0 )
                    {
                        $imagefull = $module_config[$module_name]['imagefull'];
                        if ( $size[0] > $imagefull )
                        {
                            $size[1] = round( ( $imagefull / $size[0] ) * $size[1] );
                            $size[0] = $imagefull;
                        }
                        $width = $size[0];
                        $height = $size[1];
                        $alt = $news_contents['homeimgalt'];
                        $note = $news_contents['homeimgalt'];
                        $src = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $news_contents['homeimgfile'];
                    }
                }
                $news_contents['image'] = array( 
                    "width" => $width, "height" => $height, "alt" => $alt, "note" => $note, "src" => $src, "position" => $news_contents['imgposition'] 
                );
            }
            if ( $alias_url == $news_contents['alias'] )
            {
                $publtime = intval( $news_contents['publtime'] );
            }
        }
    }
    
    if ( $publtime == 0 )
    {
        header( "Location: " . $global_config['site_url'] );
        exit();
    }
    
    $news_contents['url_sendmail'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=sendmail/" . $global_array_cat[$catid]['alias'] . "/" . $news_contents['alias'] . "-" . $news_contents['id'] . "";
    $news_contents['url_print'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=print/" . $global_array_cat[$catid]['alias'] . "/" . $news_contents['alias'] . "-" . $news_contents['id'] . "";
    $news_contents['url_savefile'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=savefile/" . $global_array_cat[$catid]['alias'] . "/" . $news_contents['alias'] . "-" . $news_contents['id'] . "";
    
    $sql = "SELECT `title` FROM `" . NV_PREFIXLANG . "_" . $module_data . "_sources` WHERE `sourceid` = '" . $news_contents['sourceid'] . "'";
    $result = $db->sql_query( $sql );
    
    list( $sourcetext ) = $db->sql_fetchrow( $result );
    unset( $sql, $result );
    
    $news_contents['newscheckss'] = md5( $news_contents['id'] . session_id() . $global_config['sitekey'] );
    $news_contents['source'] = $sourcetext;
    $news_contents['publtime'] = nv_date( "l - d/m/Y  H:i", $news_contents['publtime'] );
    
    $related_new_array = array();
    $related_new = $db->sql_query( "SELECT `id`, `title`, `alias`,`publtime` FROM `" . NV_PREFIXLANG . "_" . $module_data . "_" . $catid . "` WHERE `status`=1 AND `publtime` > " . $publtime . " AND `publtime` < " . NV_CURRENTTIME . " AND (`exptime`=0 OR `exptime`>" . NV_CURRENTTIME . ") ORDER BY `id` ASC LIMIT 0, " . $st_links . "" );
    while ( $row = $db->sql_fetchrow( $related_new ) )
    {
        $link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $global_array_cat[$catid]['alias'] . "/" . $row['alias'] . "-" . $row['id'] . "";
        $related_new_array[] = array( 
            "title" => $row['title'], "time" => nv_date( "d/m/Y", $row['publtime'] ), "link" => $link 
        );
    }
    sort( $related_new_array, SORT_NUMERIC );
    
    $db->sql_freeresult( $related_new );
    unset( $related_new, $row );
    
    $related_array = array();
    $related = $db->sql_query( "SELECT `id`, `title`, `alias`,`publtime` FROM `" . NV_PREFIXLANG . "_" . $module_data . "_" . $catid . "` WHERE `status`=1 AND `publtime` < " . $publtime . " AND `publtime` < " . NV_CURRENTTIME . " AND (`exptime`=0 OR `exptime`>" . NV_CURRENTTIME . ") ORDER BY `id` DESC LIMIT 0, " . $st_links . "" );
    while ( $row = $db->sql_fetchrow( $related ) )
    {
        $link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $global_array_cat[$catid]['alias'] . "/" . $row['alias'] . "-" . $row['id'] . "";
        $related_array[] = array( 
            "title" => $row['title'], "time" => nv_date( "d/m/Y", $row['publtime'] ), "link" => $link 
        );
    }
    $db->sql_freeresult( $related );
    unset( $related, $row );
    
    $topic_array = array();
    $topic_a = "";
    if ( $news_contents['topicid'] > 0 )
    {
        list( $topic_title, $topic_alias ) = $db->sql_fetchrow( $db->sql_query( "SELECT `title`,`alias` FROM `" . NV_PREFIXLANG . "_" . $module_data . "_topics` WHERE `topicid` = '" . $news_contents['topicid'] . "'" ) );
        $topic = $db->sql_query( "SELECT `id`, `listcatid`, `title`, `alias`,`publtime` FROM `" . NV_PREFIXLANG . "_" . $module_data . "_rows` WHERE `status`=1 AND `topicid` = '" . $news_contents['topicid'] . "' AND `id` != '$id' AND `publtime` < " . NV_CURRENTTIME . " AND (`exptime`=0 OR `exptime`>" . NV_CURRENTTIME . ") ORDER BY `id` DESC  LIMIT 0, " . $st_links . "" );
        while ( $row = $db->sql_fetchrow( $topic ) )
        {
            $catid_arr = explode( ",", $row['listcatid'] );
            $topiclink = "" . NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=topic/" . $topic_alias . "";
            $link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $global_array_cat[$catid_arr[0]]['alias'] . "/" . $row['alias'] . "-" . $row['id'] . "";
            $topic_array[] = array( 
                "title" => $row['title'], "link" => $link, "time" => nv_date( "d/m/Y", $row['publtime'] ), "topiclink" => $topiclink, "topictitle" => $topic_title 
            );
        }
        $db->sql_freeresult( $topic );
        unset( $topic, $rows );
    }
    
    //Check: comment
    $commentenable = 0;
    
    if ( $news_contents['allowed_comm'] and $module_config[$module_name]['activecomm'] )
    {
        $comment_array = nv_comment_module( $news_contents['id'], 0 );
        $news_contents['comment'] = comment_theme( $comment_array );
        if ( $news_contents['allowed_comm'] == 1 or ( $news_contents['allowed_comm'] == 2 and defined( 'NV_IS_USER' ) ) )
        {
            $commentenable = 1;
        }
        elseif ( $news_contents['allowed_comm'] == 2 )
        {
            $commentenable = 2;
        }
    }
    else
    {
        $news_contents['comment'] = "";
    }
    if ( $news_contents['allowed_rating'] )
    {
        $time_set_rating = $nv_Request->get_int( $module_name . '_' . $op . '_' . $news_contents['id'], 'cookie', 0 );
        if ( $time_set_rating > 0 )
        {
            $news_contents['disablerating'] = 1;
        }
        else
        {
            $news_contents['disablerating'] = 0;
        }
        $ratingdetail = array_map( "intval", explode( "|", $news_contents['ratingdetail'] ) );
        $ratingdetail[0] = ( isset( $ratingdetail[0] ) ) ? intval( $ratingdetail[0] ) : 0;
        $ratingdetail[1] = ( isset( $ratingdetail[1] ) ) ? intval( $ratingdetail[1] ) : 0;
        $news_contents['stringrating'] = sprintf( $lang_module['stringrating'], $ratingdetail[0], $ratingdetail[1] );
        $ratingdetail[1] = ( $ratingdetail[1] > 0 ) ? $ratingdetail[1] : 1;
        $news_contents['numberrating'] = round( $ratingdetail[0] / $ratingdetail[1] ) - 1;
        $news_contents['langstar'] = array( 
            "note" => $lang_module['star_note'], "verypoor" => $lang_module['star_verypoor'], "poor" => $lang_module['star_poor'], "ok" => $lang_module['star_ok'], "good" => $lang_module['star_good}'], "verygood" => $lang_module['star_verygood'] 
        );
    }
    
    $page_title = $news_contents['title'];
    $key_words = $news_contents['keywords'];
    $description = $news_contents['hometext'];
    $contents = detail_theme( $news_contents, $related_new_array, $related_array, $topic_array, $commentenable );
}
else
{
    $contents = no_permission( $func_who_view );
}
include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>