<?php get_header();$tag_slug = get_query_var('tag');$tag = get_term_by('slug',$tag_slug,'post_tag');
$style = get_term_meta($tag->term_id,'style',true);$tag_class = 'grids'; 
if($style == 'list') $tag_class = 'lists';
elseif($style == 'grid') $tag_class = 'grids';
else{
    $style = _MBT('list_style');if($style == 'list') $tag_class = 'lists';
}
?>
<div class="banner-archive" <?php if(_MBT('banner_archive_img')){?> style="background-image: url(<?php echo _MBT('banner_archive_img');?>);" <?php }?>>
	<div class="container">
		<h1 class="archive-title"><?php single_tag_title() ?></h1>
		<p class="archive-desc"><?php echo trim(strip_tags(tag_description()));?></p>
	</div>
</div>
<div class="main">
	<?php do_action("modown_main");?>
	<div class="container clearfix">
		<?php if($style == 'list') echo '<div class="content-wrap"><div class="content">';?>
		<?php MBThemes_ad('ad_list_header');?>
		<div id="posts" class="posts <?php echo $tag_class;?> <?php if(_MBT('waterfall') && $style != 'list') echo 'waterfall';?> clearfix">
			<?php 
				$ccc = 'content';if($style == 'list') $ccc = 'content-list';
				while ( have_posts() ) : the_post(); 
				get_template_part( $ccc, get_post_format() );
				endwhile; wp_reset_query(); 
			?>
		</div>
		<?php MBThemes_paging();?>
		<?php MBThemes_ad('ad_list_footer');?>
		<?php if($style == 'list') {echo '</div></div>';get_sidebar();}?>
	</div>
</div>
<?php get_footer();?>