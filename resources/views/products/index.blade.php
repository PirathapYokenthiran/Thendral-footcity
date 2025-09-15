<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-4">
  <h2>Product List</h2>
  <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Add Product</a>
  <a href="{{ route('logout') }}" class="btn btn-danger mb-3"
     onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered bg-white">
    <thead class="table-dark">
      <tr>
        <th>#</th><th>Name</th><th>Unit</th><th>Price</th><th>Old Price</th><th>Limit</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->unit }}</td>
        <td>{{ $p->price }}</td>
        <td>{{ $p->old_price }}</td>
        <td>{{ $p->limit }}</td>
        <td>
          <a href="{{ route('products.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
