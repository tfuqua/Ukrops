<div class="sidebar-submenu sidebar">
  <ul>
    <?php
      global $showChildren;
      $p = $showChildren ? $post->ID : $post->post_parent;

      $m = buildMenu($p);
      $i = 0;
      foreach($m as $menuItem){
        if ($i == 0){ ?>
          <li>
            <a href="<?php echo get_permalink($menuItem->ID);?>">
              <?php echo $menuItem->post_title; ?>
            </a><ul>
        <?php
      } else { ?>
          <li>
            <a href="<?php echo get_permalink($menuItem->ID);?>">
              <?php echo $menuItem->post_title; ?>
            </a>
          </li>
      <?php
      }
        $i++;
        if (count($m) == $i){
          echo '</ul></li>';
        }
      }?>
  </ul>
</div>

<?php
  function buildMenu($parentID){

    $parent = get_post($parentID);
    $menu = array();
    array_push($menu, $parent);

    $args = array(
      'sort_order' => 'asc',
      'sort_column' => 'menu_order',
      'parent' => $parent->ID,
      'post_type' => 'page',
    );

    $children = get_pages($args);

    foreach($children as $child){
      array_push($menu, $child);
    }

    return $menu;
  }
?>