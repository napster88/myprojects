<?php
/*  © 2013 eBay Inc., All Rights Reserved */ 
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
    //show all errors
    error_reporting(E_ALL);
    // these keys can be obtained by registering at http://developer.ebay.com
    
    $production         = true;   // toggle to true if going against production
   // $compatabilityLevel = 967;    // eBay API version
      $compatabilityLevel = 717;    // eBay API version
    
    if ($production) {
        $devID = 'e00f5818-f72c-46f1-b084-f71f951304a2';   // these prod keys are different from sandbox keys
        $appID = 'kapiltha-EBAYTEST-PRD-108faa0a3-8783ecde';
        $certID = 'PRD-08faa0a3a85f-bc46-42ff-88d0-6908';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**qynvWA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJl4KlAZiCpwydj6x9nY+seQ**VLIDAA**AAMAAA**J1j5M19DSoaZR6ZvpPtAggdcBcKE+33BfW5Dln5qis//mOQL00/tgYgAeIGW5HeEC/Qz2yQ7cL5k/jcrbZSniDcPuHWvBEWUnphE/W5dNJVPwn/rRZqWqGMd4X/Hu8qWegCoAag2Yq1wOX0u9TPR0poE9x1eDfHNl4s08g2bOHxgPYYsDtycWXdyi2aK1EEca3iKo6TuP3gxkqzHC70HY/G2lt/xFHKkvZ/HtzmpHeGFCZF/Mv6+cL3lubaAxf4+X6fXKgrJGyneTkwaVE00DTeCaN4H0/BWp4OF/wbrlHAW3F9fCzphXbfUo03VMf+04G93T4E4V2S/5gexjyxsHcR+ZPU0RGtsFjJtyuIp3fu5toA3aa1gh5M6YWYV2qJvH7JlLb9UCTIhKnzKCUBtVxr8wnkbuyEywARRtXvGcCayXI2QLH/nJ9dXgq+8cbif2KJXXv+iM/3MWi5Tr67cuQ/4sn3PObkbizUzMaOf03aEwyZWwJNTH9Q4c48N/zDiPlUQveCJ1WbT5mVoyDjTw6navq7HJN1tFH4BE5kORM9KVu3C5+mxi6EvKjTRMq4mGDkhN8igpS8yNi5avRjDuSDvAUbaqN6TLltWkCgNNsIZ7qy7PsALncqeOxUQRlSrjdCUTPPnYa4DnsJ96aBWQwddJnWIF6+nsOG578oUAPkHnGMez7JzSe7EeAqScVPIxa8a4ljbe3L7ibq00aNOQPNtskkoI5UGCrt03OGm0szFDgy8dmqDUj66hztuO3PM';          
    } else {  
        // sandbox (test) environment
        $devID = 'e00f5818-f72c-46f1-b084-f71f951304a2';   // these SB keys are different from prod keys
        $appID = 'kapiltha-EBAYTEST-SBX-2090fc79c-c6bb8c3f';
        $certID = 'SBX-090fc79cd3c7-b843-4ed0-943e-890a';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**qynvWA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJl4KlAZiCpwydj6x9nY+seQ**VLIDAA**AAMAAA**J1j5M19DSoaZR6ZvpPtAggdcBcKE+33BfW5Dln5qis//mOQL00/tgYgAeIGW5HeEC/Qz2yQ7cL5k/jcrbZSniDcPuHWvBEWUnphE/W5dNJVPwn/rRZqWqGMd4X/Hu8qWegCoAag2Yq1wOX0u9TPR0poE9x1eDfHNl4s08g2bOHxgPYYsDtycWXdyi2aK1EEca3iKo6TuP3gxkqzHC70HY/G2lt/xFHKkvZ/HtzmpHeGFCZF/Mv6+cL3lubaAxf4+X6fXKgrJGyneTkwaVE00DTeCaN4H0/BWp4OF/wbrlHAW3F9fCzphXbfUo03VMf+04G93T4E4V2S/5gexjyxsHcR+ZPU0RGtsFjJtyuIp3fu5toA3aa1gh5M6YWYV2qJvH7JlLb9UCTIhKnzKCUBtVxr8wnkbuyEywARRtXvGcCayXI2QLH/nJ9dXgq+8cbif2KJXXv+iM/3MWi5Tr67cuQ/4sn3PObkbizUzMaOf03aEwyZWwJNTH9Q4c48N/zDiPlUQveCJ1WbT5mVoyDjTw6navq7HJN1tFH4BE5kORM9KVu3C5+mxi6EvKjTRMq4mGDkhN8igpS8yNi5avRjDuSDvAUbaqN6TLltWkCgNNsIZ7qy7PsALncqeOxUQRlSrjdCUTPPnYa4DnsJ96aBWQwddJnWIF6+nsOG578oUAPkHnGMez7JzSe7EeAqScVPIxa8a4ljbe3L7ibq00aNOQPNtskkoI5UGCrt03OGm0szFDgy8dmqDUj66hztuO3PM';          
    }
    
    
?>