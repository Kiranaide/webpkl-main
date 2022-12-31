<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION["username"])) {
	header("Location:index.php");
	exit;
}

$username=$_SESSION["username"];
$name=$_SESSION["name"];


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
    <title>List Katalog - Flash Computer</title>
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
        <div class="flex items-start px-32 py-8 space-x-4 mx-auto my-auto h-full">
            <div class="overflow-y-auto py-4 px-3 bg-gray-100 rounded-lg item w-full h-auto">
                <div class="grid place-items-center overflow-hidden grid-cols-4 gap-4 grid-rows-3 grid-flow-row w-auto h-auto">
                    <?php
                        $db = "SELECT * FROM products";
                        $query = mysqli_query($koneksi, $db);
                        while ($data=mysqli_fetch_object($query)) {?>
                        <div class="relative w-64 h-[25rem] rounded-lg bg-almost-white overflow-hidden" id="card">
                            <a href="cart.php?id=<?php echo $data->id;?>&action=add">
                            <img class="rounded-lg max-w-full h-auto object-cover mx-auto" src="img/<?php echo $data->images; ?>"></img>
                            <h3 class="font-bold pl-2 pt-2"><?php echo $data->judul; ?></h3>
                            <div class="pl-2 pb-2">Rp. <?php echo $data->harga; ?></td> </div>
                            <div class="pl-2 pb-2">Order now!</div>
                        </a>
                        </div> 
                        <?php
                        }
                        ?>        
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