<?php
 function search_box() { ?> 
 	<div class="widget">
    <h2 class="widget-title">Tìm kiếm</h2>
    <div class="search-form">
      <form role="search" method="get" class="custom-search" action="<?php echo home_url( '/' ); ?>">
          <div class="input-group">
            <input  type="search" placeholder="Từ khóa ..." class="form-control search-input"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            <span class="input-group-btn">
              <button class="btn search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
             </span>
      </form>  
      
    </div>
  </div>	   		
<?php } ?>