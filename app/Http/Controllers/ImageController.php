<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
{
    public function index(){
        $images = DB::table('images')->get();
     return view('index')->with(compact('images'));
    }
    public function upload(){
        return view('upload');
    }
    // public function login(){
    //     return view('login');
    // }
    // public function register(){
    //     return view('register');
    // }
    public function store(Request $request){
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        
        $image= new image();
        $image->img = $imageName;
        $image->save();

        //  request()->image->move(public_path('images'), $imageName);


        $destination_path='storage/app/public/Imagefolder';
        request()->image->storeAs($destination_path, $imageName);

        // Storage::disk('storage')->put(request()->image);

         return back()

         ->with('success','You have successfully upload image.');
    }

}
