<?php
$total_data="base.dat";
$online_data="online.dat";
$time=time();
$now=(int)(time()/86400);
$past_time=time()-600;

$readdata=fopen($online_data,"r") or die("Не могу открыть файл $online_data");
$online_data_array=file($online_data);
fclose($readdata);

if(getenv('HTTP_X_FORWARDED_FOR'))
        $user=getenv('HTTP_X_FORWARDED_FOR');
else
        $user=getenv('REMOTE_ADDR');

$d=count($online_data_array);
for($i=0;$i<$d;$i++)
        {
        list($live_user,$last_time)=explode("::","$online_data_array[$i]");
        if($live_user!=""&&$last_time!=""):
        if($last_time<$past_time):
                $live_user="";
                $last_time="";
        endif;
        if($live_user!=""&&$last_time!="")
                {
                if($user==$live_user)
                        {
                        $online_array[]="$user::$time\r\n";
                        }
                else
                        $online_array[]="$live_user::$last_time";
                }
        endif;
        }

        if(isset($online_array)):
        foreach($online_array as $i=>$str)
                {
                if($str=="$user::$time\r\n")
                        {
                        $ok=$i;
                        break;
                        }
                }
        foreach($online_array as $j=>$str)
                {
                if($ok==$j) { $online_array[$ok]="$user::$time\r\n"; break;}
                }
       endif;

$writedata=fopen($online_data,"w") or die("Не могу открыть файл $online_data");
flock($writedata,2);
if($online_array=="") $online_array[]="$user::$time\r\n";
foreach($online_array as $str)
        fputs($writedata,"$str");
flock($writedata,3);
fclose($writedata);

$readdata=fopen($online_data,"r") or die("Не могу открыть файл $online_data");
$online_data_array=file($online_data);
fclose($readdata);
$online=count($online_data_array);

$f=fopen($total_data,"a");
$call="$user|$now\n";
$call_size=strlen($call);
flock($f,2);
fputs($f, $call,$call_size);
flock($f,3);
fclose($f);

$tarray=file($total_data);
$total_hits=count($tarray);

$today_hits_array=array();
for($i=0;$i<count($tarray);$i++)
        {
        list($ip,$t)=explode("|",$tarray[$i]);
        if($now==$t) { array_push($today_hits_array,$ip); }
        }
$today_hits=count($today_hits_array);

$total_hosts_array=array();
for($i=0;$i<count($tarray);$i++)
        {
        list($ip,$t)=explode("|",$tarray[$i]);
        array_push($total_hosts_array,$ip);
        }
$total_hosts=count(array_unique($total_hosts_array  ));

$today_hosts_array=array();
for($i=0;$i<count($tarray);$i++)
        {
        list($ip,$t)=explode("|",$tarray[$i]);
        if($now==$t) { array_push($today_hosts_array,$ip); }
        }
$today_hosts=count(array_unique($today_hosts_array  ));


echo "document.write('<center><b><span style=font-size:14px;color:#990000;>Статистика сайта</span></b></center>');";
echo "document.write('<span style=font-size:13px;>Хитов всего: <b>$total_hits</span></b><br />');";
echo "document.write('<span style=font-size:13px;>Хитов сегодня: <b>$today_hits</span></b><br />');";
echo "document.write('<span style=font-size:13px;>Хостов всего: <b>$total_hosts</span></b><br />');";
echo "document.write('<span style=font-size:13px;>Хостов сегодня: <b>$today_hosts</span></b><br />');";
echo "document.write('<span style=font-size:13px;>Сейчас на сайте: <b>$online</span></b>');";

?> 