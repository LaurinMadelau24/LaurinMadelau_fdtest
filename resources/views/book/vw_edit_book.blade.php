@include('layouts.header')
<div class="body-wrapper">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-center">Update Books</h5>
            <hr>
            <form action="{{url('update_book',$data->id)}}" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Title</label>
                            <input type="text" name="title" placeholder="Title" value="{{($data->title)}}"
                                class="form-control form-control-user">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Author</label>
                            <input type="text" name="author" placeholder="Author" value="{{($data->author)}}"
                                class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Description</label>
                        <textarea type="text" name="description" rows="3" placeholder="Deskripsi"
                            class="form-control form-control-user">{{($data->description)}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Rating</label>
                        <input type="number" name="rating" placeholder="Rating" class="form-control form-control-user"
                            value="{{($data->rating)}}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Gambar</label>
                        <input type="file" name="cover"  value="{{($data->description)}}" class="form-control mt-2">
                        <img src="{{asset('img_books/' . $data->cover)}}" alt="Cover" class="img-thumbnail m-2 shadow-md" width="100px">
                    </div>


                    <button type="submit" class="btn btn-primary rounded-2">Edit</button>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')