<?php

function team_body_flat_bg($post_id)
	{
		
		
		
		$team_bg_img = get_post_meta( $post_id, 'team_bg_img', true );
		$team_themes = get_post_meta( $post_id, 'team_themes', true );
		$team_item_text_align = get_post_meta( $post_id, 'team_item_text_align', true );
				
		$team_total_items = get_post_meta( $post_id, 'team_total_items', true );		
		$team_column_number = get_post_meta( $post_id, 'team_column_number', true );

		$team_content_source = get_post_meta( $post_id, 'team_content_source', true );
		$team_content_year = get_post_meta( $post_id, 'team_content_year', true );
		$team_content_month = get_post_meta( $post_id, 'team_content_month', true );
		$team_content_month_year = get_post_meta( $post_id, 'team_content_month_year', true );
		
		$team_taxonomy = 'team_group';
		$team_taxonomy_category = get_post_meta( $post_id, 'team_taxonomy_category', true );	
		
		$team_posttype = 'team_member';
		
		
		$team_post_ids = get_post_meta( $post->ID, 'team_post_ids', true );




		

		$team_items_title_color = get_post_meta( $post_id, 'team_items_title_color', true );			
		$team_items_title_font_size = get_post_meta( $post_id, 'team_items_title_font_size', true );		

		$team_items_content_color = get_post_meta( $post_id, 'team_items_content_color', true );
		$team_items_content_font_size = get_post_meta( $post_id, 'team_items_content_font_size', true );

		
		$team_items_thumb_size = get_post_meta( $post_id, 'team_items_thumb_size', true );
		$team_items_max_width = get_post_meta( $post_id, 'team_items_max_width', true );		
		$team_items_thumb_max_hieght = get_post_meta( $post_id, 'team_items_thumb_max_hieght', true );
		
		
		$team_body = '';
		$team_body = '<style type="text/css"></style>';
		
		
		
		$team_body .= '
		<div  class="team-container" style="background-image:url('.$team_bg_img.')">
		<div style="background:'.$team_middle_line_bg.'" class="middle-line"></div>
		<ul  id="team-'.$post_id.'" class="team-items team-'.$team_themes.'">';
		
		global $wp_query;
		


		
		if(($team_content_source=="latest"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $team_posttype,
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => $team_total_items,
						
						) );
			
			
			}		
		
		elseif(($team_content_source=="older"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $team_posttype,
						'orderby' => 'date',
						'order' => 'ASC',
						'posts_per_page' => $team_total_items,
						
						) );

			}		

		elseif(($team_content_source=="featured"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $team_posttype,
						'meta_query' => array(
							array(
								'key' => '_featured',
								'value' => 'yes',
								)),
						'posts_per_page' => $team_total_items,
						
						) );

			}	


		elseif(($team_content_source=="year"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $team_posttype,
						'year' => $team_content_year,
						'posts_per_page' => $team_total_items,
						) );

			}

		elseif(($team_content_source=="month"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $team_posttype,
						'year' => $team_content_month_year,
						'monthnum' => $team_content_month,
						'posts_per_page' => $team_total_items,
						
						) );

			}

		elseif($team_content_source="taxonomy")
			{
				$wp_query = new WP_Query(
					array (
						'post_type' => $team_posttype,							
						'posts_per_page' => $team_total_items,
						
						'tax_query' => array(
							array(
								   'taxonomy' => $team_taxonomy,
								   'field' => 'id',
								   'terms' => $team_taxonomy_category,
							)
						)
						
						) );
			}


		
		elseif(($team_content_source=="post_id"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post__in' => $team_post_ids,
						'post_type' => $team_posttype,
						
						
						) );
			
			
			}

			

								
		
		if ( $wp_query->have_posts() ) :
		
		
		
		$i=0;
		
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
		
		$team_featured = get_post_meta( get_the_ID(), '_featured', true );
		$team_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $team_items_thumb_size );
		$team_thumb_url = $team_thumb['0'];
		
		
		
		
		if($i%2==0)
			{
				$even_odd = "even";
			}
		else
			{
				$even_odd = "odd";
			}
			
			
		
		$team_body.= '<li style="width:'.$team_items_max_width.';text-align:'.$team_item_text_align.';" class="team-item '.$even_odd.'" >';
		$team_body.= '<div class="team-post">';		
		
			
		if($team_featured=="yes")
			{
			$team_body.= '<div class="team-featured"></div>';
			}
		
		if(!empty($team_thumb_url))
			{
					$team_body.= '
		<div style="max-height:'.$team_items_thumb_max_hieght.';" class="team-thumb">
			<img src="'.$team_thumb_url.'" />

		</div>';
			}


	$team_member_position = get_post_meta(get_the_ID(), 'team_member_position', true );
	$team_member_fb = get_post_meta(get_the_ID(), 'team_member_fb', true );
	$team_member_twitter = get_post_meta( get_the_ID(), 'team_member_twitter', true );
	$team_member_google = get_post_meta( get_the_ID(), 'team_member_google', true );
	$team_member_pinterest = get_post_meta( get_the_ID(), 'team_member_pinterest', true );	


	
		$team_body.= '
			<div class="team-title" style="color:'.$team_items_title_color.';font-size:'.$team_items_title_font_size.'">'.get_the_title().'
			</div>';
			if(!empty($team_member_fb))
				{
					$team_body.= '<div class="team-position" style="color:'.$team_items_position_color.';font-size:'.$team_items_position_font_size.'">'.$team_member_position.'
					</div>';
				}

			
			$team_body.= '<div class="team-social" >';
			
			if(!empty($team_member_fb))
				{
					$team_body.= '<span class="fb">
						<a target="_blank" href="'.$team_member_fb.'"> </a>
					</span>';
				}

			if(!empty($team_member_twitter))
				{
					$team_body.= '<span class="twitter">
						<a target="_blank" href="'.$team_member_twitter.'"></a>
					</span>';
				}
				
			if(!empty($team_member_google))
				{
					$team_body.= '<span class="gplus">
						<a target="_blank" href="'.$team_member_google .'"></a>
					</span>';
				}
				
			if(!empty($team_member_pinterest))
				{
					$team_body.= '<span class="pinterest">
						<a target="_blank" href="'.$team_member_pinterest .'"></a>
					</span>';
				}
			$team_body.= '</div>';
			
			
			
			$team_body.= '<div class="team-content" style="color:'.$team_items_content_color.';font-size:'.$team_items_content_font_size.'">'.get_the_content().'
			</div>			
			
			</div>

		</li>';
		
		
		$i++;
		
		endwhile;
		
		wp_reset_query();
		endif;
		

			
		$team_body .= '</ul></div>';
		

		
		
		return $team_body;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}