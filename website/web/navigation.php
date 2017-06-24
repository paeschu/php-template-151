<link href="css/stylesheet.css" rel="stylesheet" type="text/css">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
		<a href="/home">DiscussIt</a>     
    </div>
<?php 
if(isset($_SESSION['email']))
{
?>
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active">
	        	<a href='/logout'>Abmelden<span class="sr-only">(current)</span></a>
	        </li>
	         <li class="active">
			<a href='/createPost'>Beitrag erstellen</a>
			</li>

<?php 
}
else
{
?>
		 	<li class="active">		
				<a href='/login'>Anmelden</a>
			</li>
<?php 
}
?>
		</ul>
	</div>
	</div>
</nav>
