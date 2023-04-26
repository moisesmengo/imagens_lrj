<?php
function listar_imoveis_por_bairro_shortcode() {
    global $post;
    $post_slug = $post->post_name;
    $bairros_terms = wp_get_post_terms($post->ID, 'Bairros', array('fields' => 'slugs'));

    $args2 = array(
        'post_type' => 'imoveis',
        'order' => 'ASC',
        'posts_per_page' => 10,
        'tax_query' => array(
            array(
                'taxonomy' => 'Bairros',
                'field' => 'slug',
                'terms' => $bairros_terms,
            ),
        ),
    );

    $the_query = new WP_Query($args2);
    ob_start();

    if ($the_query->have_posts()) :
        echo '<div class="itens_lancamentos_da_semana pd_small">';
        echo '<div class="swiper lancamentosSemana">';
        echo '<div class="swiper-wrapper">';

        while ($the_query->have_posts()) : $the_query->the_post();
            include(TEMPLATEPATH . "/inc/slide.php");
        endwhile;

        echo '</div>';
        echo '<div class="swiper-button-next"></div>';
        echo '<div class="swiper-button-prev"></div>';
        echo '</div>';
        echo '</div>';

        wp_reset_postdata();
    else:
        echo '<p>Nenhum imóvel encontrado!</p>';
    endif;

    return ob_get_clean();
}
add_shortcode('listar_imoveis_por_bairro', 'listar_imoveis_por_bairro_shortcode');