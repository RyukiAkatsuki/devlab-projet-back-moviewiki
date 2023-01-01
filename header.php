<header>
    <nav class="navbar">
        <ul class="menu">

            <li> <a href="index.php" class="home">Home</a></li>
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){ ?>
                <li><a href="admin.php" class="casemenu client">ADMIN</a></li>

            <?php } else if(isset($_SESSION['admin']) && $_SESSION['admin'] === false){?>
                <li><a href="my-account.php" class="casemenu client">My account</a></li>

            <?php } else { ?>
                <li><a href="login.php" class="casemenu client">Log in</a></li>
            <?php } ?>

        </ul>
    </nav>
</header>