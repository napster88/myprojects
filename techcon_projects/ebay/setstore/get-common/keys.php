<?php
/*  © 2013 eBay Inc., All Rights Reserved */ 
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
    //show all errors
    error_reporting(E_ALL);
    // these keys can be obtained by registering at http://developer.ebay.com
    
    $production         = true;   // toggle to true if going against production
    $compatabilityLevel = 717;    // eBay API version
    
    if ($production) {
        $devID = 'e00f5818-f72c-46f1-b084-f71f951304a2';   // these prod keys are different from sandbox keys
        $appID = 'kapiltha-EBAYTEST-PRD-108faa0a3-8783ecde';
        $certID = 'PRD-08faa0a3a85f-bc46-42ff-88d0-6908';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**lMntWA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6ACkYCiAJSBoQ+dj6x9nY+seQ**prEDAA**AAMAAA**jx0qwpX97X9M6C3SIZ8YhgfIk8a4dH5leya81dLKKRRU4oX0ZPXcqbhUSwq5Z7V+vJPrN0pL6+2RcEy/wbL4D60SUuBwIQuONSEWjwjuXyfDi5dF4MUgApo4myzSpklEht5P/eX7JEEf3X/BieDSSNu8KRo5DnUNFuuQ1qDIQyl3URQC7AxC4+sA5t5qA55xAp4SycQ9sXzbT5NkrSxLep83mFKllVdSPGAmzbFpU4uYGtR1OF6LFOZMGUCSKt7doXKCmEalnVENvIVrRsalIEY1GCshGI0AxDSqKplwUDlSbKU7pXUABY5QcUpSIFQ/XXyhDWH4CO08H+NvvTtEZMoQ7bpL+5CdNW1YMsTFPO6+dDMVJyd+lu+tHyM1UxffsRkkt4zOd0e6JGaBC75bB6CCV0t8MqzLG0WRkuiCnNckNT9sfwCORoFvHq5JITF1ieSQwIa9qDifD2BUMbE/kDSkZ7a4sxM1pLnEJbwTOBcVd6TQWvk6cT+VkyTRGED8NNaiiFPvt7UAtazqP9qsS89RhT+Eh9fi9dGmHJsW+X/M1VJhqaQS6TG2ijJTjFwrDGxoCgDrn/D+TAIKXaDaIcTZpTRVV0ZIMsk2ZhKNtX37rvbszMExwZFm4lU+pEwWDmw5WiQwEBSk9P6/Rm6pQuLl5yqK78OMB4zTuYOo1jpAf2js+WuieP6CB+K1KwxDH1O8BQB8jjo2+s4HI4yvEAVKPsmDFmjFlZ/eddAKSUNlgb4vOdTsks/T+bsp0MM/';          
    } else {  
        // sandbox (test) environment
        $devID = 'e00f5818-f72c-46f1-b084-f71f951304a2';   // these SB keys are different from prod keys
        $appID = 'kapiltha-EBAYTEST-SBX-2090fc79c-c6bb8c3f';
        $certID = 'SBX-090fc79cd3c7-b843-4ed0-943e-890a';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**qcjtWA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GlDpSGogSdj6x9nY+seQ**oykEAA**AAMAAA**u+opN7WxsdtpXLWfYc5zJYuYXO/0oF/EVSqW3vPFFN/yWcThWoLHmKo02SWeq1h+n9I3XHA8Pe9Bhf2PZA3XwflXrCUEDHohQcEFOx+e48kWXrcTnehpU8qGpyC9Hnf/hxoca4ofDxX3mJHAmC5uJJ1bIvbTJnV6EKKDAYlXsR35jheZDNG7r07MRpVebzMdTbim/yJhsU8+vv0pVYU962cvzoCs+O9exhH7zdEAkQscsJGGkJJvli7UvtXKrirEcLK4ItoI1Akl/T3EhBt8h8aVIHyhAgVhOZFN9umct5VV/bCmLYml3pxZgySVrGRsT8ZzPh4LS2FwDzPpRLBKU/rGTRhOkNdhpzUIsJZxNBzh1OP8DhJ2LgVCqPUBB7nDjjpBsxcVxa1gFwXp4GMts+JJaX7gRCVzFh7fUfxD4DjFCxLgLY76usP2AM4AM/rLHzm1yvnF9a5x8HAFw58z1uu4wfKxmmY+HpkCqV8x5+etiHGoWxFouJvXUbeoxyEtIW2sKBrm4pM4QgatzK46AhOMYnoXepJny8la5zuhddr0KEBDAHOIp8AZtTMerkGpLYOt7jgboJG5T70uUSmVmS8FGHFFC3HEGfz75l23rUGIeo0ceLrP0S90+OMDYCXudfyKxLHPPKVwXDsd4L9U3edbmcKhwBR8DYp4Zv8o93YsqhMxy4icVmwFeRhGajdNdaP+33bcO90HqHmg1aFjfaFwu104ltPmBpmUbSIzKvLGMm1oZlo932txWpChSN3U';          
    }
    
    
?>