 <?php
    if (isset($_GET['id'])) {
        // ambil data get dari form
        $id = $_GET['id'];
        // perintah query untuk menampilkan data dari tabel guru berdasarkan nip
        $query = mysqli_query($db, "SELECT * FROM user WHERE id='$id'")
            or die('Query Error : ' . mysqli_error($db));
        $data = mysqli_fetch_assoc($query);
        // buat variabel untuk menampung data
        $id = $data['id'];
        $nama = $data['nama'];
        $tanggal_lahir = date('Y-m-d', strtotime($data['tanggal_lahir']));

        $jenis_kelamin = $data['jenis_kelamin'];
        $foto = $data['foto'];
    } ?>
 <div class="row">
     <div class="col-sm-12">
         <form action="proses.php" method="post" enctype="multipart/form-data">
             <div class="card">
                 <div class="card-header d-flex align-item-center">
                     <h4 class="card-title">Tambah User</h4>
                     <button type="submit" class="btn btn-success ms-auto mb-0" name="simpan_ubah">Simpan</button>
                 </div>
                 <div class="card-body">
                     <input type="hidden" name="id" value="<?= $id; ?>">
                     <div class="form-group row">
                         <label class="col-form-label col-md-2">Nama</label>
                         <div class="col-md-10">
                             <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="<?= $nama; ?>">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-form-label col-md-2">Tanggal Lahir</label>
                         <div class="col-md-10">
                             <input type="date" class="form-control" name="tgl_lahir" data-date-format="dd-mm-yyyy" placeholder="Masukan Tanggal Lahir" value="<?= $tanggal_lahir; ?>">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-form-label col-md-2">Jenis Jelamin</label>
                         <div class="col-md-10">
                             <div class="radio">
                                 <label>
                                     <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo ($jenis_kelamin == 'Laki-Laki') ? 'checked' : ''; ?>> Laki-Laki
                                 </label>
                             </div>
                             <div class="radio">
                                 <label>
                                     <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jenis_kelamin == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
                                 </label>
                             </div>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-form-label col-md-2">Foto</label>
                         <div class="col-md-10">
                             <input class="form-control" type="file" name="foto" value="<?= $foto; ?>">
                         </div>
                     </div>



                 </div>
             </div>
         </form>
     </div>
 </div>