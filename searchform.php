<form role="search" method="GET" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
		<div class="search-wrapper">
			<label class="sr-only" for="search">Search</label>
			<input placeholder="Search..." type="text" class="search-input" name="s" id="search">
			<input type="hidden" name="searchblogs" value="1,2,4" />
			<button type="submit" id="searchsubmit" class="search-submit"><i class="fa fa-search"></i></button>
		</div>
</form>