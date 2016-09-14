<?php
crawl_url("http://www.amazon.in/b/ref=s9_acss_bw_en_CEPCEN_d_1_2?_encoding=UTF8&node=1388977031&pf_rd_m=A1VBAL9TL5WCBF&pf_rd_s=merchandised-search-top-3&pf_rd_r=0D8TQGKM59GA4E503Q1C&pf_rd_t=101&pf_rd_p=1067378747&pf_rd_i=976419031",2);

function crawl_url($url,$depth) {
  static $seen = array();
  $seen[$url] = true;

  $dom = new DOMDocument('1.0');
  @$dom->loadHTMLFile($url);
  $anchors = $dom->getElementsByTagName('a');

  foreach($anchors as $element) {
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
    }
    $hrefArr [] = $href;
   // echo "URL:",json_encode($href),PHP_EOL;
    $depth =  $depth-1;
    if($depth > 0) {
      crawl_url($href, $depth);
    }
  }
  echo "URL:",json_encode($hrefArr),PHP_EOL;
}
echo "URL:",$url,PHP_EOL,"CONTENT:",PHP_EOL,PHP_EOL,PHP_EOL;
