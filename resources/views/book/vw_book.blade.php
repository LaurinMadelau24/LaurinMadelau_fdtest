@include('layouts.header')
<div class="body-wrapper">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Books</h5>
            <hr>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            {{-- ⭐⭐⭐⭐⭐ --}}


            <a class="btn btn-success mb-3" href="{{url('create_book')}}">Tambah Data</a>

            <form method="GET" action="{{url('book_search')}}" class="">
                @csrf
                <div class="row g-3">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="author">Filter by Author</label>
                            <input type="text" name="author" class="form-control rounded-start"
                                placeholder="Cari Author..." aria-label="Search">
                        </div>

                        <div class="form-group mb-2">
                            <label for="rating">Filter by Rating</label>
                            <select name="rating" class="form-control">
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
                                <input type="date" name="start" class="form-control">
                                <span class="input-group-text">s/d</span>
                                <input type="date" name="end" class="form-control">
                            </div>
                        </div>
                        <div class="form-group align-self-end mt-4 pt-1">
                            <button type="submit" class="btn btn-primary">Apply Filter</button>
                        </div>
                    </div>
                </div>
            </form>



            <table id="datatable" class="table table-bordered dt-responsive nowrap mt-2"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Cover</th>
                        <th>Rating</th>
                        <th>Nama User</th>
                        <th>Waktu Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php  $no = ($data->currentPage() - 1) * $data->perPage() + 1; ?>
                    <?php foreach ($data as $k) : ?>
                    <tr>
                        <td class="m-1 p-2" style="max-width: 15px;">
                            <?= $no ?>
                        </td>

                        <td class="m-1 p-2">
                            <?= $k->title ?>
                        </td>
                        <td class="m-1 p-2">
                            <?= $k->author ?>
                        </td>
                        <td class="m-1 p-2">
                            <?= $k->description ?>
                        </td>

                        <td><img src="{{('img_books/'. $k->cover)}}" alt="..." class="img-thumbnail" width="70px"></td>

                        <td class="m-1 p-2">
                            <?= $k->rating ?>
                        </td>
                        <td class="m-1 p-2">
                            <?= $k->nama_user ?>
                        </td>
                        <td class="m-1 p-2">
                            <?= $k->created_at ?>
                        </td>

                        <td class="m-1 p-2">
                            <a class="btn btn-danger btn-sm m-1" href="{{url('delete_book',$k->id)}}">Delete</a>

                            <a class="btn btn-primary btn-sm m-1" href="{{url('edit_book',$k->id)}}">Edit</a>

                        </td>


                    </tr>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $data->links() }}
</div>

@include('layouts.footer')