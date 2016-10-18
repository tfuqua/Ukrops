<?php

// mt_settings_page() displays the page content for the Test Settings submenu
function mt_settings_page() {

    //must check that the user has the required capability
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }
?>

<div class="wrap">

<h2>Store Upload</h2>

<form method="POST" enctype="multipart/form-data" action="<?php echo admin_url('admin-post.php'); ?>">
<input type="hidden" name="action" value="store_form">

<div class="form-group">
  <label>Store</label>
  <input name="store" type="text" value=""/>
</div>

<div class="form-group">
  <label>Upload File</label>
  <input type="file" name="store-file" value=""
  accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
</div>

<hr />

<p class="submit">
<input type="submit" name="submit" class="button-primary" value="<?php esc_attr_e('Upload File') ?>" />
</p>

</form>
</div>

<?php

}

function process_store_form() {
  if(isset($_POST["submit"])) {

    $file = $_FILES['store-file'];
    $csvfile = fopen($file['tmp_name'], "r");


    while (($line = fgetcsv($csvfile)) !== FALSE) {
      //$line is an array of the csv elements
      print_r($line);
      echo '<br />';
    }

    fclose($file);

/*

    //}

    //print_r ($arr);
    /*$size = filesize($file['tmp_name']);
    $content = fread($data, $size);
    fclose ($data);
    $csv_array = explode("," , $content);*/

  }

}
