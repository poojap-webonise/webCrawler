<?php
 if($fp = fopen("http://www.amazon.in/b/ref=s9_acss_bw_en_CEPCEN_d_1_2?_encoding=UTF8&node=1388977031&pf_rd_m=A1VBAL9TL5WCBF&pf_rd_s=merchandised-search-top-3&pf_rd_r=0D8TQGKM59GA4E503Q1C&pf_rd_t=101&pf_rd_p=1067378747&pf_rd_i=976419031" ,"r" ))
 {
   //our fopen is right, so let's go
   $content = ""; while(!feof($fp))
   {
       $content .= fgets($fp, 1024);
    }


 preg_match_all("/([0-9]*[,]*[.][0-9]{2})/", $content, $prices, PREG_SET_ORDER);
"
";
print_r($prices);exit;
   $dom = new DOMDocument('1.0');
   @$dom->loadHTMLFile('http://www.amazon.in/b/ref=s9_acss_bw_en_CEPCEN_d_1_2?_encoding=UTF8&node=1388977031&pf_rd_m=A1VBAL9TL5WCBF&pf_rd_s=merchandised-search-top-3&pf_rd_r=0D8TQGKM59GA4E503Q1C&pf_rd_t=101&pf_rd_p=1067378747&pf_rd_i=976419031');
   $anchors = $dom->getElementsByTagName('a');

   foreach ($anchors as $element) {
     $href = $element->getAttribute('href');
     if (0 !== strpos($href, 'http')) {
       $path = '/' . ltrim($href, '/');
       if (extension_loaded('http')) {
         $href = http_build_url($url, array('path' => $path));
       } else {
         $parts = parse_url($url);
         $href = $parts['scheme'] . '://';
         if (isset($parts['user']) && isset($parts['pass'])) {
           $href .= $parts['user'] . ':' . $parts['pass'] . '@';
         }
         $href .= $parts['host'];
         if (isset($parts['port'])) {
           $href .= ':' . $parts['port'];
         }
         $href .= $path;
       }
     }echo "URL:",$href,PHP_EOL;

   }

   $imgs = $dom->getElementsByTagName('img');

   foreach ($imgs as $imgElement) {
     $href = $imgElement->getAttribute('href');
     if (0 !== strpos($href, 'http')) {
       $path = '/' . ltrim($href, '/');
       if (extension_loaded('http')) {
         $href = http_build_url($url, array('path' => $path));
       } else {
         $parts = parse_url($url);
         $href = $parts['scheme'] . '://';
         if (isset($parts['user']) && isset($parts['pass'])) {
           $href .= $parts['user'] . ':' . $parts['pass'] . '@';
         }
         $href .= $parts['host'];
         if (isset($parts['port'])) {
           $href .= ':' . $parts['port'];
         }
         $href .= $path;
       }
     }echo "URL:",$href,PHP_EOL;

   }

   //fclose($fp); //we are done here, don't need the main source anymore
 }
 //our fopen is right, so let's go $content = ""; while(!feof($fp))
 // { //while it is not the last line, we will add the current line to our $content $content .= fgets($fp, 1024); }
 // fclose($fp); //we are done here, don't need the main source anymore ?>
