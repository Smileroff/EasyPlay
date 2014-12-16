<?php
$AudioInsertCode = array();

// prostopleer.com
$AudioInsertCode[] = array(
	tag => "prostopleer",
	code => '<object width="411" height="28"><param name="movie" value="http://embed.prostopleer.com/track?id=[+mediaId+]"></param><embed src="http://embed.prostopleer.com/track?id=[+mediaId+]" type="application/x-shockwave-flash" width="411" height="28"></embed></object>'
	);

// flv-mp3.com  |  mp3 и плеер хран€тс€ на сайте
$AudioInsertCode[] = array(
	tag => "flv-mp3",
	code => '<object type="application/x-shockwave-flash" data="/assets/plugins/easyplay/flv-mp3/ump3player_500x70.swf" height="70" width="470"><param name="wmode" value="transparent" /><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="movie" value="/assets/plugins/easyplay/flv-mp3/ump3player_500x70.swf" /><param name="FlashVars" value="way=[+mediaId+]&amp;swf=/assets/plugins/easyplay/flv-mp3/ump3player_500x70.swf&amp;w=470&amp;h=70&amp;time_seconds=0&amp;autoplay=0&amp;q=&amp;skin=sky&amp;volume=70&amp;comment=" /></object>'
	);

// wpaudioplayer.com  |  mp3 и плеер хран€тс€ на сайте
$AudioInsertCode[] = array(
	tag => "wpaudioplayer",
	code => '<p id="audioplayer_[+pleerId+]">‘айл: [+mediaId+]</p>
		<script type="text/javascript">  
        AudioPlayer.embed("audioplayer_[+pleerId+]", {soundFile: "[+mediaId+]"});  
        </script>'
	);

/*
[+mediaId+]	- id видеоролика
[+pleerId+]	- id плеера (в некоторых случа€х нужен, дл€ множественного вызова проигрывател€ на странице)
*/	
?>