<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cuadedanh - Admin Panel</title>
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Argon CSS -->
	<link type="text/css" href={{ asset('/login/css/argon.css?v=1.0.0') }} rel="stylesheet">
	<!-- Docs CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

	<main>
		<section class="section section-shaped section-lg my-0">
			<div class="shape shape-style-1 bg-gradient-default">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="container pt-lg-md">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card bg-secondary shadow border-0">
							<div class="card-body px-lg-5 py-lg-5">
								<div class="text-center text-muted mb-4">
									<h3>Đăng nhập</h3>
								</div>
								<form role="form">
									<div class="form-group mb-3">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fas fa-envelope-square"></i>
												</span>
											</div>
											<input class="form-control" placeholder="Email" type="email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input class="form-control" placeholder="Password" type="password">
										</div>
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-primary my-4">Sign in</button>
									</div>
								</form>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-6">
								<a href="#" class="text-light">
									<small>Forgot password?</small>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

</body>

</html>