
<?php
global $post;
$estilo = 'documentario.css';
require_once("header.php");

$args = array('post_type' => 'filmes');

$query = new WP_Query($args);
//iniciar contator

$i = 0;
if($query->have_posts()):
    echo "<main onload='carrega()' class='page-documentarios'>";
    echo "<ul class='lista-documentarios container'>";
    echo "<div class='col-left'>";
    echo "<h2 class='titulo-pagina'>SERIES</h2>";
    echo "<p class='descricao'>Praesent et risus est. Nullam nec euismod arcu. Integer massa sem, iaculis sit amet ante et, 
    fermentum sollicitudin est. Proin egestas felis arcu, eget egestas nisi accumsan non. Donec tincidunt et ipsum 
    nec consectetur. Fusce dapibus, urna id cursus accumsan, lacus diam sagittis enim, in facilisis lorem purus in 
    magna. Aenean sed augue commodo, auctor purus ac, varius purus. Etiam vel congue ligula, id porttitor dui.
    Aenean interdum mi ante, in volutpat quam laoreet quis. Donec aliquam convallis tempus.</p>";
    echo "</div>";
    echo "<div class='col-right'>";

    while($query->have_posts()): $query->the_post();
        echo "<li class='coluna-documentarios'>";
        $post_permalink = get_permalink();
        echo "<a href='$post_permalink'>";
        the_post_thumbnail();
        echo "</a>";
        echo "<div id='tempo' class='tempo'>";
        echo "<div id='get_tempo'>";
        echo post_meta_box_event_post();
        echo "</div>";
        echo "</div>";
       
         
        the_title("<h2 class='titulo-documentario'>", "</h2>");    
        echo "</li>";
        //3 em 3
        $i = $i + 1;
       
        /*if($i == 3){
            echo "<br>";
            //reniciar contador
            $i = 0;
        }*/
        
       
        
    endwhile;
    echo "</div>";
    echo "</ul>";
    echo "</main>";
endif;


require_once("footer.php");

?>

<style>
    
    #get_tempo{
        display: none;
        
    }
    #tempo{
        color: white;
    }
</style>

<script>

let tempo = document.getElementById("custom_post_series");
let tempo_inner = document.getElementById("tempo");

    tempo_inner.innerHTML = tempo.value;

console.log(tempo.value);

</script>