<?php

namespace App\Controllers\Properties;

use App\Controllers\BaseController;
use App\Models\Property\Property;
use App\Models\Image\Image;
use App\Models\Request\Request;
use App\Models\SavedProperty\SavedProperty;
use App\Models\HomeType\HomeType;

class PropertiesController extends BaseController
{

    public function __construct() {

        $this->db = \Config\Database::connect();
    }



    public function getByPropType($type) {

        $properties = $this->db->query("SELECT * FROM properties WHERE type='$type'")
         ->getResult();


        return view('props/props-by-type', compact('properties', 'type')); 
        
    }


    public function getByPropPrice() {

        $properties = $this->db->query("SELECT * FROM properties ORDER BY price ASC")
         ->getResult();


        return view('props/props-by-price-asc', compact('properties')); 
        
    }

    public function getByPropPriceDesc() {

        $properties = $this->db->query("SELECT * FROM properties ORDER BY price DESC")
         ->getResult();


        return view('props/props-by-price-desc', compact('properties')); 
        
    }


    public function propSingle($id) {

        
        $props = new Property();
        $homeTypes = new HomeType();


        $singleProps = $props->find($id);
        

        $images = $this->db->query("SELECT * FROM images WHERE prop_id='$id'")
         ->getResult();


        $relatedProps = $this->db->query("SELECT * FROM properties WHERE home_type='$singleProps[home_type]' AND id!='$singleProps[id]'")
         ->getResult();



        $allHomeTypes = $homeTypes->findAll();

         if(isset(auth()->user()->id)) {

            //checking for sending request to props
                    
                    
            $checkingSendingRequests = $this->db->table('requests')
            ->where('user_id', auth()->user()->id)
            ->where('prop_id', $id)
            ->countAllResults();



            //checking for saving props
                
                
            $checkingSavedProps = $this->db->table('savedproperties')
            ->where('user_id', auth()->user()->id)
            ->where('prop_id', $id)
            ->countAllResults(); 
            
            return view('props/single', compact('singleProps', 'images', 'relatedProps', 'checkingSendingRequests', 'checkingSavedProps', 'allHomeTypes')); 


         } else {

            return view('props/single', compact('singleProps', 'images', 'relatedProps', 'allHomeTypes')); 

         }
       


        
    }


    public function sendRequest($id) {

        
        $requests = new Request();

        $data = [
            "user_id" => auth()->user()->id,
            "prop_id" => $id,
            "email" => $this->request->getPost('email'),
            "name" => $this->request->getPost('name'),
            "phone" => $this->request->getPost('phone'),
            "prop_image" => $this->request->getPost('prop_image'),
            "prop_name" => $this->request->getPost('prop_name'),
            "prop_price" => $this->request->getPost('prop_price'),
            "prop_location" => $this->request->getPost('prop_location'),
        ];
        
        
        $requests->save($data);


        if($requests) {
            return redirect()->to(base_url('props/prop-single/'.$id.''))->with('sent', 'Request sent successfully');
        }


    }


    public function saveProperty($id) {

        
        $savedProps = new SavedProperty();

        $data = [
            "user_id" => auth()->user()->id,
            "prop_id" => $id,
           
            "prop_image" => $this->request->getPost('prop_image'),
            "prop_name" => $this->request->getPost('prop_name'),
            "prop_price" => $this->request->getPost('prop_price'),
            "prop_location" => $this->request->getPost('prop_location'),
        ];
        
        
        $savedProps->save($data);


        if($savedProps) {
            return redirect()->to(base_url('props/prop-single/'.$id.''))->with('save', 'Property saved successfully');
        }


    }


    public function propsByHomeType($homeType) {

        $propsByHomeType = $this->db->query("SELECT * FROM properties WHERE home_type='$homeType'")
         ->getResult();


        return view('props/props-by-hometype', compact('propsByHomeType')); 
        
    }


    public function search() {

        

        $props = new Property();


        $homeType = $this->request->getPost("home_type");
        $type = $this->request->getPost("type");
        $location = $this->request->getPost("location");

        $searchProps = $props->like('home_type', $homeType)->like('type', $type)
         ->like('location', $location)->findAll();



        return view('props/search', compact('searchProps')); 
        
    }



    



    
    



    

    

    


    
}
