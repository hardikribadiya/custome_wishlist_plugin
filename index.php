<?php
/*
Plugin Name:  Wishlist
Plugin URI:   https://abovestandard.dk/
Description:  Wishlist functionality is a feature that allows customers to save items they are interested in purchasing for later. 
Version:      1.0
Author:       Above Standard 
Author URI:   https://abovestandard.dk/
License:      GPL2
License URI:  https://abovestandard.dk/
Text Domain:  wpb-tutorial

*/
add_action( 'admin_menu', 'Wishlist' );
function Wishlist() {
    add_menu_page( 'Wishlist', 'Wishlist', 'manage_options', 'Wishlist', 'wishlist_admin_page', 'dashicons-tickets', 6  );
}

function wishlist_admin_page(){
	?>
	<h1>Wishlist</h1>
	<style>
	.main_container{
		background: #fff;
		width: 99%;
	}
  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    /*background-color: #f1f1f1;*/
	
  }
	
  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
  }
  .table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.table td, .table th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

.table tr:nth-child(even) {
  /*background-color: #dddddd;*/
}
.table tr td:nth-child(1){
	width:20%;
}
  .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #b9b9b9;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #525252;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
	
	
	.switch_single_product {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch_single_product input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .single_product_slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #b9b9b9;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .single_product_slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .single_product_slider {
      background-color: #525252;
    }

    input:focus + .single_product_slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .single_product_slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .single_product_slider.round {
      border-radius: 34px;
    }

    .single_product_slider.round:before {
      border-radius: 50%;
    }
</style>
<div class="main_container">
<div class="tab tab_back" >
  <button class="tablinks" onclick="openTab(event, 'general_option')"><b>General Option</b></button>
  <!--<button class="tablinks" onclick="openTab(event, 'CSS')">CSS</button>
  <button class="tablinks" onclick="openTab(event, 'jQuery')">jQuery</button>-->
</div>
<?php $wishlist_status =  get_option( 'wishlist_status' ); 
 $enable_single_wishlist = get_option( 'enable_single_wishlist' ); 
if($wishlist_status == ''){
	$wishlist_status = 0;
}else{
	if($wishlist_status == '0'){
		$wishlist_status = 0;
	}else{
		$wishlist_status = 1;
	}
}
if($enable_single_wishlist == ''){
	$enable_single_wishlist = 0;
}else{
	if($enable_single_wishlist == '0'){
		$enable_single_wishlist = 0;
	}else{
		$enable_single_wishlist = 1;
	}
}

?>
<div id="general_option" class="tabcontent" style="display:block;">
  <h3>General Option</h3>
  <table class="table">
  
  <tr>
		<td><b>Wishlist page</b></td>
		<td><p class="description">Pick a page as the main Wishlist page; make sure you add the <span class="code"><code>[absd_wcwl_wishlist]</code></span> shortcode into the page content</p></td>
  </tr>
  <tr>
    <td><b>Enable Shop list Page</b></td>
    <td>
		<label class="switch">
			<input type="checkbox" name="enable_wishlist" class="enable_wishlist" value="<?php echo $wishlist_status; ?>" <?php if($wishlist_status == '1'){ echo 'checked';} ?>>
			<span class="slider round"></span>
		</label>
		<p class="description">Pick a page as the main Wishlist page; make sure you add the <span class="code"><code>[absd_wslt_shop]</code></span> shortcode into the Shop page content</p>
	</td>
  </tr>
  <tr>
    <td><b>Enable Single Product Page</b></td>
    <td>
		<label class="switch_single_product">
			<input type="checkbox" name="enable_single_wishlist" class="enable_single_wishlist" value="<?php echo $enable_single_wishlist; ?>" <?php if($enable_single_wishlist == '1'){ echo 'checked';} ?>>
			<span class="single_product_slider round"></span>
		</label>
		<p class="description">Pick a page as the main Wishlist page; make sure you add the <span class="code"><code>[absd_wslt_shop]</code></span> shortcode into the Single Product page content</p>
	</td>
  </tr>
  <tr>
		<td><b>Wishlist Counter code </b></td>
		<td><p class="description"><span class="code"><code>[absd_wishlist_count]</code></span> </p></td>
  </tr>
