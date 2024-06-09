<?php
get_header();
?>

<?php the_content(); ?>

<section class="banner">
    <h1 class="banner__title">Photographe Event</h1>

    <?php

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    );
    $query = new WP_Query($args);
    $attachments = $query->get_posts();

    foreach ($attachments as $attachment) {
        if ($attachment) {

            // URL de la première image avec les dimensions spécifiées
            $first_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($attachment->ID), array(1400, 966));

            // Vérifie si l'URL de l'image est disponible
            if ($first_image_url) {

                echo '<img src="' . $first_image_url[0] . '" width="' . $first_image_url[1] . '" height="' . $first_image_url[2] . '" alt="Hero Image">';
            }
        }
    ?>
    <?php }

    ?>
</section>

<main id="primary" class="site-main">
    <div id="content-wrap" class="container">
        <!-- Partie filtre photos -->
        <div class="filtres-photos">
            <input type="hidden" name="nonce" id='nonce' value="<?php echo wp_create_nonce('nathalie_mota_nonce'); ?>">
            <div class="filtres">
                <select name="categorie" id="select-categories" class="form-select wide" aria-label="Default select example">
                    <option data-display="Catégorie" value=""></option>
                    <option value="reception">Réception</option>
                    <option value="mariage">Mariage</option>
                    <option value="concert">Concert</option>
                    <option value="television">Télévision</option>
                    <input type="hidden" name="ajaxurl" id='ajaxurl' value="<?php echo admin_url('admin-ajax.php'); ?>">
                </select>
                <select name="format" id="select-formats" class="form-select wide" aria-label="Default select example">
                    <option data-display="Formats" value=""></option>
                    <option value="paysage">Paysage</option>
                    <option value="portrait">Portrait</option>
                </select>

            </div>
            <div class="tri">
                <select name="tri" id="select-tri" class="form-select wide" aria-label="Default select example">
                    <option data-display="Trier par" value=""></option>
                    <option value="recent">A partir des plus récentes</option>
                    <option value="anciens">A partir des
                        plus anciennes</option>
                </select>

            </div>
        </div>
        <!-- Fin filtre photos -->

        <section class="galerie-photos photo">
            <!-- Afficher la galerie -->
            <?php
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 8,
                'order' => 'DESC',
                'orderby' => 'date',
                'paged' => 1
            );
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) {
                echo '<div class="galerie-photos__column">';
                while ($the_query->have_posts()) {
                    $the_query->the_post();
            ?>
                    <div class="galerie-photos__single">
                        <a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="lightbox-trigger photo-link">
                            <?php the_post_thumbnail('single'); ?>
                        </a>
                        <div class="single__overlay">
                            <span>
                                <img class="single__overlay-fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fullscreen.png" alt="Icône plein écran" />
                            </span>
                            <span class="single__overlay-eye">
                                <a href="<?php echo get_post_permalink(); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône oeil ouvert" />
                                </a>
                            </span>
                            <div class="single__caption">
                                <span class="single__overlay-title"><?php the_title(); ?></span>
                                <span class="single__overlay-categorie"><?php echo get_field('categories'); ?></span>
                            </div>
                        </div>
                    </div>
            <?php
                }
                echo '</div>';
            } else {
                echo "Désolée. Nous n'avons pas d'autres photos dans cette catégorie.";
            }
            wp_reset_postdata();
            ?>
        </section>
        <!-- Bouton de téléchargement des photos custom -->
        <div class="row-btn">
            <button class="js-load-photos photos-load-button" data-url="<?php echo admin_url('admin-ajax.php'); ?>" data-nonce="<?php echo wp_create_nonce('load_photos'); ?>">
                Charger plus
            </button>
            <!-- Message qui apparaît lorsqu'il n'y a plus de photos -->
            <div class="photos-message" style="display:none;"></div>

        </div>

        <!-- fin galerie photos -->

    </div><!-- Fin div content-wrap -->
</main><!-- fin main -->
<?php
get_footer();
?>