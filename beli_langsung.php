<?php
require_once "view/header.php";
include 'script/koneksi.php';
?>

<div class="konfirmasi flex">
    <h1 class="title"> Konfirmasi Pembelian </h1>
    <?php
    $id = $_GET['idproduk'];
    $no = 1;
    $ambildata = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$id'");
    while ($row = mysqli_fetch_array($ambildata)) {
    ?>
        <div class="kon-container flex">
            <div class="cart card flex">
                <h2>Keranjang</h2>

                <table>
                    <tr class="table">
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    <tr class="table">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['namaproduk']; ?></td>
                        <td class="center">1</td>
                        <td><?php echo rupiah($row['harga']); ?></td>
                    </tr>
                </table>
                <br>
                <div class="pengiriman flex">
                    <p style="flex:70%;">Pengiriman</p>
                    <p style="flex:30%;"><?php $ongkir = 20000;
                                            echo rupiah($ongkir) ?></p>
                </div>
                <br>
                <h3>Jumlah : <?php echo rupiah($row['harga'] + $ongkir); ?></h3><br>
                <?php
                if (isset($_POST['submit'])) {
                    $nohape = 62895345860230;
                    $text = "Halo kak saya ingin memesan produk:";
                    $nproduk = $row['namaproduk'];
                    $jml = 1;
                    $total = rupiah($row['harga'] + $ongkir);
                    $nama = $_POST['nama'];
                    $alamat = $_POST['alamat'];
                    $pengiriman = $_POST['pengiriman'];
                    $catatan = $_POST['catatan'];

                    echo "<script>window.location = 'https://api.whatsapp.com/send?phone=$nohape&text=$text%0A%0ANama Produk :$nproduk%0AJumlah :$jml%0ATotal : $total%0ANama Pembeli:$nama%0AAlamat : $alamat%0APengiriman : $pengiriman%0ACatatan : $catatan'</script>";
                }
                ?>
            </div>
        <?php } ?>
        <form action="" class="flex form" method="post">
            <input class="input" type="text" name="nama" placeholder="nama" required>
            <input class="input" type="text" name="alamat" placeholder="alamat" required>
            <select class="input" name="pengiriman" id="pengiriman" required>
                <option value="langsung">Ambil Langsung</option>
                <option value="gojek">Gojek</option>
            </select>
            <textarea class="input" type="text" placeholder="catatan" style="resize: none;" name="catatan"></textarea>
            <!-- ini yang hidden untuk harga total -->
            <input type=" text" hidden name="no_wa" value="62895345860230">
            <input type="submit" value="Pesan Kopi" class="link" name="submit">
        </form>
        </div>



</div>

<?php
require_once "view/footer.php";
?>