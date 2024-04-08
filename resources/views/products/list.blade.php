<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Simple CRUD Laravel 11</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>
	<body>
		<div class="bg-dark py-3">
		<h1 class="text-white text-center">Simple CRUD Laravel 11</h1>
		</div>
		<div class="container mt-5">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-dark w-6 ">Create + </a>
            </div>
			<div class="row d-flex justify-center">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <!-- {{Session::get('success')}} -->
                        Product added succesfully! 
                    </div>
                @endif
			<div class="card border-0 shadow-lg p-0">
				<div class="card-header bg-dark">
				    <h3 class="text-white">Products</h3>
				</div>
			</div>
			</div>
		</div>
	</body>
</html>
