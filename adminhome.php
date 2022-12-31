<?php
$conn = mysqli_connect('localhost','root','','pklflash');

$result = mysqli_query($conn, "SELECT * FROM product");
session_start();

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
    <title>Login / Register - Flash Komputer</title>
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
    <div class="space-y-8 px-8 mx-auto my-auto">
    <div class="flex flex-row justify-center items-center space-x-4 mx-auto my-auto pt-16 font-montserrat text-base h-2/4 w-full">
        <div class="item w-1/4 h-32 rounded-lg bg-almost-black text-almost-white hover:bg-almost-white hover:text-almost-black flex justify-center items-center">
            <a href="adminadd.php">Tambah Produk</a>
        </div>
        <div class="item w-1/4 h-32 rounded-lg bg-almost-black text-almost-white hover:bg-almost-white hover:text-almost-black flex justify-center items-center">
            <a href="admineditdelete.php">Edit / Hapus Produk</a>
        </div>
        <div class="item w-1/4 h-32 rounded-lg bg-almost-black text-almost-white hover:bg-almost-white hover:text-almost-black flex justify-center items-center">
            <a href="adminmember.php">Menu Transaksi</a>
        </div>
    </div>
    <div class="flex flex-wrap mx-auto my-auto h-2/4 py-16 font-montserrat">
        <div class="mt-4 w-full lg:w-6/12 xl:w-4/12 px-5 my-4">
            <div class="relative flex flex-col min-w-0 break-words bg-almost-white text-almost-black hover:bg-almost-black hover:text-almost-white rounded-lg mb-3 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Total User</h5>
                            <span class="font-semibold text-xl text-blueGray-700"><?php $resultcountusers = mysqli_query($conn, "SELECT COUNT(id) as totalusers FROM users;"); $data=mysqli_fetch_assoc($resultcountusers); echo $data['totalusers'];?></span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial" />
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="mt-4 w-full lg:w-6/12 xl:w-4/12 px-5 my-4">
            <div class="relative flex flex-col min-w-0 break-words bg-almost-white text-almost-black hover:bg-almost-black hover:text-almost-white rounded-lg mb-3 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Total Pembelian</h5>
                            <span class="font-semibold text-xl text-blueGray-700"><?php $resultcountcart = mysqli_query($conn, "SELECT COUNT(id) as totalcart FROM cart;"); $data=mysqli_fetch_assoc($resultcountcart); echo $data['totalcart'];?></span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 w-full lg:w-6/12 xl:w-4/12 px-5 my-4">
            <div class="relative flex flex-col min-w-0 break-words bg-almost-white text-almost-black hover:bg-almost-black hover:text-almost-white rounded-lg mb-3 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Total Produk</h5>
                            <span class="font-semibold text-xl text-blueGray-700"><?php $resultcountproduct = mysqli_query($conn, "SELECT COUNT(id) as totalproduct FROM products;"); $data=mysqli_fetch_assoc($resultcountproduct); echo $data['totalproduct'];?></span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                        </div>
                    </div>
                </div>
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