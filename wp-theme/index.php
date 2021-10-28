<?php
/**
 * The main template file
 *
 * Template do desafio
 *
 * 
 */

//coloquei uma variavel para carregar a folha de estilo
//somente quando a pagina que o usuario desejar for acessada
global $post;
$estilo = 'home.css';
require_once("header.php");

    $args = array('post_type' => array('documentarios', 'filmes', 'series'));
    $query = new WP_Query($args);

    if($query->have_posts()){
       
        $query->the_post();
            the_post_thumbnail('post-thumbnail', ['class' => 'thumb_destaques']);
            echo "<div class='posicao'>";
            echo "<ul>";

            echo "<div class='categoria'>Filmes</div>";

            echo "<div id='tempo' class='tempo'>";
            echo "<div id='get_tempo'>";
            echo post_meta_box_event_post();
            echo "</div>";
            echo "</div>";

            echo "</ul>";

            the_title("<h2 class='titulo_destaques'>", "</h2>");
            
            $post_permalink = get_permalink();
            echo "<a href='$post_permalink' class='btn_destaque'>Mais Informações</a>";
            
            echo "</div>";
    
           
            
       
    }
    $args = array('post_type' => 'series');

    $query = new WP_Query($args);

    if($query->have_posts()):
        echo "<main class='page-documentarios'>";
        echo "<h2 class='cat-title'>";
        echo "Séries";
        echo "</h2>";
        echo "<ul  class='container carousel' id='myCarousel'>";
       
        echo "<div style='display: inline-flex' class='col'>";
    
        while($query->have_posts()): $query->the_post();
            echo "<li class='coluna-cat item'>";
            $post_permalink = get_permalink();
            echo "<a href='$post_permalink'>";
            the_post_thumbnail('post-thumbnail', ['class' => 'thumb']);
            echo "</a>";
            echo "<div class='tempo'>";
            the_excerpt();
            
            echo "</div>";
            the_title("<h2 class='titulo-documentario'>", "</h2>");  
            echo "</li>";   
        endwhile;
        echo "</div>";
        echo "<a class='switchLeft sliderButton'><</a>";
        echo "<a class='switchRight sliderButton'>></a>";
        echo "</ul>";
        echo "</main>";
    endif;

    $args = array('post_type' => 'filmes');

    $query = new WP_Query($args);

    if($query->have_posts()):
        echo "<main class='page-documentarios'>";
        echo "<h2 class='cat-title'>";
        echo "Filmes";
        echo "</h2>";
        echo "<ul  class='container'>";
        echo "<div style='display: inline-flex' class='col'>";
    
        while($query->have_posts()): $query->the_post();
            echo "<li class='coluna-cat'>";
            $post_permalink = get_permalink();
            echo "<a href='$post_permalink'>";
            the_post_thumbnail('post-thumbnail', ['class' => 'thumb']);
            echo "</a>";
            echo "<div class='tempo'>";
            the_excerpt();
            echo "</div>";
            the_title("<h2 class='titulo-documentario'>", "</h2>");  
            echo "</li>";   
        endwhile;
        echo "</div>";
        echo "</ul>";
        echo "</main>";
    endif;

    $args = array('post_type' => 'documentarios');

    $query = new WP_Query($args);

    if($query->have_posts()):
        
        echo "<main class='page-documentarios'>";
        echo "<h2 class='cat-title'>";
        echo "Documentários";
        echo "</h2>";
        echo "<ul  class='container'>";
        echo "<div style='display: inline-flex' class='col'>";
    
        while($query->have_posts()): $query->the_post();
            echo "<li class='coluna-cat'>";
            $post_permalink = get_permalink();
            echo "<a href='$post_permalink'>";
            the_post_thumbnail('post-thumbnail', ['class' => 'thumb']);
            echo "</a>";
            echo "<div class='tempo'>";
            the_excerpt();
            echo "</div>";
            the_title("<h2 class='titulo-documentario'>", "</h2>");  
            echo "</li>";   
        endwhile;
        echo "</div>";
        echo "</ul>";
        echo "</main>";
    endif;

get_footer();

?>
<script>

let tempo = document.getElementById("custom_post_series");
let tempo_inner = document.getElementById("tempo");

tempo_inner.innerHTML = tempo.value;

console.log(tempo.value);

</script>