</table>
</div>

<div id="CSS" class="tabcontent">
  <h3>CSS</h3>
  <p>CSS stands for Cascading Style Sheets.</p>
</div>

<div id="jQuery" class="tabcontent">
  <h3>jQuery</h3>
  <p>jQuery is a JavaScript library.</p>
</div>
<div>
<script>
  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  jQuery(document).on('click','.switch .slider',function(){
	  enable_wishlist = jQuery('.enable_wishlist').val();
	  if(enable_wishlist == 0){
		  jQuery('.enable_wishlist').val('1');
		 status_wishlist = 1; 
	  }else{
		  jQuery('.enable_wishlist').val('0');
		 status_wishlist = 0; 
	  }
	  console.log(status_wishlist);
	  jQuery.ajax({
					url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
					type: 'POST',
					data: {
						'action': 'shop_pagelist_check_enable_disable',
						'wishlist_status': status_wishlist,
					},
					success: function(data) {
						
					},
		});
	  
  });
   jQuery(document).on('click','.switch_single_product .single_product_slider',function(){
	  enable_single_wishlist = jQuery('.enable_single_wishlist').val();
	  if(enable_single_wishlist == 0){
		  jQuery('.enable_single_wishlist').val('1');
		 enable_single_wishlist = 1; 
	  }else{
		  jQuery('.enable_single_wishlist').val('0');
		 enable_single_wishlist = 0; 
	  }
	  console.log(enable_single_wishlist);
	  jQuery.ajax({
					url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
					type: 'POST',
					data: {
						'action': 'single_product_check_enable_disable',
						'enable_single_wishlist': enable_single_wishlist,
					},
					success: function(data) {
						
					},
		});
	  
  });
</script>
	<?php
}
  add_action('wp_ajax_shop_pagelist_check_enable_disable', 'shop_pagelist_check_enable_disable');
  add_action('wp_ajax_nopriv_shop_pagelist_check_enable_disable', 'shop_pagelist_check_enable_disable');
	function shop_pagelist_check_enable_disable() {
		   update_option( 'wishlist_status', $_POST['wishlist_status'] );
		die();
	}
  add_action('wp_ajax_single_product_check_enable_disable', 'single_product_check_enable_disable');
  add_action('wp_ajax_nopriv_single_product_check_enable_disable', 'single_product_check_enable_disable');
	function single_product_check_enable_disable() {
		//print_r($_POST);
		   update_option( 'enable_single_wishlist', $_POST['enable_single_wishlist'] );
		    echo get_option( 'enable_single_wishlist');
		die();
	}
	
  



