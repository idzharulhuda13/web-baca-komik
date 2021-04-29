<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="sampul" src="/assets/images/<?= $komik['sampul']; ?>" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text"><b>Penulis: </b><?= $komik['penulis']; ?></p>
                            <p class="card-text">
                                <sm class="text-muted"><b>Penerbit: </b><?= $komik['penerbit']; ?></sm all>
                            </p>

                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">edit</a>

                            <form action="/komik/<?= $komik['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick=" return confirm('apakah anda yakin?');">Delete</button>
                            </form>

                            <br><br>
                            <a href="/komik">Kembalik ke daftar komik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>