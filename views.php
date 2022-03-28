<?php
$totalData="total.dat";

$onlineData="online.dat";

$time = time();
$now = (int) (time() / 86400);
$past_time = time() - 600;

$readdata = fopen($onlineData,"r") //read the file
or die("Can not open the file $onlineData"); //open a file
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
        if ($liveUser != " " && $last_time != " ")
        {
        if ($last_time < $past_time)
        {
                $liveUser = " ";
                $last_time = " ";
        }
        }
        if($liveUser != " " && $last_time != " ")
        {
            if($user == $liveUser)
            {
                $online_array [] = "$user, $time";
            }
            else {
                $online_array[] = "$liveUser, $last_time";
            }
        }
    }
        if(isset($online_array))
        {
        foreach($online_array as $i => $str)
                {
                if($str == "$user, $time")
                {
                    $f = $i;
                    break;
                }
                }
                
        foreach($online_array as $j => $str)
                {
                if($f == $j) 
                { 
                    $online_array[$f]="$user, $time"; 
                    break;
                }
        }
        }

$write = fopen($onlineData,"w")
or die("Cannot open the file $onlineData");

flock($write, 2); //Portable advisory file locking
if($online_array == " "){
     $online_array[]="$user, $time\r\n";
}
foreach($online_array as $str)
        fwirte($write,"$str");
flock($write,3);
fclose($writed);

$readd  = fopen($onlineData,"r")
or die("Can not open the file $onlineData");

$onlineArray = file($onlineData);
fclose($read);

$online = count($onlineArray);

$f = fopen($totalData,"a");

/*$call = "$user|$now\n";
$call_size = strlen($call);
flock($f,2);
fputs($f, $call,$call_size);
flock($f,3);*/
fclose($f);

$totalArray = file($totalData);
$totalVisiting = count($totalArray);
$todayVisitingArray = array();

/*for($i=0; $i < count($totalArray); $i++)
        {
        list($ip,$t)=explode("|",$tarray[$i]);
        if($now==$t){ 
            array_push($today_hits_array,$ip); }
        }
$today_hits=count($today_hits_array);*/

echo "Total viewrs: $total_hits <pre>";
echo "Today views: $today_hits <pre>";
echo "Online view: $online";
?> 