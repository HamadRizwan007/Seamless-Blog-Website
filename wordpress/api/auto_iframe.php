<?php

function Code($d){
    $d = str_replace(' ', '', $d);
    $cleanedurl = implode('/', array_slice(explode('/', preg_replace('/https?:\/\/|www./', '', $d)), 0, 1));
    switch($cleanedurl){
        case 'vimeo.com':
            $url = $d.'/';
            $pattern = "/vimeo.com\/(.*?)\//";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<iframe src=\"//player.vimeo.com/video/".$embedurl."\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
            break;
        case 'youtube.com':
            $url = $d.'/';
            $pattern = "/youtube.com\/watch\?v=(.*?)\//";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<iframe src=\"//www.youtube.com/embed/".$embedurl."\" frameborder=\"0\" allowfullscreen></iframe>";
            break;					

        case 'dailymotion.com':
            $url = $d;
            $pattern = "/dailymotion.com\/video\/(.*?)\_/";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<iframe frameborder=\"0\" src=\"//dailymotion.com/embed/video/".$embedurl."\" allowfullscreen></iframe>";
            break;
        case 'tune.pk':
            $url = $d;
            $pattern = "/tune.pk\/video\/(.*?)\//";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<iframe src=\"http://tune.pk/player/embed_player.php?vid=".$embedurl."\" frameborder=\"0\" allowfullscreen scrolling=\"no\"></iframe>";
            break;
        case 'vube.com':
            $url = $d;
            $tokens = explode('/', $url);
            $embedurl = $tokens[sizeof($tokens)-1];
            return "<iframe type=\"text/html\" src=\"//vube.com/embed/video/".$embedurl."?autoplay=false&fit=true\" allowfullscreen frameborder=\"0\">";
            break;	
        case 'twitch.tv':
            $url = $d;
            if (substr($url,0,4) == 'http'){
                return "<iframe src=\"".$url."/embed\" frameborder=\"0\" scrolling=\"no\"></iframe>";
            }
                return 'please enter twitch url with http';
            break;
        case 'metacafe.com':
            $url = $d;
            $pattern = "/metacafe.com\/watch\/(.*?)\//";
            preg_match_all($pattern, $url, $matches);
            $embedurl = $matches[1][0];
            return "<iframe src=\"//www.metacafe.com/embed/".$embedurl."/\" allowFullScreen frameborder=0></iframe>";
            break;
    }

    return 'video url not supported.';
}

$str = "https://www.youtube.com/watch?v=NSaz1oRkhUA";

echo Code($str);

	
?>