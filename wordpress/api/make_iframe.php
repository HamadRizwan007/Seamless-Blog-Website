
	
<?php
function makeUrltoLink($string) {
 // The Regular Expression filter
 $reg_pattern = "/(((http|https|ftp|ftps)\:\/\/)|(www\.))[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
 
 // make the urls to hyperlinks
 return preg_replace($reg_pattern, '<a href="$0" target="_blank" rel="noopener noreferrer">$0</a>', $string);
}
 
function makeUrltoiFrame($string) {
 // The Regular Expression filter
 $reg_pattern = "/(((http|https|ftp|ftps)\:\/\/)|(www\.))[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
 
 // make the urls to hyperlinks
 $url =  preg_replace($reg_pattern, '<iframe loading="lazy" src="$0" style="border:0px #ffffff none;" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="150px" width="300px" allowfullscreen></iframe>', $string);
 return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$string);

}

function convertYoutubeEmbed($string)
{
    return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$string);
}


function makeiframe($string){

$link = "/(((http|https|ftp|ftps)\:\/\/)|(www\.))[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
$youtube = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";






}

$str = "Visit https://www.youtube.com/watch?v=NSaz1oRkhUA and subscribe us on https://www.cluemediator.com/subscribe for regular updates.";
 
echo $convertedStr = makeUrltoLink($str);
echo $iframeStr = makeUrltoiFrame($str);
 
// Output: Visit <a href="www.cluemediator.com" target="_blank" rel="noopener noreferrer">www.cluemediator.com</a> and subscribe us on <a href="https://www.cluemediator.com/subscribe" target="_blank" rel="noopener noreferrer">https://www.cluemediator.com/subscribe</a> for regular updates.
?>