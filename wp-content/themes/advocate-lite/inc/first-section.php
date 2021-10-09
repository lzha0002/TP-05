<?php
/**
 * The First Section for our theme.
 *
 * Display all information related to first section
 *
 * @package Advocate Lite
*/

$advhidefsec = get_theme_mod( 'adv_hide_whyus','1' );

if( $advhidefsec == '' ){
    echo '<section class="whyus"><div class="wrap">';

        $whyusttl = get_theme_mod('adv_frstsec_ttl','1');
        if( !empty( $whyusttl ) ){
          echo '<div class="section_head"><h2 class="section_title">'.$whyusttl.'</h2></div>';
        }
        $whymore = get_theme_mod('whyus_more');
        if( !empty( $whymore ) ){
          $shwwhymore .= '<a href="'.get_the_permalink().'" class="why-more">'.$whymore.'</a>';
        }

        echo '<div class="flexbox">';
            for( $whysec = 1; $whysec<4; $whysec++ ){
                if( get_theme_mod( 'whyus'.$whysec,true ) !='' ){
                    $whysecquery = new WP_Query( array( 'page_id' => get_theme_mod( 'whyus'.$whysec ) ) );
                    while( $whysecquery->have_posts() ) : $whysecquery->the_post();
                        $shwthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        echo '<div class="box"><div class="whyus-box"><div class="inner-whyus">';
                            if( has_post_thumbnail() ) {
                              echo '<div class="whyus-thumb"><img src="'.$shwthumb[0].'" alt="'.$image_alt.'"/></div><!-- why us thumb -->';
                            }
                            echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3><p>'.get_the_excerpt().'</p>'.$shwwhymore.'';
                        echo '</div></div></div>';
                    endwhile; wp_reset_postdata();
                }
            }
    echo '</div></div></section>';
}