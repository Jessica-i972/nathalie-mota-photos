<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nathalie_Mota
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', get_post_type());

        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'nathalie-mota') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'nathalie-mota') . '</span> <span class="nav-title">%title</span>',
            )
        );
    ?>

        <div id="content-wrap" class="container">
            <section class="bloc-single-photo">

                <div class="side-description">
                    <h1 class="side-description__title"><?= the_title() ?></h1>
                    <p>Référence : <span class="reference_value"><?php echo get_field('references'); ?></span></p>
                    <p>Catégorie : <?php echo get_field('categories'); ?></p>
                    <p>Format : <?php echo strip_tags(get_the_term_list(get_the_ID(), 'format')); ?></p>
                    <p>Type : <?php echo get_field('types'); ?></p>
                    <p>Année : <?php echo the_time( 'Y' ); ?></p>
                </div>
                <div class="side-picture">
                    <?php the_post_thumbnail('medium_large'); ?>
                </div>
            </section>

            <section class="bandeau-cta">
                <div class="bandeau-cta__gauche">
                    <p>
                        Cette photo vous intéresse ?
                    </p>
                    <button class="bandeau-cta__btn trigger">Contact</button>
                </div>
                <div class="bloc-photo-miniature">
    <div class="photo-miniature__fleche">
        <div>
            <?php  
                $previous_post = get_previous_post();
                if ($previous_post) {
                    $prev_title = strip_tags(str_replace('"', '', $previous_post->post_title));                        
                    $prev_id = $previous_post->ID;         
                    echo '<a href="' . get_permalink($prev_id) . '" title="' . $prev_title . '" class="prev-link">';
                    if (has_post_thumbnail($prev_id)) {
                        ?>
                        <div class="photo-miniature-gauche">
                            <?php echo get_the_post_thumbnail($prev_id, array(81, 71)); ?>
                        </div>
                        <?php
                    } else {
                        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/no-image.jpeg" alt="Pas de photo" width="77px"><br>';
                    }							
                    echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/preview.png" alt="Photo précédente"></a>';
                }
            ?>
        </div> 
        <div>
            <?php 
                $next_post = get_next_post();
                if ($next_post) {
                    $next_title = strip_tags(str_replace('"', '', $next_post->post_title));                        
                    $next_id = $next_post->ID;         
                    echo '<a href="' . get_permalink($next_id) . '" title="' . $next_title . '" class="next-link">';
                    if (has_post_thumbnail($next_id)) {
                        ?>
                        <div class="photo-miniature-droite">
                            <?php echo get_the_post_thumbnail($next_id, array(81, 71)); ?>
                        </div>
                        <?php
                    } else {
                        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/no-image.jpeg" alt="Pas de photo" width="77px"><br>';
                    }							
                    echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/next.png" alt="Photo suivante"></a>';
                }
            ?>
        </div>
    </div>
</div>

        </section>
        
        <!--Ajout template bloc recommandations -->
        <?php get_template_part('templates-parts/photo_block'); ?> 
           
    <?php endwhile ?>
    </div> <!-- #content-wrap -->
</main><!-- #main -->

<?php

get_footer();
?>