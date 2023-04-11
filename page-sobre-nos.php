<?php 
$estiloPagina = "sobre_nos.css";
    require_once "header.php";

    if(have_posts()):
        ?>

        <?php
        while(have_posts()): the_post();
            the_post_thumbnail('post-thumbnail',array('class'=>'imagem-sobre'));

            echo '<div class="conteudo">';
            the_title('<h2>','</h2>');
            the_content();
            echo '</div>';
        endwhile;
    endif;


 require_once "footer.php";
  ?>


