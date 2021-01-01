<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Http\Resources\Poll as PollResourece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PollsController extends Controller
{
   public function index(){
    //return a json response of all polls
        return response()->json(Poll::get(),200); //retruning response with the response code 200 
    // if we want to paginate the response
        // return response()->json(Poll::paginate(2),200); //this response will also include the all the information about pages

   }

   //return a single poll
   public function show($id){
       if(Poll::find($id) != null){
            return response()->json(Poll::find($id),200); //retruning response with the response code 200 
        // if we want to nest related models
            /*  $poll = Poll::with('questions')->findorFail($id);
                $response = new PollResourece($poll,200);
                return response()->json($response,200);
            */
       }
        else{
            return response()->json(['eroor'=>'no Poll found with provided id!'],404);
            //or we can send
            return response()->json(null,404);
        }
        
   }

    public function store(Request $request){

        $rules =[
            'title'=> 'required|max:15'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors,400);
        }
        //mass assign
        $poll = Poll::create($request->all());
        return response()->json($poll,201); //201 retruning response with the response code 201 means a new resource created while 200 means all went well 

    }

    public function update(Request $request,Poll $poll){

        //mass update $poll contains the id of a specific poll
        $poll = $poll->update($request->all());
        return response()->json($poll,200); //201 retruning response with the response code 201 means a new resource created while 200 means all went well 

    }

    public function delete(Poll $poll){

         $poll->delete();
        return response()->json(null,204); //204 retruning response with the response code 204 means  resource deleted

    }

    public function questions(Request $request,Poll $poll)
    {
        $questions = $poll->questions;
        return response()->json($questions,200);
    }
}
