<?php
$VideoInsertCode = array();

// vimeo.com
$VideoInsertCode[] = array(
	tag => "vimeo",
	code => '<iframe src="http://player.vimeo.com/video/[+mediaId+]?title=0&amp;byline=0&amp;portrait=0" width="[+width+]" height="[+height+]" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'
	);

// youtube.com
$VideoInsertCode[] = array(
	tag => "youtube",
	code => '<iframe width="[+width+]" height="[+height+]" src="http://www.youtube.com/embed/[+mediaId+]" frameborder="0" allowfullscreen></iframe>'
	);

/*
[+mediaId+]	- id видеоролика
[+width+]	- ширина окна проигрывателя ролика
[+height+]	- высота окна проигрывателя ролика
*/	
?>