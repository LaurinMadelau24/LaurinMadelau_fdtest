<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/src/assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('assets/src/assets/css/styles.min.css')}}" />
</head>

<body>
    <div class="container-fluid py-2 shadow">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="d-flex ms-auto">
                <a class="btn btn-dark rounded-sm" href="{{'\login'}}">Login</a>
                <a class="btn btn-dark rounded-sm mx-3" href="{{'\register'}}">Register</a>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="body-wrapper">
            <form method="GET" action="{{url('book_search_lp')}}" class="">
                @csrf
                <div class="row g-3 m-3">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="author">Filter by Author</label>
                            <input type="text" name="author" class="form-control rounded-start mt-2"
                                placeholder="Cari Author..." aria-label="Search">
                        </div>

                        <div class="form-group mb-2">
                            <label for="rating">Filter by Rating</label>
                            <select name="rating" class="form-control mt-2">
                                <option value="">Select Rating</option>
                                <option value="5">5 </option>
                                <option value="4">4 </option>
                                <option value="3">3 </option>
                                <option value="2">2 </option>
                                <option value="1">1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="date">Filter by Date</label>
                            <div class="input-group">
                                <input type="date" name="start" class="form-control mt-2 mb-2">
                                <span class="input-group-text">s/d</span>
                                <input type="date" name="end" class="form-control">
                            </div>
                        </div>
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-dark">Apply Filter</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card rounded-lg" style="background-color: #131339;">
                <h3 class="text-center text-white mb-2 pt-4 shadow p-3">Book Collection</h3>
                <div class="card-body shadow">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                            @foreach ($data as $k)
                            <div class="col">
                                <div class="card shadow rounded-lg bg-light">
                                    <img class="" src="{{ asset('img_books/' . $k->cover) }}" alt="Cover Buku"
                                        height="200px">
                                    <div class="card-body">
                                        <h5 class="card-title text-center" style="text-color: #131339;"><b>{{ Str::limit($k->title, 10, '...') }}</b></h5>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <p class="mb-1"><strong>Author:</strong><br> {{ Str::limit($k->author, 10, '...') }}</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-1"><strong>Date Upload:</strong> <br>{{ substr($k->created_at,
                                                    0, 10)
                                                    }}</p>
                                            </div>
                                        </div>
                                        <p class="card-text mt-2"><strong>Description:</strong> <br> {{ Str::limit($k->description, 50, '...') }}
                                        </p>

                                        <p>
                                            @for ($i = 0; $i < $k->rating; $i++)
                                                ⭐
                                                @endfor
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    @include('layouts.footer')