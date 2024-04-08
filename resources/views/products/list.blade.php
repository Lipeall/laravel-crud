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
                        {{Session::get('success')}}
                    </div>
                @endif
			<div class="card border-0 shadow-lg p-0">
				<div class="card-header bg-dark">
				    <h3 class="text-white">Products</h3>
				</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center"></th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Sku</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        @if($products->isNotEmpty())
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td class="text-center">
                                        @if($product->image != "")
                                            <img width="50" height="50" class="rounded" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->image}}" />
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->sku }}</td>
                                    <td class="text-center">${{ $product->price }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('products.edit', $product->id)}}" class="btn btn-dark">Edit</a>
                                        <a href="#"  data-id="{{ $product->id }}" class="btn btn-danger delete_user">Delete</a>
                                        <form id="delete-product-from-{{ $product->id }}" action="{{ route('products.destroy', $product->id)}}" method="post">
                                            @csrf
                                            @method("delete")
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
			</div>
			</div>
		</div>
	</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete_user');
        
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                deleteProduct(id);
            });
        });
    });

    function deleteProduct(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-product-from-' + id).submit();
            }
        })
    }
</script>
