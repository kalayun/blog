<?php $audio = get_post_meta(get_the_ID(),'audio',true);$audio_time = get_post_meta(get_the_ID(),'audio_time',true);?><center><div class="article-audio">
    <i class="guxz"></i>
    <i class="dy"></i>
    <i class="xy"></i>
    <i class="gp audio-stick"></i>
</div></center>
<div class="audio">
    <i class="audio-play"></i>
    <audio preload="none" id="audio-<?php the_ID();?>" data-time="<?php echo $audio_time?$audio_time:'0';?>">
        <source src="<?php echo $audio;?>" type="audio/mpeg">
    </audio>
    <span class="star-time">00:00</span>
    <div class="time-bar">
        <span class="progressBar"></span>
        <i class="move-color"></i>
        <p class="timetip"></p>
    </div>
    <span class="end-time"><?php echo mbt_sec_to_time($audio_time);?></span>
    <p class="timeTip"></p><p class="timeTip"></p>
</div>