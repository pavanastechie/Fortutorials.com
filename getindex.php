<?php
/**
     * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
     * array containing the HTTP server response header fields and content.
     */
	 include 'simple_html_dom.php';
    function get_web_page( $url )
    {
        $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

        $options = array(

            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_POST           =>false,        //set to GET
            CURLOPT_USERAGENT      => $user_agent, //set user agent
            CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => 'Accept-Language: EN',    // don't return headers
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 1000,      // timeout on connect
            CURLOPT_TIMEOUT        => 1000,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
			CURLOPT_SSL_VERIFYPEER => FALSE,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_FOLLOWLOCATION => 1,
			CURLOPT_SSLVERSION => 3,
			 CURLOPT_HTTPHEADER     => array("Accept-Language: en-US;q=0.6,en;q=0.4")
			        );
        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );
        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }
?>

<?php
$ar = array("yahoo.com"

);
$i=0;
//Read a web page and check for errors:
foreach ($ar as $url) {
$result = get_web_page($url);

if ( $result['errno'] != 0 )
  //  ... error: bad url, timeout, redirect loop ...

if ( $result['http_code'] != 200 )
   // ... error: no page, no permissions, no service ...

$page = $result['content'];

//echo $page;
//print_r($result['content']);

$html = str_get_html($result['content'] );
 if(is_object($html)){
 $file = fopen("C:/xampp/htdocs/homepage/tests/".$url.".html","w");
echo fwrite($file,$html);
fclose($file);
  $t = $html->find("title", 0);
  if($t){
   $title = $t->innertext;
  }
  echo $title." ----- THIS IS PAGE TITLE OF ".$url."<br/>";
 foreach($html->find('a') as $element) 
       echo $element->href . '<br>';
  $html->clear(); 
  unset($html);
 }



// $file = fopen("C:/xampp/htdocs/homepage/tests/".$url.".html","w");
 // fwrite($file,$result['content']."\r\n"."==================================================================================================================");

 // $doc = new DOMDocument();
 // @$doc->loadHTML($result['content']);
 // $nodes = $doc->getElementsByTagName('title');
// //print_r($nodes);
  // $title = $nodes->item(0)->nodeValue;
 // echo "-". $title."<br/>";
 // $title = '';
//get and display what you need:

ini_set('max_execution_time', 0);
}
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
// var spge = <?php echo json_encode($result['content']); ?>;
// console.log("$$$$$$$$$$$$$$$$$$$");
// //console.log(spge);
// var xx = JSON.stringify(spge);
// var parsehtml = $.parseHTML(  );
// console.log(xx);
// console.log(parsehtml.find('title'));

// // then echo it into the js/html stream
// // and assign to a js variable


</script>