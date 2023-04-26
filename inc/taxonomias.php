<?php

add_action( 'init', 'custom_taxonomys_imoveis', 0 );
//criando taxonomias personalizadas
function custom_taxonomys_imoveis() {
    register_taxonomy(
        'Bairros',
        'imoveis',
        
        array(
            'labels' => array(
                'name' => 'Bairros',
                'add_new_item' => 'Adicionar novo bairro',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
	register_taxonomy(
        'Tipologias',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Tipologias',
                'add_new_item' => 'Adicionar nova tipologia',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true,             
        )
    );
	register_taxonomy(
        'Zonas',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Zonas',
                'add_new_item' => 'Adicionar nova zona',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
    register_taxonomy(
        'Fase',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Fase da Obra',
                'add_new_item' => 'Adicionar nova zona',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
 
	register_taxonomy(
        'Construtora',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Construtora',
                'add_new_item' => 'Adicionar nova construtora',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
	register_taxonomy(
        'Rua',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Rua',
                'add_new_item' => 'Adicionar nova rua',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
    register_taxonomy(
        'Cidades',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Cidades',
                'add_new_item' => 'Adicionar nova cidade',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
    register_taxonomy(
        'Venda',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Venda',
                'add_new_item' => 'Adicionar nova venda',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
    register_taxonomy(
        'Aluguel',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Aluguel',
                'add_new_item' => 'Adicionar novo aluguel',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
    register_taxonomy(
        'Tamanho',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Tamanho do Imóvel',
                'add_new_item' => 'Adicionar novo tamanho',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
    register_taxonomy(
        'Faixa',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Faixa de Preço',
                'add_new_item' => 'Adicionar novo faixa',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
    register_taxonomy(
        'Negocio',
        'imoveis',
        array(
            'labels' => array(
                'name' => 'Tipo de Negocio',
                'add_new_item' => 'Adicionar novo faixanegócio',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
}

//negocio
function negocio_register_taxonomy_meta() {
    $cmb = new_cmb2_box( array(
        'id' => 'negocio_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Negocio' ),
    ) );
     $cmb->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_negocio',
        'type' => 'text',
    ));
    $cmb->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_negocio',
        'type' => 'text',
    ));

    $cmb->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'negocio_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb->add_field( array(
        'name' => 'Informações sobre o bairro',
        'id' => 'bloco_bairro',
        'type' => 'wysiwyg',
        ));
   
}

add_action( 'cmb2_admin_init', 'negocio_register_taxonomy_meta' );

function negocio_save_taxonomy_meta( $term_id, $tt_id ) {
        $negocio_image = get_term_meta( $term_id, 'negocio_image', true );
        if ( isset( $_POST['negocio_image_id'] ) && $_POST['negocio_image_id'] != $negocio_image ) {
        update_term_meta( $term_id, 'negocio_image', absint( $_POST['negocio_image_id'] ) );

         $titulo_negocio = isset( $_POST['titulo_negocio'] ) ? $_POST['titulo_negocio'] : '';
        update_term_meta( $term_id, 'titulo_negocio', sanitize_text_field( $titulo_negocio ) );
        $descricao_titulo_negocio = isset( $_POST['descricao_titulo_negocio'] ) ? $_POST['descricao_titulo_negocio'] : '';
        update_term_meta( $term_id, 'descricao_titulo_negocio', sanitize_textarea_field( $descricao_titulo_negocio ) );
    }
}

add_action( 'created_negocio', 'negocio_save_taxonomy_meta', 10, 2 );

//faixa
function faixa_register_taxonomy_meta() {
    $cmb = new_cmb2_box( array(
        'id' => 'faixa_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Faixa' ),
    ) );

    $cmb->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'faixa_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb->add_field( array(
        'name' => 'Informações sobre o bairro',
        'id' => 'bloco_bairro',
        'type' => 'wysiwyg',
        ));
    $cmb->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_faixa',
        'type' => 'text',
    ));
    $cmb->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_faixa',
        'type' => 'text',
    ));
}

add_action( 'cmb2_admin_init', 'faixa_register_taxonomy_meta' );

