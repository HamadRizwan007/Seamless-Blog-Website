
	
<?php
function makeUrltoLink($string) {
 // The Regular Expression filter
 $reg_pattern = "/(((http|https|ftp|ftps)\:\/\/)|(www\.))[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
 
 // make the urls to hyperlinks
 return preg_replace($reg_pattern, '<a href="$0" target="_blank" rel="noopener noreferrer">$0</a>', $string);
}
 
$str = "Visit www.cluemediator.com and subscribe us on https://www.cluemediator.com/subscribe for regular updates.";
 
echo $convertedStr = makeUrltoLink($str);
 
// Output: Visit <a href="www.cluemediator.com" target="_blank" rel="noopener noreferrer">www.cluemediator.com</a> and subscribe us on <a href="https://www.cluemediator.com/subscribe" target="_blank" rel="noopener noreferrer">https://www.cluemediator.com/subscribe</a> for regular updates.
?>