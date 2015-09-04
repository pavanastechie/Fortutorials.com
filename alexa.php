<?php

/* Requests the parsed WHOIS record for the domain
 * and returns an Array containing the parsed WHOIS properties.
 *
 * @param   string $domain The domain to lookup.
 *
 * @return  array
 */
function whoisProperties($domain)
{
    $username = 'YOUR_API_KEY';
    $password = 'X';
    $template = 'http://api.robowhois.com/whois/DOMAIN/properties';
     
    // Initializing curl
    $ch = curl_init();

    // Configuring curl options
    curl_setopt($ch, CURLOPT_URL, str_replace('DOMAIN', $domain, $template));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP/' . phpversion());
     
    // Getting JSON result as string
    $response = curl_exec($ch);

    // Decode the JSON response into an Array
    return json_decode($response);
}

print_r(whoisProperties('google.com'));