function absd_wcwl_wishlist(){
	ob_start();
?>
<style>
	.page-id-83783 .wishlist_table td.product-thumbnail img{
		height:auto;
	}
	 table.shop_table.wishlist_table {
		border: 1px solid rgba(0,0,0,.1);
		margin: 0 -1px 24px 0;
		text-align: left;
		width: 100%;
		border-collapse: separate;
		border-radius: 5px;
	}
	table.shop_table.wishlist_table th {
		font-weight: 700;
		padding: 9px 12px;
		line-height: 1.5em;
	}
	table.shop_table.wishlist_table td {
		border-top: 1px solid rgba(0,0,0,.1);
		padding: 9px 12px;
		vertical-align: middle;
		line-height: 1.5em;
	}
	table.shop_table.wishlist_table .delete-favorite{
		width: 40px;
		height: 40px;
		border-radius: 50%;
		align-items: center;
		justify-content: center;
		font-size: 20px;
		cursor: pointer;
		/*background-color: #e95127;*/
		color: #fff;
		display: inline-flex;
	}
	table.shop_table.wishlist_table .delete-favorite img{
		max-width: 15px;
        max-height: 20px;
	}
	.main_addtocart_div{
		display: flex;
		align-items: center;
		justify-content: center;
		column-gap: 10px;
		row-gap: 10px;
	}
	.product-add-to-cart{
		min-width:150px;
	}
	.favorite_add_to_cart_button{
		background-color:#626262 !important;
		color: #fff !important;
		font-weight: 500;
		font-size: 12px;
		line-height: 14px;
		text-transform: uppercase;
		padding: 9px 15px;
		background: rgba(27, 27, 60, 0.06);
		border-radius: 50px;
		cursor: pointer;
		background-position: center;
		display: inline-block;
	}
	.favorite_add_to_cart_button a{
		color:white;
	}
	@media screen and (max-width:1199px) and (min-width:767px) {
		.main_addtocart_div{
			flex-direction:column;
		}
		table.shop_table.wishlist_table td {
			padding: 9px 5px;
		}
	}
	@media screen and (max-width:960px) {
		/* for header */
		.page-id-83783 #new-menubar.custom_mobile_menu .responsive-row{
			width:100%;
		}
		.page-id-83783 #new-menubar.custom_mobile_menu .responsive-row .col-4{
			padding:0px;
		}
		.page-id-83783 #new-menubar.custom_mobile_menu{
			box-shadow: 1px 1px 6px rgb(0 0 0 / 20%);
		}
		.page-id-83783 #primary .entry-header .entry-title{
			padding-top: 35px !important;
		}
	}
	@media screen and (max-width:767px) {
		.main_addtocart_div {
			flex-direction: column;
		}
		.wishlist_table.wishlist_view.responsive{
			border: 1px solid rgba(0,0,0,.1) !important;
		}
		.wishlist_table.wishlist_view.responsive .product-name a{
			font-size:14px;
		}
		.custome_wishlist_table{
			overflow-x: auto;
			max-width: 500px;
			/* padding-right: 10px; */
		}
		.page-id-83783 .custome_wishlist_table .wishlist_view.responsive li {
			border:none;
			margin-bottom:0px;
			padding:0px;
		}
		.page-id-83783 .custome_wishlist_table .wishlist_table.wishlist_view .product-add-to-cart a{
             padding:0px !important;
		}
		.custome_wishlist_table{
			margin-bottom:50px;
		}
	}
</style>
<div class="custome_wishlist_table">
<table class="shop_table cart wishlist_table wishlist_view traditional responsive">
<thead>
   <tr>
      <th class="product-thumbnail"></th>
         <th class="product-name">
            <span class="nobr">PRODUKTNAVN</span>
         </th>
         <th class="product-price1">
            <span class="nobr"> PRIS</span>
         </th>
         <th class="product-specifikationer-status">
            <span class="nobr">
            SPECIFIKATIONER
         </span>
         </th>
         <th class="product-add-to-cart">
            <span class="nobr"></span>
         </th>
   </tr>
</thead>

<tbody class="wishlist-items-wrapper">
<?php



$favorite_id_array = favorite_id_array();
// print_r($favorite_id_array);
global $wp_query;
$favorite_save_wpq = $wp_query;
$wistlist_args = array(
'paged' => get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1,
'post_type'   => 'product',
'post__in'   => !empty($favorite_id_array) ? $favorite_id_array : array(0),
 );
