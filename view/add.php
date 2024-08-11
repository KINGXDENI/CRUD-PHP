 <div class="row">
     <div class="col-sm-12">
         <form action="proses.php" method="post" enctype="multipart/form-data">
             <div class="card">
                 <div class="card-header d-flex align-item-center">
                     <h4 class="card-title">Tambah User</h4>
                     <button type="submit" class="btn btn-success ms-auto mb-0" name="simpan">Simpan</button>
                 </div>
                 <div class="card-body">

                     <div class="form-group row">
                         <label class="col-form-label col-md-2">Nama</label>
                         <div class="col-md-10">
                             <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-form-label col-md-2">Tanggal Lahir</label>
                         <div class="col-md-10">
                             <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-form-label col-md-2">Jenis Jelamin</label>
                         <div class="col-md-10">
                             <div class="radio">
                                 <label>
                                     <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki
                                 </label>
                             </div>
                             <div class="radio">
                                 <label>
                                     <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                 </label>
                             </div>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-form-label col-md-2">Foto</label>
                         <div class="col-md-10">
                             <input class="form-control" type="file" name="foto">
                         </div>
                     </div>



                 </div>
             </div>
         </form>
     </div>
 </div>