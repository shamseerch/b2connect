<?php 

namespace App\Controllers;
use CodeIgniter\Controller;


class IpDetails extends Controller
{

    
    public function index() {

        if(isset($_POST['ipaddresstxt']))
        {
            $api_url ="http://ip-api.com/php/".$_POST['ipaddresstxt'];
       
            // Read JSON file
            $json_data = file_get_contents($api_url);
     
           //processing serialized data
           $data['loca_details'] = unserialize($json_data);
           
           // pass to view
          // return view('ip', $data);
      
        }
        else
            $data = array();

        return view('ip', $data);
    }

    /*public function check() {
        
        $api_url ="http://ip-api.com/php/".$_POST['ipaddresstxt'];
       
         // Read JSON file
         $json_data = file_get_contents($api_url);
  
        //processing serialized data
        $data['loca_details'] = unserialize($json_data);
        
        // pass to view
        return view('ip', $data);
   
 
    }*/
}