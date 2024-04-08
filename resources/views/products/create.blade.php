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
			<div class="row d-flex justify-center">
				<div class="d-flex justify-content-end mb-3">
					<a href="{{ route('products.index') }}" class="btn btn-dark w-6 ">Back</a>
				</div>
				<div class="card border-0 shadow-lg p-0">
					<div class="card-header bg-dark">
						<h3 class="text-white">Create Product</h3>
					</div>
					<form enctype="multipart/form-data" action="{{ route('products.store') }}" method="post">
						@csrf
						<div class="card-bod p-3">
							<div class="mb-3">
								<label for="" class="form-label h5">Name:</label>
								<input
								value="{{ old('name')}}"
								type="text" 
								class="@error('name') is-invalid @enderror form-control form-control-lg" 
								placeholder="Name" 
								name="name">
								@error('name') 
									<p class="invalid-feedback">{{ $message }}</p>
								@enderror
								
							</div>
							<div class="mb-3">
								<label for="" class="form-label h5">Sku:</label>
								<input
								value="{{ old('sku')}}"
								type="text" 
								class="@error('sku') is-invalid @enderror form-control form-control-lg" 
								placeholder="Sku" 
								name="sku">
								@error('sku') 
									<p class="invalid-feedback">{{ $message }}</p>
								@enderror
							</div>
							<div class="mb-3">
								<label for="" class="form-label h5">Price:</label>
								<input
								value="{{ old('price')}}"
								type="text" 
								class="@error('price') is-invalid @enderror form-control form-control-lg" 
								placeholder="Price" 
								name="price">
								@error('price') 
								<p class="invalid-feedback">{{ $message }}</p>
								@enderror
							</div>
							<div class="mb-3">
								<label for="" class="form-label h5">Description:</label>
								<textarea 
								value="{{ old('description')}}"
								placeholder="Description" 
								class="form-control" 
								name="description" 
								cols="30" rows="5"></textarea>
							</div>
							<div class="mb-3">
								<label for="" class="form-label h5">Image:</label>
								<input type="file" class="form-control form-control-lg" placeholder="Price" name="image">
							</div>
							<div class="d-grid">
								<button class="btn btn-lg bg-dark text-white">
								Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
