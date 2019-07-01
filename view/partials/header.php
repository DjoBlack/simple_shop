<!DOCTYPE html>
<html>
<head>
	<title>
		Shop
	</title>
  
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous">
  </script>

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>

  <script>tinymce.init({selector:'textarea'});</script>
	
</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  				<a class="navbar-brand" href="/">The Shop</a>
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  				</button>

  				<div class="collapse navbar-collapse" id="navbarColor01">
    				<ul class="navbar-nav mr-auto">
      					<li class="nav-item <?php Utils::currentSection('/'); ?> ">
        					<a class="nav-link" href="/">Home</a>
      					</li>
      					<li class="nav-item <?php Utils::currentSection('/features'); ?>">
        					<a class="nav-link" href="/features">Features</a>
      					</li>
      					<li class="nav-item <?php Utils::currentSection('/about'); ?>">
        					<a class="nav-link" href="/about">About</a>
    					  </li>
                <?php if (isset($_SESSION[BaseController::$userSessionField])){ ?>
                  <li class="nav-item">
                    <!-- <a class="nav-link" href="/user/logout">Logout<span class="sr-only"></span></a> --> <!-- this variant also works if change routing method to GET, but not reccomended, user can cause unexpected unset -->
                    <form method="POST" action="/user/logout">
                      <input type="submit" value="Logout">
                    </form>
                  </li>
                <?php } else { ?>
                <li class="nav-item <?php Utils::currentSection('/user/register_form'); ?>">
                  <a class="nav-link" href="/user/register_form">Register<span class="sr-only"></span></a>
                </li>
                <li class="nav-item <?php Utils::currentSection('/user/login_form'); ?>">
                  <a class="nav-link" href="/user/login_form">Login<span class="sr-only"></span></a>
                </li>
              <?php } ?>
    				</ul>
    				<form class="form-inline my-2 my-lg-0">
      					<input class="form-control mr-sm-2" type="text" placeholder="Search">
      					<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    				</form>
  				</div>
			</nav>
