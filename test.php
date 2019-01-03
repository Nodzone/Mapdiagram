<?php
$host="10.114.0.2";

exec("ping -c 4 " . $host, $output, $result);

//print_r($output);

if ($result == 0)

echo "Ping successful!";

else

echo "Ping unsuccessful!";

?>