<?php
    class Request
        {

            public function getIpAddress()
            {
                $ipAddress = '';
                if (! empty($_SERVER['HTTP_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_CLIENT_IP'])) {
                    // check for shared ISP IP
                    $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
                } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    // check for IPs passing through proxy servers
                    // check if multiple IP addresses are set and take the first one
                    $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                    foreach ($ipAddressList as $ip) {
                        if ($this->isValidIpAddress($ip)) {
                            $ipAddress = $ip;
                            break;
                        }
                    }
                } else if (! empty($_SERVER['HTTP_X_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_X_FORWARDED'])) {
                    $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
                } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
                    $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
                } else if (! empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED_FOR'])) {
                    $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
                } else if (! empty($_SERVER['HTTP_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED'])) {
                    $ipAddress = $_SERVER['HTTP_FORWARDED'];
                } else if (! empty($_SERVER['REMOTE_ADDR']) && $this->isValidIpAddress($_SERVER['REMOTE_ADDR'])) {
                    $ipAddress = $_SERVER['REMOTE_ADDR'];
                }
                return $ipAddress;
            }

            public function isValidIpAddress($ip)
            {
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
                    return false;
                }
                return true;
            }

            public function getLocation($ip)
            {
                $url = 'http://ipwhois.app/json/' . $ip;

                // Initialize cURL session
                $ch = curl_init($url);
                
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Execute cURL session
                $json = curl_exec($ch);

                // Close cURL session
                curl_close($ch);

                // Echo the raw JSON response
                //echo "Raw JSON Response: " . $json . "<br>";

                // Decode JSON response
                $ipWhoIsResponse = json_decode($json, true);

                // Return the decoded response
                return $ipWhoIsResponse;
            }
        } 
    $requestModel = new Request();
    $ip = $requestModel->getIpAddress();
    $isValidIpAddress = $requestModel->isValidIpAddress($ip);

    if ($isValidIpAddress == "") {
        //  echo "<div class='error'><small><i>Please allow location services</i></small></div><br>";
    } else {
        $geoLocationData = $requestModel->getLocation($ip);
        //   print "<PRE>";
        //   print_r($geoLocationData);
        $region = $geoLocationData['country'];

       // echo $region;
    }
?>