<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Positions
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="filter.php?filter_position=Goalkeeper&filter_region=">Goalkeeper</a>
                <a class="dropdown-item" href="filter.php?filter_position=Defender&filter_region=">Defender</a>
                <a class="dropdown-item" href="filter.php?filter_position=Midfielder&filter_region=">Midfielder</a>
                <a class="dropdown-item" href="filter.php?filter_position=Attacker&filter_region=">Attacker</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Regions
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="filter.php?filter_position=&filter_region=England">England</a>
                <a class="dropdown-item" href="filter.php?filter_position=&filter_region=Wales">Wales</a>
                <a class="dropdown-item" href="filter.php?filter_position=&filter_region=Scotland">Scotland</a>
                <a class="dropdown-item" href="filter.php?filter_position=&filter_region=Northern+Ireland">Northern Ireland</a>
            </div>
        </li>
        </ul>

        <?php include "includes/sidebar.php"; ?>
    </div>
    </nav>
</div>
