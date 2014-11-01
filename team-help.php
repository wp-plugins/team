<?php

if ( ! defined('ABSPATH')) exit; // if direct access 

?>


<div class="wrap">
	<?php echo "<h2>".__(team_plugin_name.' Help')."</h2>";?>
    <br />

	<div class="para-settings">  
        
        
	<h2>Have any issue ?</h2>

	<p>Feel free to Contact with any issue for this plugin, Ask any question via forum <a href="http://paratheme.com/qa/">http://paratheme.com/qa/</a> <strong style="color:#139b50;">(free)</strong>
</p>


	<?php
    
    $team_customer_type = get_option('team_customer_type');
    $team_version = get_option('team_version');
    

    if($team_customer_type=="free")
        {
    
            echo '<p>You are using <strong> '.$team_customer_type.' version  '.$team_version.'</strong> of '.team_plugin_name.', To get more feature you could try our premium version. ';
            
            echo '<a href="'.team_pro_url.'">'.team_pro_url.'</a></p>';
            
        }
    elseif($team_customer_type=="pro")
        {
    
            echo '<p>Thanks for using <strong> premium version  '.$team_version.'</strong> of <strong>'.team_plugin_name.'</strong> </p>';	
            
            
        }
    
     ?>


	<h2>Tutorial</h2>
	<p>Please watch this video tutorial.</p>
    
	<iframe width="640" height="480" src="//www.youtube.com/embed/8OiNCDavSQg?rel=0" frameborder="0" allowfullscreen></iframe>


<?php
if($team_customer_type=="free")
	{
?>


        




	<div class="pricing-table">
        <h2>Pricing</h2>
        <p>you could try our premium version for features.</p>
        <div class="column">
            <div class="paln">Free</div>
            <div class="price">$0</div>
            <div class="cell"><span class="green">Life time free update.</span></div> 
            <div class="cell"><span class="red">Life time support via forum.</span></div>
            <div class="cell"><span class="red">Not applicable.</span></div>                         
            <div class="cell"><span class="green">Responsive Design.</span></div>        
            <div class="cell"><span class="red">Themes(Limited).</span></div>        
            <div class="cell"><span class="red">Grid thumbnail custom width.</span></div>
            <div class="cell"><span class="green">Grid thumbnail custom height.</span></div>
            <div class="cell"><span class="green">Grid Item Align.</span></div>              
            <div class="cell"><span class="red">Grid items text align.</span></div> 
            <div class="cell"><span class="green">Background image for team area.</span></div> 
            <div class="cell"><span class="green">Member name font color.</span></div> 
            <div class="cell"><span class="red">Member name font size.</span></div> 
            <div class="cell"><span class="red">Member position font color.</span></div> 
            <div class="cell"><span class="red">Member position font size.</span></div> 
            <div class="cell"><span class="green">Member bio font color.</span></div> 
            <div class="cell"><span class="red">Member bio font size.</span></div> 
            <div class="cell"><span class="green">Grid Items Margin.</span></div> 
            <div class="cell"><span class="green">Member Bio Max Height.</span></div>
            <div class="cell"><span class="red">Display from Member Categories.</span></div>        
            <div class="cell"><span class="red">Display by Member id.</span></div>        
            <div class="cell"><span class="green">Responsive admin panel.</span></div> 
            <div class="price">$0</div>
        </div>
        
        <div class="column">
            <div class="paln">Premium</div>
			<div class="price"><a target="_blank" class="buy-now" href="<?php echo team_pro_url; ?>">$5 Buy Now</a></div>
            <div class="cell"><span class="green">Life time free update.</span></div> 
            <div class="cell"><span class="green">Life time support via forum.</span></div>
            <div class="cell"><span class="green">7 Days refund.</span></div>        
            <div class="cell"><span class="green">Responsive Design.</span></div>        
            <div class="cell"><span class="green">Themes(All).</span></div>        
            <div class="cell"><span class="green">Grid thumbnail custom width.</span></div>
            <div class="cell"><span class="green">Grid thumbnail custom height.</span></div>
            <div class="cell"><span class="green">Grid Item Align.</span></div> 
            <div class="cell"><span class="green">Grid items text align.</span></div> 
            <div class="cell"><span class="green">Background image for team area.</span></div> 
            <div class="cell"><span class="green">Member name font color.</span></div> 
            <div class="cell"><span class="green">Member name font size.</span></div> 
            <div class="cell"><span class="green">Member position font color.</span></div> 
            <div class="cell"><span class="green">Member position font size.</span></div> 
            <div class="cell"><span class="green">Member bio font color.</span></div> 
            <div class="cell"><span class="green">Member bio font size.</span></div> 
            <div class="cell"><span class="green">Grid Items Margin.</span></div> 
            <div class="cell"><span class="green">Member Bio Max Height.</span></div>
            <div class="cell"><span class="green">Display from Member Categories.</span></div>        
            <div class="cell"><span class="green">Display by Member id.</span></div>        
            <div class="cell"><span class="green">Responsive admin panel.</span></div>
            <div class="price"><a target="_blank" class="buy-now" href="<?php echo team_pro_url; ?>">$5 Buy Now</a></div>
        </div>    
        
    </div>



</div>





 
        
      <?php
      }
	  
	  ?>  
      
<br /> <br /> <br /> 
<h3>Please share this plugin with your friends?</h3>
<table>
<tr>
<td width="100px"> 
<!-- Place this tag in your head or just before your close body tag. -->
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>

<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-href="<?php echo team_share_url; ?>"></div>

</td>
<td width="100px">
<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo team_share_url; ?>&amp;width=100&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=743541755673761" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>

 </td>
<td width="100px"> 





<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo team_share_url; ?>" data-text="<?php echo team_plugin_name; ?>">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td>

</tr>

</table>
        













    
         
</div>
<style type="text/css">
.team-pro-features{}

.team-pro-features li {
  list-style: disc inside none;
}

</style>