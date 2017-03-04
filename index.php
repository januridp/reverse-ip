<!--
   _         _ _         ___   _     
 _| |___ _ _|_| |___ ___|   |_| |___ 
| . | -_| | | | |- _|  _| | | . | -_|
|___|___|\_/|_|_|___|___|___|___|___|
            (c) 2012 devilzc0der -->
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<link rel="shortcut icon" href="http://devilzc0de.org/favicon.ico">
	<meta name="description" content="Devilzc0de Reverse IP and Domain Name"/>
	<meta name="keywords" content="reverse, ip, reverse ip, domain, name, reverse ip devilzc0de, devilzc0de, devilzc0der, host, on the same host"/>
	<meta name="robots" content="index,follow" />
	<meta name="application-name" content="Devilzc0de Reverse IP" />
	<meta name="author" content="rusuh" />
	<meta name="generator" content="Devilzc0de" />
	<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>

<div id="menu">
	<p><a href="http://devilzc0de.org/forum/" target="_blank" title="Devilzc0de Family">Devilzc0de</a><span class="gaya"> </span><a href="http://devilzc0de.org/" target="_blank" title="Devilzc0de Social Network">Social Network</a><span class="gaya"> </span><a href="http://iblisio.us/" target="_blank" title="My Site">My Site</a></p>
</div>

<?php
echo '<title>rusuh - Reverse IP</title>
<form method="post" action="">
<div id="wrapper">
	<div id="main">
		<div class="warranty"></div>
		<div id="decrypt" class="box">
			<p class="title"><strong>rusuh - Reverse IP</strong></p>
		<div>
		<div>
				<div class="setengah">
					<div class="form-field">
						<label for="domain">IP/Domain: </label>
						<input type="hidden" name="domain" value="1" readonly="readonly" />
						<input maxlength="64" type="text" id="domain" name="domain" value="" style="width:150px;" placeholder="127.0.0.1" />
					</div>
				</div>
				<div class="setengah">
					<div class="form-field">
						<label for="kodemaho">Captcha : </label>
						<span id="nohope"><img src="random.php" /></span>
						<input maxlength="64" type="text" id="kodemaho" name="code" value="" style="width:100px;" />
					</div>
				</div>
		<input type="submit" value="Reverse It!" align="center"/>
		</div>
<br>
<br>
</div>
</form>';

set_time_limit(0);
error_reporting(0);

function getsource($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($curl);
    curl_close($curl);
    return $content;
}

function flare($site) {
    $dns = dns_get_record($site, DNS_NS);
    $dns = $dns[0]['target'];
    if(strpos($dns, "cloudflare")) {
        return TRUE;
    }
}

if ($_POST) {
    $site = preg_replace('/\//', '', $_POST['domain']);
    $site = preg_replace('/http:/', '', $site);
    if (! preg_match("/\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/", $site)){
        $site = preg_replace("/http:\/\//", "", $site);
        if($_POST['flare']){
            if(flare($site)){
                die('<a href="http://'.$site.'">'.$site.'</a> is protected by CloudFlare.');
            }
        }
        $ip = gethostbyname($site);
    } else {
        $ip = trim(strip_tags($site));
    }

if ($_POST) {
        $source = getsource("http://viewdns.info/reverseip/?host=" . $ip . "&t=1");
        if(preg_match('/<table border="1"><tr><td>Domain<\/td><td>Last Resolved Date<\/td><\/tr>(.*?)<\/table><br><\/td><\/tr>/', $source, $data)){
            preg_match_all('/<tr><td>(.*?)<\/td><td align="center">/', $data[1], $domains);
            foreach ($domains[1] as $domain) {
                echo "<a href=\"http://".$domain."\" target='_blank' title=".$domain.">".$domain."</a><br>";
            }
        }
}
}
?>
</div></div></div>
<div style="clear:both;"></div>
<div id="endofworld">&copy;2012 <a href="http://kamtiez.web.id/tutorial/reverse-ip-php.pl" target="_blank" title="Kamtiez Blog">kamtiez</a> - Fixed & Mixed by <a href="http://kerinci.net" target="_blank" title="KFC - Ketek Fans Club">ketek</a> - <a href="http://iblisio.us" target="_blank" title="My Site">rusuh</a> - <a href="http://reload-x.org" target="_blank" title="Reload-X Defacer">Reload-X</a> - <a href="http://devilzc0de.org/forum/" target="_blank" title="Devilzc0de Family">Devilzc0de</a></div>
</body>
</html>