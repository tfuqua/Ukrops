<div class="sidebar-categories">
  <h3>Categories</h3>
  <ul>
    <?php
    $categories = get_categories();
    foreach ( $categories as $category ) { ?>
      <li>
        <a href="<?php echo esc_url( get_category_link( $category->term_id)) ?>">
          <?php echo esc_html($category->name) ?>
        </a>
      </li>
    <?php
    }
    ?>
  </ul>  
</div>
