<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/navigation.php"; ?>

<div class="container">

<header class="header">
    <h2 class="header__logo"><i class="fas fa-futbol"></i> The UK's biggest player database</h2>
    <h3 class="heading-3">Find your next superstar</h3>
    <h1 class="heading-1">Non League Promotors</h1>
    <a href="filter.php?filter_position=&filter_region=" class="btn header__btn">View all players</a>
    <div class="player-search">
        <div>
            <h3 class="heading-3 mb-10">Find a player <i class="far fa-arrow-right"></i></h3>
        </div>
        <div>
            <form action="search.php" method="post">
            <input class="header__input" name="search" type="text" placeholder="Player Search" aria-label="Search">
            <button name="submit" class="btn-small" id="playerSearch" type="submit">
                <i class="fa fa-search"></i>
            </button>
            </form>
        </div>
    </div>
</header>

<div class="featuredPlayers">
    <h3 class="heading-3">Trending Players</h3>

    <?php
    $query = "SELECT * FROM players WHERE player_tags = 'Featured'";
    $select_featured_player_query = mysqli_query($connection, $query);
    checkQuery($select_featured_player_query);

    while ($row = mysqli_fetch_assoc($select_featured_player_query))
    {
        $player_id = $row['player_id'];
        $player_name = $row['player_name'];
        $player_image = $row['player_image'];
        $player_dob = $row['player_dob'];
        $player_position = $row['player_position'];
        $player_region = $row['player_region'];
        $player_bio = $row['player_bio'];
        $player_email = $row['player_email'];
        $player_height = $row['player_height'];
        $player_preferred_foot = $row['player_preferred_foot'];
        $player_status = $row['player_status'];

        if ($player_status == 'Active')
        { ?>
    <div class="featuredPlayers__list">
        <img class="featuredPlayers__img" alt="player" src="images/<?php echo $player_image ?>">
        <div class="featuredPlayers__details">
            <h4 class="heading-4 heading-4--light"><a href="post.php?p_id=<?php echo $player_id; ?>"><?php echo $player_name ?></a></h4>
            <p class="featuredPlayers__position"><?php echo $player_position ?></p>
        </div>
    </div>
        <?php
        }
    }
    ?>  
</div>

<form class="player-filter" action="filter.php" method="get">
    <div class="filter">
            <h4 class="heading-4 heading-4--dark">Position</h4>
            <select class="col-8 custom-select align-self-center" name="filter_position">
                <option value="">Any</option>
                <option value="Goalkeeper">Goalkeeper</option>
                <option value="Defender">Defender</option>
                <option value="Midfielder">Midfielder</option>
                <option value="Attacker">Attacker</option>
            </select>
    </div>
    <div class="filter">
            <h4 class="heading-4 heading-4--dark">Region</h4>
            <select class="col-8 custom-select align-self-center" name="filter_region">
                <option value="">Any</option>
                <option value="England">England</option>
                <option value="Wales">Wales</option>
                <option value="Scotland">Scotland</option>
                <option value="Northern Ireland">Northern Ireland</option>
            </select>
    </div>
    <input class="btn-small" type="submit" name="filter_player" value="Go">
</form>    


<div class="story__pictures">
    <img src="images/story-1.jpg" alt="" class="story__img--1">
    <img src="images/story-2.jpg" alt="" class="story__img--2">
</div>

<div class="story__content">
    <h3 class="heading-3 mb-sm">Join the team</h3>
    <h2 class="heading-2 heading-2--dark mb-md">&ldquo;The best decision of our lives&rdquo;</h2>
    <p class="story__text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. A ipsum nostrum maiores maxime? Aliquam deleniti illum itaque? Neque assumenda, hic ratione corrupti, inventore, sed aliquid tempore dolorum ad reprehenderit quibusdam.
    </p>
    <a class="btn" href='registration.php'>Create an account</a>
</div>

<section class="players">
<?php
$query = "SELECT * FROM players LIMIT 6";
$select_all_players_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_players_query))
{
    $player_id = $row['player_id'];
    $player_name = $row['player_name'];
    $player_image = $row['player_image'];
    $player_dob = $row['player_dob'];
    $player_position = $row['player_position'];
    $player_region = $row['player_region'];
    $player_bio = $row['player_bio'];
    $player_email = $row['player_email'];
    $player_height = $row['player_height'];
    $player_preferred_foot = $row['player_preferred_foot'];
    $player_status = $row['player_status'];

    if ($player_status == 'Active')
    {
?>

    <div class="player">
        <img src="images/<?php echo $player_image ?>" alt="Player Image" class="player__img">
        <h5 class="player__name"><?php echo $player_name ?></h5>
        <div class="player__location">
            <p>Region: <?php echo $player_region ?></p>
        </div>
        <div class="player__age">
            <p>Age: <?php echo getAge($player_dob); ?></p>
        </div>
        <div class="player__position">
            <p>Position: <?php echo $player_position ?></p>
        </div>
        <div class="player__height">
            <p>Height: <?php echo $player_height ?>cm</p>
        </div>
        <a class="btn player__btn" href="post.php?p_id=<?php echo $player_id; ?>">Contact player</a>
    </div>
    
<?php
    }
} ?>
</section>

</div>
<?php include "includes/footer.php"; ?>