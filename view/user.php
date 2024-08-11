<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title">List User</h4>
                <p class="card-text ms-auto mb-0">
                    <a href="?page=adduser" class="btn btn-primary">Add User</a>
                </p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Foto</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $query = mysqli_query($db, "SELECT * FROM user ORDER BY nama") ?>
                            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= date(
                                            'd-m-Y',
                                            strtotime($data['tanggal_lahir'])
                                        ) ?></td>
                                    <td><?= $data['jenis_kelamin']; ?></td>
                                    <td>
                                        <div class="avatar avatar-xl">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="image/<?= $data['foto']; ?>">
                                        </div>

                                    </td>
                                    <td>
                                    <td>
                                        <a href="?page=edituser&id=<?= $data['id']; ?>" class="btn btn-success">Edit</a>
                                        <a href="proses.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>