<html>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet.css" />
  <title>The Game of Bands Song Depository</title>
  <script src="//connect.soundcloud.com/sdk.js"></script>
  <script>
    SC.initialize({
      client_id: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
      redirect_uri: "http://gameofbands.co/index.php",
    });
  </script>
</head>
<body>
  <div id='headerimage'></div>
  <div id='banner'>
    Welcome to the Game of Bands Song Depository. Stay a while and listen.
    <?php
      require_once( 'src/gob_user.php' );
    
      if (is_loggedin()) {
        echo get_username() . "(" . get_karma() . ")";
        if (is_mod()) { echo '<a href="/admin">Admin Panel</a> | '; }
        echo ' <a href="login.php/logout">Logout</a>';
      } else {
        echo '<a href="login.php">Login</a>';
      }
    ?>
  </div>

<div id='content'>
  <?php
    // Decide which data to display
    switch ($_GET['view']) {
      case 'bandit' : include_once 'src/view_bandit.php';     break;
      case 'fame'   : include_once 'src/view_fame.php';       break;
      case 'round'  : include_once 'src/view_round.php';      break;
      case 'rounds' : include_once 'src/view_rounds.php';     break;
      case 'song'   : include_once 'src/view_song.php';       break;
      default       : include_once 'src/view_all.php';        break;
    }
  ?>

  <div id='fineprint'>
    gameofbands.co is a counterpart to the Game of Bands community at
    <a href='http://gameofbands.reddit.com' target='_blank'>gameofbands.reddit.com</a>.
    Site programming by RetroTheft and tgpo. Design by RetroTheft.
    All music and lyrics presented herein are copyright of their original creators.
  </div>
</div>
</body>
</html>
