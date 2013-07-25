<br><br>
<div class="box">
	<h3 class="boxedTitle" >Associated Media</h3>
	<?php for($i=0; $i<sizeof($item['AssociatedMediaObjects']); $i++) : ?>
		<?php if(strtolower($item['AssociatedMediaObjects'][$i]['AssociatedMediaFileName']) != (string) 'no data') : ?>
			<center>
				<a href="<?php echo $baseUrl . 'videogallery/video.php?name=' . $item['AssociatedMediaObjects'][$i]['AssociatedMediaFileName']; ?>" class="lightbox">
					<img src="<?php echo $item['AssociatedMediaObjects'][$i]['ThumbSmall']; ?>" border=0 />
				</a>
			</center>
		<?php endif; ?>
	<?php endfor; ?>
</div>