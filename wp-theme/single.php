<?php

global $post;
$estilo = 'single.css';
require_once("header.php");

if(have_posts()){
   while(have_posts()){
       the_post();
      
        //TEMPO EM MIN
      echo "<div class='single-cat-name'>";
      echo "<ul class='single_heading'>";
      $post = get_queried_object();
      $postType = get_post_type_object(get_post_type($post));
      if ($postType) {
        echo "<li class='categoria'>$postType->label</li>";
      }

       echo "<li>";
       echo "<div id='tempo' class='tempo'>";
       echo "<div id='get_tempo'>";
       echo post_meta_box_event_post();
       echo "</div>";
       echo "</div>";
       echo "</li>";

       echo "</ul>";
       echo "</div>";

       echo "<div id='url_yt'>";
       post_meta_box_event_post_url();
       echo "</div>";
       the_title("<h2 class='single-title'>", "</h2>");
       
     ?>
     
     
       
   
    <iframe id="video" width="1150" height="500" src="#" frameborder="0" 
   allowfullscreen></iframe>
     
     
     <?php
        echo "<div class='conteudo'>";
               the_content();
        echo "</div>";

   }
}
require_once("footer.php");
?>
<script>

let tempo = document.getElementById("custom_post_series");
let tempo_inner = document.getElementById("tempo");
tempo_inner.innerHTML = tempo.value;

let video = document.getElementById("video");
var url = document.getElementById("custom_post_series");
console.log(url.value)

video.src = url.value;

</script>

 
