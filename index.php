<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="google-site-verification" content="s6lB6ifZm_Ih2o7hFcGJf-ZG04PUhuIAu5NcT0CFixI" />
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta property="og:title" content="<?php bloginfo( 'title' ); ?>" />
        <meta property="og:url" content="<?php bloginfo('url'); ?>" />
        <meta content='Index, Follow' name='robots'/>
        <meta content='Admin' name='author'/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
        <?php
if (is_home()) {
    echo '<meta name="description" content="';
    bloginfo('description');
    echo '"/>';
    echo '<meta name="keywords" content="Download Anime Subtitle Indonesia , Download Anime Sub Indo , Download Live Action Sub Indo , Anime Sub Indo , Anime 480p, 720p, 360p, Download Anime Batch Sub Indo , Download Anime Batch Sub Indo "/>';
} else {
    if (is_single()) {
        echo '<meta name="description" content=" Download Anime ';
        the_title_attribute();
        echo ' Subtitle Indonesia BD dan Batch dengan ukuran 480p, 720p , 360p, 240p dalam format Mp4 dan MKV"/>';
        echo '<meta name="keywords" content=" ';
        the_title_attribute();
        echo ' Sub Indo, ';
        the_title_attribute();
        echo ' Subtitle Indonesia, ';
        the_title_attribute();
        echo ' Batch dan BD, ';
        the_title_attribute();
        echo ' Format Mp4 dan MKV, ';
        the_title_attribute();
        echo ' ukuran 480p, 720p, 360p, 240p "/>';
    } else if (is_archive()) {
        echo '<meta name="description" content=" Archive yang anda cari adalah ';
        single_tag_title();
        echo '"/>';
        echo '<meta name="keywords" content="  Download Anime ';
        single_tag_title();
        echo '"/>';
    } else if (is_search()) {
        echo '<meta name="description" content=" Anime yang anda cari adalah ';
        the_search_query();
        echo '"/>';
        echo '<meta name="keywords" content="';
        the_search_query();
        echo ' Sub Indo , ';
        the_search_query();
        echo ' Subtitle Indonesia , ';
        the_search_query();
        echo ' Batch dan BD , ';
        the_search_query();
        echo ' Format Mp4 dan MKV , ';
        the_search_query();
        echo ' ukuran 480p , 720p , 360p , 240p"/>';
    }}; ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dist/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dist/bootstrap-grid.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dist/bootstrap-reboot.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dist/main.css" />
        <?php wp_head(); ?>	
    </head>
    <body>
    <div id="app">   
    <transition name="fade-in"> 
        <router-view 
          v-bind:posts="posts" 
          v-bind:post="post" 
          v-bind:comments="comments"
          v-bind:pagers="pagers">
        </router-view>
    </transition>
    </div><!--app-->
    <?php get_template_part('/templates/home'); ?>
    <?php get_template_part('/templates/archive'); ?>
    <?php get_template_part('/templates/search'); ?>
    <?php get_template_part('/templates/single'); ?>
    <?php get_template_part('/templates/page'); ?> 
    <?php get_template_part('/templates/404'); ?> 
    <?php get_template_part('/templates/_header'); ?>
    <?php get_template_part('/templates/_footer'); ?>
    <?php get_template_part('/templates/_theloop'); ?>
    <?php get_template_part('/templates/_sidebar'); ?>
    <?php get_template_part('/templates/_search-form'); ?>
    <?php get_template_part('/templates/_comments'); ?>
    <?php get_template_part('/templates/_comment-form'); ?>
    <?php get_template_part('/templates/_nopost'); ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>        
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>    
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
    <?php wp_footer(); ?>
    </body>
</html>