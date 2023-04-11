<?php 
$estiloPagina = "destinos.css";
    require_once "header.php";?>

<h2>Conheca nosso destinos</h2>

    <?php
    //busca taxonomia
    $paises = get_terms(array('taxonomy' => 'paises'));

    foreach($paises as $pais):
?>
    <a href="?paises=<?= $pais->name ?>"><?= $pais->name ?></a>
<?php
    endforeach;

    if(!empty($_GET['paises'])){
        $paisSelecionado = array(array(
            'taxonomy' => 'paises',
            'field' => 'name',
            'terms' => $_GET['paises']
        ));
    }

    $args = array('post_type'=>'destinos', 'tax_query' => (!empty($_GET['paises']) ? $paisSelecionado : ''));
$query = new WP_Query($args);

    if($query->have_posts()):
        ?>

        <?php
        while($query->have_posts()): $query->the_post();
            the_post_thumbnail('post-thumbnail',array('class'=>'imagem-sobre'));

            echo '<div class="conteudo">';
            the_title('<h2>','</h2>');
            the_content();
            echo '</div>';
        endwhile;
    endif;


 require_once "footer.php";
  ?>


