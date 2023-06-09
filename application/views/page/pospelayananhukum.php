<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container-fluid py-5" style="background-image: url('<?= base_url('assets/img/b.jpg') ?>'),linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)) ;background-blend-mode: overlay; background-size: cover;">
    <h2 class="ms-5 text-white">Pos Pelayanan Hukum</h2>
</div>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<div class="container mt-5">
    <div class="row">
        <?php echo form_open_multipart('Page/do_addPos'); ?>



        <div class="form-group row mt-4">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="exampleFormControlTextarea1" class="form-label">Kategori:</label>
                <select class="form-select" name="id_kategori" aria-label="Default select example">
                    <?php foreach ($kategori as $kategori) { ?>
                        <option value="<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></option>

                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="exampleFormControlTextarea1" class="form-label">Judul:</label>
                <input type="text" name="judul" class="form-control" id="exampleLastName" placeholder="Judul">
            </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Masalah:</label>
                <textarea class="form-control" name="deskripsi_masalah" id="editor" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="exampleFormControlTextarea1" class="form-label">Privasi:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="privasi" id="flexRadioDefault1" value="1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Publik
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="privasi" id="flexRadioDefault2" value="0">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Private
                    </label>
                </div>
            </div>
        </div>
        <input type="submit" value="Kirim Pesan" class="btn btn-warning mt-3 btn-lg">
    </div>
</div>
<script>
    <?php if ($this->session->flashdata('success')) { ?>
        var isi = <?php json_encode($this->session->flashdata('success')) ?>
        Swal.fire({
            icon: 'success',
            title: 'Success...',
            text: 'Form Berhasil ditambahkan'
        })
    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        var isi = <?php json_encode($this->session->flashdata('error')) ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Anda Harus Register dan Login Terlebih dahulu'
        })
    <?php } ?>
</script>
<script>
    CKEDITOR.replace('editor');
</script>