function faixa_save_taxonomy_meta( $term_id, $tt_id ) {
        $faixa_image = get_term_meta( $term_id, 'faixa_image', true );
        if ( isset( $_POST['faixa_image_id'] ) && $_POST['faixa_image_id'] != $faixa_image ) {
        update_term_meta( $term_id, 'faixa_image', absint( $_POST['faixa_image_id'] ) );

         $titulo_faixa = isset( $_POST['titulo_faixa'] ) ? $_POST['titulo_faixa'] : '';
        update_term_meta( $term_id, 'titulo_faixa', sanitize_text_field( $titulo_faixa ) );
        $descricao_titulo_faixa = isset( $_POST['descricao_titulo_faixa'] ) ? $_POST['descricao_titulo_faixa'] : '';
        update_term_meta( $term_id, 'descricao_titulo_faixa', sanitize_textarea_field( $descricao_titulo_faixa ) );
    }
}

add_action( 'created_faixa', 'faixa_save_taxonomy_meta', 10, 2 );

//Tamanho
function tamanho_register_taxonomy_meta() {
    $cmb = new_cmb2_box( array(
        'id' => 'tamanho_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Tamanho' ),
    ) );

    $cmb->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'tamanho_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb->add_field( array(
        'name' => 'Informações sobre o bairro',
        'id' => 'bloco_bairro',
        'type' => 'wysiwyg',
        ));
    $cmb->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_tamanho',
        'type' => 'text',
    ));
    $cmb->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_tamanho',
        'type' => 'text',
    ));
}

add_action( 'cmb2_admin_init', 'tamanho_register_taxonomy_meta' );

function tamanho_save_taxonomy_meta( $term_id, $tt_id ) {
        $tamanho_image = get_term_meta( $term_id, 'tamanho_image', true );
        if ( isset( $_POST['tamanho_image_id'] ) && $_POST['tamanho_image_id'] != $tamanho_image ) {
        update_term_meta( $term_id, 'tamanho_image', absint( $_POST['tamanho_image_id'] ) );

         $titulo_tamanho = isset( $_POST['titulo_tamanho'] ) ? $_POST['titulo_tamanho'] : '';
        update_term_meta( $term_id, 'titulo_tamanho', sanitize_text_field( $titulo_tamanho ) );
        $descricao_titulo_tamanho = isset( $_POST['descricao_titulo_tamanho'] ) ? $_POST['descricao_titulo_tamanho'] : '';
        update_term_meta( $term_id, 'descricao_titulo_tamanho', sanitize_textarea_field( $descricao_titulo_tamanho ) );
    }
}

add_action( 'created_tamanho', 'tamanho_save_taxonomy_meta', 10, 2 );

//aluguel
function aluguel_register_taxonomy_meta() {
    $cmb = new_cmb2_box( array(
        'id' => 'aluguel_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Aluguel' ),
    ) );

    $cmb->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'aluguel_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb->add_field( array(
        'name' => 'Informações sobre o bairro',
        'id' => 'bloco_bairro',
        'type' => 'wysiwyg',
        ));
    $cmb->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_aluguel',
        'type' => 'text',
    ));
    $cmb->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_aluguel',
        'type' => 'text',
    ));
}

add_action( 'cmb2_admin_init', 'aluguel_register_taxonomy_meta' );

function aluguel_save_taxonomy_meta( $term_id, $tt_id ) {
        $aluguel_image = get_term_meta( $term_id, 'aluguel_image', true );
        if ( isset( $_POST['aluguel_image_id'] ) && $_POST['aluguel_image_id'] != $aluguel_image ) {
        update_term_meta( $term_id, 'aluguel_image', absint( $_POST['aluguel_image_id'] ) );

         $titulo_aluguel = isset( $_POST['titulo_aluguel'] ) ? $_POST['titulo_aluguel'] : '';
        update_term_meta( $term_id, 'titulo_aluguel', sanitize_text_field( $titulo_aluguel ) );
        $descricao_titulo_aluguel = isset( $_POST['descricao_titulo_aluguel'] ) ? $_POST['descricao_titulo_aluguel'] : '';
        update_term_meta( $term_id, 'descricao_titulo_aluguel', sanitize_textarea_field( $descricao_titulo_aluguel ) );
    }
}

