<?php

$title = (isset($HTTP_GET_VARS['title']) && $HTTP_GET_VARS['title']!= "") ? $HTTP_GET_VARS['title'] : urlencode('One more time...');
$url = (isset($HTTP_GET_VARS['url']) && $HTTP_GET_VARS['url']!= "") ? $HTTP_GET_VARS['url'] : '';

?>

<html>
<head>
<title>Administration Page</title>
</head>
<frameset rows="40,*" border="0" framespacing="0" frameborder="no"> 
	<frame src="poptop.php?url=<?php echo $url; ?>&title=<?php echo $title; ?>" name="top" marginwidth="0" marginheight="0" scrolling="no" noresize>
	</frame>
	<frame src="<?php echo urldecode($url); ?>" name="bottom" marginwidth="10" marginheight="0" scrolling="auto" noresize>
</frameset>
<noframes>
	<body bgcolor="#FFFFFF" text="#000000">
		<p>Sorry, your browser doesn't seem to support frames</p>
	</body>
</noframes>
</html>