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

        <div id="content-wrap" class="container a-propos">

            <h1>À propos de Nathalie Mota</h1>
            <h2>Bienvenue sur mon site !</h2>

            <p>Je suis Nathalie Mota, une photographe passionnée basée à Naples. Depuis plus de 10 ans, je me consacre à capturer les moments les plus précieux et authentiques de la vie. Mon travail se distingue par une approche artistique et un souci du détail qui rendent chaque photo unique et intemporelle.</p>

            <h2>Mon Parcours</h2>

            <p>Mon aventure avec la photographie a commencé à l'âge de 8 ans, lorsque j'ai reçu mon premier appareil photo. Depuis, ma passion n'a cessé de grandir. J'ai étudié la photographie à L'école Mondesir, où j'ai affiné mes compétences techniques et développé mon propre style.</p>

            <h2>Mon Style</h2>

            <p>Je suis spécialisée dans [types de photographie, par ex. portraits, mariages, paysages, etc.]. Mon style se caractérise par [décrivez votre style, par ex. l'utilisation de la lumière naturelle, des compositions soignées, une touche artistique, etc.]. Chaque séance photo est une nouvelle aventure, et j'aime travailler en étroite collaboration avec mes clients pour créer des images qui racontent leur histoire.
            <p>

            <h2>Mon Engagement</h2>

            <p>Pour moi, la photographie est plus qu'un simple métier, c'est une vocation. Mon objectif est de capturer l'essence de chaque moment et de créer des souvenirs durables. Je m'engage à fournir un service personnalisé et de haute qualité, en mettant toujours l'accent sur la satisfaction de mes clients.</p>

            <h2>Me Contacter</h2>

            <p>Que vous souhaitiez immortaliser un événement spécial, réaliser un portrait professionnel ou simplement capturer la beauté du quotidien, je serais ravie de travailler avec vous. N'hésitez pas à me contacter pour discuter de vos projets et de vos besoins en photographie.
                <br>
                Merci de votre visite, et au plaisir de vous rencontrer bientôt !
            </p>
            <p>Nathalie Mota</p>
        </div>




    <?php endwhile ?>
    </div> <!-- #content-wrap -->
</main><!-- #main -->

<?php

get_footer();
?>