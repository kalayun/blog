<?php 
/*
	template name: 瀑布流
	description: template for mobantu.com modown theme 
*/
get_header();
?>
<div class="banner-page" <?php if(_MBT('banner_page_img')){?> style="background-image: url(<?php echo _MBT('banner_page_img');?>);" <?php }?>>
	<div class="container">
		<h1 class="archive-title"><?php the_title();?></h1>
	</div>
</div>
<div class="main">
    <?php do_action("modown_main");?>
	<div class="container clearfix">
		<?php if(_MBT('filter')){?>
        <div class="filters">
            <?php if(_MBT('filter_cat')){?>
            <div class="filter-item">
                <span><?php echo _MBT('filter_cats_title1')?_MBT('filter_cats_title1'):'分类';?></span>
                <div class="filter">
                    <?php 
                        if((isset($_GET['c']) && $_GET['c'] == '') || !isset($_GET['c'])) $class2="active";else $class2 = ''; 
                        echo '<a href="'.add_query_arg(array("paged"=>1,"c"=>'','c2'=>'','c3'=>'','c4'=>'','t'=>''),MBThemes_selfURL()).'" rel="nofollow" class="'.$class2.'">全部</a>';
                        $filter_cat_ids = _MBT('filter_cats');
                        if($filter_cat_ids){
                            $filter_cat_ids_array = explode(',', $filter_cat_ids);
                            foreach ($filter_cat_ids_array as $cat_id) {
                                $term = get_term_by('id',$cat_id,'category');
                                if($_GET['c'] == $term->term_id) $class="active";else $class = ''; 
                                echo '<a href="'.add_query_arg(array("c"=>$term->term_id,'c2'=>'','c3'=>'','c4'=>'','t'=>'',"paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class.'">' . $term->name . '</a>';
                            }
                        }
                    ?>
                </div>
            </div>
            <?php 
            if(isset($_GET['c']) && $_GET['c']){
                $category = get_term_by('id',$_GET['c'],'category');
                $cat_childs = get_categories("parent=".$category->term_id."&hide_empty=0&depth=1");  
                if($cat_childs){
            ?>
            <div class="filter-item">
                <span><?php echo _MBT('filter_cats_title2')?_MBT('filter_cats_title2'):'二级分类';?></span>
                <div class="filter">
                    <?php 
                        if((isset($_GET['c2']) && $_GET['c2'] == '') || !isset($_GET['c2'])) $class2="active";else $class2 = ''; 
                        echo '<a href="'.add_query_arg(array("paged"=>1,"c2"=>'','c3'=>'','c4'=>'','t'=>''),MBThemes_selfURL()).'" rel="nofollow" class="'.$class2.'">全部</a>';

                        foreach ($cat_childs as $term) {
                            if($_GET['c2'] == $term->term_id) $class="active";else $class = ''; 
                            echo '<a href="'.add_query_arg(array("c2"=>$term->term_id,'c3'=>'','c4'=>'','t'=>'',"paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class.'">' . $term->name . '</a>';
                        }
                        
                    ?>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <?php 
            if(isset($_GET['c2']) && $_GET['c2']){
                $category = get_term_by('id',$_GET['c2'],'category');
                $cat_childs = get_categories("parent=".$category->term_id."&hide_empty=0&depth=1");  
                if($cat_childs){
            ?>
            <div class="filter-item">
                <span><?php echo _MBT('filter_cats_title3')?_MBT('filter_cats_title3'):'三级分类';?></span>
                <div class="filter">
                    <?php 
                        if((isset($_GET['c3']) && $_GET['c3'] == '') || !isset($_GET['c3'])) $class2="active";else $class2 = ''; 
                        echo '<a href="'.add_query_arg(array("paged"=>1,"c3"=>'','c4'=>'','t'=>''),MBThemes_selfURL()).'" rel="nofollow" class="'.$class2.'">全部</a>';

                        foreach ($cat_childs as $term) {
                            if($_GET['c3'] == $term->term_id) $class="active";else $class = ''; 
                            echo '<a href="'.add_query_arg(array("c3"=>$term->term_id,'c4'=>'','t'=>'',"paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class.'">' . $term->name . '</a>';
                        }
                        
                    ?>
                </div>
            </div>
            <?php
                }
            }
            if(isset($_GET['c3']) && $_GET['c3']){
                $category = get_term_by('id',$_GET['c3'],'category');
                $cat_childs = get_categories("parent=".$category->term_id."&hide_empty=0&depth=1");  
                if($cat_childs){
            ?>
            <div class="filter-item">
                <span><?php echo _MBT('filter_cats_title5')?_MBT('filter_cats_title5'):'四级分类';?></span>
                <div class="filter">
                    <?php 
                        if((isset($_GET['c4']) && $_GET['c4'] == '') || !isset($_GET['c4'])) $class4="active";else $class4 = ''; 
                        echo '<a href="'.add_query_arg(array("paged"=>1,"c4"=>'',"t"=>''),MBThemes_selfURL()).'" rel="nofollow" class="'.$class4.'">全部</a>';

                        foreach ($cat_childs as $term) {
                            if($_GET['c4'] == $term->term_id) $class="active";else $class = ''; 
                            echo '<a href="'.add_query_arg(array("c4"=>$term->term_id,"t"=>'',"paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class.'">' . $term->name . '</a>';
                        }
                        
                    ?>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <?php }?>
            <?php if(_MBT('filter_taxonomy')){?>
            <?php 
                $post_texonomys = '';
                if(isset($_GET['c']) && $_GET['c']){
                    $taxonomys = get_term_meta($_GET['c'],'taxonomys',true);
                    if($taxonomys) $post_texonomys = $taxonomys;

                    if(isset($_GET['c2']) && $_GET['c2']){
                        $taxonomys = get_term_meta($_GET['c2'],'taxonomys',true);
                        if($taxonomys) $post_texonomys = $taxonomys;
                    }

                    if(isset($_GET['c3']) && $_GET['c3']){
                        $taxonomys = get_term_meta($_GET['c3'],'taxonomys',true);
                        if($taxonomys) $post_texonomys = $taxonomys;
                    }

                    if(isset($_GET['c4']) && $_GET['c4']){
                        $taxonomys = get_term_meta($_GET['c4'],'taxonomys',true);
                        if($taxonomys) $post_texonomys = $taxonomys;
                    }

                    if($post_texonomys){
                        $post_texonomys = explode('|', $post_texonomys);
                        foreach ($post_texonomys as $post_texonomy) { 
                            $post_texonomy = explode(',', $post_texonomy);
            ?>
            <div class="filter-item">
                <span><?php echo $post_texonomy[0];?></span>
                <div class="filter">
                    <?php 
                        if(!isset($_GET[$post_texonomy[2]]) || (isset($_GET[$post_texonomy[2]]) && $_GET[$post_texonomy[2]] == '')) $class2="active";else $class2 = ''; 
                        echo '<a href="'.add_query_arg(array("paged"=>1,$post_texonomy[2]=>''),MBThemes_selfURL()).'" rel="nofollow" class="'.$class2.'">全部</a>';
                        if(count($post_texonomy) == '4'){
                            $taxonomy = get_terms( array(
                                'taxonomy' => $post_texonomy[1],
                                'hide_empty' => false,
                                'include' => explode('-', $post_texonomy[3])
                            ) );
                        }else{
                            $taxonomy = get_terms( array(
                                'taxonomy' => $post_texonomy[1],
                                'hide_empty' => false,
                            ) );
                        }
                        if($taxonomy){
                            foreach ( $taxonomy as $term ) {
                                if(isset($_GET[$post_texonomy[2]]) && $_GET[$post_texonomy[2]] == $term->term_id) $class="active";else $class = ''; 
                                echo '<a href="'.add_query_arg(array($post_texonomy[2]=>$term->term_id,"paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class.'">' . $term->name . '</a>';
                            }
                        }
                    ?>
                </div>
            </div>
            <?php      
                        }
                    }
                }
            ?>
            <?php }?>
            <?php if(_MBT('filter_tag')){?>
            <div class="filter-item">
                <span><?php echo _MBT('filter_cats_title4')?_MBT('filter_cats_title4'):'标签';?></span>
                <div class="filter">
                    <?php 
                        $tags = '';
                        if((isset($_GET['t']) && $_GET['t'] == '') || !isset($_GET['t'])) $class2="active";else $class2 = ''; 
                        echo '<a href="'.add_query_arg(array("paged"=>1,"t"=>''),MBThemes_selfURL()).'" rel="nofollow" class="'.$class2.'">全部</a>';
                        if(isset($_GET['c4']) && $_GET['c4']){
                            $tags4 = get_term_meta($_GET['c4'],'tags',true);
                            if($tags4) $tags = $tags4;
                            elseif(isset($_GET['c3']) && $_GET['c3']){
                                $tags3 = get_term_meta($_GET['c3'],'tags',true);
                                if($tags3) $tags = $tags3;
                                elseif(isset($_GET['c2']) && $_GET['c2']){
                                    $tags2 = get_term_meta($_GET['c2'],'tags',true);
                                    if($tags2) $tags = $tags2;
                                    else{
                                        $tags = get_term_meta($_GET['c'],'tags',true);
                                    }
                                }
                            }
                        }elseif(isset($_GET['c3']) && $_GET['c3']){
                            $tags3 = get_term_meta($_GET['c3'],'tags',true);
                            if($tags3) $tags = $tags3;
                            elseif(isset($_GET['c2']) && $_GET['c2']){
                                $tags2 = get_term_meta($_GET['c2'],'tags',true);
                                if($tags2) $tags = $tags2;
                                elseif(isset($_GET['c']) && $_GET['c']){
                                    $tags3 = get_term_meta($_GET['c'],'tags',true);
                                    if($tags3) $tags = $tags3;
                                }
                            }elseif(isset($_GET['c']) && $_GET['c']){
                                $tags2 = get_term_meta($_GET['c'],'tags',true);
                                if($tags2) $tags = $tags2;
                            }
                        }elseif(isset($_GET['c2']) && $_GET['c2']){
                            $tags2 = get_term_meta($_GET['c2'],'tags',true);
                            if($tags2) $tags = $tags2;
                            elseif(isset($_GET['c']) && $_GET['c']){
                                $tags3 = get_term_meta($_GET['c'],'tags',true);
                                if($tags3) $tags = $tags3;
                            }
                        }elseif(isset($_GET['c']) && $_GET['c']){
                            $tags2 = get_term_meta($_GET['c'],'tags',true);
                            if($tags2) $tags = $tags2;
                        }

                        $filter_tag_ids = _MBT('filter_tags');
                        if($tags) $filter_tag_ids = $tags;

                        if(_MBT('filter_tag_auto')){
                            if(isset($_GET['c4']) && $_GET['c4']){
                                $filter_tag_ids = MBThemes_related_tags($_GET['c4']);
                            }elseif(isset($_GET['c3']) && $_GET['c3']){
                                $filter_tag_ids = MBThemes_related_tags($_GET['c3']);
                            }elseif(isset($_GET['c2']) && $_GET['c2']){
                                $filter_tag_ids = MBThemes_related_tags($_GET['c2']);
                            }elseif(isset($_GET['c']) && $_GET['c']){
                                $filter_tag_ids = MBThemes_related_tags($_GET['c']);
                            }
                        }

                        if($filter_tag_ids){
                            $filter_tag_ids_array = explode(',', $filter_tag_ids);
                            foreach ($filter_tag_ids_array as $tag_id) {
                                $term = get_term_by('id',$tag_id,'post_tag');
                                if($_GET['t'] == $term->term_id) $class="active";else $class = ''; 
                                echo '<a href="'.add_query_arg(array("t"=>$term->term_id,"paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class.'">' . $term->name . '</a>';
                            }
                        }
                    ?>
                </div>
            </div>
            <?php }?>
            <?php 
            if(is_user_logged_in() || !_MBT('hide_user_all')){
            if(_MBT('filter_price')){?>
            <div class="filter-item">
                <span>价格</span>
                <div class="filter">
                    <?php 
                        $class3 = '';$class4='';$class5='';$class6='';$class7='';$class8='';$class9='';
                        if((isset($_GET['v']) && $_GET['v'] == '') || !isset($_GET['v'])){ 
                            $class3="active";
                        }elseif($_GET['v'] == 'fee'){
                            $class4 = 'active';
                        }elseif($_GET['v'] == 'free'){
                            $class5 = 'active';
                        }elseif($_GET['v'] == 'vip'){
                            $class6 = 'active';
                        }elseif($_GET['v'] == 'nvip'){
                            $class7 = 'active';
                        }elseif($_GET['v'] == 'svip'){
                            $class8 = 'active';
                        }elseif($_GET['v'] == 'vipf'){
                            $class9 = 'active';
                        }
                        echo '<a href="'.add_query_arg(array("paged"=>1,"v"=>""),MBThemes_selfURL()).'" rel="nofollow" class="'.$class3.'">全部</a>';
                        echo '<a href="'.add_query_arg(array("v"=>"free","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class5.'">免费</a>';
                        echo '<a href="'.add_query_arg(array("v"=>"fee","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class4.'">收费</a>';
                        if(!_MBT('vip_hidden') && !_MBT('filter_vip')){
                            echo '<a href="'.add_query_arg(array("v"=>"vip","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class6.'">VIP免费</a>';
                            echo '<a href="'.add_query_arg(array("v"=>"vipf","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class9.'">VIP优惠</a>';
                            if(get_option('ciphp_year_price')) echo '<a href="'.add_query_arg(array("v"=>"nvip","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class7.'">年费VIP免费</a>';
                            if(get_option('ciphp_life_price')) echo '<a href="'.add_query_arg(array("v"=>"svip","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class8.'">终身VIP免费</a>';
                        }  
                    ?>
                </div>
            </div>
            <?php }}?>
            <?php if(_MBT('filter_order')){?>
            <div class="filter-item filter-item-order">
                <span>排序</span>
                <div class="filter">
                    <?php 
                        $class3 = '';$class4='';$class5='';$class6='';$class7='';$class8='';
                        if((isset($_GET['o']) && $_GET['o'] == '') || !isset($_GET['o'])){ 
                            $class3="active";
                        }elseif($_GET['o'] == 'download'){
                            $class4 = 'active';
                        }elseif($_GET['o'] == 'view'){
                            $class5 = 'active';
                        }elseif($_GET['o'] == 'comment'){
                            $class6 = 'active';
                        }elseif($_GET['o'] == 'update'){
                            $class7 = 'active';
                        }elseif($_GET['o'] == 'recommend'){
                            $class8 = 'active';
                        }
                        echo '<a href="'.add_query_arg(array("paged"=>1,"o"=>''),MBThemes_selfURL()).'" rel="nofollow" class="'.$class3.'">最新 <i class="icon icon-arrow-down-o"></i></a>';
                        echo '<a href="'.add_query_arg(array("o"=>"recommend","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class8.'">推荐 <i class="icon icon-arrow-down-o"></i></a>';
                        echo '<a href="'.add_query_arg(array("o"=>"download","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class4.'">下载 <i class="icon icon-arrow-down-o"></i></a>';
                        echo '<a href="'.add_query_arg(array("o"=>"view","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class5.'">浏览 <i class="icon icon-arrow-down-o"></i></a>';
                        echo '<a href="'.add_query_arg(array("o"=>"comment","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class6.'">评论 <i class="icon icon-arrow-down-o"></i></a>';
                        echo '<a href="'.add_query_arg(array("o"=>"update","paged"=>1),MBThemes_selfURL()).'" rel="nofollow" class="'.$class7.'">更新 <i class="icon icon-arrow-down-o"></i></a>';
                    ?>
                </div>
            </div>
            <?php }?>
        </div>
        <?php }?>

		<div id="posts" class="posts grids waterfall clearfix">
			<?php 
			  	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'ignore_sticky_posts' => 1,
                    'category__not_in' => explode(',', _MBT('all_cats_exclude')),
                    'paged' => $paged
                );
                if(_MBT('filter')){
                    $args['meta_query'] = array('relation' => 'AND');
                    
                    if(isset($_GET['c4']) && $_GET['c4']){
                        $args['cat'] = $_GET['c4'];
                    }elseif(isset($_GET['c3']) && $_GET['c3']){
                        $args['cat'] = $_GET['c3'];
                    }elseif(isset($_GET['c2']) && $_GET['c2']){
                        $args['cat'] = $_GET['c2'];
                    }elseif(isset($_GET['c']) && $_GET['c']){
                        $args['cat'] = $_GET['c'];
                    }

                    if(isset($_GET['t']) && $_GET['t']){
                        $args['tag_id'] = $_GET['t'];
                    }

                    if(isset($_GET['v']) && $_GET['v']){
                        if($_GET['v'] == 'fee'){
                            $args['meta_query'] = array(
                                //'relation' => 'AND',
                                array(
                                    'relation' => 'OR',
                                    array('key' => 'down_price', 'compare' => '>','value' => '0'),
                                    array('key' => 'down_urls', 'compare' => 'EXISTS')
                                )
                            );
                        }elseif($_GET['v'] == 'free'){
                            $args['meta_query'] = array(
                                //'relation' => 'AND',
                                array('key' => 'member_down', 'value' => array(4,8,9), 'compare' => 'NOT IN'),
                                array(
                                    'relation' => 'AND',
                                    array(
                                        'relation' => 'OR',
                                        array('key' => 'down_price', 'value' => ''),
                                        array('key' => 'down_price', 'value' => '0')
                                    ),
                                    array(
                                        'relation' => 'OR',
                                        array('key' => 'down_urls', 'compare' => 'NOT EXISTS'),
                                        array('key' => 'down_urls', 'value' => '')
                                    )
                                )
                            );
                        }elseif($_GET['v'] == 'vip'){
                            $args['meta_query'] = array(array('key' => 'member_down', 'value' => array(4,3), 'compare' => 'IN'));
                        }elseif($_GET['v'] == 'nvip'){
                            $args['meta_query'] = array(array('key' => 'member_down', 'value' => array(8,6), 'compare' => 'IN'));
                        }elseif($_GET['v'] == 'svip'){
                            $args['meta_query'] = array(array('key' => 'member_down', 'value' => array(9,7,10,11,13,14), 'compare' => 'IN'));
                        }elseif($_GET['v'] == 'vipf'){
                            $args['meta_query'] = array(array('key' => 'member_down', 'value' => array(2,5), 'compare' => 'IN'));
                        }
                    }
                    
                    if(isset($_GET['o']) && $_GET['o']){
                        if($_GET['o'] == 'comment'){
                            $args['orderby'] = 'comment_count';
                        }elseif($_GET['o'] == 'update'){
                            $args['orderby'] = 'modified';
                        }elseif($_GET['o'] == 'recommend'){
                            array_push($args['meta_query'], array('key' => 'down_recommend', 'value' => '1'));
                        }else{
                            if($_GET['o'] == 'download'){
                                $args['meta_key'] = 'down_times';
                            }
                            elseif($_GET['o'] == 'view'){
                                $args['meta_key'] = 'views';
                            }

                            $args['orderby'] = 'meta_value_num';
                        }
                    }

                    if(isset($post_texonomys) && is_array($post_texonomys)){
                        $args['tax_query'] = array();
                        foreach ($post_texonomys as $post_texonomy) {
                            $post_texonomy = explode(',', $post_texonomy);
                            if(isset($_GET[$post_texonomy[2]]) && $_GET[$post_texonomy[2]]){
                                array_push($args['tax_query'], array('taxonomy' => $post_texonomy[1],'field' => 'term_id','terms' => $_GET[$post_texonomy[2]]) );
                            }
                        }
                    }
                    
                }
				query_posts($args);
				while ( have_posts() ) : the_post(); 
				get_template_part( 'content-water', get_post_format() );
				endwhile; //wp_reset_query(); 
			?>
		</div>
		<?php MBThemes_paging();?>
		<div class="posts-loading"><img src="<?php bloginfo('template_url')?>/static/img/loader.gif"></div>
	</div>
</div>
<?php get_footer();?>