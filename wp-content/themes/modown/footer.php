<footer class="footer">
	<div class="container">
	    <?php if(!_MBT('footer_widget')){?>
		<div class="footer-widgets">
	    	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_bottom')) : endif; ?>
	    </div>
	    <?php }?>
	    <?php if((is_home() || is_front_page()) && _MBT('friendlink')){?>
	    <div class="footer-links">
	    	<ul><li>友情链接：</li><?php wp_list_bookmarks('title_li=&categorize=0&show_images=0&category='._MBT('friendlink_id')); ?></ul>
	    </div>
	    <?php }?>
	    <p class="copyright"><?php echo _MBT('copyright')?_MBT('copyright'):'自豪的采用<a href="https://www.mobantu.com/7191.html" target="_blank"> Modown </a>主题';?></p>
	</div>
</footer>
<?php if(_MBT('rollbar')){?>
<div class="rollbar">
	<ul>
		<?php if(!_MBT('vip_hidden') && (is_user_logged_in() || !_MBT('hide_user_all'))){?><li class="vip-li"><a href="<?php echo get_permalink(MBThemes_page("template/vip.php"));?>"><i class="icon icon-crown-s"></i></a><h6>升级<?php $erphp_vip_name = get_option('erphp_vip_name')?get_option('erphp_vip_name'):'VIP'; echo $erphp_vip_name;?><i></i></h6></li><?php }?>
		<?php 
			if(_MBT('checkin')) {
		?>
		<?php if(is_user_logged_in()){global $current_user;?>
			<?php if(MBThemes_check_checkin($current_user->ID)){?>
			<li><a href="javascript:;" class="day-checkin active"><i class="icon icon-calendar"></i></a><h6>每日签到<i></i></h6></li>
			<?php }else{?>
			<li><a href="javascript:;" class="day-checkin"><i class="icon icon-calendar"></i></a><h6>每日签到<i></i></h6></li>
			<?php }?>
		<?php }else{?>
			<li><a href="javascript:;" class="signin-loader"><i class="icon icon-calendar"></i></a><h6>每日签到<i></i></h6></li>
		<?php }?>
		<?php
			}
		?>
		<?php if(_MBT('kefu_qq')){?><li><a href="<?php echo _MBT('kefu_qq');?>" target="_blank" rel="nofollow"><i class="icon icon-qq"></i></a><h6>联系QQ<i></i></h6></li><?php }?>
		<?php if(_MBT('kefu_weixin')){?><li><a href="javascript:;" class="kefu_weixin"><i class="icon icon-weixin"></i><img src="<?php echo _MBT('kefu_weixin');?>"></a></li><?php }?>
		<?php if(_MBT('fullscreen')){?><li><a href="javascript:;" class="fullscreen"><i class="icon icon-fullscreen"></i></a><h6>全屏浏览<i></i></h6></li><?php }?>
		<?php if(_MBT('theme_night')){
			$night_class = '';
			if(isset($_COOKIE['mbt_theme_night'])){
			    if($_COOKIE['mbt_theme_night'] == '1'){
			      	$night_class = ' active';
			    }
			}elseif(_MBT('theme_night_default')){
			    $night_class = ' active';
			}elseif(_MBT('theme_night_auto')){
			    $time = intval(date("Hi"));
			    if ($time < 730 || $time > 1930) {
			      	$night_class = ' active';
			    }
			}
		?><li><a href="javascript:;" class="theme_night<?php echo $night_class;?>"><i class="icon icon-moon" style="top:0"></i></a><h6>夜间模式<i></i></h6></li><?php }?>
		<?php if(_MBT('theme_fan')){?><li><a href="javascript:zh_tran2();" class="zh_click"><i class="icon icon-fan" style="top:0"></i></a><h6>繁简切换<i></i></h6></li><?php }?>
		<li class="totop-li"><a href="javascript:;" class="totop"><i class="icon icon-arrow-up"></i></a><h6>返回顶部<i></i></h6></li>    
	</ul>
</div>
<?php } ?>
<?php if(_MBT('footer_nav')){
	$footer_nav_style = '';
	$footer_nav_class = '';
	if(isset($_COOKIE['mbt_footer_nav']) && $_COOKIE['mbt_footer_nav'] == '1'){
		$footer_nav_style = ' style="height:0px;"';
		$footer_nav_class = ' active';
	}
?>
<div class="footer-fixed-nav clearfix"<?php echo $footer_nav_style;?>>
	<?php if(_MBT('footer_nav_html')){
		echo _MBT('footer_nav_html');
	}else{?>
		<a href="<?php echo home_url();?>"><i class="icon icon-home"></i><span>首页</span></a>
		<a href="<?php echo get_permalink(MBThemes_page("template/all.php"));?>"><i class="icon icon-find"></i><span>发现</span></a>
		<a href="<?php echo get_permalink(MBThemes_page("template/vip.php"));?>"><i class="icon icon-crown"></i><span>VIP</span></a>
		<?php if(_MBT('footer_nav_num') == '5'){?><a href="<?php echo _MBT('kefu_qq');?>" target="_blank" rel="nofollow"><i class="icon icon-qq"></i><span>客服</span></a><?php }?>
	<?php }?>
	<?php if(is_user_logged_in()){?>
	<a href="<?php echo get_permalink(MBThemes_page("template/user.php"));?>" class="footer-fixed-nav-user"><i class="icon icon-user"></i><span>我的</span></a>
	<?php }else{?>
	<a href="<?php echo get_permalink(MBThemes_page("template/login.php"));?>" class="footer-fixed-nav-user signin-loader"><i class="icon icon-user"></i><span>我的</span></a>
	<?php }?>
	<div class="footer-nav-trigger<?php echo $footer_nav_class;?>"><i class="icon icon-arrow-double-down"></i></div>
</div>
<?php }?>
<?php if(_MBT('site_tips')){?><div class="sitetips"><i class="icon icon-horn"></i> <?php echo _MBT('site_tips');?><a href="javascript:;" class="close"><i class="icon icon-close"></i></a></div><?php }?>
<?php if(!is_user_logged_in()) get_template_part('module/login');?>
<?php if(_MBT('theme_fan')){?>
<?php if(_MBT('theme_fan_default')){?>
<script>var zh_autoLang_t=true;var zh_autoLang_s=false;</script>
<?php }else{?>
<script>var zh_autoLang_t=false;var zh_autoLang_s=true;</script>
<?php }?>
<script type='text/javascript' src='<?php bloginfo('template_url');?>/static/js/chinese.js'></script>
<?php }?>
<?php wp_footer();?>
<script>MOBANTU.init({ias: <?php echo _MBT('ajax_list_load')?'1':'0';?>, lazy: <?php echo _MBT('lazyload')?'1':'0';?>, water: <?php echo _MBT('waterfall')?'1':'0';?>, mbf: <?php if(_MBT('oauth_sms') && _MBT('oauth_sms_first')) echo '1'; else echo '0';?>, mpf: <?php if(_MBT('oauth_weixin_mp') && _MBT('oauth_weixin_mp_first') && function_exists('ews_login')) echo '1'; else echo '0';?>, mpfp: <?php if(get_option("ews_pro") && function_exists('ews_login')) echo '1'; else echo '0';?>});<?php if(_MBT('frontend_copy')){?>document.oncontextmenu = new Function("return false;");<?php }?>
</script>
<?php echo _MBT('js');?>
<div class="analysis"><?php echo _MBT('analysis');?></div>
</body>
</html>