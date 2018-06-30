<?php

namespace App\Http\Controllers;

use App\TypeOfComplain;
use Illuminate\Http\Request;



class TypeOfComplainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$type = TypeOfComplain::all();
       // return view('admin.index')->withType($type);

       return view('admin.type_complains')->withType($type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type_complains');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  //dd($request->all());
        $this->validate($request,['type_complain'=> 'required' , ]);

        $type= new TypeOfComplain();
        $type->type_complain =$request->type_complain;
        $type->save();
       //$request->session()->flash('success','тип жалоб добавлен');
         //
        //
        return redirect('/type_complain');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfComplain  $typeComplains
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfComplain $typeComplains)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfComplain  $typeComplains
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfComplain $typeComplains)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfComplain  $typeComplains
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeOfComplain $typeComplains)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfComplain  $typeComplains
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = TypeOfComplain::find($id);
               $type->delete();
                return redirect('/type_complain');
    }
}
