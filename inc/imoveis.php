<?php

add_action('init', 'custom_post_type_imoveis');
add_action('cmb2_admin_init', 'custom_fields_imoveis');

// criando o ppost personalizado
function custom_post_type_imoveis()
{
	register_post_type('imoveis', array(
		'label' => 'Imóveis',
		'description' => 'Imóveis cadastrados para criação de landing pages',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-admin-multisite',
		'rewrite' => array('slug' => 'imoveis', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'page-attributes', 'post-formats', 'editor'),
        'show_in_rest' => true,

		'labels' => array(
				'name' => 'Imóveis',
				'singular_name' => 'Imóvel',
				'menu_name' => 'Imóveis',
				'add_new' => 'Adicionar Novo',
				'add_new_item' => 'Adicionar Novo Imóvel',
				'edit' => 'Editar',
				'edit_item' => 'Editar Imóvel',
				'new_item' => 'Novo Imóvel',
				'view' => 'Ver Imóvel',
				'view_item' => 'Ver Imóveis',
				'search_items' => 'Procurar Atração',
				'not_found' => 'Nenhum Imóvel Encontrado',
				'not_found_in_trash' => 'Nenhum Imóvel Encontrado no Lixo',
			)
	));
}

//criando campos personalizados
function custom_fields_imoveis(){
    //estilos
	$cmbInfo = new_cmb2_box([
		'id' => 'imoveis_styles_infos',
		'title' => 'Estilos e configurações',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
    $cmbInfo->add_field( array(
        'name' => 'Whatsapp',
        'desc' => 'Crie o link com mensagem personalizada para este imóvel, utilize o site: https://www.convertte.com.br/gerador-link-whatsapp',
        'id' => 'whtas_imovel',
        'type' => 'textarea_small',
        'attributes' => array(
            'data-validation' => 'required',
        ),
	) );
    
    $cmbInfo->add_field( array(
        'name'             => 'Modelo de call to action',
        'id'               => 'call_model',
        'type'             => 'radio',
        'options'          => array(
            'modal' => __( 'Modal', 'cmb2' ),
            'whatsapp'   => __( 'Whatsapp', 'cmb2' ),
            'ancora'   => __( 'Âncora', 'cmb2' ),
        ),
        'attributes' => array(
            'data-validation' => 'required',
        ),
    ) );

    $cmbInfo->add_field( array(
        'name'    => 'Exibir na sessão de destaque',
        'desc'    => 'Marque essa opção se quiser se o imóvel seja exibido na sessão de  destaque da Home, caso haja mais de um destaque eles serão exibidos como slide',
        'id'      => 'secao_destaque',
        'type'    => 'checkbox',
        'options' => array(
            'sim' => 'Destacar',
        ),
    ) );

    $cmbInfo->add_field([
		'name' => 'Título dos botões',
		'id' => 'titulo_botao_hero',
		'type' => 'text',
		'default' => 'CADASTRE-SE E SAIBA',
        'attributes' => array(
            'data-validation' => 'required',
        ),
	]);
	//informações adicionais
	$cmbInfo = new_cmb2_box([
		'id' => 'imoveis_itens_infos',
		'title' => 'Informações do Imóvel',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]); 
    $cmbInfo->add_field( array(
        'name' => 'Nome',
        'desc' => 'Nome do imóvel',
        'id' => 'nome_imovel',
        'type' => 'text',
        
	) );
    $cmbInfo->add_field( array(
        'name' => 'Imagem de destaque',
        'id'   => 'img_destaque',
        'type' => 'file',
        'options' => [
            'url' => false
        ]
    ));
	$cmbInfo->add_field( array(
        'name' => 'Valor do imóvel',
        'desc' => 'Unidades a partir de:',
        'id' => 'valor_imovel',
        'type' => 'text_money',
	) );
	$cmbInfo->add_field( array(
        'name' => 'Quantidade de quartos',
        'id' => 'qtd_quartos',
        'type' => 'text_medium',
	) );
    $cmbInfo->add_field( array(
        'name'    => 'Link para PDF do Guia do Empreendedor',
        'id'      => 'imovel_pdf_url',
        'type'    => 'text_url',
        'desc'    => 'Insira o link para o PDF do guia do empreendedor.',
    ) );

    $cmbInfo->add_field( array(
        'name' => 'Total de unidades',
        'desc' => 'Apenas números',
        'id'   => 'total_unidades',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );
    $cmbInfo->add_field( array(
        'name' => 'Total de elevadores',
        'desc' => 'Apenas números',
        'id'   => 'total_elevadores',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );
    $cmbInfo->add_field( array(
        'name' => 'Pavimentos',
        'id'   => 'pavimetos',
        'type' => 'text',
        'repeatable' => true,
    ) );
    $cmbInfo->add_field( array(
        'name' => 'Número de torres',
        'desc' => 'Apenas números',
        'id'   => 'total_torres',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );
	$cmbInfo->add_field( array(
        'name' => 'Quantidade de banheiros',
        'id' => 'qtd_banheiros',
        'type' => 'text_medium',
	) );
	$cmbInfo->add_field( array(
        'name' => 'Quantidade de suítes',
        'id' => 'qtd_suites',
        'type' => 'text_medium',
	) );
	$cmbInfo->add_field( array(
        'name' => 'Quantidade de vagas',
        'id' => 'qtd_vagas',
        'type' => 'text_medium',
	) );
    $cmbInfo->add_field( array(
        'name' => 'Projeto de arquitetura',
        'id' => 'pj_arquitetura',
        'type' => 'text_medium',
	) );
    $cmbInfo->add_field( array(
        'name' => 'Projeto de paisagismo',
        'id' => 'pj_paisagismo',
        'type' => 'text_medium',
	) );
    $cmbInfo->add_field( array(
        'name' => 'Projeto de interiores',
        'id' => 'pj_interiores',
        'type' => 'text_medium',
	) );
	$cmbInfo->add_field( array(
        'name' => 'Metragem',
        'id' => 'metragem',
        'type' => 'text_medium',
	) );
   $cmbInfo->add_field( array(
        'name' => 'Início das vendas',
        'desc' => 'Preencha com dia, mês e ano, mas só será exibido o mês e o ano',
        'id'   => 'inicio_vendas',
        'type' => 'text',
    ) );

    $cmbInfo->add_field( array(
        'name' => 'Entrega Prevista',
        'desc' => 'Preencha com dia, mês e ano, mas só será exibido o mês e o ano',
        'id'   => 'entrega_prevista',
        'type' => 'text',
    ) );
   

	//hero
	$cmb = new_cmb2_box([
		'id' => 'imoveis_itens_box',
		'title' => 'Topo',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
    $cmb->add_field([
		'name' => 'Imagem de fundo',
		'id' => 'bg_hero',
		'type' => 'file',
        'options' => array(
            'url' => false
        ),
	]);
    $cmb->add_field( array(
        'name' => 'Background fixo',
        'desc' => 'Marque essa opção se quiser o background da sessão fixo',
        'id'   => 'fixed_bg',
        'type' => 'checkbox',
    ) );
	$cmb->add_field([
		'name' => 'Descrição do imóvel',
		'id' => 'desc_imovel',
		'type' => 'wysiwyg',
        'attributes' => array(
            'data-validation' => 'required',
        ),
	]);

    //sobre o imovel
	$cmbSobre = new_cmb2_box([
		'id' => 'imoveis_sobre_box',
		'title' => 'Sobre o imóvel',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);

    $cmbSobre->add_field([
        'name' => 'Ocultar sessão',
        'desc' => 'Marque esta opção se deseja ocultar esta seção *ela exibe informações como número de suítes, área e vagas. <img src="../assets/img/admin/sesc01.webp" alt="Descrição do campo">',
        'id' => 'ocultar_sessao_sobre',
        'type' => 'checkbox',
        'default' => false
    ]);

   
   
    $cmbSobre->add_field( array(
        'name' => 'Título da sessão',
        'id' => 'difentrega',
        'default' => 'apartamentos entregues com preparação para split e porcelanato',
        'type' => 'text',
	));   
    $cmbSobre->add_field( array(
        'name' => 'Banner da sessão (galeria)',
        'id'   => 'banner_lazer',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Upload de imagens', // default: "Add or Upload Files"
            'remove_image_text' => 'Upload de imagens', // default: "Remove Image"
            'file_text' => 'Upload de imagens', // default: "File:"
            'file_download_text' => 'Upload de imagens', // default: "Download"
            'remove_text' => 'Upload de imagens', // default: "Remove"
        ),
    ) );
    $cmbSobre->add_field( array(
        'name' => 'Título antes do banner',
        'id' => 'feito_paravc',
        'default' => 'O apartamento feito para você!',
        'type' => 'text',
	));
    $cmbSobre->add_field( array(
        'name' => 'Breve descrição',
        'id' => 'descIm',
        'type' => 'wysiwyg',
	));

    //vídeo do imóvel
	$cmbVideo = new_cmb2_box([
		'id' => 'imoveis_video_box',
		'title' => 'Vídeo do imóvel',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
    $cmbVideo->add_field( array(
        'name' => 'Vídeo do empreendimento',
        'id'   => 'video_imovel',
        'desc' => 'colocar o embed antes da url, exemplo https://www.youtube.com/embed/thuGmrSUOIk',
        'type' => 'oembed',
    ));
    $cmbVideo->add_field( array(
        'name' => 'Thumb do vídeo',
        'id'   => 'img_video',
        'desc' => 'A sessão só será exibida com este campo e o campo de vídeo preenchidos',
        'type' => 'file',
        'options' => [
            'url' => false
        ]
    ));
    $cmbVideo->add_field( array(
        'name' => 'Título da área de vídeo',
        'id'   => 'titulo_area_video',
        'default' => 'VIVA PERTO DE TUDO',
        'type' => 'text',
    ));
    $cmbVideo->add_field( array(
        'name' => 'Descrição da área de vídeo',
        'id'   => 'desc_area_video',
        'type' => 'wysiwyg',
    ));

    //localizacao
 	$cmbLocal = new_cmb2_box([
		'id' => 'imoveis_local_box',
		'title' => 'Detalhes e localização',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
    $cmbLocal->add_field( array(
        'name'             => 'Quantidade de estrelas',
        'id'               => 'q_estrelas',
        'type'             => 'select',
        'show_option_none' => true,
        'options'          => array(
            '5' => __( '5 estrelas', 'cmb2' ),
            '4'   => __( '4 estrelas', 'cmb2' ),
            '3'     => __( '3 estrelas', 'cmb2' ),
            '2'     => __( '2  estrelas', 'cmb2' ),
            '1'     => __( '1 estrela', 'cmb2' ),
        ),
    ) );
 
    $cmbLocal->add_field( array(
        'name' => 'Tírulo localização',
        'id'   => 'tt_localiza',
        'default' => 'A melhor localização do Rio de Janeiro',
        'type' => 'text',
    ));
    $cmbLocal->add_field( array(
        'name' => 'Descrição da localização',
        'id'   => 'desc_localiza',
        'type' => 'wysiwyg',
    ));
    $cmbLocal->add_field( array(
        'name' => 'Mapa',
        'desc' => 'busque pelo mapa, clique em incorporar mapa e copie o src do código',
        'id' => 'mapa_local',
        'type' => 'text_url'
    ) );

    //agende

    $cmbAgende = new_cmb2_box([
		'id' => 'imoveis_agende_box',
		'title' => 'Agende uma visita',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
    $cmbAgende->add_field( array(
        'name' => 'Título da sessão',
        'default' => 'Agende uma visita ao decorado!',
        'id' => 'agendeTitulo',
        'type' => 'text'
    ) );
     $cmbAgende->add_field( array(
        'name' => 'Imagem de fundo',
        'id' => 'agendebg',
        'type' => 'file',
        'options' => [
            'url' => false
        ]
    ) );
    
    //Galeria
     
 	$cmbGaleria = new_cmb2_box([
		'id' => 'imoveis_galeria_box',
		'title' => 'Galeria',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
    $cmbGaleria->add_field( array(
        'name' => 'Título da sessão',
        'id'   => 'tt_galeria',
        'default' => 'TUDO AO SEU ALCANCE!',
        'type' => 'text'         
    ) );  
    $cmbGaleria->add_field( array(
        'name' => 'Perpectivas',
        'desc' => 'Imagens Perpectivas',
        'id'   => 'perpec_images',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Upload de imagens', // default: "Add or Upload Files"
            'remove_image_text' => 'Upload de imagens', // default: "Remove Image"
            'file_text' => 'Upload de imagens', // default: "File:"
            'file_download_text' => 'Upload de imagens', // default: "Download"
            'remove_text' => 'Upload de imagens', // default: "Remove"
        ),
    ) );
    $cmbGaleria->add_field( array(
        'name' => 'Plantas',
        'desc' => 'Imagens Plantas',
        'id'   => 'plantas_images',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Upload de imagens', // default: "Add or Upload Files"
            'remove_image_text' => 'Upload de imagens', // default: "Remove Image"
            'file_text' => 'Upload de imagens', // default: "File:"
            'file_download_text' => 'Upload de imagens', // default: "Download"
            'remove_text' => 'Upload de imagens', // default: "Remove"
        ),
    ) );
    $cmbGaleria->add_field( array(
        'name' => 'Decorado',
        'desc' => 'Imagens Decorado',
        'id'   => 'decorado_images',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Upload de imagens', // default: "Add or Upload Files"
            'remove_image_text' => 'Upload de imagens', // default: "Remove Image"
            'file_text' => 'Upload de imagens', // default: "File:"
            'file_download_text' => 'Upload de imagens', // default: "Download"
            'remove_text' => 'Upload de imagens', // default: "Remove"
        ),
    ) );
    $cmbGaleria->add_field( array(
        'name' => 'Implantação',
        'desc' => 'Imagens Implantação',
        'id'   => 'implantacao_images',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Upload de imagens', // default: "Add or Upload Files"
            'remove_image_text' => 'Upload de imagens', // default: "Remove Image"
            'file_text' => 'Upload de imagens', // default: "File:"
            'file_download_text' => 'Upload de imagens', // default: "Download"
            'remove_text' => 'Upload de imagens', // default: "Remove"
        ),
    ) );
    $cmbGaleria->add_field( array(
        'name' => 'Parágrafo da galeria',
        'id'   => 'p_galeria',
        'type' => 'wysiwyg'         
    ) );  

    //Tour
 	$cmbTour = new_cmb2_box([
		'id' => 'tour',
		'title' => 'Tour',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
    $cmbTour->add_field( array(
        'name' => 'Imagem de fundo',
        'id'   => 'img_tour',
        'type' => 'file',
        'options' => [
            'url' => false
        ]         
    ) );
    $cmbTour->add_field( array(
        'name' => 'Background fixo',
        'desc' => 'Marque essa opção se quiser o background da sessão fixo',
        'id'   => 'fixed_bg_tuor',
        'type' => 'checkbox',
    ) );
    $cmbTour->add_field( array(
        'name' => 'Título Tuor',
        'default' => 'Faça um tour pelo decorado',
        'id'   => 'tt_tour',
        'type' => 'text',
    ) );
    $cmbTour->add_field( array(
        'name' => 'Texto do botão',
        'default' => 'começar',
        'id'   => 'btn_tour',
        'type' => 'text',
    ) );
  
    //lazer

    $cmbLazer = new_cmb2_box([
		'id' => 'imoveis_lazer_box',
		'title' => 'Opções de lazer',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
     $cmbLazer->add_field( array(
        'name' => 'Título área de lazer',
        'id' => 'tt_area_lazer',
        'default' => 'Área de lazer completa',
        'type' => 'text',
	));
    $cmbLazer->add_field( array(
        'name' => 'Sobre a área de lazer',
        'id' => 'sobre_area_lazer',
        'type' => 'wysiwyg',
	));

    $cmbLazer->add_field( array(
        'name' => 'Opções de lazer',
        'id' => 'opc_lazer',
        'repeatable' => true,
        'type' => 'text',
	));

  
    //diferenciais
 	$cmbDiferenciais = new_cmb2_box([
		'id' => 'diferenciais',
		'title' => 'Diferenciais',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);
    $cmbDiferenciais->add_field( array(
        'name' => 'Título da sessão',
        'default' => 'diferenciais',
        'id'   => 'tt_diferenciais',
        'type' => 'text',
    ) );
    $diferenciais_grupo = $cmbDiferenciais->add_field([
        'name' => 'Diferenciais do imóvel',
        'id' => 'diferenciais_grupo',
        'type' => 'group',
        'repeatable' => true,
        'options' => [
            'group_title' => 'Ítem {#}',
            'add_button' => 'Adicionar',
            'remove_button' => 'Remover',
            'sortable' => true,
        ],
    ]);	
    $cmbDiferenciais->add_group_field( $diferenciais_grupo, array(
        'name' => 'Título do diferencial',
        'id'   => 'dif_titulo',
        'type' => 'text',
    ) );
    $cmbDiferenciais->add_group_field( $diferenciais_grupo, array(
        'name' => 'Ícone do diferencial',
        'id'   => 'dif_icone',
        'type' => 'file',
        'options' => [
            'url' => false
        ]
    ) );

     //estágio da obra
 	$cmbEstagios = new_cmb2_box([
		'id' => 'estagios_obra',
		'title' => 'Como está a obra?',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]);   
    $cmbEstagios->add_field( array(
        'name' => 'Preparo do terreno (%)',
        'desc' => 'Apenas números',
        'id'   => 'preparo',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );
    $cmbEstagios->add_field( array(
        'name' => 'Fundação (%)',
        'desc' => 'Apenas números',
        'id'   => 'fundacao',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );
    $cmbEstagios->add_field( array(
        'name' => 'Estruturação (%)',
        'desc' => 'Apenas números',
        'id'   => 'estruturacao',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );
    $cmbEstagios->add_field( array(
        'name' => 'Aalvenaria (%)',
        'desc' => 'Apenas números',
        'id'   => 'alvenaria',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );
    $cmbEstagios->add_field( array(
        'name' => 'Instalacao (%)',
        'desc' => 'Apenas números',
        'id'   => 'instalacao',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );
    $cmbEstagios->add_field( array(
        'name' => 'Acabamento (%)',
        'desc' => 'Apenas números',
        'id'   => 'acabamento',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );

    //ebook
    $cmbEbook = new_cmb2_box([
		'id' => 'imoveis_ebook',
		'title' => 'Área do E-book',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]); 
    $cmbEbook->add_field( array(
        'name' => 'Background',
        'id'   => 'bg_ebook',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
    ) );
    $cmbEbook->add_field( array(
        'name' => 'Background fixo',
        'desc' => 'Marque essa opção se quiser o background da sessão fixo',
        'id'   => 'fixed_bg_ebook',
        'type' => 'checkbox',
    ) );
 	$cmbEbook->add_field( array(
        'name' => 'Texto do botão',
        'id'   => 'txt_btn_ebook',
        'type' => 'text',
        'default' => 'Baixe agora o e-book do empreendimento'
    ) );

    //vantagens
    $cmbVantagens = new_cmb2_box([
		'id' => 'imoveis_vantagens',
		'title' => 'Vantagens',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]); 
    $cmbVantagens->add_field( array(
        'name' => 'Título da sessão',
        'id'   => 'tt_vantagens',
        'type' => 'text',
        'default' => 'Vantagens'
    ));
    $cmbVantagens->add_field( array(
        'name' => 'Descrição da sessão',
        'id'   => 'desc_vantagens',
        'type' => 'wysiwyg',
        'default' => 'Você poderá usufruir de facilidades exclusivas e comodidades que oferecemos a você'
    ));
    $cmbVantagens->add_field( array(
        'name' => 'Lista de vantagens',
        'id'   => 'lista_vantagens',
        'type' => 'text',
        'repeatable' => true
    ));

    //contato
    $cmbContato = new_cmb2_box([
		'id' => 'imoveis_contato',
		'title' => 'Contato',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]); 
    $cmbContato->add_field( array(
        'name' => 'Título da sessão',
        'id'   => 'tt_contato',
        'type' => 'text',
        'default' => 'Preencha o formulário e seja atendido em breve'
    ));
    $cmbContato->add_field( array(
        'name' => 'placeholder nome',
        'id'   => 'place_nome',
        'type' => 'text',
        'default' => 'Seu Nome'
    ));
    $cmbContato->add_field( array(
        'name' => 'placeholder telefone',
        'id'   => 'place_telefone',
        'type' => 'text',
        'default' => 'Seu Telefone'
    ));
    $cmbContato->add_field( array(
        'name' => 'placeholder telefone',
        'id'   => 'place_email',
        'type' => 'text',
        'default' => 'Seu E-mail'
    ));
    $cmbContato->add_field( array(
        'name' => 'Texto do botão',
        'id'   => 'bt_form',
        'type' => 'text',
        'default' => 'Enviar'
    ));

    //faq
    $cmbFaq = new_cmb2_box([
		'id' => 'imoveis_faq',
		'title' => 'FAQ',
		'object_types' => ['imoveis'],
		'show_on' => [
				'key' => 'imoveis-template',
				'value' => 'page-imoveis.php'
		],
	]); 
    $cmbFaq->add_field( array(
        'name' => 'Título da sessão',
        'id'   => 'faq_tt',
        'type' => 'text',
        'default' => 'FAQ'
    ));
    $faqItens = $cmbFaq->add_field([
        'name' => 'Na região tem',
        'id' => 'faqItens',
        'type' => 'group',
        'repeatable' => true,
        'options' => [
            'group_title' => 'Ítem {#}',
            'add_button' => 'Adicionar',
            'remove_button' => 'Remover',
            'sortable' => true,
        ],
    ]);	
	$cmbFaq->add_group_field($faqItens, [
        'name' => 'Pergunta',
        'id' => 'faq_pergunta',
        'type' => 'wysiwyg',
    ]);
    $cmbFaq->add_group_field($faqItens, [
        'name' => 'Resposta',
        'id' => 'faq_resposta',
        'type' => 'wysiwyg',
    ]);
}