<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $i=0;
        $date=$this->getDateFromRange("2018-01-11","2018-07-21");
        foreach ($date as $v){
            $res=M("txffc")->where("periods like '%".$v."%'")->select();
            $data=$this->second_threeth($res);
            $arr=array_column($data,"result");

            $result=$this->mn(array("虎"),$arr);

            if($result>10){
                $i++;
                echo $v."--".json_encode($result)."<br>";
            }
//

        }
        echo $i;
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    function mn($a,$b)
    {
        $n=0;
        $m=0;
        foreach ($b as $key => $value) {
            if(in_array($value, $a)){
                $n=$n+1;
            }else{
                $res[]=$n;
                $m=$m>$n?$m:$n;
                $n=0;
            }
        }
//        return $res;
        if($m==0){
            return $n;
        }
        return $m;
    }

    /**
     * 万个
     * @param $data
     * @return mixed
     */
    function first_fifth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],0,1);
            $fifth=substr($v["number"],4,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 万千
     * @param $data
     * @return mixed
     */
    function first_second($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],0,1);
            $fifth=substr($v["number"],1,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 万百
     * @param $data
     * @return mixed
     */
    function first_threeth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],0,1);
            $fifth=substr($v["number"],2,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 万十
     * @param $data
     * @return mixed
     */
    function first_fourth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],0,1);
            $fifth=substr($v["number"],3,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 千百
     * @param $data
     * @return mixed
     */
    function second_threeth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],1,1);
            $fifth=substr($v["number"],2,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 千十
     * @param $data
     * @return mixed
     */
    function second_fourth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],1,1);
            $fifth=substr($v["number"],3,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 千个
     * @param $data
     * @return mixed
     */
    function second_fifth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],1,1);
            $fifth=substr($v["number"],4,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 百十
     * @param $data
     * @return mixed
     */
    function threeth_fourth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],2,1);
            $fifth=substr($v["number"],3,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 十个
     * @param $data
     * @return mixed
     */
    function fourth_fifth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],3,1);
            $fifth=substr($v["number"],4,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

    /**
     * 百个
     * @param $data
     * @return mixed
     */
    function threeth_fifth($data){
        foreach ($data as $k=>&$v){
            $first=substr($v["number"],2,1);
            $fifth=substr($v["number"],4,1);
            if((int)$first>(int)$fifth){
                $v["result"]='龙';
            }elseif((int)$first<(int)$fifth){
                $v["result"]='虎';
            }else{
                $v["result"]='和';
            }
        }
        return $data;
    }

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


    function getList(){
        $res=M("txffc")->where("periods like '%20180214%'")->select();
$arr=$this->first_fifth($res);
//        $arr=array_column($arr,"result");
//        $result=$this->mn(array("龙"),$arr);
        echo json_encode($arr);
    }
}