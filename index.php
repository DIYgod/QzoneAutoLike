<?php
//代码作者：giuem
//更多源码请访问www.giuem.com
$qq="";
$sid="";
function getmiddltxt($txt,$left,$right)
    {
       preg_match_all("{".$left."(.*?)".$right."}",$txt,$data,PREG_SET_ORDER);
       return $data;
    }
function url_get($url,$POSTcontent="",$cookie="")
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        if ($POSTcontent!=""){curl_setopt($ch, CURLOPT_POSTFIELDS,$POSTcontent);}
        if ($cookie!=""){curl_setopt($ch, CURLOPT_COOKIE,$cookie);}
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
 
$url="http://ish.z.qq.com/infocenter_v2.jsp?B_UID={$qq}&sid={$sid}&g_ut=1";
$content=url_get($url);
$zz=getmiddltxt($content,']<a href="http://blog','">赞');
//print_r($zz);
//echo $content;
$a=count($zz);
//echo $zz[1][0];
for($i=1;$i<=$a;$i++){
   $url1= $zz[$i-1][0];
    $url2=getmiddltxt($url1,']<a href="','">赞');
    file_get_contents(html_entity_decode($url2[0][1]));
    echo "成功";
    sleep(5);
}
if ($a=="0"){echo "none";}
 
 
?>
