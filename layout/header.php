<nav class="navbar navbar-expand-lg bg-info navbar-dark">
	<div class="container">
		<a href="./" class="navbar-brand navbar-header">Final Project</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto h4">
			<li class="nav-item ">	
			<a class="nav-link" href="./">Task</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="absence.php">Absence</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="account.php">Account</a>

					
			</li>
			<!-- <li class="nav-item">
			<a class="nav-link"  href="admin/logout.php">Log out</a>
			</li> -->
		</ul>
		</div>
	</div>
</nav>


<script>
    let current_url = document.location;
    document.querySelectorAll(".nav-item a").forEach(function(e){
       if(e.href == current_url){
          e.classList += " active";
       }
    });
</script>