<div class="home-blogs"><?php global $post_target;$lz = _MBT('lazyload');?>
	<div class="container">
		<h2><span><?php echo _MBT('blog_name')?_MBT('blog_name'):'博客';?></span></h2>
		<p class="desc"><?php echo _MBT('blog_desc');?></p>
		<div class="lists clearfix">
			<?php 
				$args = array(
					'post_type'        => 'blog',
					'showposts'        => _MBT('home_blog_num')?_MBT('home_blog_num'):6
				);
				query_posts($args);
				while (have_posts()) : the_post(); 
			?>
			<div class="grid<?php if(!MBThemes_thumbnail_has()) echo ' nopic';?>">
				<?php if(MBThemes_thumbnail_has()){?>
				<div class="img"><a href="<?php the_permalink();?>" title="<?php the_title();?> target="<?php echo $post_target;?>" rel="bookmark">
				    <img <?php if($lz) echo 'src="'.get_bloginfo("template_directory").'/static/img/thumbnail.png"';?> <?php echo $lz?'data-src':'src';?>="<?php echo MBThemes_thumbnail();?>" class="thumb" alt="<?php the_title();?>">
				</a></div>
				<?php }?>
				<h3 itemprop="name headline"><a itemprop="url" rel="bookmark" href="<?php the_permalink();?>" title="<?php the_title();?>" target="<?php echo $post_target;?>"><?php the_title();?></a></h3>
				<div class="grid-meta">
				    <?php if(_MBT('post_date')){?><span class="time"><i class="icon icon-time"></i> <?php echo MBThemes_timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ) ?></span><?php }?><?php if(_MBT('post_views')){?><span class="views"><i class="icon icon-eye"></i> <?php MBThemes_views();?></span><?php }?>
				    <?php if(_MBT('post_comments')){?><span class="comments"><i class="icon icon-comment"></i> <?php echo get_comments_number('0', '1', '%');?></span><?php }?>
				</div>
			</div>
			<?php endwhile; wp_reset_query();?>
		</div>
		<div class="more"><a href="<?php echo get_post_type_archive_link('blog');?>" target="_blank">查看更多</a></div>
	</div>
</div>