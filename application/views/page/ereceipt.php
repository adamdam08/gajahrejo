<script src="<?php echo base_url(); ?>snippets/js/ereceipt.js"></script>
<?php
// Query data barang
$this->db->where('id_barang =', $detail->id_barang);
$databarang = $this->db->get('barang')->row_array();
// Query nama penjual
$this->db->where('id_user =', $databarang['id_user']);
$datapenjual = $this->db->get('user')->row_array();
?>
<div class="container">
  <div class="card text-center mt-5" id="ereceipt">
    <div class="card-body text-center">
      <img src="<?= base_url('snippets/img/logo.png'); ?>" class="img-thumbnails">
      <h5 class="card-title mx-auto"><strong>ORDER ID</strong></h5>
      <h5 class="card-title mx-auto"><?= $detail->id_pemesanan ?></h5>
      <div class="row">
        <div class="col-6 mx-auto">
          <div class="card-body">

            <div class="form-group col-12">
              <label for="inputHarga" class="text-left">Nama Penjual</label>
              <div class="border border-dark">
                <h4><?= $datapenjual['username'] ?></h4>
              </div>
            </div>

            <div class="form-group col-12">
              <label for="inputHarga">Nama Barang</label>
              <div class="border border-dark">
                <h4><?= $databarang['namabarang']; ?></h4>
              </div>

            </div>
            <div class="form-group col-12">
              <label for="inputHarga">Alamat Pengirim</label>
              <div class="border border-dark">
                <h4><?= $datapenjual['address'] ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 mx-auto">
          <div class="card-body">
            <div class="form-group col-12">
              <label for="inputHarga">Nama Pembeli</label>
              <div class="border border-dark">
                <h4><?= $detail->nama_pembeli ?></h4>
              </div>
            </div>
            <div class="form-group col-12">
              <label for="inputHarga">Alamat Pembeli</label>
              <div class="border border-dark">
                <h4><?= $detail->alamat ?></h4>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label for="inputHarga">Jumlah Barang</label>
                <div class="border border-dark">
                  <h4><?= $detail->jumlah ?></h4>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="inputHarga">Harga Barang</label>
                <div class="border border-dark">
                  <h4>Rp. <?= $databarang['hargabarang'] *  $detail->jumlah ?></h4>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <button type="button" onclick="printDiv('ereceipt')" class="btn btn-warning mt-2 float-right primary-color">Cetak e-receipt</button> -->