<?php
session_start();

if(isset($_SESSION['refresh_count'])){
    $_SESSION['refresh_count']++;
} else {
    $_SESSION['refresh_count'] = 1;
	$_SESSION['country'] = ''; // Initialize the country session variable
}

$refresh_count = $_SESSION['refresh_count'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Server Information</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border: 1px solid #cccccc;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    .info {
      margin-bottom: 20px;
    }

    .label {
      font-weight: bold;
      margin-right: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Server Information</h1>
    <div class="info">
      <span class="label">IP address from where the user is viewing the current page:</span>
      <?php echo $_SERVER['REMOTE_ADDR']; ?>
    </div>
    <div class="info">
      <span class="label">Your host name on the Internet:</span>
      <?php echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?>
    </div>
    <div class="info">
      <span class="label">Local IP address of the this server:</span>
      <?php echo $_SERVER['SERVER_ADDR']; ?>
    </div>
    <div class="info">
      <span class="label">Name of the this server (IP):</span>
      <?php echo $_SERVER['SERVER_NAME']; ?>
    </div>
    <div class="info">
      <span class="label">Server identification (Software):</span>
      <?php echo $_SERVER['SERVER_SOFTWARE']; ?>
    </div>
    <div class="info">
      <span class="label">Client's browser/OS:</span>
      <?php
		function get_client_browser() {
			$u_agent = $_SERVER['HTTP_USER_AGENT'];
			$bname = 'Unknown';
			$platform = 'Unknown';

			// First get the platform
			if (preg_match('/linux/i', $u_agent)) {
				$platform = 'Linux';
			} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
				$platform = 'Mac';
			} elseif (preg_match('/windows|win32/i', $u_agent)) {
				$platform = 'Windows';
			}

			// Next get the name of the user agent
			if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
				$bname = 'Internet Explorer';
			} elseif (preg_match('/Firefox/i', $u_agent)) {
				$bname = 'Mozilla Firefox';
			} elseif (preg_match('/Chrome/i', $u_agent)) {
				$bname = 'Google Chrome';
			} elseif (preg_match('/Safari/i', $u_agent)) {
				$bname = 'Apple Safari';
			} elseif (preg_match('/Opera/i', $u_agent)) {
				$bname = 'Opera';
			} elseif (preg_match('/Netscape/i', $u_agent)) {
				$bname = 'Netscape';
			} elseif (preg_match('/Edge/i', $u_agent)) {
				$bname = 'Microsoft Edge'; // Detection pattern for Microsoft Edge
			} elseif (preg_match('/Trident\/7.0; rv:11.0/i', $u_agent)) {
				$bname = 'Internet Explorer 11'; // Detection pattern for IE11
			} elseif (preg_match('/Edg/i', $u_agent)) {
				$bname = 'Microsoft Edge Chromium'; // Detection pattern for Chromium-based Edge
			} elseif (preg_match('/OPR/i', $u_agent)) {
				$bname = 'Opera Chromium'; // Detection pattern for Chromium-based Opera
			} elseif (preg_match('/SamsungBrowser/i', $u_agent)) {
				$bname = 'Samsung Internet'; // Detection pattern for Samsung Internet
			} elseif (preg_match('/UCBrowser/i', $u_agent)) {
				$bname = 'UC Browser'; // Detection pattern for UC Browser
			} elseif (preg_match('/Vivaldi/i', $u_agent)) {
				$bname = 'Vivaldi'; // Detection pattern for Vivaldi
			}

			return $bname . " on " . $platform . " OS";
		}
		// Usage
		echo get_client_browser();
	?>
    </div>
    <div class="info">
      <span class="label">Number of times F5 has been pressed:</span>
      <?php echo $refresh_count; ?>
    </div>
  </div>
</body>
</html>
