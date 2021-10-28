<?php


/**
 * The footer.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */


?>
<style>

footer div, footer p{
    margin-left: 3rem;
}
footer p {
    margin-top: 2rem;
}
@media (max-width: 700px){
    footer div, footer p{
    text-align: center;
}
footer p {
   text-align: center;
}
}

</style>

<footer style="background: #121212; padding-top:5rem; padding-bottom:5rem;">
<div class="logo_footer"><?php  the_custom_logo(); ?></div>
<p style="color: white;">© 2020 — Play — Todos os direitos reservados.</p>

</footer>


</body>
<?php  wp_footer(); ?>
</html>