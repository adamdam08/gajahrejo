<div class="container">
  <div class="row mb-5">
    <div class="col-lg-3 d-none d-sm-none d-md-none d-lg-block bg-light px-0">
      <div class="col-12 px-0">
        <a href="<?= base_url('productpenjual') ?>" class="btn btn-secondary btn-block rounded-0 text-left">
          <i class="fa fa-shopping-basket" aria-hidden="true"></i> Barang yang dijual
        </a>
      </div>
      <div class="col-12 px-0">
        <a href="<?= base_url('stuff/upload') ?>" class="btn btn-dark btn-block rounded-0 text-left">
          <i class="fa fa-upload" aria-hidden="true"></i> Upload barang
        </a>
      </div>
      <div class="col-12 px-0">
        <a href="<?= base_url('datapemesananpenjual') ?>" class="btn btn-secondary btn-block rounded-0 text-left" role="tab" aria-controls="home">
          <i class="fa fa-shopping-basket" aria-hidden="true"></i> Data pemesanan
        </a>
      </div>
    </div>
    <div class="col-12 col-md-12 col-sm-12 col-lg-9">
      <div class="row mt-2 mb-1">
        <div class="col-12 d-lg-none mb-3">
          <button type="button" class="btn btn-warning form-control primary-color text-dark " data-toggle="collapse" data-target="#demo">Menu</button>
          <div id="demo" class="collapse">
            <a href="<?= base_url('productpenjual') ?>" class="btn btn-secondary form-control border-warning">Barang yang dijual</a>
            <a href="<?= base_url('stuff/upload') ?>" class="btn btn-secondary form-control border-warning">Upload Barang</a>
            <a href="<?= base_url('datapemesananpenjual') ?>" class="btn btn-secondary form-control border-warning">Data Pemesanan</a>
          </div>
        </div>
        <div class="container-fluid">
          <h3 class=" ">Upload barang </h3>
          <?= form_open_multipart('stuff/upload'); ?>
          <div class="form-row">
            <div class="form-group col mt-2">
              <label for="inputname">Nama Barang</label>
              <input type="text" name="namabarang" class="form-control" value="<?= set_value('namabarang'); ?>">
              <?= form_error('namabarang', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control" name="descbarang" rows="3" value="<?= set_value('descbarang'); ?>"></textarea>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label for="inputHarga">Harga</label>
              <input type="text" name="hargabarang" class="form-control" placeholder="Rp." value="<?= set_value('hargabarang'); ?>">
            </div>
            <div class="form-group col-6">
              <label for="Kategori">Kategori</label>
              <select class="form-control w-100" name="jenisbarang" value="<?= set_value('jenisbarang'); ?>">>
                <option class="w-100" value="coffee">Coffee</option>
                <option class="w-100" value="food">Food</option>
                <option class="w-100" value="other">Other</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label for="inputHarga">Diskon</label>
              <input type="text" name="diskon" class="form-control" placeholder="%" value="<?= set_value('diskon'); ?>">
            </div>
            <div class="form-group col-6">
              <label for="inputHarga">Jumlah Barang</label>
              <input type="text" name="jumlahbarang" class="form-control" placeholder="" value="<?= set_value('jumlahbarang'); ?>">
            </div>

            <div class="form-group col-6">
              <label for="inputHarga">Tambah Gambar</label>
              <input type="file" id="image" name="image[]" multiple>
              <div class="validation" style="display:none;"> Upload Max 4 Files allowed </div>
            </div>
          </div>

          <div class="card" style="min-height:150px">
            <div class="row mt-3 ml-3">
              <div id="imagepreview"></div>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-success mt-2 mb-2 float-right">Simpan</button>
          </div>

          <?= form_close(); ?>

        </div>
      </div>
    </div>
  </div>
</div>