<aside class="sidebar">
    <?php 
    if(is_active_sidebar('sidebar')):
    dynamic_sidebar('sidebar');
    endif;
    ?> <!--koristimo dynamic_sidebar() funkciju i propustamo argument-->
</aside>