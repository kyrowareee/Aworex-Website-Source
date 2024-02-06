<?php
function BBCodes($var) {
    $search = array(
      '/\[REPLY\=(.*?)\](.*?)\[\/REPLY\]/is',
      '/\[b\](.*?)\[\/b\]/is',
      '/\[i\](.*?)\[\/i\]/is',
      '/\[u\](.*?)\[\/u\]/is',
      '/\[s\](.*?)\[\/s\]/is',
      '/\[link\=(.*?)\](.*?)\[\/link\]/is',
      '/\[br\]/is',
      '/\[image\](.*?)\[\/image\]/is',
      '/\[video\](.*?)\[\/video\]/is',
      '/\[music\](.*?)\[\/music\]/is'
    );
    $replace = array(
      '<a href="/$1">$2</a>',
      '<b>$1</b>',
      '<i>$1</i>',
      '<u>$1</u>',
      '<strike>$1</strike>',
      '<a href="$1">$2</a>',
      '<br>',
      '<img src="$1" width="250px">$2</img>',
      "<video width='250' style='border-radius: 15px !important;'' controls='controls' autoplay controls muted><source src='$1' controls></video>",
      "<audio id='audioau' width='235' style='border-radius: 15px !important; margin-bottom: 10px;' controls><source src='$1' controls></audio>"
    );
    $var = preg_replace($search, $replace, $var);
    return $var;
  }