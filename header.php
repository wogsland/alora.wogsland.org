<!-- header of my part of the website 
USE FRAMES IN HTML
-->
<?php If($_SERVER['SERVER_NAME']=='alora.wogsland.org')
		{$root='/';}
	Else
		{$root='/alora/';}?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
		<STYLE TYPE="text/css">
			a:link {color:#000080;}
			a:visited{color:#000080;}
			a:hover {color:red;}
			a {text-decoration:none;}
			body{
			font-family:verdana,arial,'sans serif';
			color:#000080;}
			h2 {font-size:120%;}
		</style>
	</head>
	<body>
		<div>
		<base target="_parent" />
		<center>
			<a href="http://wogsland.org/alora"><img src="<?php echo $root;?>images/myface.JPG" alt="me looking up at you" height="200px"></a></br>
			<h2>
					<a href="http://wogsland.org/alora/index.html">Home</a> |
					<a href="http://wogsland.org/alora/blog/index.html">Blog</a> |
					<a href="http://wogsland.org/alora/art/index.html">Art</a> |
					<a href="http://twitter.com/alorabora">Twitter</a> |
					<a href="http://youtube.com/user/alorabora">Youtube</a> |
					<a href="http://wogsland.org">Frontpage</a>
			</h2>
		</center>
		</div>
	</body>
</html>