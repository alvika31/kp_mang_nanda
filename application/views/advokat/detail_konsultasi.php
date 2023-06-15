<link href="<?= base_url('templates/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="font-weight-bold"><?= $konsultasi['judul'] ?></h5>
                    <p style="font-size: 14px"><?= $konsultasi['tgl_isi'] ?> <?= $konsultasi['time_isi'] ?></p>
                </div>
                <div class="card-body border-bottom">
                    <p style="font-size: 50px;" class="card-text"><?= $konsultasi['deskripsi_masalah'] ?></p>
                </div>
                <div class="card-footer ">
                    Ditanyakan Oleh: <?= $konsultasi['nama_lengkap'] ?> | <span class="font-weight-bold"><?= $konsultasi['nama_kategori'] ?></span>
                    <?php if ($konsultasi['privasi'] == 1) { ?>
                        <span class="badge badge-success ml-2">Publik</span>
                    <?php } else { ?>
                        <span class="badge badge-danger ml-2">Private</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <span class="border-top"></span>
    <?php if ($konsultasi['status_konsultasi'] == 0 && !$jawab_konsultasi) { ?>
        <div class="alert alert-warning mt-3" role="alert">
            Belum Di Jawab!
        </div>
        <div class="">
            <form action="<?= site_url('advokat/do_jawab_konsultasi') ?>" method="post">
                <input type="hidden" name="id_advokat" id="" value="<?= $this->session->userdata('id_advokat') ?>" require>
                <input type="hidden" name="email" id="" value="<?= $konsultasi['email'] ?>">
                <input type="hidden" name="id_konsultasi" id="" value="<?= $konsultasi['id_konsultasi'] ?>" require>
                <label for="" class="font-weight-bold">Jawaban Pertanyaan:</label>
                <textarea class="form-control" name="isi_jawab" id="editor" rows="3" require></textarea>

                <input type="submit" value="Kirim Jawaban" class="btn btn-primary mt-4 mb-4">
            </form>
        </div>
    <?php } else { ?>
        <div class="alert alert-success mt-3" role="alert">
            Sudah Di Jawab
        </div>
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="font-weight-bold">Jawabannya</h5>
                <p style="font-size: 14px"><?= $jawab_konsultasi['tgl_jawab'] ?> <?= $jawab_konsultasi['jam_jawab'] ?></p>
            </div>
            <div class="card-body border-bottom">
                <p style="font-size: 50px;" class="card-text"><?= $jawab_konsultasi['isi_jawab'] ?></p>
            </div>
            <div class="card-footer ">
                Dijawab Oleh: <span class="font-weight-bold"><?= $jawab_konsultasi['nama_lengkap'] ?></span>
            </div>
        </div>
    <?php } ?>

</div>
<script>
    CKEDITOR.replace('editor');
</script>