<!DOCTYPE html>
<html lang="ta">

<head>
    <meta charset="UTF-8">
    <title>Happy Supermarket Offers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('asset/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container my-3">
        <div class="top-bar">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-success btn-sm">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="ms-2">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
                {{-- <a href="{{ route('register') }}" class="btn btn-warning btn-sm ms-2">Register</a> --}}
            @endauth
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="text-center">
                    <h1 class="header-title">Happy Supermarket</h1>
                    <p>{{ $today->translatedFormat('l d F Y') }} | {{ $today->format('h:i A') }}</p>
                </div>

                <div class="offer-box">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>பொருள்</th>
                                <th>விலை</th>
                                <th>Limit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr>
                                    <td>{{ $p->name }} ({{ $p->unit }})</td>
                                    <td>
                                        {{ $p->price }}/-
                                        @if ($p->old_price)
                                            <span class="price-old">{{ $p->old_price }}/-</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->limit ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                @foreach ($products->take(3) as $p)
                    @if ($p->image)
                        <div class="mb-3 text-center">
                            <img src="{{ asset('uploads/' . $p->image) }}" class="img-fluid rounded shadow"
                                style="max-height: 180px;">
                            <p class="mt-2 fw-bold">{{ $p->price }}/-
                                @if ($p->old_price)
                                    <span class="price-old">{{ $p->old_price }}/-</span>
                                @endif
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="text-center mt-3">
        <p>📞 0777 8080 30</p>
        <p class="text-warning">நேரடி, சிலிர்க்கும் கொள்வனவுகளுக்கு மட்டுமே...</p>
    </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/fa9b419720.js" crossorigin="anonymous"></script>
</html>
