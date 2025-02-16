<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results=Categories::paginate(3);
        return view('pages.categories.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
      'name'=>'required|min:3'
       ]);


        $result=new Categories();
       $result->name= $request->name;

       if($result->save()){
        return redirect('categories')->with('success',"Student has been registred");
       }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
           $result=Categories::find($id);
           return view('pages.categories.show',compact('result'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result=Categories::find($id);
        return view('pages.categories.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=Categories::find($id);
             $result->name= $request->name;

             if($result->save()){
              return redirect('categories')->with('success',"Student has been registred");
             }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_view(string $id)
    {
        $result=Categories::find($id);
        return view('pages.categories.delete',compact('result'));
    }
    public function destroy(string $id)
    {
       $result=Categories::destroy($id);
       if($result){
        return redirect('categories')->with('success', "Student has been Deleted");
       }
    }



}
