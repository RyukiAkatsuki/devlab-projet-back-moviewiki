<header>
    <nav class="navbar min-h-1/2 flex gap-16 justify-center items-center bg-black p-0 text-white shadow-gray-500">

            <li class="list-none"> <a href="index.php" class="hover:text-amber-300">Home</a></li>

            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){ ?>
                <li class="list-none"><a href="admin.php" class="hover:text-amber-300">ADMIN</a></li>

            <?php } else if(isset($_SESSION['admin']) && $_SESSION['admin'] === false){?>
                <li class="list-none"><a href="my-account.php" class="hover:text-amber-300">My account</a></li>

            <?php } else { ?>
                <li class="list-none"><a href="login.php" class="hover:text-amber-300">Log in</a></li>
            <?php } ?>

    </nav>
</header>