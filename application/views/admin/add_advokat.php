 <!-- Begin Page Content -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <div class="container-fluid">

     <!-- Page Heading -->

     <h1 class="h3 mb-2 text-gray-800">Form Tambah Advokat</h1>
     <?php if (validation_errors()) { ?>
         <div class="alert alert-danger" role="alert">
             <?= validation_errors(); ?>
         </div>
     <?php } ?>

     <!-- DataTales Example -->
     <div class="card shadow mb-4 mt-3">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Tambah Advokat</h6>
         </div>
         <div class="p-5">
             <?php echo form_open_multipart('admin/do_add_advokat'); ?>

             <div class="form-group row">
                 <div class="col-sm-6 mb-3 mb-sm-0">
                     <label for="">Nama Lengkap:</label>
                     <input type="text" name="nama_lengkap" class="form-control" id="exampleFirstName" placeholder="Nama Lengkap">
                 </div>
                 <div class="col-sm-6">
                     <label for="">Username</label>
                     <input type="text" name="username" class="form-control" id="exampleLastName" placeholder="Username">
                 </div>
             </div>
             <div class="form-group row">
                 <div class="col-sm-6 mb-3 mb-sm-0">
                     <label for="">Jenis Kelamin:</label>
                     <select name="jenis_kelamin" class="form-control" id="">
                         <option value="Pria">Pria</option>
                         <option value="Wanita">Wanita</option>
                     </select>

                 </div>
                 <div class="col-sm-6 mb-3 mb-sm-0">
                     <label for="">Foto:</label>
                     <input type="file" name="foto" class="form-control" id="exampleInputEmail" placeholder="Email Address">
                 </div>
             </div>
             <div class="form-group row">
                 <div class="col-sm-6 mb-3 mb-sm-0">
                     <label for="">Email:</label>
                     <input type="text" name="email" class="form-control" id="exampleInputPassword" placeholder="Email">
                 </div>
                 <div class="col-sm-6">
                     <label for="">No Telepon:</label>
                     <input type="text" name="no_tlp" class="form-control" id="exampleRepeatPassword" placeholder="No Telepon">
                 </div>
             </div>
             <div class="form-group row">
                 <div class="col-sm-12">
                     <label for="">Spesialis:</label>
                     <select name="id_kategori" id="" class="form-control">
                         <?php foreach ($kategori as $kategori) { ?>
                             <option value="<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></option>
                         <?php } ?>
                     </select>
                 </div>
             </div>
             <input type="submit" value="Tambah Akun" name="save" class="btn btn-primary btn-user">
             <hr>

             </form>
         </div>

     </div>
 </div>

 </div>
 <script>
     <?php if ($this->session->flashdata('success')) { ?>
         var isi = <?php json_encode($this->session->flashdata('success')) ?>
         Swal.fire({
             icon: 'success',
             title: 'Success...',
             text: 'Data Berhasil ditambahkan'
         }).then(function() {
             window.location = "<?= site_url('dashboard/list_user') ?>";
         });
     <?php } ?>

     <?php if ($this->session->flashdata('error')) { ?>
         var isi = <?php json_encode($this->session->flashdata('error')) ?>
         Swal.fire({
             icon: 'error',
             title: 'Oops...',
             text: 'Data Eror ditambahkan'
         })
     <?php } ?>
 </script>
 <!-- /.container-fluid -->