add_action( 'created_aluguel', 'aluguel_save_taxonomy_meta', 10, 2 );

//venda
function venda_register_taxonomy_meta() {
    $cmb = new_cmb2_box( array(
        'id' => 'venda_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Venda' ),
    ) );

    $cmb->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'venda_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb->add_field( array(
        'name' => 'Informações sobre o bairro',
        'id' => 'bloco_bairro',
        'type' => 'wysiwyg',
        ));
    $cmb->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_venda',
        'type' => 'text',
    ));
    $cmb->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_venda',
        'type' => 'text',
    ));
}

add_action( 'cmb2_admin_init', 'venda_register_taxonomy_meta' );

function venda_save_taxonomy_meta( $term_id, $tt_id ) {
        $venda_image = get_term_meta( $term_id, 'venda_image', true );
        if ( isset( $_POST['venda_image_id'] ) && $_POST['venda_image_id'] != $venda_image ) {
        update_term_meta( $term_id, 'venda_image', absint( $_POST['venda_image_id'] ) );

         $titulo_venda = isset( $_POST['titulo_venda'] ) ? $_POST['titulo_venda'] : '';
        update_term_meta( $term_id, 'titulo_venda', sanitize_text_field( $titulo_venda ) );
        $descricao_titulo_venda = isset( $_POST['descricao_titulo_venda'] ) ? $_POST['descricao_titulo_venda'] : '';
        update_term_meta( $term_id, 'descricao_titulo_venda', sanitize_textarea_field( $descricao_titulo_venda ) );
    }
}

add_action( 'created_venda', 'venda_save_taxonomy_meta', 10, 2 );

//Bairros
function bairros_register_taxonomy_meta() {
    $cmb = new_cmb2_box( array(
        'id' => 'bairros_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Bairros' ),
    ) );

    $cmb->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'bairros_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb->add_field( array(
        'name' => 'Informações sobre o bairro',
        'id' => 'bloco_bairro',
        'type' => 'wysiwyg',
        ));
        $cmb->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_bairros',
        'type' => 'text',
    ));
    $cmb->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_bairros',
        'type' => 'text',
    ));
}

add_action( 'cmb2_admin_init', 'bairros_register_taxonomy_meta' );

function bairros_save_taxonomy_meta( $term_id, $tt_id ) {
    $bairros_image = get_term_meta( $term_id, 'bairros_image', true );
    if ( isset( $_POST['bairros_image_id'] ) && $_POST['bairros_image_id'] != $bairros_image ) {
        update_term_meta( $term_id, 'bairros_image', absint( $_POST['bairros_image_id'] ) );

        $titulo_bairros = isset( $_POST['titulo_bairros'] ) ? $_POST['titulo_bairros'] : '';
        update_term_meta( $term_id, 'titulo_bairros', sanitize_text_field( $titulo_bairros ) );
        $descricao_titulo_bairros = isset( $_POST['descricao_titulo_bairros'] ) ? $_POST['descricao_titulo_bairros'] : '';
        update_term_meta( $term_id, 'descricao_titulo_bairros', sanitize_textarea_field( $descricao_titulo_bairros ) );
    }
}


add_action( 'created_bairros', 'bairros_save_taxonomy_meta', 10, 2 );

//Tipologias
function tipologias_register_taxonomy_meta() {
    $cmb2 = new_cmb2_box( array(
        'id' => 'tipologias_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Tipologias' ),
    ) );

    $cmb2->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'tipologias_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb2->add_field( array(
        'name' => 'Informações sobre a tipologia',
        'id' => 'bloco_tipologias',
        'type' => 'wysiwyg',
    ));
      $cmb2->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_tipologias',
        'type' => 'text',
    ));
    $cmb2->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_tipologias',
        'type' => 'text',
    ));
}

add_action( 'cmb2_admin_init', 'tipologias_register_taxonomy_meta' );

