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
date_default_timezone_set("Asia/Shanghai");
$conn=new mysqli("127.0.0.1","root","","caipiao");
if($conn->connect_error){
    die("erro:".$conn->connect_error);
}else{
    echo "contect";
//    $sql="insert into txyfc (`periods`,`number`,`time`) VALUES ('1','1','1')";
//    echo $conn->query($sql);
}

$date = getDateFromRange('2018-01-08','2018-07-21');
foreach ($date as $v){
    //function pachong(){
    for($j=1;$j<=15;$j++){
        var_dump("date:".$v."  page:".$j);
        $url='http://www.caim8.com/index.php?s=/Abroad/open_ssc/cz/xtxffc/dt/'.$v.'/p/'.$j.'.html';
        var_dump($url) ;
        phpQuery::newDocumentFile($url);
//        var_dump($query);
////$list=pq(".ssc>tr:eq(0)");
        for ($i=0;$i<100;$i++){

            $q=pq(".ssc>tr:eq(".$i.")>td:eq(0)")->html();
            if($q){
//        echo '期数:';
//            var_dump('qishu:');
                $arr=explode(" ",$q);
                $q=$arr[0];
//    echo $arr[0]."                 ";
//            var_dump($arr[0]);
                $min=substr($q,8);
                $date=substr($q,0,4)."-".substr($q,4,2)."-".substr($q,6,2);
                $timeForDate=date("Y-m-d H:i:s",strtotime($date)+(((int) $min))*60);
//echo "期号时间:".$timeForDate."                   ";
//            var_dump("time:".$timeForDate);
//    echo '号码：';
//            var_dump('number:');
                $nuumber=pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(0)")->html().pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(1)")->html().pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(2)")->html().pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(3)")->html().pq(".ssc>tr:eq(".$i.")>td:eq(1)>div>span:eq(4)")->html();

//            var_dump($nuumber);
                $sql="insert into txyfc (`periods`,`number`,`time`,`addTime`) VALUES ('".$q."','".$nuumber."','".$timeForDate."','".time()."')";
                $res=$conn->query($sql);
                if($res){
                    var_dump($q." insert success");
                }else{
                    var_dump($q." insert error ".$conn->error);
                }
//        echo "<br>";


            }

        }
        echo "111";
    }

//}
}


$conn->close();

function getDateFromRange($startdate, $enddate){

    $stimestamp = strtotime($startdate);
    $etimestamp = strtotime($enddate);

    // 计算日期段内有多少天
    $days = ($etimestamp-$stimestamp)/86400+1;

    // 保存每天日期
    $date = array();

    for($i=0; $i<$days; $i++){
        $date[] = date('Ymd', $stimestamp+(86400*$i));
    }

    return $date;
}

// demo

