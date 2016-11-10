<div class="sidebar-cooks">

  <h3><span><?php echo the_title() ?></span></h3>

  <ul>
      <?php
      $pageID = get_the_ID();

      $args = array(
       'sort_order' => 'asc',
       'sort_column' => 'ID',
       'parent' => $pageID,
       'post_type' => 'page',
     );

     $pages = get_pages($args);

     foreach ($pages as $page){
       $post = $page;
       setup_postdata( $post );?>

       <li>
         <a href="<?php echo get_permalink();?>"><?php the_title()?></a>
       </li>

       <?php
       wp_reset_postdata();
     }?>

  </ul>
</div>
