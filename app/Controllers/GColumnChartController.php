<?php 

namespace App\Controllers;
use CodeIgniter\Controller;


class GColumnChartController extends Controller
{

    public function index() {
        
        return view('chart');
    }
    
    public function initChart() {
        
        $api_url = 'https://datausa.io/api/data?drilldowns=Nation&measures=Population';

        
          // Read JSON file
          $json_data = file_get_contents($api_url);
  
          // Decode JSON data into PHP array
          $response_data = json_decode($json_data);
  
          // All user data exists in 'data' object
          $record = $response_data->data;
  
          // Cut long data into small & select only first 10 records
          //$user_data = array_slice($user_data, 0, 9);


        $products = [];

        foreach($record as $row) {
            $products[] = array(               
                'Year'   => $row->Year,
                'sell' => $row->Population
            );
        }
        
        $data['products'] = ($products);    
        return view('chart', $data);                
    }

    
 
}