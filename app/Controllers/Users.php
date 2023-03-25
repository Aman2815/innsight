<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\State;

class Users extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $userModel = new User();
        $data['session']=$session;
        $data['userData'] = $userModel->getRecords();
        
        return view('templates/list',$data);
    }

    public function create(){
        $session = \Config\Services::session();
        helper('form');
        $data = [];
        $stateModel = new State();
        $data['states'] = $stateModel->getStates();
        // print_r($data);
        
        if($this->request->getMethod() == 'post'){
            $input = $this->validate([
                'name'=>'required|max_length[20]',
                'email'=>'required|valid_email',
                'mobile'=>'required|regex_match[/^[0-9]{10}$/]',
            ]);

            if($input == true){
                // Form Validated Successfully
                $userModel = new User();
                $userModel->save([
                    'name'=>$this->request->getPost('name'),
                    'email'=>$this->request->getPost('email'),
                    'mobile'=>$this->request->getPost('mobile'),
                    'gender'=>$this->request->getPost('gender'),
                    'state'=>$this->request->getPost('state'),
                ]);
                $session->setFlashData("success","Records Added Successfully");
                return redirect()->to('/users');
            }else{
                // Form Not validated successfully
                $data['validation'] =  $this->validator;
                $data['validation'] =  $this->validator;
            }
        }
        return view('templates/create',$data);
    }

    public function edit($id){
        $session = \Config\Services::session();
        helper('form');
        $data = [];
        $stateModel = new State();
        $userModel = new User();
        $data['states'] = $stateModel->getStates();
        $user = $userModel->getSingleUser($id);
        if(empty($user)){
            $session->setFlashData("error","Record not found!");
            return redirect()->to('/users');
        }
        $data['user'] = $user;
        if($this->request->getMethod() == 'post'){
            $input = $this->validate([
                'name'=>'required|max_length[20]',
                'email'=>'required|valid_email',
                'mobile'=>'required|regex_match[/^[0-9]{10}$/]',
            ]);

            if($input == true){
                // Form Validated Successfully
                
                $userModel->update($id,[
                    'name'=>$this->request->getPost('name'),
                    'email'=>$this->request->getPost('email'),
                    'mobile'=>$this->request->getPost('mobile'),
                    'gender'=>$this->request->getPost('gender'),
                    'state'=>$this->request->getPost('state'),
                ]);
                $session->setFlashData("success","Records Updated Successfully");
                return redirect()->to('/users');
            }else{
                // Form Not validated successfully
                $data['validation'] =  $this->validator;
                $data['validation'] =  $this->validator;
            }
        }
        return view('templates/edit',$data);
    }

    public function delete($id){
        $session = \Config\Services::session();
        $userModel = new User();
        $user = $userModel->getSingleUser($id);
        if(empty($user)){
            $session->setFlashData("error","Record not found!");
            return redirect()->to('/users');
        }

        $userModel->deleteRecord($id);
        $session->setFlashData("success","Record Deleted Successfully");
        return redirect()->to('/users');
    }
}
