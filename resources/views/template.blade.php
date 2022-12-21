<!DOCTYPE html>
<html lang="en">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8" />
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">

		<link rel="stylesheet" href="{{asset('css/generator.css')}}">
		<link rel="stylesheet" href="{{asset('css/fontawesome_all.css')}}">
		<title>Oblivionverse - TAG Generator Tool</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top px-4">
			<div class="container-fluid">
				<img src="{{asset('images/oblivion_logo.png')}}" id="logo" title="logo-oblivionverse">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item header" style="font-weight:bold;">
							<a class="nav-link principal" href="/"><i class="fa-solid fa-tags"></i> Generate Tags</a> 
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/cpu_family_socket_series">Sockets</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/fan_types">Fan Types</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/storage_types_format">Storage</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/cooling_types">Cooling Types</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/radiator_sizes">Radiator Sizes</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/form_factors">Form Factors</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/ram_types">Ram Type</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/ram_type_speeds">Ram Type Speed</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/ram_capacity">Ram Capacity</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/series">Series</a>
						</li>
						<li class="nav-item header">
							<a class="nav-link principal" href="/tiers">Tiers</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<script src="{{asset('js/jquery-3.6.1.min.js')}}" crossorigin="anonymous"></script>
		<script src="{{asset('js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
		<div class="page"> 
			<div class="container margin"> 
				@yield('content')
			</div>
		</div>
	</body>
</html>