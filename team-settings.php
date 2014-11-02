<?php	


if ( ! defined('ABSPATH')) exit; // if direct access 



if(empty($_POST['team_hidden']))
	{
		$team_member_social_field = get_option( 'team_member_social_field' );
	}
else
	{	
		if($_POST['team_hidden'] == 'Y') {
			//Form data sent
			$team_member_social_field = stripslashes_deep($_POST['team_member_social_field']);
			update_option('team_member_social_field', $team_member_social_field);
	
			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>
	
			<?php
			} 
	}
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(team_plugin_name.' Settings')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="team_hidden" value="Y">
        <?php settings_fields( 'team_plugin_options' );
				do_settings_sections( 'team_plugin_options' );
			
		?>

    <div class="para-settings">
		<div class="option-box">
			<p class="option-title">Display input field on member page.</p>
 			<p class="option-info">By adding bellow input you can control extra input field under member page. if you want to remove one profile field then please empty this field and save changes or to add new profile field simply click add new. some default profile fields are facebook, twitter, googleplus, pinterest.</p>
			<table class="team_member_social_field">
                    
              
            <?php 

            if(empty($team_member_social_field))
                {
                    $team_member_social_field = array("facebook"=>"facebook","twitter"=>"twitter","googleplus"=>"googleplus","pinterest"=>"pinterest");
                    
                }

            foreach ($team_member_social_field as $value) {
                if(!empty($value))
                    {
                        ?>
                    <tr><td>
                    <input type="text" name="team_member_social_field[<?php echo $value; ?>]" value="<?php if(isset($team_member_social_field[$value])) echo $team_member_social_field[$value]; else echo $value; ?>"  /><br />
                    </td>
                    </tr>
                        <?php
                    
                    }
            }
            
            ?>

            
            </table> 
            

            <div class="button new_team_member_social_field">Add New</div>

 		</div>
    </div>






<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


</div>