function tipologias_save_taxonomy_meta( $term_id, $tt_id ) {
        $bairros_image = get_term_meta( $term_id, 'tipologias_image', true );
        if ( isset( $_POST['tipologias_image_id'] ) && $_POST['tipologias_image_id'] != $tipologias_image ) {
        update_term_meta( $term_id, 'tipologias_image', absint( $_POST['tipologias_image_id'] ) );

         $titulo_tipologias = isset( $_POST['titulo_tipologias'] ) ? $_POST['titulo_tipologias'] : '';
        update_term_meta( $term_id, 'titulo_tipologias', sanitize_text_field( $titulo_tipologias ) );
        $descricao_titulo_tipologias = isset( $_POST['descricao_titulo_tipologias'] ) ? $_POST['descricao_titulo_tipologias'] : '';
        update_term_meta( $term_id, 'descricao_titulo_tipologias', sanitize_textarea_field( $descricao_titulo_tipologias ) );
    }
}

add_action( 'created_tipologias', 'tipologias_save_taxonomy_meta', 10, 2 );

//Zonas
function zonas_register_taxonomy_meta() {
    $cmb3 = new_cmb2_box( array(
        'id' => 'zonas_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Zonas' ),
    ) );

    $cmb3->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'zonas_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb3->add_field( array(
        'name' => 'Informações sobre a tipologia',
        'id' => 'bloco_zonas',
        'type' => 'wysiwyg',
    ));
    $cmb3->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_zonas',
        'type' => 'text',
    ));
    $cmb3->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_zonas',
        'type' => 'text',
    ));
}


add_action( 'cmb2_admin_init', 'zonas_register_taxonomy_meta' );

function zonas_save_taxonomy_meta( $term_id, $tt_id ) {
        $bairros_image = get_term_meta( $term_id, 'zonas_image', true );
        if ( isset( $_POST['zonas_image_id'] ) && $_POST['zonas_image_id'] != $zonas_image ) {
        update_term_meta( $term_id, 'zonas_image', absint( $_POST['zonas_image_id'] ) );

        $titulo_zonas = isset( $_POST['titulo_zonas'] ) ? $_POST['titulo_zonas'] : '';
        update_term_meta( $term_id, 'titulo_zonas', sanitize_text_field( $titulo_zonas ) );
        $descricao_titulo_zonas = isset( $_POST['descricao_titulo_zonas'] ) ? $_POST['descricao_titulo_zonas'] : '';
        update_term_meta( $term_id, 'descricao_titulo_zonas', sanitize_textarea_field( $descricao_titulo_zonas ) );
    }
}

//fases
function fase_register_taxonomy_meta() {
    $cmb3 = new_cmb2_box( array(
        'id' => 'fases_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Fase' ),
    ) );

     $cmb3->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'fase_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb3->add_field( array(
        'name' => 'Informações sobre a fase da obra',
        'id' => 'bloco_fase',
        'type' => 'wysiwyg',
    ));
    $cmb3->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_fase',
        'type' => 'text',
    ));
    $cmb3->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_fase',
        'type' => 'text',
    ));
}


add_action( 'cmb2_admin_init', 'fase_register_taxonomy_meta' );

function fase_save_taxonomy_meta( $term_id, $tt_id ) {
        $fase_image = get_term_meta( $term_id, 'fase_image', true );
        if ( isset( $_POST['fase_image_id'] ) && $_POST['fase_image_id'] != $fase_image ) {
        update_term_meta( $term_id, 'fase_image', absint( $_POST['fase_image_id'] ) );

        $titulo_fase = isset( $_POST['titulo_fase'] ) ? $_POST['titulo_fase'] : '';
        update_term_meta( $term_id, 'titulo_fase', sanitize_text_field( $titulo_fase ) );
        $descricao_titulo_fase = isset( $_POST['descricao_titulo_fase'] ) ? $_POST['descricao_titulo_fase'] : '';
        update_term_meta( $term_id, 'descricao_titulo_fase', sanitize_textarea_field( $descricao_titulo_fase ) );
    }
}

