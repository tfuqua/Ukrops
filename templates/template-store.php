<?php /* Template Name: Store Search Template */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="container-fluid">
      <h1>Store Locator</h1>

      <div class="col-sm-3 pull-right">
          Filter

      </div>
      <div class="col-sm-9">
        <div id="map" style="width:100%; height:400px;"></div>

        <br /><br />
        <table class="table table-bordered">
          <tr>
            <th>Store</th>
            <th>Address</th>
          </tr>

          <?php
            if( have_rows('store', 'option') ) { ?>
              <div class="stores">
                <div class="container-fluid">
                  <?php while ( have_rows('store', 'option') ) : the_row(); ?>
                    <tr>
                      <td>
                        <?php the_sub_field('store'); ?>
                      </td>
                      <td>
                        <?php the_sub_field('address'); ?>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </div>
              </div>
          <?php } ?>
        </table>
      </div>



      <script>
        function initMap() {
          // Create a map object and specify the DOM element for display.
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 37.5407, lng: -77.4360},
            scrollwheel: false,
            zoom: 8
          });
        }

      </script>

		</div>
		</main><!-- #main -->
	</div><!-- #primary -->


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq9dRRK6bRF-okoEA4U7Zp4lK9h9iDtYo&callback=initMap"
    async defer></script>

	<?php get_footer();	?>
