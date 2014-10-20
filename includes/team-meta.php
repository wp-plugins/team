<?php







add_action('init', 'team_member_register');
 
function team_member_register() {
 
        $labels = array(
                'name' => _x('Team Member', 'post type general name'),
                'singular_name' => _x('Team Member', 'post type singular name'),
                'add_new' => _x('Add New Team Member', 'team_member'),
                'add_new_item' => __('Add New Team Member'),
                'edit_item' => __('Edit Team Member'),
                'new_item' => __('New Team Member'),
                'view_item' => __('View Team Member'),
                'search_items' => __('Search Team Member'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title','editor','thumbnail'),
				'menu_icon' => 'dashicons-admin-users',
				

          );
 
        register_post_type( 'team_member' , $args );

}



// Custom Taxonomy
 
function add_team_member_taxonomies() {
 
        register_taxonomy('team_group', 'team_member', array(
                // Hierarchical taxonomy (like categories)
                'hierarchical' => true,
                'show_admin_column' => true,
                // This array of options controls the labels displayed in the WordPress Admin UI
                'labels' => array(
                        'name' => _x( 'Team Group', 'taxonomy general name' ),
                        'singular_name' => _x( 'Team Group', 'taxonomy singular name' ),
                        'search_items' =>  __( 'Search Team Groups' ),
                        'all_items' => __( 'All Team Groups' ),
                        'parent_item' => __( 'Parent Team Group' ),
                        'parent_item_colon' => __( 'Parent Team Group:' ),
                        'edit_item' => __( 'Edit Team Group' ),
                        'update_item' => __( 'Update Team Group' ),
                        'add_new_item' => __( 'Add New Team Group' ),
                        'new_item_name' => __( 'New Team Group Name' ),
                        'menu_name' => __( 'Team Groups' ),

                ),
                // Control the slugs used for this taxonomy
                'rewrite' => array(
                        'slug' => 'team_group', // This controls the base slug that will display before each term
                        'with_front' => false, // Don't display the category base before "/locations/"
                        'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
                ),
        ));
}
add_action( 'init', 'add_team_member_taxonomies', 0 );









/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_team_member()
	{
		$screens = array( 'team_member' );
		foreach ( $screens as $screen )
			{
				add_meta_box('team_member_metabox',__( 'Team Member Options','team_member' ),'meta_boxes_team_member_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_team_member' );


function meta_boxes_team_member_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_team_member_input', 'meta_boxes_team_member_input_nonce' );
	


	$team_member_position = get_post_meta( $post->ID, 'team_member_position', true );
	$team_member_fb = get_post_meta( $post->ID, 'team_member_fb', true );
	$team_member_twitter = get_post_meta( $post->ID, 'team_member_twitter', true );
	$team_member_google = get_post_meta( $post->ID, 'team_member_google', true );		
	$team_member_pinterest = get_post_meta( $post->ID, 'team_member_pinterest', true );
	$team_member_website = get_post_meta( $post->ID, 'team_member_website', true );	
	$team_member_email = get_post_meta( $post->ID, 'team_member_email', true );	





?>




<table class="form-table">


    <tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Member Position</strong><br /><br /> 
        <input type="text" size="30" placeholder="Team Leader"   name="team_member_position" value="<?php if(!empty($team_member_position)) echo $team_member_position; ?>" />
        </td>
    </tr>

    <tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Facebook Profile url</strong><br /><br /> 
        <input type="text" size="30" placeholder="http://facebook.com/username"   name="team_member_fb" value="<?php if(!empty($team_member_fb)) echo $team_member_fb; ?>" />
        </td>
    </tr>



    <tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Twitter Profile url</strong><br /><br /> 
        <input type="text" size="30" placeholder="http://twitter.com/username"   name="team_member_twitter" value="<?php if(!empty($team_member_twitter)) echo $team_member_twitter; ?>" />
        </td>
    </tr>


    <tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Google Plus Profile url</strong><br /><br /> 
        <input type="text" size="30" placeholder="http://plus.google.com/username"   name="team_member_google" value="<?php if(!empty($team_member_google)) echo $team_member_google; ?>" />
        </td>
    </tr>

    <tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Pinterest Profile url</strong><br /><br /> 
        <input type="text" size="30" placeholder="http://pinterest.com/username"   name="team_member_pinterest" value="<?php if(!empty($team_member_pinterest)) echo $team_member_pinterest; ?>" />
        </td>
    </tr>


    <tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Member Website url</strong><br /><br /> 
        <input type="text" size="30" placeholder="http://example.com"   name="team_member_website" value="<?php if(!empty($team_member_website)) echo $team_member_website; ?>" />
        </td>
    </tr>





	
    <tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Member email</strong><br /><br /> 
        <input type="text" size="30" placeholder="hello@example.com"   name="team_member_email" value="<?php if(!empty($team_member_email)) echo $team_member_email; ?>" />
        </td>
    </tr>	
	
	
	



</table>





<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_team_member_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_team_member_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_team_member_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_team_member_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  
 	$team_member_position = sanitize_text_field( $_POST['team_member_position'] );	 
	$team_member_fb = sanitize_text_field( $_POST['team_member_fb'] );	
	$team_member_twitter = sanitize_text_field( $_POST['team_member_twitter'] );	
	$team_member_google = sanitize_text_field( $_POST['team_member_google'] );
	$team_member_pinterest = sanitize_text_field( $_POST['team_member_pinterest'] );
	$team_member_website = sanitize_text_field( $_POST['team_member_website'] );	
	$team_member_email = sanitize_text_field( $_POST['team_member_email'] );	
	
			


  // Update the meta field in the database.
 	update_post_meta( $post_id, 'team_member_position', $team_member_position );	 
	update_post_meta( $post_id, 'team_member_fb', $team_member_fb );	
	update_post_meta( $post_id, 'team_member_twitter', $team_member_twitter );
	update_post_meta( $post_id, 'team_member_google', $team_member_google );
	update_post_meta( $post_id, 'team_member_pinterest', $team_member_pinterest );
	update_post_meta( $post_id, 'team_member_website', $team_member_website );	
	update_post_meta( $post_id, 'team_member_email', $team_member_email );	
	

}
add_action( 'save_post', 'meta_boxes_team_member_save' );




















function team_posttype_register() {
 
        $labels = array(
                'name' => _x('Team', 'team'),
                'singular_name' => _x('Team', 'team'),
                'add_new' => _x('New Team', 'team'),
                'add_new_item' => __('New Team'),
                'edit_item' => __('Edit Team'),
                'new_item' => __('New Team'),
                'view_item' => __('View Team'),
                'search_items' => __('Search Team'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-groups',
				
          );
 
        register_post_type( 'team' , $args );

}

add_action('init', 'team_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_team()
	{
		$screens = array( 'team' );
		foreach ( $screens as $screen )
			{
				add_meta_box('team_metabox',__( 'Team Options','team' ),'meta_boxes_team_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_team' );


function meta_boxes_team_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_team_input', 'meta_boxes_team_input_nonce' );
	
	
	$team_bg_img = get_post_meta( $post->ID, 'team_bg_img', true );
	$team_themes = get_post_meta( $post->ID, 'team_themes', true );
	$team_item_text_align = get_post_meta( $post->ID, 'team_item_text_align', true );	
	$team_total_items = get_post_meta( $post->ID, 'team_total_items', true );	

	$team_content_source = get_post_meta( $post->ID, 'team_content_source', true );
	$team_content_year = get_post_meta( $post->ID, 'team_content_year', true );
	$team_content_month = get_post_meta( $post->ID, 'team_content_month', true );
	$team_content_month_year = get_post_meta( $post->ID, 'team_content_month_year', true );	


	$team_taxonomy_category = get_post_meta( $post->ID, 'team_taxonomy_category', true );
	
	$team_post_ids = get_post_meta( $post->ID, 'team_post_ids', true );	

	
	
	
	$team_items_title_color = get_post_meta( $post->ID, 'team_items_title_color', true );	
	$team_items_title_font_size = get_post_meta( $post->ID, 'team_items_title_font_size', true );

	$team_items_position_color = get_post_meta( $post->ID, 'team_items_position_color', true );
	$team_items_position_font_size = get_post_meta( $post->ID, 'team_items_position_font_size', true );
		
	$team_items_content_color = get_post_meta( $post->ID, 'team_items_content_color', true );	
	$team_items_content_font_size = get_post_meta( $post->ID, 'team_items_content_font_size', true );		
	
	
	$team_items_thumb_size = get_post_meta( $post->ID, 'team_items_thumb_size', true );	
	$team_items_max_width = get_post_meta( $post->ID, 'team_items_max_width', true );		
	$team_items_thumb_max_hieght = get_post_meta( $post->ID, 'team_items_thumb_max_hieght', true );	
	
	
	
	
	
	
 






		$team_customer_type = get_option('team_customer_type');

		if($team_customer_type=="free")
			{
				echo '<script>
					jQuery(document).ready(function()
						{
							jQuery("#team_items_max_width, #team_item_text_align, #team_items_position_color, #team_items_position_font_size, #team_items_content_color, #team_content_source_taxonomy, #team_content_source_post_id").attr("title","Only For Premium Version")
							jQuery("#team_items_max_width, #team_item_text_align, #team_items_position_color, #team_items_position_font_size, #team_items_content_color, #team_content_source_taxonomy, #team_content_source_post_id").attr("disabled","disabled")
						
						})
	 				</script>';
      
			}
		elseif($team_customer_type=="pro")
			{
				//premium customer support.
			}

?>




















<table class="form-table">





<tr valign="top">
		<td >
        
        <strong>Shortcode</strong><br />
  <span style=" color:#22aa5d;font-size: 12px;">Copy this shortcode and paste on page or post where you want to display Team. <br />Use PHP code to your themes file to display Team.</span>
        
        <br /> <br /> 
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[team <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br /><br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[team id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        
 <br />

		</td>
	</tr>






    <tr valign="top">

        <td style="vertical-align:middle;">
        
        <ul class="tab-nav">
            <li nav="1" class="nav1 active">Team Options</li>
            <li nav="2" class="nav2">Team Style</li>
            <li nav="3" class="nav3">Team Content</li>
        
        </ul>


        <ul class="box">
            <li style="display: block;" class="box1 tab-box active">
            
            
            <table>
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Number of post to display.</strong><br /><br /> 
                        
                        <input type="text" placeholder="ex:5 - Number Only"   name="team_total_items" value="<?php if(!empty($team_total_items))echo $team_total_items; else echo 5; ?>" />
                
                    </td>
                </tr>
                
                
                <tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Thumbnail Size</strong><br /><br /> 
                    <select name="team_items_thumb_size" >
                    <option value="none" <?php if($team_items_thumb_size=="none")echo "selected"; ?>>None</option>
                    <option value="thumbnail" <?php if($team_items_thumb_size=="thumbnail")echo "selected"; ?>>Thumbnail</option>
                    <option value="medium" <?php if($team_items_thumb_size=="medium")echo "selected"; ?>>Medium</option>
                    <option value="large" <?php if($team_items_thumb_size=="large")echo "selected"; ?>>Large</option>                               
                    <option value="full" <?php if($team_items_thumb_size=="full")echo "selected"; ?>>Full</option>   

                    </select>
                    </td>
				</tr>
                

                <tr valign="top">
                    <td style="vertical-align:middle;">
                    <strong>Item max Width(px)</strong><br /><br />
                    <input type="text" name="team_items_max_width" placeholder="ex:150px number with px" id="team_items_max_width" value="<?php if(!empty($team_items_max_width)) echo $team_items_max_width; else echo ""; ?>" />
                    </td>
                </tr>



                <tr valign="top">
                    <td style="vertical-align:middle;">
                    <strong>Thumbnail max hieght(px)</strong><br /><br />
                    <input type="text" name="team_items_thumb_max_hieght" placeholder="ex:150px number with px" id="team_items_thumb_max_hieght" value="<?php if(!empty($team_items_thumb_max_hieght)) echo $team_items_thumb_max_hieght; else echo ""; ?>" />
                    </td>
                </tr>
                
                
                

                
                
            </table>
            
            
            
            
            
            </li>
            <li class="box2 tab-box">
            
            <table>
            
            
                <tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Themes</strong><br /><br /> 
                    <select name="team_themes"  >
                    <option class="team_themes_flat" value="flat" <?php if($team_themes=="flat")echo "selected"; ?>>Flat</option>
                    <option class="team_themes_flat-bg" value="flat-bg" <?php if($team_themes=="flat-bg")echo "selected"; ?>>Flat Background</option>                    
                    </select>
                    </td>
				</tr>


                

                <tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Item Text Align</strong><br /><br /> 
                    <select id="team_item_text_align" name="team_item_text_align"  >
                    <option class="team_item_text_align" value="left" <?php if($team_item_text_align=="left")echo "selected"; ?>>Left</option>
                    
                    <option class="team_item_text_align" value="center" <?php if($team_item_text_align=="center")echo "selected"; ?>>Center</option>
                    
                    <option class="team_item_text_align" value="right" <?php if($team_item_text_align=="right")echo "selected"; ?>>Right</option>                    
                    </select>
                    </td>
				</tr>
				

                
                
                
                
                                           
            <script>
            jQuery(document).ready(function(jQuery)
                {
                        jQuery(".team_bg_img_list li").click(function()
                            { 	
                                jQuery('.team_bg_img_list li.bg-selected').removeClass('bg-selected');
                                jQuery(this).addClass('bg-selected');
                                
                                var team_bg_img = jQuery(this).attr('data-url');
            
                                jQuery('#team_bg_img').val(team_bg_img);
                                
                            })	
            
                                
                })
            
            </script> 
                            
                            
                            
                            
                            
                            
            <tr valign="top">
            
                    <td style="vertical-align:middle;">
                    
                    <strong>Background Image</strong><br /><br /> 
                    
            
            <?php
            
            
            
                $dir_path = team_plugin_dir."css/bg/";
                $filenames=glob($dir_path."*.png*");
            
            
                $team_bg_img = get_post_meta( $post->ID, 'team_bg_img', true );
                
                if(empty($team_bg_img))
                    {
                    $team_bg_img = "";
                    }
            
            
                $count=count($filenames);
                
            
                $i=0;
                echo "<ul class='team_bg_img_list' >";
            
                while($i<$count)
                    {
                        $filelink= str_replace($dir_path,"",$filenames[$i]);
                        
                        $filelink= team_plugin_url."css/bg/".$filelink;
                        
                        
                        if($team_bg_img==$filelink)
                            {
                                echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                            }
                        else
                            {
                                echo '<li   data-url="'.$filelink.'">';
                            }
                        
                        
                        echo "<img  width='70px' height='50px' src='".$filelink."' />";
                        echo "</li>";
                        $i++;
                    }
                    
                echo "</ul>";
                
                echo "<input style='width:100%;' value='".$team_bg_img."'    placeholder='Please select image or left blank' id='team_bg_img' name='team_bg_img'  type='text' />";
            
            
            
            ?>
                    </td>
                </tr>
                      

				


         
				
                

                
				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Post Title (Member Name) Color</strong><br /><br />
                    <input type="text" name="team_items_title_color" id="team_items_title_color" value="<?php if(!empty($team_items_title_color)) echo $team_items_title_color; else echo ""; ?>" />
                    </td>
				</tr>                
                
                
				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Post Title(Member Name) Font Size</strong><br /><br />
                    <input type="text" name="team_items_title_font_size" placeholder="ex:14px number with px" id="team_items_title_font_size" value="<?php if(!empty($team_items_title_font_size)) echo $team_items_title_font_size; else echo "14px"; ?>" />
                    </td>
				</tr>                   



				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Member Position Font Color</strong><br /><br />
                    <input type="text" name="team_items_position_color" placeholder="#ffffff" id="team_items_position_color" value="<?php if(!empty($team_items_position_color)) echo $team_items_position_color; else echo ""; ?>" />
                    </td>
				</tr> 

				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Member Position Font Size</strong><br /><br />
                    <input type="text" name="team_items_position_font_size" placeholder="ex:12px number with px" id="team_items_position_font_size" value="<?php if(!empty($team_items_position_font_size)) echo $team_items_position_font_size; else echo ""; ?>" />
                    </td>
				</tr>  









<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Post Content (Member Bio) Color</strong><br /><br />
                    <input type="text" name="team_items_content_color" id="team_items_content_color" value="<?php if(!empty($team_items_content_color)) echo $team_items_content_color; else echo ""; ?>" />
                    </td>
				</tr>



<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Post Content (Member Bio) font size</strong><br /><br />
                    <input type="text" name="team_items_content_font_size" id="team_items_content_font_size" value="<?php if(!empty($team_items_content_font_size)) echo $team_items_content_font_size; else echo "13px"; ?>" />
                    </td>
				</tr>








 
		</table>


            </li>
            
            
            <li class="box3 tab-box">
            

            <table>
            

                

                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Filter Content</strong><br /><br /> 
<ul class="content_source_area" >

            <li><input class="team_content_source" name="team_content_source" id="team_content_source_latest" type="radio" value="latest" <?php if($team_content_source=="latest")  echo "checked";?> /> <label for="team_content_source_latest">Display from Latest Published Post(Member)</label>
            <div class="team_content_source_latest content-source-box">Team items will query from latest published Members.</div>
            </li>
            
            <li><input class="team_content_source" name="team_content_source" id="team_content_source_older" type="radio" value="older" <?php if($team_content_source=="older")  echo "checked";?> /> <label for="team_content_source_older">Display from Older Published Post(Member)</label>
            <div class="team_content_source_older content-source-box">Team items will query from older published Members.</div>
            </li>            
            
            <li><input class="team_content_source" name="team_content_source" id="team_content_source_featured" type="radio" value="featured" <?php if($team_content_source=="featured")  echo "checked";?> /> <label for="team_content_source_featured">Display from Featured Post(Member)</label>
            
            <div class="team_content_source_featured content-source-box">Team items will query from featured marked Members.</div>
            </li>
            
            <li><input class="team_content_source" name="team_content_source" id="team_content_source_year" type="radio" value="year" <?php if($team_content_source=="year")  echo "checked";?> /> <label for="team_content_source_year">Display from Only Year</label>
            
            <div class="team_content_source_year content-source-box">Member items will query from a year.
            <input type="text" size="7" class="team_content_year" name="team_content_year" value="<?php if(!empty($team_content_year))  echo $team_content_year;?>" placeholder="2014" />
            </div>
            </li>
            
            
            <li><input class="team_content_source" name="team_content_source" id="team_content_source_month" type="radio" value="month" <?php if($team_content_source=="month")  echo "checked";?> /> <label for="team_content_source_month">Display from Month</label>
            
            <div class="team_content_source_month content-source-box">Member items will query from Month of a year.		<br />
			<input type="text" size="7" class="team_content_month_year" name="team_content_month_year" value="<?php if(!empty($team_content_month_year))  echo $team_content_month_year;?>" placeholder="2014" />            
			<input type="text" size="7" class="team_content_month" name="team_content_month" value="<?php if(!empty($team_content_month))  echo $team_content_month;?>" placeholder="06" />
            </div>
            </li>            

            <li><input class="team_content_source" name="team_content_source" id="team_content_source_taxonomy" type="radio" value="taxonomy" <?php if($team_content_source=="taxonomy")  echo "checked";?> /> <label for="team_content_source_taxonomy">Display from Post(Member) Categories</label>
            
            <div class="team_content_source_taxonomy content-source-box" >
				<?php

					team_get_taxonomy_category($post->ID);
				
				?>
            
            </div>
            </li>           
            <li><input class="team_content_source" name="team_content_source" id="team_content_source_post_id" type="radio" value="post_id" <?php if($team_content_source=="post_id")  echo "checked";?> /> <label for="team_content_source_post_id">Display by Post(Member) id</label>
            
            <div  class="team_content_source_post_id content-source-box" >
				<?php

                        team_get_all_post_ids($post->ID);

                ?>
            
            </div>
            </li>
            </ul>
                
                    </td>
                </tr>
               </table>
            


            </li>
            
            
            
            
            
            
            
        </ul>
        
        
        
        </td>
    </tr> 

</table>
















<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_team_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_team_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_team_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_team_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$team_bg_img = sanitize_text_field( $_POST['team_bg_img'] );	
	$team_themes = sanitize_text_field( $_POST['team_themes'] );
	$team_item_text_align = sanitize_text_field( $_POST['team_item_text_align'] );	
	$team_total_items = sanitize_text_field( $_POST['team_total_items'] );		

	$team_content_source = sanitize_text_field( $_POST['team_content_source'] );
	$team_content_year = sanitize_text_field( $_POST['team_content_year'] );
	$team_content_month = sanitize_text_field( $_POST['team_content_month'] );
	$team_content_month_year = sanitize_text_field( $_POST['team_content_month_year'] );
		
	if(empty($_POST['team_taxonomy_category']))
		{
			$_POST['team_taxonomy_category'] = '';
		}
		
	$team_taxonomy_category = stripslashes_deep( $_POST['team_taxonomy_category'] );
	
	if(empty($_POST['team_post_ids']))
		{
			$_POST['team_post_ids'] = '';
		}
		
	$team_post_ids = stripslashes_deep( $_POST['team_post_ids'] );	

	
	$team_items_title_color = sanitize_text_field( $_POST['team_items_title_color'] );	
	$team_items_title_font_size = sanitize_text_field( $_POST['team_items_title_font_size'] );	

	$team_items_position_color = sanitize_text_field( $_POST['team_items_position_color'] );
	$team_items_position_font_size = sanitize_text_field( $_POST['team_items_position_font_size'] );	

	$team_items_content_color = sanitize_text_field( $_POST['team_items_content_color'] );	
	$team_items_content_font_size = sanitize_text_field( $_POST['team_items_content_font_size'] );	

	$team_items_thumb_size = sanitize_text_field( $_POST['team_items_thumb_size'] );
	$team_items_max_width = sanitize_text_field( $_POST['team_items_max_width'] );	
	$team_items_thumb_max_hieght = sanitize_text_field( $_POST['team_items_thumb_max_hieght'] );	
	
	
	
			


  // Update the meta field in the database.
	update_post_meta( $post_id, 'team_bg_img', $team_bg_img );	
	update_post_meta( $post_id, 'team_themes', $team_themes );
	update_post_meta( $post_id, 'team_item_text_align', $team_item_text_align );	
	update_post_meta( $post_id, 'team_total_items', $team_total_items );	

	update_post_meta( $post_id, 'team_content_source', $team_content_source );
	update_post_meta( $post_id, 'team_content_year', $team_content_year );
	update_post_meta( $post_id, 'team_content_month', $team_content_month );
	update_post_meta( $post_id, 'team_content_month_year', $team_content_month_year );	


	update_post_meta( $post_id, 'team_taxonomy_category', $team_taxonomy_category );

	update_post_meta( $post_id, 'team_post_ids', $team_post_ids );	



	update_post_meta( $post_id, 'team_items_title_color', $team_items_title_color );
	update_post_meta( $post_id, 'team_items_title_font_size', $team_items_title_font_size );

	update_post_meta( $post_id, 'team_items_position_color', $team_items_position_color );
	update_post_meta( $post_id, 'team_items_position_font_size', $team_items_position_font_size );	

	update_post_meta( $post_id, 'team_items_content_color', $team_items_content_color );
	update_post_meta( $post_id, 'team_items_content_font_size', $team_items_content_font_size );


	update_post_meta( $post_id, 'team_items_thumb_size', $team_items_thumb_size );
	update_post_meta( $post_id, 'team_items_max_width', $team_items_max_width );	
	update_post_meta( $post_id, 'team_items_thumb_max_hieght', $team_items_thumb_max_hieght );
	

	

}
add_action( 'save_post', 'meta_boxes_team_save' );


























?>