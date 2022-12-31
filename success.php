<?php 
session_start();
require 'koneksi.php';
require 'item.php';
$username=$_SESSION["username"];
//Simpan pesanan baru
$ordersid = mysqli_insert_id($koneksi); 
$cart = unserialize(serialize($_SESSION['cart'])); //Set $cart sebagai array, serialize () mengubah string menjadi array
for($i=0; $i<count($cart);$i++) {
    $s += $cart[$i]->harga;
// $sql2 = 'INSERT INTO orderdetail (id, username, orderid, price) VALUES ("'.$cart[$i]->id.'", "'.$username.'", "'.$ordersid.'", "'.$cart[$i]->harga.'")';
$sql3 = 'INSERT INTO cart (id, id_product, orderid, tanggalpembelian, username, listproduct, price, status) VALUES ("","'.$cart[$i]->id.'", "'.$ordersid.'", "'.date('Y-m-d').'", "'.$username.'", "'.$cart[$i]->judul.'", "'.$cart[$i]->harga.'", "Menunggu")';
// mysqli_query($koneksi, $sql2);
mysqli_query($koneksi, $sql3);
}
//Menghapus semua produk dalam keranjang
unset($_SESSION['cart']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="output.css" rel="stylesheet" type="text/css">
    <title>Pembayaran Sukses - Flash Komputer</title>
</head>
<body>
<main class="container">
    <!-- Header -->
    <header class="container px-32 text-almost-black">
        <div class="flex py-4 px-4 h-16">
            <div class='flex items-center font-bold font-montserrat text-xl'>
                <a href='index.php'>Flash Computer</a>
            </div>
            <!-- Navigation Menu -->
            <div class='flex-grow flex items-center justify-end'>
                <nav>
                    <ul class='hidden lg:flex space-x-8 items-center font-montserrat'>
                        <?php
                            if (isset($_SESSION["username"])) {
                                echo "<li class='cursor-pointer font-light'>
                                <a href='catalog.php'>Catalog</a>
                            </li>
                            <li class='cursor-pointer font-light'>
                                <a href='cart.php'>Cart</a>
                            </li>
                                <li class='cursor-pointer font-light'>
                                <a href='logout.php'>Hello! $username</a> </li>";
                            } else {
                                echo "<button class='border-2 hover:border-almost-black hover:text-almost-black rounded-xl px-4 py-2'>
                                <a href='user.php'>Login / Register</a>
                            </button>";
                            }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- -->
        </div>
    </header>
    <!-- -->
    <div class="bg-white p-6 md:mx-auto font-montserrat">
        <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
            <path fill="currentColor"
                  d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <div class="text-center">
            <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Transaksi Selesai!</h3>
            <p class="text-gray-600 my-2">Untuk melanjutkan pembelian akan diproses di WhatsApp.</p>
            <p> Have a great day!  </p>
            <div class="py-10 text-center">
                <a href="index.php" class="px-12 text-almost-white bg-almost-black border border-almost-black hover:bg-almost-white hover:text-almost-black font-semibold py-3 rounded-lg"> GO BACK </a>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="grid container place-items-center px-32 relative bottom-0 h-16">
        <div class='text-center text-almost-black text-sm font-light py-2'>Copyright &copy; 2022 Flash Computer</div>
    </footer>
    <!-- -->
</main>
</body>
</html>