<div class="banner"<?php if(_MBT('banner_img')){?> style="background-image: url(<?php echo _MBT('banner_img');?>);" <?php }?>>
	<?php if(_MBT('banner_video')) echo '<video autoplay="autoplay" loop="loop" muted="muted" src="'._MBT('banner_video_url').'" class="banner-video"></video>';?>
	<div class="container">
    	<?php echo _MBT('banner_title')?('<h2>'._MBT('banner_title').'</h2>'):'';?>
        <?php echo _MBT('banner_desc')?('<p>'._MBT('banner_desc').'</p>'):'';?>
        <?php if(_MBT('banner_search')){?>
        <div class="search-form">
            <form method="get" class="site-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
              	<?php 
		        if(_MBT('banner_cats')){
		          	$cats = explode(',', trim(_MBT('banner_cats')));
		          	if(count($cats)){
			            echo '<select name="cat" class="search-cat"><option value="">全站</option>';
			            foreach ($cats as $cat) {
			              	echo '<option value="'.$cat.'">'.get_category($cat)->name.'</option>';
			            }
			            echo '</select>';
		          	}
		        }
		      	?>
              	<input class="search-input" name="s" type="text" placeholder="搜索一下">
              	<button class="search-btn" type="submit"><i class="icon icon-search"></i></button>
              	<?php if(_MBT('banner_keywords')){
              		echo '<div class="search-keywords">';
              		$search_keywords = str_replace('，', ',', _MBT('banner_keywords'));
              		$search_keywords = explode(',', $search_keywords);
              		foreach ($search_keywords as $keyword) {
              			if(is_numeric($keyword)){
              				$tag = get_term($keyword, 'post_tag');
              				if($tag){
              					echo '<a href="'.get_tag_link($tag).'" target="_blank">'.$tag->name.'</a>';
              				}
              			}else{
              				echo '<a href="'.home_url('/?s='.$keyword).'" target="_blank" rel="nofollow">'.$keyword.'</a>';
              			}
              		}
              		echo '</div>';
              	}?>
            </form>
        </div>
        <?php }else{ if(_MBT('banner_btn')){?><a href="<?php echo _MBT('banner_link');?>" target="_blank" class="banner-btn"><?php echo _MBT('banner_btn');?></a><?php } }?>
    </div>
</div>