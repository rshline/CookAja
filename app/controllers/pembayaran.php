<?php
require_once '...';
include '...';

if ($login == true):
  $user   = data_user('id', $_SESSION['id']);
  while ($row = mysqli_fetch_assoc($user)):
    $nama   = $row['nama'];
    $email = $row['email'];
  endwhile;

  $data_bayar= data_bayar('id', 'id_pembayaran', 'metode');
  while ($row = mysqli_fetch_assoc($data_bayar)):
    $id                 = $row['id'];
    $id_pembayaran      = $row['id_pembayaran'];
    $metode             = $row['metode'];
  endwhile;

  if (isset($_POST['submit'])) {

    $data1 = autonumber(kode_transaksi('id', 'id_bayar'), 3, 4);
    $data2 = $_GET['id'];
    $data3 =  data_bayar('id_pembayaran', 'nama', $_SESSION['nama']);
    $data4 = $_POST['bank'];
    $data5 = $hargalangganan;
    $data6 = NULL;
    $data7 = 0;
    $data8 = $_POST['rekening'];

    if (metode_pembayaran($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8)) {
      redirect_url('transaksi-upload.php?id='.$data1);
    } else {
      echo "Transaksi belum berhasil";
    }
  }
?>

<div class="row mt-4">
  <div class="col-lg-3">
      <?php include '....php'; ?>
  </div>

  <div class="col-lg-9">
    <div class="row">
      <div class="col-sm-5">
        <div class="card">
          <h5 class="card-header">Data User Reguler</h5>
          <div class="card-body">
            <address class="">
              <p>
                <strong>Nama Lengkap</strong> <br/>
                <?=$nama; ?>
              </p>
              <p>  ..................
                <strong>Alamat</strong> <br/>
                <?=$alamat; ?>
              </p>

              <p>
                <strong>Kontak</strong> <br/>
                <abbr title="Phone"><?=$telp?></abbr>
              </p>
            </address> ...................
            <button type="button" class="btn btn-outline-primary">Edit</button>

          </div>
        </div>
      </div>
      <div class="col">
          <div class="card">
            <h5 class="card-header">Detail Transaksi</h5>
            <div class="card-body">

              <address class="row">
                <p class="col">
                  Akun Premium <br/>
                  <strong><?= kode_transaksi('id', 'id_bayar', $kode_transaksi)?></strong>
                </p>

                <p class="col">
                  Akun Premium<br/>
                  <strong><?= $kode_transaksi?></strong><p/>
                </p>

              <address class="??">
                Total Harga<br/>
                <h2><?= rupiah($harga) ?></h2>
              </address>

              Metode Bayar :<br/>
              <form class="was-validated" method="post">

                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="mandiri" name="bank" value="mandiri" required>
                  <label class="custom-control-label" for="mandiri">Bank Mandiri</label>
                </div>

                <div class="form-group custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="bca" name="bank" value="bca" required>
                  <label class="custom-control-label" for="bca">Bank BCA</label>
                </div>

                <div class="form-group">
                  <label for="rekening">No Rekening Anda</label>
                  <input name="rekening" type="number" class="form-control" placeholder="No Rekening" required>
                </div>

                <button type="submit" name="submit" class="btn btn-outline-primary">Bayar</button>
                <button type="button" class="btn btn-outline-primary">Batal</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<?php
else:
  redirect_url('login.php');
endif;

require_once '....php';
?>
