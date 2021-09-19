<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    //

    public function create()
    {
        return view('user.user-add');
    }

    public function store(Request $req)
    {
        $regex='/^[\d\(\)\-+]+$/';
        $regex2='/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/';
        $req->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email'    => array('required','unique:users,email',"regex:$regex2"),
            'contactNumber' => array("required","max:14","regex:$regex",'unique:users,contact_number'),
            'city' => 'required',
            'gender' => 'required',
            'age' => "sometimes|nullable|required_if:gender,Male|numeric|gt:0",
            'profilePhoto' => 'required|image|mimes:jpg,png|max:1024',
            'status' => 'required',


        ],
        [
            'required'  => 'The :attribute field is required.',
            'age.required_if'=>'The :attribute field is required.',
            'unique'    => 'This :attribute is already used.',
            'email.regex'=>'Invalid email address.',
            'contactNumber.max'=>'Total digits must be less than or equal to 14.',
            'contactNumber.regex'=>'Number must be numeric! You can use + or -',
           'age.numeric'=>"Age must be numeric and greater than 0.",
            'age.gt'=>"Age must be numeric and greater than 0.",
            'profilePhoto.max'=>'Maximum file size to upload is 1MB (1024 KB).',
            'profilePhoto.mime'=>'Invalid image format! Image format must be jpg or png.'
        ]);

        $newImageName= time(). '.' . $req->profilePhoto->getClientOriginalName();
        $req->profilePhoto->move(public_path('dist/images'),$newImageName);
     
        $user=User::create([
            'firstname'=>$req->input('firstname'),
            'lastname'=>$req->input('lastname'),
            'email'=>$req->input('email'),
            'contact_number'=>$req->input('contactNumber'),
            'city'=>$req->input('city'),
            'gender'=>$req->input('gender'),
            'age'=>$req->input('age'),
            'profile_photo'=>$newImageName,
            'status'=>$req->input('status'),
        
        ]);
        return redirect('user-list')->with('success','User has been created successfully');
    }

    public function show(User $user)
    {
        
        $users=User::paginate(7);
        return view('user.user-list',compact('users'));
    }
   
    public function edit($id, Request $req){
       $data=User::findOrFail($id);
        return view('user.user-edit',compact('data'));
    }


    public function update(Request $req){
        $regex='/^[\d\(\)\-+]+$/';
        $req->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email'    => array("required",Rule::unique('users', 'email')->ignore($req->id, 'id')
            ),
            'contactNumber' => array("required","max:14","regex:$regex",Rule::unique('users', 'contact_number')->ignore($req->id, 'id')),
            'city' => 'required',
            'gender' => 'required',
            'age' => "sometimes|nullable|required_if:gender,Male|numeric|gt:0",
            'profilePhoto' => 'image|mimes:jpg,png|max:1024',
            'status' => 'required',
    
    
        ],
        [
            'required'  => 'The :attribute field is required.',
            'unique'    => 'This :attribute is already used.',
            'email.email'=>'Invalid email address.',
            'contactNumber.max'=>'Total digits must be less than or equal to 14.',
            'contactNumber.regex'=>'Number must be numeric! You can use + or -',
            
            'age.numeric'=>"Age must be numeric and greater than 0.",
            'age.gt'=>"Age must be numeric and greater than 0.",
            'profilePhoto.max'=>'Maximum file size to upload is 1MB (1024 KB).',
            'profilePhoto.mime'=>'Invalid image format! Image format must be jpg or png.'
        ]);
        $data=User::findOrFail($req->id);

        if($req->hasFile('profilePhoto')){
            $newImageName= time(). '.' . $req->profilePhoto->getClientOriginalName();
            $req->profilePhoto->move(public_path('dist/images'),$newImageName);
            $data->profile_photo= $newImageName;

          }
          $data->firstname= $req['firstname'];
          $data->lastname= $req['lastname'];
          $data->email= $req['email'];
          $data->contact_number= $req['contactNumber'];
          $data->city= $req['city'];
          $data->gender= $req['gender'];
          $data->age= $req['age'];
          $data->status= $req['status'];          
          $data->save();

        return redirect('user-list')->with('success', 'User has been updated successfully.');
    
    }

    public function destroy($id)
    {
        $data=User::findOrFail($id);
        
        $data->destroy('id',$id);
        return back()->with('success', 'User has been deleted successfully.');
    }
}

