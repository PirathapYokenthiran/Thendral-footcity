<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-4">
  <h2>Edit Product</h2>
  <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-2"><label>Name</label><input type="text" name="name" class="form-control" value="{{ $product->name }}" required></div>
    <div class="mb-2"><label>Unit</label><input type="text" name="unit" class="form-control" value="{{ $product->unit }}"></div>
    <div class="mb-2"><label>Price</label><input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required></div>
    <div class="mb-2"><label>Old Price</label><input type="number" step="0.01" name="old_price" class="form-control" value="{{ $product->old_price }}"></div>
    <div class="mb-2"><label>Limit</label><input type="text" name="limit" class="form-control" value="{{ $product->limit }}"></div>
    <div class="mb-2"><label>Image</label><input type="file" name="image" class="form-control"></div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>
