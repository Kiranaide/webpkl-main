<?php

session_start();

if (!isset($_SESSION["username"])) {
	header("Location:index.php");
	exit;
}

$username=$_SESSION["username"];
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
    <title>Shopping Cart - Flash Computer</title>
</head>
<body>
    <?php
    // Mulai sesi
    require 'koneksi.php';
    class Item{
        var $id;//var int
        //var string
        var $judul;
        //var float
        var $harga;
        //var int
        var $quantity;
        var $images;
       }
    
    if(isset($_GET['id']) && !isset($_POST['update']))  { 
        $sql = "SELECT * FROM products WHERE id=".$_GET['id'];
        $result = mysqli_query($koneksi, $sql);
        $products = mysqli_fetch_object($result); 
        $item = new Item();
        $item->id = $products->id;
        $item->judul = $products->judul;
        $item->harga = $products->harga;
        $item->images = $products->images;
        $iteminstock = $products->quantity;
        $item->quantity = 1;
        //Periksa produk dalam keranjang
        $index = -1;
        $cart = unserialize(serialize($_SESSION['cart']));
        for($i=0; $i<count($cart);$i++)
            if ($cart[$i]->id == $_GET['id']){
                $index = $i;
                break;
            }
            if($index == -1) 
                $_SESSION['cart'][] = $item; //$ _SESSION ['cart']: set $ cart sebagai variabel _session
            else {
                
                if (($cart[$index]->quantity) < $iteminstock)
                     $cart[$index]->quantity ++;
                     $_SESSION['cart'] = $cart;
            }
    }
    //Menghapus produk dalam keranjang
    if(isset($_GET['index']) && !isset($_POST['update'])) {
        $cart = unserialize(serialize($_SESSION['cart']));
        unset($cart[$_GET['index']]);
        $cart = array_values($cart);
        $_SESSION['cart'] = $cart;
    }
    // Perbarui jumlah dalam keranjang
    if(isset($_POST['update'])) {
      $arrQuantity = $_POST['quantity'];
      $cart = unserialize(serialize($_SESSION['cart']));
      for($i=0; $i<count($cart);$i++) {
         $cart[$i]->quantity = $arrQuantity[$i];
      }
      $_SESSION['cart'] = $cart;
    }
    ?>

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
    <div class="px-32 py-8 space-x-4 mx-auto my-auto font-montserrat">
        <div class="h-auto">
            <div class="py-4 px-3 space-y-6 bg-gray-100 rounded-lg h-auto">
                <div class="text-3xl font-bold font-montserrat text-almost-black">Cart</div>
                <!-- Card Cart -->
                <?php 
                $cart = unserialize(serialize($_SESSION['cart']));
                $s = 0;
                $index = 0;
                for($i=0; $i < count($cart); $i++){
                    $s += $cart[$i]->harga;
                ?>  
                <div class='flex space-x-2 h-32 bg-almost-white card overflow-hidden'>
                    <div class="item w-32">
                        <?php echo'<img class="rounded-lg max-w-full h-auto object-cover mx-auto" src="img/'.$cart[$i]->images.'"></img>'; ?>
                    </div>
                    <div class="item w-3/5 space-y-1 py-2"><?php echo $cart[$i]->judul; ?>
                    <h3 class="font-bold pt-2">Harga : <?php echo $cart[$i]->harga; ?> </h3>
                    </div>
                    <div class="item w-1/5 flex items-center justify-center">
                        <a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Apakah anda yakin dengan pilihan anda?')">
                            <button class="rounded-lg border h-16 w-16 border-almost-black bg-almost-white font-semibold hover:bg-almost-black hover:text-almost-white">Hapus</button>
                        </a> 
                    </div>
                </div>
                <?php 
     	            $index++;
                } ?>  
                <!-- -->

                <div class="h-[1px] bg-almost-black px-1"></div>
                <div class="my-2 font-bold font-2xl text-almost-black ">
                    Total Pembayaran: Rp.<?php echo $s; ?>
                </div>
                <div class="my-2 font-normal font-xl text-almost-black hover:underline"><a href="catalog.php">Apakah ingin memliih produk lagi?</a></div>
                <button class="text-almost-white text-2xl bg-almost-black rounded-xl px-6 py-4 border border-almost-black hover:bg-almost-white hover:text-almost-black">
                    <a href="success.php">Bayar</a>
                    <?php 
                        if(isset($_GET["id"]) || isset($_GET["index"])){
                        header('Location: cart.php');
                        } 
                    ?>
                </div>
            </div>
        </div>     
    </div>
</main>
    <!-- Footer -->
    <footer class="grid container place-items-center px-32 relative bottom-0 h-16">
        <div class='text-center text-almost-black text-sm font-light py-2'>Copyright &copy; 2022 Flash Computer</div>
    </footer>
    <!-- -->
</body>
</html>