$wishlist_wp_query = new WP_Query( $wistlist_args ); 
?>
<?php if ($wishlist_wp_query->have_posts()) : ?>
   <?php while ($wishlist_wp_query->have_posts()) : $wishlist_wp_query->the_post(); 
   $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full' );
   $product_id = get_the_ID();	
   global $product;
   ?>
  
   <tr class="remove_wishlist-<?php echo $product_id; ?>" data-row-id="<?php echo $product_id; ?>">
               <td class="product-thumbnail">
                  <a href="<?php the_permalink() ?>">
				  <?php  if($featured_img_url){ ?>
                  <img width="300" height="225" src="<?php echo $featured_img_url; ?>" sizes="(max-width: 300px) 100vw, 300px">	
					<?php } ?>
				  </a>
               </td>
               <td class="product-name">
                  <a href="<?php the_permalink() ?>" style="color:#E95127;">
                  <?php the_title(); ?>	</a>
               </td>
               <td class="product-price1">
               <?php global $product; echo wc_price( $product->get_price() ); ?>
               </td>
               <td>
                  <div class="custom_description_cls m-0">
						<ul>
							<li><?php the_content(); ?>	</li>
						</ul>
                  </div>
               </td>
               <td class="product-add-to-cart">
			   <img src="<?php echo plugins_url(); ?>/wishlist/image/loading.gif" class="wishlist_loader-<?php echo $product_id; ?>" width="25" height="25" style="display: none;">
               <?php 
             //  print_r($product->is_purchasable());
               if ( $product->is_purchasable() && 'out-of-stock' !== $product->get_stock_status() ) : ?>
			   <div class="main_addtocart_div">
							<div class="favorite_add_to_cart_button">
                     <a href="javascript:void(0);" data-quantity="1" class="button wp-element-button product_type_simple   " data-product_id="<?php echo $product_id; ?>" data-product_sku="<?php echo $product->get_sku(); ?>" rel="nofollow">Tilføj til kurv</a>
							</div>
						<?php endif ?>
                  <!--<a href="javascript:void(0);" >add to Basket</a>-->							
                  <a href="javascript:void(0);" class="delete-favorite" data-post_id="<?php echo $product_id; ?>"  > <img src="<?php echo plugins_url(); ?>/wishlist/image/delete.svg"></a>
			   </div>
               </td>
      </tr>
   <?php endwhile; ?>
<?php else : ?>
   <tr><td colspan="5"> Ingen produkter tilføjet til ønskelisten</td></tr>
<?php endif; ?>
<?php wp_reset_postdata();  ?> 
         
            </tbody>

</table>
</div>



<script>
jQuery(document).ready(function($) {
    $('tr .favorite_add_to_cart_button a').on('click', function(e){ 
    e.preventDefault();
    product_id = $(this).data('product_id');
    product_qty = $(this).data('quantity');
   // alert(product_id);
    var data = {
            action: 'ql_woocommerce_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: '',
        };
		$('.wishlist_loader-'+product_id).show();
    $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
              //  $thisbutton.removeClass('added').addClass('loading');
            },
            complete: function (response) {
               // $thisbutton.addClass('added').removeClass('loading');
            }, 
            success: function (response) { 
              // alert(response);
               if(response == 0){
                  $('tbody').html('<tr><td colspan="5"> No posts in your favorite</td></tr>');
               }else{
                  $('.remove_wishlist-'+product_id).remove();
               }
			     $('.custom_wishlist_cnt_val').html(response);
              $('.wishlist_loader-'+product_id).hide();
			   window.location.href = "<?php echo wc_get_cart_url(); ?>";
            }, 
        }); 
     }); 
	 
	 $('body').on('click', 'tr .delete-favorite', function() {
				var post_id = $(this).data('post_id');
				//alert(post_id);
				$('.wishlist_loader-'+post_id).show();
				$.ajax({
					url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
					type: 'POST',
					data: {
						'action': 'delfavorite',
						'post_id': post_id,
					},
					success: function(data) {
						$('.remove_wishlist-' + post_id).remove();
						if(data == 0){
						  $('tbody').html('<tr><td colspan="5"> Ingen produkter tilføjet til ønskelisten</td></tr>');
						}/*else{
							$('.remove_wishlist'+post_id).remove();
						}*/
						$('.custom_wishlist_cnt_val').html(data);
						$('.wishlist_loader-'+post_id).hide();
					},
				});
			});
});

</script>

