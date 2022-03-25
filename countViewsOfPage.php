<?php
$total_data="total.dat";

$onlineData="online.dat";

$time = time();
$now = (int) (time() / 86400);
$past_time = time() - 600;

$readdata = fopen($onlineData,"r") or die("Can not open the file $onlineData"); //open a file
$onlineArray = file($onlineData); 
fclose($readdata);

if (getenv('HTTP_X_FORWARDED_FOR')) // Get the value of an environment var, method for identifying the originating IP address of a client connecting to a web server.
        $user = getenv('HTTP_X_FORWARDED_FOR');
else
        $user = getenv('REMOTE_ADDR');  // real IP address that connects 

$data = count($onlineArray);
for($i = 0; $i < $data; $i++)
        {
        list ($liveUser,$last_time) = explode("::", "$onlineArray [$i]"); //Assign variables as if they were an array,  Split a string by a string
        if ($liveUser != " " && $last_time !=" "): //open
        if ($last_time < $past_time):
                $liveUser = " ";
                $last_time = " ";
        endif; //close
        if($liveUser != " " && $last_time != " ")
                {
                if($user == $liveUser)
                        {
                        $online_array []="$user::$time\r\n";
                        }
                else
                        $online_array[]="$liveUser::$last_time";
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

$writedata=fopen($onlineData,"w") or die("Не могу открыть файл $onlineData");
flock($writedata,2);
if($online_array=="") $online_array[]="$user::$time\r\n";
foreach($online_array as $str)
        fputs($writedata,"$str");
flock($writedata,3);
fclose($writedata);

$readdata=fopen($onlineData,"r") or die("Can not open the file $onlineData");
$onlineArray=file($onlineData);
fclose($readdata);
$online=count($onlineArray);

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

echo "Total viewrs: $total_hits <pre>";
echo "Today views: $today_hits <pre>";
echo "Online view: $online";
?> 