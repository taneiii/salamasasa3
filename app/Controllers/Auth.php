<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Hash;
class Auth extends Controller
{
    public function __construct(){
        helper(['url', 'form']);
    }
    public function index()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function save()
    {
     //Validating requests
     //   $validation = $this-> validate ([
     //       'name'=>'required',
     //       'email'=>'required|valid_email|is_unique[users.email]',
     //       'password'=>'required|min_length[8]',
     //       'cpassword'=>'required|min_length[8]|matches[password]'
     // ]);

        $validation= $this-> validate([
            'name'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Your full name is required'
                ]
                ],
                'email'=>[
                    'rules'=>'required|valid_email|is_unique[patients.email]',
                    'errors'=>[
                        'required'=>'Email is required',
                        'valid_email'=>'You must enter a valid email',
                        'is_unique'=>'Email already taken'
                    ]
                    ],  
                 'password'=>[
                    'rules'=>'required|min_length[8]|max_length[12]|regex_match[/[^a-zA-Z0-9]/]',
                    'errors'=>[
                        'required'=>'Password is required',
                        'min_length'=>'Password must have at least 8 characters',
                        'max_length'=>'Password must not exceed 12 characters',
                        'regex_match'=>'Password must contain a special character'
                    ]
                    ],
                    'cpassword'=>[
                        'rules'=>'required|matches[password]',
                        'errors'=>[
                            'required'=>'Confirm password is required',
                            'matches'=>'Confirm password must match password'
                        ]
                    ]
                    ]);

        if(!$validation){
            return view ('auth/register', ['validation'=> $this->validator]);
        }else{
            $name= $this->request->getPost('name');
            $email= $this->request->getPost('email');
            $password= $this->request->getPost('password');

            $values = [
                'name'=> $name,
                'email'=>$email,
                'password'=>Hash::make($password),
            ];

            $PatientsModel = new \App\Models\PatientsModel();
            $query = $PatientsModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong');
                //return redirect()->to('register')->with('fail', 'Something went wrong')
            }else{
                  return redirect()->to('register')->with('success', 'You are now registered successfully');

        
            }
        }
    }
        function check(){

            $validation = $this->validate([
                'email'=>[
                    'rules'=>'required|valid_email|is_not_unique[patients.email]',
                    'errors'=>[
                        'required'=>'Email is required',
                        'valid_email'=>'Enter a valid email address',
                        'is_not_unique'=>'This email is not registered'
                    ]
                    ],
                    'password'=>[
                    'rules'=>'required|min_length[8]|max_length[12]',
                    'errors'=>[
                        'required'=>'Password is required',
                        'min_length'=>'Password must have at least 8 characters',
                        'max_length'=>'Password must not exceed 12 characters'
                    ]
                    ]
                ]);

            if(!$validation){
                return view ('auth/login',['validation'=>$this->validator]);
            }else{
                
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $PatientsModel = new \App\Models\PatientsModel();
                $patient_info = $PatientsModel-> where('email', $email)->first();
                $check_password = Hash :: check($password, $patient_info['password']);
            
               if(!$check_password) {
                    session()->setFlashdata('fail', 'Incorrect password');
                    return redirect()->to('/auth')->withInput();
               }else{
                $patient_id = $patient_info ['patientID'];
                session ()->set('loggedPatient', $patient_id);
                return redirect()->to('/dashboard');
               }
            }
        }
    }

                
            
            
        
        
        
    