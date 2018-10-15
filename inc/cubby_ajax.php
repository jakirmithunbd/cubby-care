<?php 
// search page load more ajax
add_action("wp_ajax_load_search", "cubby_load_search");
add_action("wp_ajax_nopriv_load_search", "cubby_load_search");
function cubby_load_search(){
    $page = $_POST['page'];
    $offset = 3;
    $posts_per_page = 3;
    if($page > 2){
        for($i = 3; $i <= $page; $i++) {
            $offset = $offset + $posts_per_page;
        }
    }
    $args = [
        's' => $_POST['keywords'],
        'posts_per_page' => $posts_per_page,
        'offset' => $offset,
    ];
    
    $loop = new WP_Query($args);
    if($loop->have_posts()) : 
        while($loop->have_posts()) : $loop->the_post(); ?>
            <div class="result-item">
               <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
               <?php the_excerpt(); ?>
           </div>
    <?php
        endwhile;
    else : ?>
        <div class="entry-content notResult col-md-12 col-sm-12 col-xs-12">
            <h4 class="no-content text-center" style="padding: 0 0 50px; margin-top: 30px;">
                <?php _e('No more search result!!!', 'cubby'); ?>
            </h4>
        </div> 
<?php
    endif;
    die();
}
