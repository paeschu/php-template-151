<head>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css">
</head>
<a href="/home">Home</a>
<?php 
if(isset($_SESSION['email']))
{
	echo "<a href='/logout'>logout</a>";
}
else
{
	echo "<a href='/login'>login</a>";
}
