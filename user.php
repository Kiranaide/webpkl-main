

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
<div class="alert alert-warning" role="alert">
    </div>
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
    <div class="min-h-screen relative flex justify-center items-center bg-white">
    <form method="post" action="login.php">
        <div class="p-10 border-[1px] -mt-10 border-slate-200 rounded-lg flex flex-col items-center space-y-3">
            <input type="text" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" name="username" placeholder="Username"/>
            <div class="flex flex-col space-y-1">
                <input type="password" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" name="password" placeholder="Password" />
            </div>
            <div class="flex flex-col space-y-5 w-full">
                <button type="submit" name="input" class="w-full bg-almost-white rounded-3xl border border-almost-black p-3 text-almost-black font-bold">Log in</button>
                <div class="flex items-center justify-center border-t-[1px] border-t-slate-300 w-full relative">
                    <div class="-mt-1 font-bod bg-white px-5 absolute">Or</div>
                </div>
                <button class="w-full border-almost-black hover:border-[2px] border-[1px] rounded-3xl p-3 text-almost-black font-bold"><a href="userregister.php">Sign Up</a></button>
            </div>
        </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="grid container place-items-center px-32 relative bottom-0 h-16">
        <div class='text-center text-almost-black text-sm font-light py-2'>Copyright &copy; 2022 Flash Computer</div>
    </footer>
    <!-- -->
</main>
</body>
</html>