<?php

namespace App\Http\Controllers;

use App\Models\dashbord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $countries  = DB::table('countries')
        ->join('users' , 'countries.user_id' , '=' , 'users.id')
        ->select('countries.id' , 'countries.name' , 'countries.iso' , 'users.name as createdBy' ,
         'countries.created_at' , 'countries.updated_at')
        ->get(); 

      
        

       
        $data = array(

            'title'      => 'Dashboard Pagee' ,
            'countries'  =>  $countries 

        );
        return view('dashboard' , [ 'data'=> $data ] ) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dashbord  $dashbord
     * @return \Illuminate\Http\Response
     */
    public function show(dashbord $dashbord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dashbord  $dashbord
     * @return \Illuminate\Http\Response
     */
    public function edit(dashbord $dashbord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dashbord  $dashbord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dashbord $dashbord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dashbord  $dashbord
     * @return \Illuminate\Http\Response
     */
    public function destroy(dashbord $dashbord)
    {
        //
    }
}
