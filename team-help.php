<div class="wrap">
	<?php echo "<h2>".__(team_plugin_name.' Help')."</h2>";?>
    <br />

		  
        
        
<h3>Have any issue ?</h3>

<p>Feel free to Contact with any issue for this plugin <a href="<?php echo team_conatct_url; ?>"><?php echo team_conatct_url; ?></a>
</p>

<?php

$team_customer_type = get_option('team_customer_type');
$team_version = get_option('team_version');


?>
<?php
if($team_customer_type=="free")
	{

		echo '<p>You are using <strong> '.$team_customer_type.' version  '.$team_version.'</strong> of '.team_plugin_name.', To get more feature you could try our premium version. ';
		
		echo '<a href="'.team_pro_url.'">'.team_pro_url.'</a></p>';
		
	}
elseif($team_customer_type=="pro")
	{

		echo '<p>Thanks for using <strong> '.$team_customer_type.' version  '.$team_version.'</strong> of <strong>'.team_plugin_name.'</strong> </p>';	
		
		
	}

 ?>




<?php
if($team_customer_type=="free")
	{
?>
<br />
<b>Premium Version Features</b><br />

<ul class="team-pro-features">

	<li>Life time automatic update.</li>
	<li>Life time support via forum.</li>
	<li>7 Days refund.</li>
	<li>Unlimited team's anywhere.</li> 
	<li>Two Different themes.</li>       
	<li>Fully responsive and mobile ready.</li>
	<li>Custom number of post query.</li>       
	<li>Team post thumbnail images size selection.</li>
	<li>Team grid thumbnail custom width.</li>
	<li>Team grid thumbnail custom height.</li>  
	<li>Team grid items text align.</li>       
    <li>Background image for team area.</li>
	<li>Team member name font color.</li>   
	<li>Team member name font size.</li>  
	<li>Team member position font color.</li>   
	<li>Team member position font size.</li> 
	<li>Team member bio font  color.</li> 
	<li>Team member bio font size.</li>
    

</ul>



</p>
        
        
        
      <?php
      }
	  
	  ?>  
      
<br /> 
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