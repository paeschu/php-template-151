<head>
<link rel="stylesheet" href="/css/bootstrap.css" />
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
