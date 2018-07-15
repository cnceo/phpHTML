<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/07/15 0015
 * Time: 13:02
 */
include_once "phpQuery/phpQuery.php";
header("Content-type:text/html;charset=utf-8");
//$html=file_get_contents("http://www.caim8.com/abroad/open_ssc/cz/xtxffc.html");
//$dom=new DOMComment();
//$dom->loadHTML($html);
//var_dump($html);
//echo $html;
phpQuery::newDocumentFile('http://www.caim8.com/index.php?s=/Abroad/open_ssc/cz/xtxffc/dt/20180714/p/1.html');
//$list=pq(".ssc>tr:eq(0)");
for ($i=0;$i<100;$i++){
    echo '期数:';
    $q=pq(".ssc>tr:eq(".$i.")>td:eq(0)")->html();
    $arr=explode(" ",$q);
//    var_dump(explode(" ",$q));
    echo $arr[0]."                 ";
    echo '号码：';
    echo pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(0)")->html();
    echo pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(1)")->html();
    echo pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(2)")->html();
    echo pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(3)")->html();
    echo pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(4)")->html();
    echo "<br>";
}

