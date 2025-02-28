@include('layouts.header')
<div class="body-wrapper">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data User</h5>
            <hr>
            <form method="GET" action="{{url('user_search')}}" class="">
                @csrf
                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="author">Filter by Name or Email</label>
                            <input type="text" name="search" class="form-control rounded-start mt-2"
                                placeholder="Cari User..." aria-label="Search">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="rating">Filter by verification status </label>
                            <select name="status" class="form-control mt-2">
                                <option value="">Select Status</option>
                                <option value="aktif">aktif </option>
                                <option value="tidak_aktif">tidak aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group align-self-end mb-2">
                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                    </div>
                </div>
            </form>

            <table id="datatable" class="table table-bordered dt-responsive nowrap mt-3"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
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
                            <?= $k->name ?>
                        </td>
                        <td class="m-1 p-2">
                            <?= $k->email ?>
                        </td>
                        <?php
                        if ($k->email_verified_at == null){
                        ?>
                        <td class="m-1 p-2">
                            Tidak Aktif
                        </td>
                        <?php } else {
                        ?>
                        <td class="m-1 p-2">
                            Aktif
                        </td>
                        <?php }
                        ?>
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