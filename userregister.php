<?php
    $conn = mysqli_connect('localhost','root','','pklflash');
    if (isset($_POST["Simpan"])){
        $namapanggilan=$_POST["namapanggilan"];
        $namalengkap=$_POST["namalengkap"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $email=$_POST["email"];
        $alamat=$_POST["alamat"];
        $phone=$_POST["phone"];

        $q="INSERT INTO users VALUES('','$namapanggilan','$namalengkap','$username','$password','$email','$alamat','$phone') ";
        mysqli_query($conn,$q);

        if(mysqli_affected_rows($conn)>0){
            echo"<script>
            alert('Terima kasih sudah bergabung dengan kami!');</script>";
            header("Location:index.php");
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
    <!-- -->
    <form action="" method="post">
    <div class="min-h-screen relative flex justify-center items-center bg-white">
        <div class="p-10 border-[1px] -mt-10 border-slate-200 rounded-lg flex flex-col items-center space-y-3">
            <div class="flex flex-col space-y-1">
                <input type="text" name="namapanggilan" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" placeholder="Nama Panggilan" />
            </div>
            <div class="flex flex-col space-y-1">
                <input type="text" name="namalengkap" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" placeholder="Nama Lengkap" />
            </div>
            <div class="flex flex-col space-y-1">
                <input type="text" name="username" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" placeholder="Username" />
            </div>
            <div class="flex flex-col space-y-1">
                <input type="password" name="password" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" placeholder="Password" />
            </div>
            <div class="flex flex-col space-y-1">
                <input type="text" name="email" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" placeholder="Email" />
            </div>
            <div class="flex flex-col space-y-1">
                <input type="text" name="alamat" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" placeholder="Alamat" />
            </div>
            <div class="flex flex-col space-y-1">
                <input type="text" name="phone" class="text-center p-3 border-[1px] border-slate-500 rounded-md w-80" placeholder="Nomor Telepon" />
            </div>
            <div class="flex flex-col space-y-5 w-full">
                <button type="submit" name="Simpan" class="w-full bg-almost-black text-almost-white rounded-3xl p-3 border font-bold transition duration-200 hover:bg-almost-white hover:text-almost-black hover:border-almost-black hover:border-2">Sign Up</button>
            </div>
        </div>
    </div>
</form>
    <!-- Footer -->
    <footer class="grid container place-items-center px-32 relative bottom-0 h-16">
        <div class='text-center text-almost-black text-sm font-light py-2'>Copyright &copy; 2022 Flash Computer</div>
    </footer>
    <!-- -->
</main>
</body>
</html>