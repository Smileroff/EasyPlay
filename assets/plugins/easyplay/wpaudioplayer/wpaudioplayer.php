<?php
global $modx;
$src = '<script type="text/javascript" src="assets/plugins/easyplay/wpaudioplayer/audio-player.js"></script>  
        <script type="text/javascript">  
            AudioPlayer.setup("assets/plugins/easyplay/wpaudioplayer/player.swf", {  
                width: 290  
            });  
        </script> ';
$modx->regClientStartupScript($src);
?>