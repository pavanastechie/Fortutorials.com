<html>
<head>
<title>Whois Lookup Script</title>
<meta http-equiv="Content-Type" content ="text/html; charset=iso-8859-1">
</head>

<body>
<form action="<?=$_SERVER['PHP_SELF'];?>">
<p><b><label for="domain">Domain/IP Address:</label></b> <input type="text" name="domain" id="domain" value="<?=$domain;?>"> <input type="submit" value="Lookup"></p>
</form>
<?
if($domain) {
    $domain = trim ($domain);
    if(substr (strtolower ($domain), 0, 7) == "http://") $domain = substr ($domain, 7);
    if(substr (strtolower ($domain), 0, 4) == "www.") $domain = substr ($domain, 4);
    if(ValidateIP($domain)) {
        $result = LookupIP($domain);
    }
    elseif(ValidateDomain($domain)) {
        $result = LookupDomain($domain);
    }
    else die ("Invalid Input!");
    echo "<pre>\n" . $result . "\n</pre>\n";
}
?>