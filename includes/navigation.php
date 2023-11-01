<div class="sidebar">
    <div class="burger-container">
        <button class="nav-btn"></button>
    </div>
    
    <div class="sidebar__links">
        <ul>
            <li>
                <a class="" href="/non-league">Home</a>
            </li>
            <li>
                <a class="" href="#">About</a>
            </li>
            <li>
                <a class="dropdown-toggle">Positions<i class="fas fa-chevron-down"></i></a>
                <div class="dropdown-menu" >
                    <div class="dropdown-links">
                        <a class="dropdown-item" href="filter.php?filter_position=Goalkeeper&filter_region=">Goalkeeper</a>
                        <a class="dropdown-item" href="filter.php?filter_position=Defender&filter_region=">Defender</a>
                        <a class="dropdown-item" href="filter.php?filter_position=Midfielder&filter_region=">Midfielder</a>
                        <a class="dropdown-item" href="filter.php?filter_position=Attacker&filter_region=">Attacker</a>
                    </div>
                </div>
            </li>
            <li>
                <a class="dropdown-toggle">Regions<i class="fas fa-chevron-down"></i></a>
                <div class="dropdown-menu">
                    <div class="dropdown-links">
                        <a class="dropdown-item" href="filter.php?filter_position=&filter_region=England">England</a>
                        <a class="dropdown-item" href="filter.php?filter_position=&filter_region=Wales">Wales</a>
                        <a class="dropdown-item" href="filter.php?filter_position=&filter_region=Scotland">Scotland</a>
                        <a class="dropdown-item" href="filter.php?filter_position=&filter_region=Northern+Ireland">Northern Ireland</a>
                    </div>
                </div>
            </li>
        </ul>
        <?php include "includes/sidebar.php"; ?>
    </div>
</div>
