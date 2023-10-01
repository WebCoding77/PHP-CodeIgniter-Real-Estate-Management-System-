<?php

namespace App\Controllers\Admins;

use App\Controllers\BaseController;
use App\Models\Admin\Admin;
use App\Models\HomeType\HomeType;
use App\Models\Property\Property;
use App\Models\Image\Image;
use App\Models\Request\Request;

class AdminsController extends BaseController
{

    public function __construct() {

        $this->db = \Config\Database::connect();
    }


    public function login() {

        return view('admins/login');
    
    }


    public function checkLogin() {

        $session = session();
        $admin = new Admin();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $admin->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('admins/index'));
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to(base_url('admins/login'));
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to(base_url('admins/login'));
	    }
    
    }





    public function logout() {


        $session = session();

        $ses_data = [
            'id' => "",
            'name' => "",
            'email' => "",
            'isLoggedIn' => FALSE
        ];

        $session->set($ses_data);

        return redirect()->to(base_url('admins/login'));


    
    }




    public function index() {


        $session = session();

        $propsCount = $this->db->table('properties')
         ->countAllResults();

        $adminsCount = $this->db->table('admins')
         ->countAllResults();
        
         $homeTypesCount = $this->db->table('admins')
         ->countAllResults(); 


        return view('admins/index', compact('session', 'propsCount', 'adminsCount', 'homeTypesCount'));
    
    }


    public function displayAdmins() {


        $session = session();

        $admins = new Admin();

        $allAdmins = $admins->findAll();

       

        return view('admins/all-admins', compact('session', 'allAdmins'));
    
    }


    public function createAdmins() {


        $session = session();

       

        return view('admins/create-admins', compact('session'));
    
    }


    public function storeAdmins() {

        $session = session();

        $inputs = $this->validate([

            'name' => 'required|min_length[5]|max_length[10]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[5]|alpha_numeric',
            
        ]);

        if (!$inputs) {

            return view('admins/create-admins', [
                'validation' => $this->validator,
                'session' => $session
            ]);

        } else {


            $admins = new Admin();

            $data = [
               
                "email" => $this->request->getPost('email'),
                "name" => $this->request->getPost('name'),
                "password" => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];
            
            
            $admins->save($data);
    
    
            if($admins) {
                return redirect()->to(base_url('admins/all-admins'))->with('create', 'Admin created successfully');
            }


        }


      

    
    }



    public function displayHomeTypes() {


        $session = session();

        $homeTypes = new HomeType();

        $allHomeTypes = $homeTypes->findAll();

       

        return view('admins/all-home-types', compact('session', 'allHomeTypes'));
    
    }



    public function createHomeTypes() {


        $session = session();

       

        return view('admins/create-home-types', compact('session'));
    
    }




    public function storeHomeTypes() {


        $homeTypes = new HomeType();

        $data = [
           
            
            "name" => $this->request->getPost('name'),
           
        ];
        
        
        $homeTypes->save($data);


        if($homeTypes) {
            return redirect()->to(base_url('admins/all-home-types'))->with('create', 'Home Type created successfully');
        }

    
    }
    
    

    public function deleteHomeTypes($id) {


       

        $homeTypes = new HomeType();

        $homeTypes->delete($id);

       

        if($homeTypes) {
            return redirect()->to(base_url('admins/all-home-types'))->with('delete', 'Home Type deleted successfully');
        }    
    }



    public function editHomeTypes($id) {


        $session = session();


        $homeTypes = new HomeType();

        $homeType = $homeTypes->find($id);

       

        return view('admins/edit-home-types', compact('session', 'homeType'));   
    }




    public function updateHomeTypes($id) {


        $homeTypes = new HomeType();

        $data = [
           
            
            "name" => $this->request->getPost('name'),
           
        ];
        
        
        $homeTypes->update($id, $data);


        if($homeTypes) {
            return redirect()->to(base_url('admins/all-home-types'))->with('update', 'Home Type updated successfully');
        }

    
    }
    
    
    
    public function displayProps() {


        $session = session();

        $props = new Property();

        $allProps = $props->findAll();

       

        return view('admins/all-props', compact('session', 'allProps'));
    
    }


    public function createProps() {


        $session = session();

        

       

        return view('admins/create-props', compact('session'));
    
    }



    public function storeProps() {


        $props = new Property();

        $img = $this->request->getFile('image');
        $img->move('public/assets/images');

        $data = [
           
            "name" => $this->request->getPost('name'),
            "image" => $img->getClientName(),
            "price" => $this->request->getPost('price'),
            "num_beds" => $this->request->getPost('num_beds'),
            "num_baths" => $this->request->getPost('num_baths'),
            "sq_ft" => $this->request->getPost('sq_ft'),
            "home_type" => $this->request->getPost('home_type'),
            "year_built" => $this->request->getPost('year_built'),
            "price_sq_ft" => $this->request->getPost('price_sq_ft'),
            "description" => $this->request->getPost('description'),
            "type" => $this->request->getPost('type'),
            "location" => $this->request->getPost('location'),
           
        ];
        
        
        $props->save($data);


        if($props) {
            return redirect()->to(base_url('admins/all-props'))->with('create', 'Property created successfully');
        }

    
    }

    
    
    
    public function createGallery() {


        $session = session();

        $props = new Property();

        $allProps = $props->findAll();

       

        return view('admins/create-gallery', compact('session', 'allProps'));
    
    }



    public function storeGallery() {


        $db = $this->db->table('images'); 
        $msg = 'Please select a valid files';
          
        if ($this->request->getFileMultiple('images')) {
         
                     foreach($this->request->getFileMultiple('images') as $file)
                     {   
         
                      $file->move('public/assets/gallery');
         
                      $data = [
                        'image' =>  $file->getClientName(),
                        'prop_id'  => $this->request->getPost('prop_id')
                      ];
         
                      $save = $db->insert($data);
                     }


                    if($save) {
                        return redirect()->to(base_url('admins/all-props'))->with('insertgallery', 'Gallery created successfully');
                    }
        }


       

    
    }

    

    public function deleteProps($id) {


       

        $props = new Property();

        $singleProp = $props->find($id);

        unlink('public/assets/images/'.$singleProp['image'].'');


        $relatedImages = $this->db->query("SELECT * FROM images WHERE prop_id='$id'")
        ->getResult();

        foreach($relatedImages as $image) {
            unlink('public/assets/gallery/'.$image->image.'');
            $this->db->query("DELETE FROM images WHERE prop_id='$id'");

        }

        $props->delete($id);

       

        if($props) {
            return redirect()->to(base_url('admins/all-props'))->with('delete', 'Property deleted successfully');
        }    
    }
    

    public function displayRequests() {


        $session = session();

        $requests = new Request();

        $allRequests = $requests->findAll();

       

        return view('admins/all-requests', compact('session', 'allRequests'));
    
    }


    

    
    


    
}
