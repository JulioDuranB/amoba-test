<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persons;

class PersonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        
        $query=Persons::where('type_person',$request->type);

        if($request->has('search')){
            $query->where('first_name','LIKE','%' . $request->search . '%');
        }
        
        return $query->get();
        
        

        
        

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $Persons= new Persons;
        $Persons->First_name = $request->get('first_name');
        $Persons->Last_name = $request->get('last_name');
        $Persons->Document = $request->get('document');
        $Persons->Ima_profile = '';
        $Persons->Type_person = "1";
        $Persons->save();

        return $Persons;
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Persons::findOrFail($id);
        

    }

    public function update(Request $request, $id)
    {
        $Persons= Persons::findOrFail($id);
        $Persons->First_name = $request->get('first_name');
        $Persons->Last_name = $request->get('last_name');
        $Persons->Document = $request->get('document');
        $Persons->Ima_profile = '';
        $Persons->Type_person = "1";
        $Persons->save();

        return $Persons;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Persons= Persons::findOrFail($id);
        $Persons->delete();

    }
}
