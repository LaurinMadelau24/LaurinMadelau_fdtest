@include('layouts.header')
<div class="body-wrapper">
    <div class="card">
        <div class="card-body">

            <div class="card mt-5 pt-5 shadow-lg">
                <h5 class="card-title fw-semibold text-center">PROFILE USER</h5>
                <hr>
                @if (session('status') === 'password-updated')
                <div class="alert alert-success m-3" role="alert">
                    Password berhasil diperbarui!
                </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Nama</label>
                                <input type="text" name="title" placeholder="Title" value="{{($data->name)}}"
                                    class="form-control form-control-user">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Email</label>
                                <input type="text" name="author" placeholder="Author" value="{{($data->email)}}"
                                    class="form-control form-control-user">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Bergabung</label>
                                <input type="text" name="author" placeholder="Author" value="{{($data->created_at)}}"
                                    class="form-control form-control-user">
                            </div>
                            <?php
                            if($data->created_at == null){
                            ?>
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Status Email</label>
                                <input type="text" name="author" placeholder="Author" value="Tidak Aktif"
                                    class="form-control form-control-user">
                            </div>
                            <?php } else {
                        ?>
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Status Email</label>
                                <input type="text" name="author" placeholder="Author" value="Aktif"
                                    class="form-control form-control-user">
                            </div>
                            <?php }
                        ?>
                        </div>
                        <div class="col">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Password Lama</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control" required>
                                    @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" required>
                                    @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Change Password</button>


                            </form>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')