<?php
	$wishlist_page = ob_get_contents();
	ob_end_clean();
	return $wishlist_page;
}

add_shortcode('absd_wcwl_wishlist', 'absd_wcwl_wishlist');



function absd_wishlist_count(){
	 $favorite_id_array = favorite_id_array();
	ob_start();
	?>
	
		<a href="<?php echo home_url(); ?>/wishlist/">
			<img alt="" height="19" width="21" data-src="<?php echo plugins_url(); ?>/wishlist/image/wishlist.svg" class="li-image ls-is-cached " src="<?php echo plugins_url(); ?>/wishlist/image/wishlist.svg" loading="lazy"> 
			<?php 
			if($favorite_id_array){
			?>
			<span class="custom_wishlist_cnt_val"><?php echo count($favorite_id_array); ?></span>
			<?php }else{
				?>
			<span class="custom_wishlist_cnt_val">0</span>	
				<?php
			}?>
		</a>
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}

add_shortcode('absd_wishlist_count', 'absd_wishlist_count');


add_action('wp_ajax_cookibot_status_ajax', "cookibot_status_ajax");
add_action('wp_ajax_nopriv_cookibot_status_ajax', "cookibot_status_ajax");
function cookibot_status_ajax() 
{
	//session_start();
	//$_SESSION['review_status'] = $_POST['val'];
	setcookie('cookibot_status', $_POST['val'], time() + (86400 * 30), "/");
}

///wishlist functionality

function favorite_id_array() { 
	//print_r($_COOKIE['favorite_post_ids']);
	if (!empty( $_COOKIE['favorite_post_ids'])) {
		return explode(',', $_COOKIE['favorite_post_ids']);
	}
	else {
		return array();
	}
}


function favorite_shortcode(){
	global $product; 
	 $product->get_id();
	$product_id = $product->get_id();
	 $plugins_url = plugins_url();
	//echo $base_url = get_option( 'siteurl' );
	
	?>
	<div class="view_wishlist">
	<img src="<?php echo plugins_url(); ?>/wishlist/image/loading.gif" class="img" width="25" height="25" style="display:none;">
	<?php
	if(in_array($product_id, favorite_id_array())){ 
	?>	
		
		<div class="fv_<?php echo $product_id; ?> remove_wishlistt" title="wishlist" >
		<div class="remove_wishlist" title="" data-post_id="<?php echo $product_id; ?>">
			<img src="<?php echo plugins_url(); ?>/wishlist/image/wishlist-fill-remove.svg" width="25" height="25">
		</div>
		</div>
		<?php } else {  ?>
		<div class="fv_<?php echo $product_id; ?> addwishlist" title="wishlist">
		   <div class="add-favorite" title="" data-post_id="<?php echo $product_id; ?>">
			  <img src="<?php echo plugins_url(); ?>/wishlist/image/wishlist.svg" width="25" height="25">
		   </div>
		</div>
		<?php }
		?>
		</div>
		<?php
}

add_shortcode('absd_wslt_shop', 'favorite_shortcode');

