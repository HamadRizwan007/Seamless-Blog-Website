<?php
// header('Content-type: text');
$str = "Visit https://www.youtube.com/watch?v=NSaz1oRkhUA and  https://twitter.com/TwitchSupport/status/1611096199838277633  subscribe us on https://www.cluemediator.com/subscribe for regular updates. ";


// $link_regex = "/(((http|https|ftp|ftps)\:\/\/)|(www\.))[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
$link_regex =  '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#';

preg_match_all($link_regex, $str, $links);

// print_r($links);

$converted_links = array();
foreach( $links[0] as $link){
    // echo $link."\n";
    array_push($converted_links, Code($link));
}

print_r($links[0]);
print_r($converted_links);

echo str_replace($links[0], $converted_links, $str);



function Code($d){
    $d = str_replace(' ', '', $d);
    $cleanedurl = implode('/', array_slice(explode('/', preg_replace('/https?:\/\/|www./', '', $d)), 0, 1));
    switch($cleanedurl){
        case 'vimeo.com':
            $url = $d.'/';
            $pattern = "/vimeo.com\/(.*?)\//";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<br><iframe src=\"//player.vimeo.com/video/".$embedurl."\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br>";
            break;
        case 'youtube.com':
            $url = $d.'/';
            $pattern = "/youtube.com\/watch\?v=(.*?)\//";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<br><iframe src=\"//www.youtube.com/embed/".$embedurl."\" frameborder=\"0\" allowfullscreen></iframe><br>";
            break;					

        case 'dailymotion.com':
            $url = $d;
            $pattern = "/dailymotion.com\/video\/(.*?)\_/";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<br><iframe frameborder=\"0\" src=\"//dailymotion.com/embed/video/".$embedurl."\" allowfullscreen></iframe><br>";
            break;
        case 'tune.pk':
            $url = $d;
            $pattern = "/tune.pk\/video\/(.*?)\//";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<br><iframe src=\"http://tune.pk/player/embed_player.php?vid=".$embedurl."\" frameborder=\"0\" allowfullscreen scrolling=\"no\"></iframe><br>";
            break;
        case 'vube.com':
            $url = $d;
            $tokens = explode('/', $url);
            $embedurl = $tokens[sizeof($tokens)-1];
            return "<br><iframe type=\"text/html\" src=\"//vube.com/embed/video/".$embedurl."?autoplay=false&fit=true\" allowfullscreen frameborder=\"0\"><br>";
            break;	
        case 'twitch.tv':
            $url = $d;
            if (substr($url,0,4) == 'http'){
                return "<br><iframe src=\"".$url."/embed\" frameborder=\"0\" scrolling=\"no\"></iframe><br>";
            }
                return 'please enter twitch url with http';
            break;
        case 'metacafe.com':
            $url = $d;
            $pattern = "/metacafe.com\/watch\/(.*?)\//";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<br><iframe src=\"//www.metacafe.com/embed/".$embedurl."/\" allowFullScreen frameborder=0></iframe><br>";
            break;
    
        case 'twitter.com':
            $url = $d;
            $pattern = '/twitter\.com\/TwitchSupport\/status\/(.*)/m';
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            // return "<br><iframe src=\"//www.metacafe.com/embed/".$embedurl."/\" allowFullScreen frameborder=0></iframe><br>";
            return '<br><iframe scrolling="no" id="twitter-widget-0" allowtransparency="true" allowfullscreen="true" style="position: static; visibility: visible; width: 550px; height: 364px; display: block; flex-grow: 1; border: none;" src="https://platform.twitter.com/embed/Tweet.html?dnt=true&embedId=twitter-widget-0&features=eyJ0ZndfdGltZWxpbmVfbGlzdCI6eyJidWNrZXQiOlsibGlua3RyLmVlIiwidHIuZWUiLCJ0ZXJyYS5jb20uYnIiLCJ3d3cubGlua3RyLmVlIiwid3d3LnRyLmVlIiwid3d3LnRlcnJhLmNvbS5iciJdLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2hvcml6b25fdGltZWxpbmVfMTIwMzQiOnsiYnVja2V0IjoidHJlYXRtZW50IiwidmVyc2lvbiI6bnVsbH0sInRmd190d2VldF9lZGl0X2JhY2tlbmQiOnsiYnVja2V0Ijoib24iLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3JlZnNyY19zZXNzaW9uIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19zaG93X2J1c2luZXNzX3ZlcmlmaWVkX2JhZGdlIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19jaGluX3BpbGxzXzE0NzQxIjp7ImJ1Y2tldCI6ImNvbG9yX2ljb25zIiwidmVyc2lvbiI6bnVsbH0sInRmd190d2VldF9yZXN1bHRfbWlncmF0aW9uXzEzOTc5Ijp7ImJ1Y2tldCI6InR3ZWV0X3Jlc3VsdCIsInZlcnNpb24iOm51bGx9LCJ0ZndfbWl4ZWRfbWVkaWFfMTU4OTciOnsiYnVja2V0IjoidHJlYXRtZW50IiwidmVyc2lvbiI6bnVsbH0sInRmd19zZW5zaXRpdmVfbWVkaWFfaW50ZXJzdGl0aWFsXzEzOTYzIjp7ImJ1Y2tldCI6ImludGVyc3RpdGlhbCIsInZlcnNpb24iOm51bGx9LCJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2R1cGxpY2F0ZV9zY3JpYmVzX3RvX3NldHRpbmdzIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd192aWRlb19obHNfZHluYW1pY19tYW5pZmVzdHNfMTUwODIiOnsiYnVja2V0IjoidHJ1ZV9iaXRyYXRlIiwidmVyc2lvbiI6bnVsbH0sInRmd19zaG93X2JsdWVfdmVyaWZpZWRfYmFkZ2UiOnsiYnVja2V0Ijoib24iLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2xlZ2FjeV90aW1lbGluZV9zdW5zZXQiOnsiYnVja2V0IjpmYWxzZSwidmVyc2lvbiI6bnVsbH0sInRmd19zaG93X2dvdl92ZXJpZmllZF9iYWRnZSI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0Zndfc2hvd19idXNpbmVzc19hZmZpbGlhdGVfYmFkZ2UiOnsiYnVja2V0Ijoib24iLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3R3ZWV0X2VkaXRfZnJvbnRlbmQiOnsiYnVja2V0Ijoib24iLCJ2ZXJzaW9uIjpudWxsfX0%3D&frame=false&hideCard=false&hideThread=false&id='.$embedurl.'&lang=en&origin=http%3A%2F%2Flocalhost%2Fwordpress%2Ftesting-link-card%2F&sessionId=438e645c86bb606a4f6ca8d949c1e3d87b834311&theme=light&widgetsVersion=a3525f077c700%3A1667415560940&width=550px frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen data-tweet-id="'.$embedurl.'"></iframe><br>';
            break;
    

    }
    $reg_pattern = "/(((http|https|ftp|ftps)\:\/\/)|(www\.))[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";

    return preg_replace($reg_pattern, '<a href="$0" target="_blank" rel="noopener noreferrer">$0</a>', $d);

}
