<link href="<?= base_url('templates/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Advokat</h1>
    <a href="<?= site_url('admin/add_advokat') ?>" class="btn btn-primary mb-4 mt-2">Tambah Advokat</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Advokat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Spesialis</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>

                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Spesialis</th>
                            <th width="10%">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($advokat as $advokat) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $advokat->nama_lengkap ?></td>
                                <td><?= $advokat->username ?></td>
                                <td><?= $advokat->jenis_kelamin ?></td>
                                <td>
                                    <img src="<?= base_url() . '/foto_advokat/' . $advokat->foto ?>" width="100px">
                                </td>
                                <td><?= $advokat->email ?></td>
                                <td><?= $advokat->no_tlp ?></td>
                                <td><?= $advokat->nama_kategori ?></td>
                                <td>
                                    <a href="<?= site_url('admin/edit_advokat/' . $advokat->id_advokat) ?>" class="btn btn-info"><i class="fas fa-solid fa-edit fa-sm"></i></a>
                                    <button onclick="hapus(<?php echo $advokat->id_advokat; ?>)" class="btn btn-danger"><i class="fas fa-solid fa-trash fa-sm"></i></button>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    function hapus(id_advokat) {
        Swal.fire({
            title: 'Yakin menghapus?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus sekarang!'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Terhapus!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    showConfirmButton: false
                });
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/delete_advokat') ?>", //url function delete in controller
                    data: {
                        id_advokat: id_advokat //id get from button delete
                    },
                    success: function(data) { //when success will reload page after 3 second
                        window.setTimeout(function() {
                            location.reload();
                        }, 300);
                    }
                });
            }
        })
    }
    <?php if ($this->session->flashdata('success')) { ?>
        var isi = <?php json_encode($this->session->flashdata('success')) ?>
        Swal.fire({
            icon: 'success',
            title: 'Success...',
            text: 'Data Berhasil diedit'
        })
    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        var isi = <?php json_encode($this->session->flashdata('error')) ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data Eror diedit'
        })
    <?php } ?>
</script>
<!-- /.container-fluid -->