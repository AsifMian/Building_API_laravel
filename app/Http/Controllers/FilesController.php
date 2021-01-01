<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FilesController extends Controller
{
   
    public function show()
    {
        // download() function takes two parameters 1st path of file to download and 2nd name to that downloaded file of our choice,
        // 3rd parameter is optional if we want to pass any http header
            // return response()->download($path_to_file,$filenameToDownloaded_file);
        return response()->download(storage_path('app\GraceHopper.pdf'),'FileName is GraceHopper');
        // return response()->download(storage_path('app\Test.txt'),'FileName.txt'); 
            
    }
    public function create(Request $request){
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('testing'); //testing folder will be created automatically it can be avy name
            return response()->json(['path_to_file:'=>$path],200);
        }
       else{
           return response()->json('provided File name is not photo or file not sent',401);
       }
        
    }

 
}
