<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $headers = array
            (
            'Authorization: Bearer '.$this->input->post('token'),
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/gmail/v1/users/'.$this->input->post('userid').'/messages/?maxResults='.$this->input->post('limit').'&q='.$this->input->post('search').'');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $final_result = json_decode($result, true);
        $x = 0;
        
        if(!empty($final_result['error']['code']))
        {
            echo $final_result['error']['message'];
            die();
        }
        
        foreach ($final_result['messages'] as $key => $value) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/gmail/v1/users/'.$this->input->post('userid').'/messages/' . $value['id']);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            $final[$x] = json_decode($result, true);
            $x++;
        }
             
        echo json_encode($final);
       
    }

}
