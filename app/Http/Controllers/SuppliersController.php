<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
// use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results=Supplier::paginate(3);
        return view('pages.supplier.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pages.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           "name"=>'required|min:3',
           "contact_person"=>'required',
           "phone"=>'required',
           "email"=>'required|min:3',
           "address"=>'required|min:3'
       ]);

       $result=new Supplier();
       $result->name=$request->name;
       $result->contact_person=$request->contact_person;
       $result->phone=$request->phone;
       $result->email=$request->email;
       $result->address=$request->address;

       if($result->save()){
        return redirect('suppliers')->with('success',"Student has been registred");

       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result=Supplier::find($id);
        return view('pages.supplier.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result=Supplier::find($id);
        return view('pages.supplier.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name"=>'required|min:3',
            "contact_person"=>'required',
            "phone"=>'required',
            "email"=>'required|min:3',
            "address"=>'required|min:3'
        ]);

        $result=Supplier::find($id);
        $result->name=$request->name;
        $result->contact_person=$request->contact_person;
        $result->phone=$request->phone;
        $result->email=$request->email;
        $result->address=$request->address;

        if($result->save()){
         return redirect('suppliers')->with('success',"Student has been registred");

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Supplier::destroy($id);

        return redirect('suppliers')->with('success', "Student has been Deleted");

    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search suppliers by name, contact person, phone, or email
        $results = Supplier::where('name', 'LIKE', "%{$query}%")
            ->orWhere('contact_person', 'LIKE', "%{$query}%")
            ->orWhere('phone', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->paginate(10);

            // print_r($results);

        return view('pages.supplier.index', compact('results'));
    }






}