//Construtora
function construtora_register_taxonomy_meta() {
    $cmb3 = new_cmb2_box( array(
        'id' => 'construtora_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Construtora' ),
    ) );

    $cmb3->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'construtora_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb3->add_field( array(
        'name' => 'Informações sobre a tipologia',
        'id' => 'bloco_construtora',
        'type' => 'wysiwyg',
    ));
    $cmb3->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_construtora',
        'type' => 'text',
    ));
    $cmb3->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_construtora',
        'type' => 'text',
    ));
}

add_action( 'cmb2_admin_init', 'construtora_register_taxonomy_meta' );

function construtora_save_taxonomy_meta( $term_id, $tt_id ) {
        $bairros_image = get_term_meta( $term_id, 'construtora_image', true );
        if ( isset( $_POST['construtora_image_id'] ) && $_POST['construtora_image_id'] != $construtora_image ) {
        update_term_meta( $term_id, 'construtora_image', absint( $_POST['construtora_image_id'] ) );

        
        $titulo_construtora = isset( $_POST['titulo_construtora'] ) ? $_POST['titulo_construtora'] : '';
        update_term_meta( $term_id, 'titulo_construtora', sanitize_text_field( $titulo_construtora ) );
        $descricao_titulo_construtora = isset( $_POST['descricao_titulo_construtora'] ) ? $_POST['descricao_titulo_construtora'] : '';
        update_term_meta( $term_id, 'descricao_titulo_construtora', sanitize_textarea_field( $descricao_titulo_construtora ) );
    }
}

//Rua
function rua_register_taxonomy_meta() {
    $cmb3 = new_cmb2_box( array(
        'id' => 'rua_image_metabox',
        'title' => __( 'Imagem', 'text-domain' ),
        'object_types' => array( 'term' ),
        'taxonomies' => array( 'Rua' ),
    ) );

    $cmb3->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'rua_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb3->add_field( array(
        'name' => 'Informações sobre a tipologia',
        'id' => 'bloco_rua',
        'type' => 'wysiwyg',
    ));
    $cmb3->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_rua',
        'type' => 'text',
    ));
    $cmb3->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_rua',
        'type' => 'text',
    ));
}


add_action( 'cmb2_admin_init', 'rua_register_taxonomy_meta' );

function rua_save_taxonomy_meta( $term_id, $tt_id ) {
        $bairros_image = get_term_meta( $term_id, 'rua_image', true );
        if ( isset( $_POST['rua_image_id'] ) && $_POST['rua_image_id'] != $rua_image ) {
        update_term_meta( $term_id, 'rua_image', absint( $_POST['rua_image_id'] ) );

        $titulo_rua = isset( $_POST['titulo_rua'] ) ? $_POST['titulo_rua'] : '';
        update_term_meta( $term_id, 'titulo_rua', sanitize_text_field( $titulo_rua ) );
        $descricao_titulo_rua = isset( $_POST['descricao_titulo_rua'] ) ? $_POST['descricao_titulo_rua'] : '';
        update_term_meta( $term_id, 'descricao_titulo_rua', sanitize_textarea_field( $descricao_titulo_rua ) );
    }
}

//Cidade

function cidades_register_taxonomy_meta() {
    $cmb3 = new_cmb2_box( array(
    'id' => 'cidades_image_metabox',
    'title' => __( 'Imagem', 'text-domain' ),
    'object_types' => array( 'term' ),
    'taxonomies' => array( 'Cidades' ),
    ) );
    $cmb3->add_field( array(
        'name'         => __( 'Imagem de destaque', 'text-domain' ),
        'id'           => 'cidades_image',
        'type'         => 'file',
        'options'      => array(
            'url' => false,
        ),
        'text'         => array(
            'add_upload_file_text' => __( 'Adicionar imagem', 'text-domain' ),
        ),
        'query_args'   => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            ),
        ),
    ) );
    $cmb3->add_field( array(
        'name' => 'Informações sobre a tipologia',
        'id' => 'bloco_cidades',
        'type' => 'wysiwyg',
    ));
    $cmb3->add_field( array(
        'name' => 'Título',
        'id' => 'titulo_cidade',
        'type' => 'text',
    ));
    $cmb3->add_field( array(
        'name' => 'Título da descrição',
        'id' => 'descricao_titulo_cidade',
        'type' => 'text',
    ));
}

