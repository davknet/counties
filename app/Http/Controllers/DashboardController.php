<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Countries;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // if (Schema::hasTable('countries') && Schema::hasTable('countries') ) {
            // Code to create table
        
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
      
     
    
    
        $request->validate([
            'name'     =>   'required|alpha' ,
            'iso'      =>  'required|unique:countries|alpha|max:2',
        ]);


        
         $country             = new Countries();
         $country->name       = Str::upper($request->name ) ;
         $country->iso        = Str::upper($request->iso ) ;
         $country->img_url    = null ;
         $country->user_id    = Auth::id();
         $country->created_at = date('Y-m-d H:i:s') ;
         $country->updated_at = null  ;
         $country->save();

         return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Countries  $countries 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\countries $countries
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $country = Countries::find($id);
      
        $data = array(
            'title'          => "Edit Country",
            'country'        => $country 
       );
     
        return view('edit', ['data' => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Countries $countries 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {

        $country = Countries::find($id);

        if( $country['name'] != $request->input('name') ||
            $country['iso'] != $request->input('iso')  ){
         $request->validate([
            'name'     =>   'required|alpha' ,
            
            'iso'      =>   'required|unique:countries|alpha|max:2',
        ]);


         $counrtry = Countries::where('id' , $id )->update([

            "name"         => Str::upper($request->input('name')),
            "iso"          => Str::upper( $request->input('iso')),
            "img_url"      =>  null ,
            "user_id"      =>  Auth::id(),
            "updated_at"   => date('Y-m-d H:i:s') 

         ]);
        }
         return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counries  $countries 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countries $countries )
    {
        //
    }
}
