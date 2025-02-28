@include('layouts.header')
<div class="body-wrapper">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-center">Add Books</h5>
            <hr>
            <form action="{{url('add_book')}}" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Title</label>
                            <input type="text" name="title" placeholder="Title" class="form-control form-control-user">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Author</label>
                            <input type="text" name="author" placeholder="Author"
                                class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Description</label>
                        <textarea type="text" name="description" rows="3" placeholder="Description"
                            class="form-control form-control-user"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Rating</label>
                        <input type="number" name="rating" placeholder="Rating" class="form-control form-control-user">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Cover</label>
                        <input type="file" name="cover" class="form-control mt-2">
                    </div>

                    <button type="submit" class="btn btn-primary rounded-2">Tambah</button>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')