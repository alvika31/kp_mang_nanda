<link href="<?= base_url('templates/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="row justify-content-center">
        <div class="col-6 card shadow">
            <div class="card-header">
                <h5>Pertanyaan Anda</h5>
            </div>
            <div class="card-body">

                <p>Kategori Pertanyaan: <?= $konsultasi['nama_kategori'] ?></p>
                <p>Judul Petanyaan: <?= $konsultasi['judul'] ?></p>
                <p>Isi Pertanyaan: <?= $konsultasi['deskripsi_masalah'] ?></p>
            </div>
        </div>
        <div class="col-6 card shadow">
            <div class="card-header">
                <h5>Jawaban</h5>
            </div>
            <div class="card-body">
                <?php
                if ($konsultasi['status_konsultasi'] == 0) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Konsultasi Belum dijawab
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>



</div>
<script>
    function hapus(id_konsultasi) {
        Swal.fire({
            title: 'Yakin menghapus?',
            text: "Data yang sudhah dihapus tidak dapat dikembalikan!",
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
                    url: "<?= site_url('dashboard/deleteKonsul') ?>", //url function delete in controller
                    data: {
                        id_konsultasi: id_konsultasi //id get from button delete
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