//add to favorite function
    function add_favorite() {
        $post_id = (int)$_POST['post_id'];
        if (!empty($post_id)) {
            $new_post_id = array(
                $post_id
            );
            $post_ids = array_merge($new_post_id, favorite_id_array());
            $post_ids = array_diff($post_ids, array(
                ''
            ));
            $post_ids = array_unique($post_ids);
            setcookie('favorite_post_ids', implode(',', $post_ids) , time() + 3600 * 24 * 365, '/');
            echo count($post_ids);
        }
        die();
    }
    add_action('wp_ajax_favorite', 'add_favorite');
    add_action('wp_ajax_nopriv_favorite', 'add_favorite');
	
	
	  //delete from favorite function
    function delete_favorite() {
		
        $post_id = (int)$_POST['post_id'];
		
        if (!empty($post_id)) {
            $favorite_id_array = favorite_id_array();
            if (($delete_post_id = array_search($post_id, $favorite_id_array)) !== false) {
                unset($favorite_id_array[$delete_post_id]);
            }
            setcookie('favorite_post_ids', implode(',', $favorite_id_array) , time() + 3600 * 24 * 30, '/');
            echo count($favorite_id_array);
        }
        die();
    }
    add_action('wp_ajax_delfavorite', 'delete_favorite');
    add_action('wp_ajax_nopriv_delfavorite', 'delete_favorite');

	function remove_wishlist() {
		
        $post_id = (int)$_POST['post_id'];
		
        if (!empty($post_id)) {
            $favorite_id_array = favorite_id_array();
            if (($delete_post_id = array_search($post_id, $favorite_id_array)) !== false) {
                unset($favorite_id_array[$delete_post_id]);
            }
            setcookie('favorite_post_ids', implode(',', $favorite_id_array) , time() + 3600 * 24 * 30, '/');
            echo count($favorite_id_array);
        }
        die();
    }
    add_action('wp_ajax_remove_wishlist', 'remove_wishlist');
    add_action('wp_ajax_nopriv_remove_wishlist', 'remove_wishlist');


add_action( 'woocommerce_before_add_to_cart_button', 'mish_before_add_to_cart_btn' );

function mish_before_add_to_cart_btn(){
	
	//echo do_shortcode('[absd_wslt_shop]');
}

add_action( 'woocommerce_after_add_to_cart_button', 'mish_after_add_to_cart_btn' );
$wishlist_status =  get_option('wishlist_status'); 
 if($wishlist_status == '1'){
		function mish_after_add_to_cart_btn(){
				echo do_shortcode('[absd_wslt_shop]');
		}
		add_filter( 'woocommerce_loop_add_to_cart_link', 'mish_before_after_btn', 10, 3 );
	}

	function mish_before_after_btn( $add_to_cart_html, $product, $args ){

		 // Some text or HTML here
		 $enable_single_wishlist =  get_option('enable_single_wishlist'); 
			if($enable_single_wishlist == '1'){
		$after = do_shortcode('[absd_wslt_shop]'); // Add some text or HTML here as well 
		}else{
			$after = '';
		}

		return  $add_to_cart_html . $after;
 }

function wishlist_ajax_hook() {
    ?>
	<script>
jQuery(function($) {
	//adding to favorite
	$(document).on('click', '.view_wishlist .add-favorite', function() {
		$(this).parent().parent().find('.img').show();
		var post_id = $(this).data('post_id');
		//alert(post_id);
		$.ajax({
			url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
			type: 'POST',
			data: {
				'action': 'favorite',
				'post_id': post_id,
			},
			success: function(data) {
				$('.fv_' + post_id).parent().find('.img').hide();
				$('.fv_' + post_id).html('<div class="remove_wishlist" data-post_id="'+post_id+'"><img src="<?php echo plugins_url(); ?>/wishlist/image/wishlist-fill-remove.svg" width="25" height="25" loading="lazy"></div>');
				$('.custom_wishlist_cnt_val').html(data);
			},
		});
	});
	
	//remove Wishlist
	$('body').on('click', '.view_wishlist .remove_wishlist', function() {
		$(this).parent().parent().find('.img').show();
		var post_id = $(this).data('post_id');
		$.ajax({
			url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
			type: 'POST',
			data: {
				'action': 'delfavorite',
				'post_id': post_id,
			},
			success: function(data) {
				$('.fv_' + post_id).parent().find('.img').hide();
				$('.fv_' + post_id).html('<div class="add-favorite"  data-post_id="'+post_id+'"><img src="<?php echo plugins_url(); ?>/wishlist/image/wishlist.svg" width="25" height="25" loading="lazy"></div>');
			   console.log(data);
				$('.custom_wishlist_cnt_val').html(data);
			},
		});
	});
});
</script>
	<?php
}
add_action( 'wp_footer', 'wishlist_ajax_hook' );

?>
