<?php
/**
 * The Second Section for our theme.
 *
 * Display all information related to Second section
 *
 * @package Advocate Lite
*/


$adv_hide_welcome = get_theme_mod('adv_hide_welcome', '1');

if($adv_hide_welcome  == '') {
    if(get_theme_mod('welcome_page',true) != '' ) {

        $advwelmore = get_theme_mod('welcome_more');
        if( !empty( $advwelmore ) ){
          $shwadvwelmore .= '<a href="'.get_the_permalink().'" class="read-more">'.$advwelmore.'</a>';
        }

        echo '<section class="aboutus"><div class="wrap"><div class="flexbox">';
        if(get_theme_mod('welcome_page') != '') {
            $welcome_query = new WP_Query(array('page_id' => get_theme_mod('welcome_page')));

            while( $welcome_query->have_posts() ) : $welcome_query->the_post();
                echo '<div class="box">';
                    if( has_post_thumbnail() ) {
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
                        $url = $src[0];
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                      echo '<div class="thumb"><img src="'.$url.'" alt="'.$image_alt.'"></div><!-- thumb -->';
                    }
                echo '</div><div class="box"><div class="about-content"><h2>'.get_the_title().'</h2><p>'.get_the_excerpt().'</p>'.$shwadvwelmore.'</div></div>';
            endwhile;

        }
        echo '</div></div></section>';
    }
}