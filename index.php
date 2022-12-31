<?php
session_start();

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
    <title>Flash Computer</title>
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
        <!-- Hero Section -->
        <div class="grid grid-cols-2 gap-4 px-32 py-8 text-center lg:text-left mx-auto my-auto h-full">
            <div class="flex flex-col space-y-8 relative z-0 px-4">
                <div>
                    <h1 class="text-almost-black font-montserrat font-bold text-7xl leading-[68px] py-6">Computer Supplier, Accessories, Services for your needs.</h1>
                </div>
                <div>
                <?php
                            if (isset($_SESSION["username"])) {
                                echo " <button class='text-almost-white text-2xl bg-almost-black rounded-xl px-6 py-4 border border-almost-black hover:bg-almost-white hover:text-almost-black'>
                                <a href='catalog.php'>Check it out!</a>
                            </button>";
                            } else {
                                echo " <button class='text-almost-white text-2xl bg-almost-black rounded-xl px-6 py-4 border border-almost-black hover:bg-almost-white hover:text-almost-black'>
                                <a href='user.php'>Get Started Now!</a>
                            </button>";
                            }
                            
                            ?>
                   
                </div>
            </div>
            <div class="flex">
                <img class="items-center bg-auto my-auto h-auto" src="images/hero-image.jpg" alt="Hero">
            </div>
        </div>
        <!-- -->
        <!-- Footer -->
        <footer class="grid container place-items-center px-32 relative bottom-0 w-full h-16">
            <div class='text-center text-almost-black text-sm font-light py-2'>Copyright &copy; 2022 Flash Computer</div>
        </footer>
        <!-- -->
    </main>
    </body>
</html>