add_action( 'cmb2_admin_init', 'cidades_register_taxonomy_meta' );

function cidades_save_taxonomy_meta( $term_id, $tt_id ) {
    $cidades_image = get_term_meta( $term_id, 'cidades_image', true );
    if ( isset( $_POST['cidades_image_id'] ) && $_POST['cidades_image_id'] != $cidades_image ) {
    update_term_meta( $term_id, 'cidades_image', absint( $_POST['cidades_image_id'] ) );
    }
    $titulo_cidade = isset( $_POST['titulo_cidade'] ) ? $_POST['titulo_cidade'] : '';
    update_term_meta( $term_id, 'titulo_cidade', sanitize_text_field( $titulo_cidade ) );
    $descricao_titulo_cidade = isset( $_POST['descricao_titulo_cidade'] ) ? $_POST['descricao_titulo_cidade'] : '';
    update_term_meta( $term_id, 'descricao_titulo_cidade', sanitize_textarea_field( $descricao_titulo_cidade ) );
}


// Função para registrar campos personalizados para cada tag
function register_tag_meta() {
    // Obtém todas as tags registradas no WordPress
        // Cria um objeto CMB2 para cada tag
        $cmb = new_cmb2_box( array(
            'id'           => 'tag_metabox_' . $tag->term_id,
            'title'        => __( 'Campos Personalizados', 'cmb2' ),
            'object_types' => array( 'term' ),
            'taxonomies'   => array( 'post_tag' ),
            'show_names'   => true,
        ) );
        
        // Adiciona um campo WYSIWYG

        $cmb->add_field( array(
            'name'    => __( 'Título da Descrição', 'cmb2' ),
            'id'      => 'titulo_tag_desc' . $tag->term_id,
            'type'    => 'text' 
        ) );
        $cmb->add_field( array(
            'name'    => __( 'Título', 'cmb2' ),
            'id'      => 'titulo_tag' . $tag->term_id,
            'type'    => 'text' 
        ) );
        
        $cmb->add_field( array(
            'name'    => __( 'Texto', 'cmb2' ),
            'id'      => 'tag_text_' . $tag->term_id,
            'type'    => 'wysiwyg',
            'options' => array(
                'textarea_rows' => 5,
            ),
        ) );
        
        // Adiciona um campo de imagem
        $cmb->add_field( array(
            'name' => __( 'Imagem de destaque', 'cmb2' ),
            'id'   => 'tag_image_' . $tag->term_id,
            'type' => 'file',
            'options' => array(
                'url' => false,
            ),
        ) );
 
}

// Registra os campos personalizados para cada tag após a inicialização do CMB2
add_action( 'cmb2_init', 'register_tag_meta' );

function register_category_meta() {
// Obtém todas as categorias registradas no WordPress
// Loop pelas categorias e cria um objeto CMB2 para cada uma
    $cmb = new_cmb2_box( array(
        'id'           => 'category_metabox_' . $category->term_id,
        'title'        => __( 'Campos Personalizados', 'cmb2' ),
        'object_types' => array( 'term' ),
        'taxonomies'   => array( 'category' ),
        'show_names'   => true,
    ) );
    
    // Adiciona um campo WYSIWYG
    $cmb->add_field( array(
        'name'    => __( 'Título da Descrição', 'cmb2' ),
        'id'      => 'titulo_cat_desc' . $category->term_id,
        'type'    => 'text' 
    ) );
    $cmb->add_field( array(
        'name'    => __( 'Título', 'cmb2' ),
        'id'      => 'titulo_cat' . $category->term_id,
        'type'    => 'text' 
    ) );
    $cmb->add_field( array(
        'name'    => __( 'Texto', 'cmb2' ),
        'id'      => 'cat_text_' . $category->term_id,
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 5,
        ),
    ) );
    
    // Adiciona um campo de imagem
    $cmb->add_field( array(
        'name' => __( 'Imagem de destaque', 'cmb2' ),
        'id'   => 'cat_image_' . $category->term_id,
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
    ) );
}
// Registra os campos personalizados para cada categoria após a inicialização do CMB2
add_action( 'cmb2_init', 'register_category_meta' );