<?php

add_action('cmb2_admin_init', 'custom_fields_home');

function custom_fields_home(){  
  $cmbHero = new_cmb2_box([
    'id' => 'home_box',
    'title' => 'Topo',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php'
    ],
  ]);

  $cmbHero->add_field( array(
    'name' => 'Banner',
    'id' => 'banner_hero',
    'type' => 'file',
    'options' => [
      'url' => false
    ]
	) );
  $cmbHero->add_field( array(
    'name' => 'Background fixo',
    'desc' => 'Marque essa opção se quiser o background da sessão fixo',
    'id'   => 'fixed_bg',
    'type' => 'checkbox',
  ) );
  $cmbHero->add_field( array(
    'name' => 'Título',
    'id' => 'titulo_hero',
    'type' => 'text',
      'attributes' => array(
        'data-validation' => 'required',
    ),
    'default' => 'Os melhores lançamentos você encontra aqui!'
	) );
  $cmbHero->add_field( array(
    'name' => 'Texto do botão',
    'id' => 'titulo_botao_hero',
    'type' => 'text',
      'attributes' => array(
        'data-validation' => 'required',
    ),
    'default' => 'Confira'
	) );
  $cmbHero->add_field( array(
        'name' => 'Whatsapp',
        'desc' => 'Crie o link com mensagem personalizada para este imóvel, utilize o site: https://www.convertte.com.br/gerador-link-whatsapp',
        'id' => 'whtas_home',
        'type' => 'textarea_small',
        'attributes' => array(
            'data-validation' => 'required',
        ),
	) );
    

  //lançamentos da semana
  $cmbLancamentosDaSemana = new_cmb2_box([
    'id' => 'lancamentos_da_semana_box',
    'title' => 'Lançamentos da semana',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php'
    ],
  ]);
  $cmbLancamentosDaSemana->add_field( array(
    'name' => 'Título',
    'id' => 'titulo_lancamentos_semana',
    'type' => 'text',       
    'default' => 'Lançamentos da Semana'
	) );
  $cmbLancamentosDaSemana->add_field( array(
    'name' => 'Conteúdo',
    'id' => 'conteudo_lancamentos_conteudo',
    'type' => 'wysiwyg',       
	) );

  //destaque
  $cmbDestaque = new_cmb2_box([
    'id' => 'lancamentos_destaque_box',
    'title' => 'Destaque',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php'
    ],
  ]);
  $cmbDestaque->add_field( array(
    'name' => 'Título',
    'id' => 'titulo_destaque_semana',
    'type' => 'text',       
    'default' => 'Destaques'
	) );

  //busca detalhada
  $cmbBusca = new_cmb2_box([
    'id' => 'lancamentos_busca_box',
    'title' => 'Busca detalhada',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php'
    ],
  ]);
  $cmbBusca->add_field( array(
    'name' => 'Título',
    'id' => 'titulo_busca',
    'type' => 'text',       
    'default' => 'Busca detalhada'
	) );

    //blog
  $cmbBlog = new_cmb2_box([
    'id' => 'lancamentos_blog_box',
    'title' => 'Blog',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php'
    ],
  ]);
  $cmbBlog->add_field( array(
    'name' => 'Título',
    'id' => 'titulo_blog',
    'type' => 'text',       
    'default' => 'Últimas postagens'
	) );


    //newslette
  $cmbNew = new_cmb2_box([
    'id' => 'lancamentos_newsletter_box',
    'title' => 'Newsletter',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php'
    ],
  ]);
  $cmbNew->add_field( array(
    'name' => 'Descrição',
    'id' => 'desc_nlt',
    'type' => 'textarea_small',       
    'default' => 'Assine nossa newsletter e receba notícias e lançamentos antes de todo mundo'
	) );

    //sobre
  $cmbSobre = new_cmb2_box([
    'id' => 'lancamentos_sobre_box',
    'title' => 'Sobre',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php'
    ],
  ]);
  $cmbSobre->add_field( array(
    'name' => 'Título',
    'id' => 'sobre_titulo',
    'type' => 'text',       
    'default' => 'Sobre nós'
	) );

  $cmbSobre->add_field( array(
    'name' => 'Sobre a imobiliária',
    'id' => 'sobre_imob',
    'type' => 'wysiwyg'
	) );
   $cmbSobre->add_field( array(
    'name' => 'Sobre a compra',
    'id' => 'sobre_compra',
    'type' => 'wysiwyg'
	) );

  //Paágina Bairros
  $cmbBairros = new_cmb2_box([
      'id' => 'bairro_box',
      'title' => 'Topo',
      'object_types' => ['page'],
      'show_on' => [
          'key' => 'page-template',
          'value' => 'page-bairros.php'
      ],
    ]);

    $cmbBairros->add_field( array(
      'name' => 'Banner',
      'id' => 'banner_hero_bairro',
      'type' => 'file',
      'options' => [
        'url' => false
      ]
	) );

  
  
}

function cmb2_add_post_custom_field() {
    $cmbBlog = new_cmb2_box([
        'id' => 'blog_box',
        'title' => 'Informações do Blog',
        'object_types' => ['post'],
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ]);

    $cmbBlog->add_field([
        'name' => 'Imagem do Banner',
        'id' => 'banner_image_blog',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
        'text' => [
            'add_upload_file_text' => 'Adicionar Imagem do Banner',
        ],
        'query_args' => [
            'type' => ['image/jpeg', 'image/png'],
        ],
        'preview_size' => 'large',
    ]);

     $cmbBlog->add_field( array(
      'name' => 'Título da sessão de informações',
      'id' => 'titulo_informacoes',
      'type' => 'text',
      'default' => 'Informações'
    ) );

    $cmbBlog->add_field([
        'name' => 'Itens da Lista',
        'id' => 'lista_itens_infor',
        'type' => 'text',
        'repeatable' => true, 
    ]);
    
    $cmbBlog->add_field([
      'name' => 'Título da área de Call to Action ',
      'id' => 'titulo_call_blog',
      'type' => 'text',
    ]);
    
    $cmbBlog->add_field([
      'name' => 'Título do botão de Call to Action ',
      'id' => 'titulo_botao_call_blog',
      'type' => 'text',
    ]);
    $cmbBlog->add_field([
      'name'    => 'Imagem do Call to Action do  Blog',
      'desc'    => 'Insira uma imagem para o Call to Blog',
      'id'      => 'imagem_call_blog',
      'type'    => 'file',
      'options' => [
        'url' => false
      ],
    ]);

}