<?php

session_start();

$username=$_SESSION["username"];
$name=$_SESSION["name"];
 
include 'koneksi.php';
$id=$_GET["id"];
$result = mysqli_query($koneksi, "SELECT * FROM products WHERE id='$id'");
if(isset($_POST["edit"])){


$judul=$_POST["judul"];
    $kategori=$_POST["kategori"];
    $deskripsi=$_POST["deskripsi"];
    $harga=$_POST["harga"];
    $images = $_FILES["images"]["name"];
    $tempname = $_FILES["images"]["tmp_name"];
    $folder = "./img/" . $images;

$sql = "UPDATE product SET
judul='$judul',
kategori='$kategori',
deskripsi='$deskripsi',
harga='$harga',
images='$images'

WHERE id='$id'";

 
if(mysqli_affected_rows($conn)>0){
    echo "<script>
   alert('Sudah Diedit!');
   document.location.href='adminedit.php';
   </script>";
 }
else{
    echo "<script>
    alert('ERROR');
    document.location.href='adminedit.php';
   </script>";
 }
}
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
    <!--    -->
    <div class="space-y-8 px-8 mx-auto my-auto">
        <div class="flex flex-row justify-center items-center space-x-4 mx-auto my-auto pt-16 font-montserrat text-base h-2/4 w-full">
            <div class="item w-1/4 h-32 rounded-lg bg-almost-black text-almost-white hover:bg-almost-white hover:text-almost-black flex justify-center items-center">
                <a href="adminadd.php">Tambah Produk</a>
            </div>
            <div class="item w-1/4 h-32 rounded-lg bg-almost-black text-almost-white hover:bg-almost-white hover:text-almost-black flex justify-center items-center">
                <a href="adminhome.php">Menu Home</a>
            </div>
            <div class="item w-1/4 h-32 rounded-lg bg-almost-black text-almost-white hover:bg-almost-white hover:text-almost-black flex justify-center items-center">
                <a href="adminmember.php">Menu Member</a>
            </div>
        </div>
        <div class="flex items-center justify-center p-12">
            <div class="mx-auto w-full max-w-[550px] font-montserrat">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <form action="" method="POST">
                    <div class="mb-5 font-bold text-4xl">Edit Produk</div>
                    <div class="mb-5">
                        <button class="hover:shadow-form rounded-md bg-almost-white py-3 px-8 text-base font-semibold text-black outline-none"><a href="admineditdelete.php">Back </a></button>
                    </div>
                    <div class="mb-5">
                        <input type="text" name="judul" id="nama" value="<?php echo $row ["judul"]; ?>" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </div>
                    <div class="mb-5">
                        <input type="text" name="kategori" id="name" value="<?php echo $row ["kategori"]; ?>" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </div>
                    <div class="mb-5">
                        <input type="text" name="deskripsi" id="message" value="<?php echo $row ["deskripsi"]; ?>" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </div>
                    <div class="mb-5">
                        <input type="text" name="harga" id="harga" value="<?php echo $row ["harga"]; ?>" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </div>
                    <div class="mb-5">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk Upload</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG,JPG</p>
                        </div>
                            <input id="form-control" type="file" class="hidden" name="images" />
                        </label>
                    </div>
                    <div>
                        <button class="hover:shadow-form rounded-md bg-almost-black py-3 px-8 text-base font-semibold text-white outline-none">Submit</button>
                    </div>
                </form>
                <?php endwhile; ?>
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