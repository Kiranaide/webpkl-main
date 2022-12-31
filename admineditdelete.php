<?php

session_start();

$username=$_SESSION["username"];
$name=$_SESSION["name"];
$conn = mysqli_connect('localhost','root','','pklflash');
$result = mysqli_query($conn, "SELECT * FROM products");

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
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg font-montserrat">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-almost-white uppercase bg-almost-black">
                <tr>
                    <th scope="col" class="py-3 px-6">Nama Produk</th>
                    <th scope="col" class="py-3 px-6">Kategori Produk</th>
                    <th scope="col" class="py-3 px-6">Deskripsi Produk</th>
                    <th scope="col" class="py-3 px-6">Harga Produk</th>
                    <th scope="col" class="py-3 px-6">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; while ($row = mysqli_fetch_assoc($result)): ?>
                <tr class="bg-white border-b dark:bg-gray-900">
                    <th scope="row" class="py-4 px-6 font-medium text-almost-black whitespace-nowrap dark:text-white"><?php echo $row["judul"]; ?></th>
                    <td class="py-4 px-6"><?php echo $row["kategori"]; ?></td>
                    <td class="py-4 px-6"><?php echo $row["deskripsi"]; ?></td>
                    <td class="py-4 px-6"><?php echo $row["harga"]; ?></td>
                    <td class="py-4 px-6">
                        <a href="adminedit.php?id=<?php echo $row["id"]; ?>" class="font-medium text-blue-600 hover:underline">Edit</a>
                        /
                        <a href="admindel.php?id=<?php echo $row["id"]; ?>" class="font-medium text-blue-600 hover:underline">Hapus</a>
                    </td>
                </tr>
                <?php $i++; endwhile; ?>
                </tbody>
            </table>
        </div>
        <!--    -->
    <!-- Footer -->
    <footer class="grid container place-items-center px-32 relative bottom-0 h-16">
        <div class='text-center text-almost-black text-sm font-light py-2'>Copyright &copy; 2022 Flash Computer</div>
    </footer>
    <!-- -->
</main>
</body>
</html>