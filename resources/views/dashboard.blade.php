
@extends('layouts.app') 

@section('content')

 <div class="dashbord">
    <di class="container">
        <div class="row">
            <div class="col-10 mt-5 ms-5 me-5">
                   <div class="row">
                          <h1 class="h1">
                              Countries 
                          </h1>
                          <div class="col-3">
                                      <form class="row g-3">
                                        <div class="col-auto">
                                          <label for="name" class="form-label">Name</label>
                                          <input type="text"  class="form-control-plaintext" id="name" value="" placeholder="Country name">
                                        </div>
                                        <div class="col-auto">
                                          <label for="iso" class="form-label">ISO</label>
                                          <input type="text" class="form-control" id="iso"  placeholder="ISO">
                                        </div>
                                        <div class="col-auto">
                                          <button type="submit" class="btn btn-primary mb-3">Create</button>
                                        </div>
                                      </form> 
                          </div>   
                          <div class="col-7">
                            <table  class="table table-striped">
                           
                          @if ( isset($data) &&  count($data['countries']) > 0 )
                            <thead>
                            <tr class="table-dark" >     
                              
                                  @foreach (  $data['countries'][0] as $key => $value )
                                  
                                  @if($key == 'created_at')
                                  <th scope="col">Edit</th>
                                  <th scope="col">{{ $prop =($key == 'id')? '#' :  $key ; }}</th>
                                  @else
                                  <th scope="col">{{ $prop =($key == 'id')? '#' :  $key ; }}</th> 
                                  @endif
                                  @endforeach
                              
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ( $data['countries'] as $key_0 => $arr )
                              <tr>
                               
                                  @foreach ( $arr as $key => $value )
                                  
                                  @php  
                                  
                                    if( isset($key) && $key == 'id'):
                                     $id = $value ;
                                    endif;
                                  
                                  @endphp 
                                    
                                  
                                  @if($key == 'created_at')
                                  <td><a   class="btn btn-primary" href="{{ route('dashboard.edit' , $id ) }}" role="button" > Edit</a></td>
                                  <th scope="col">{{   $value  }}</th> 
                                  @else 
                                  <th scope="col">{{   $value  }}</th> 
                                  @endif 
                                  @endforeach
                              </tr>    
                              @endforeach
                                     
                            </tbody>
                          @else
                              <thead>
                                <tr class="table-dark" >
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Iso</th>
                                  <th scope="col">Edit</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr  >
                                  <th scope="row">1</th>
                                  <td>Israel</td>
                                  <td>IL</td>
                                  <td><a   class="btn btn-primary" href="#" role="button" > Edit</a></td>
                                </tr>
                                <tr  >
                                  <th scope="row">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td><a   class="btn btn-primary" href="#" role="button" > Edit</a></td>
                                </tr> 
                              </tbody>
                              @endif
                            </table>
                          </div>     
                   </div> 
            </div>
        </div> 
    </div>
 </div>


@endsection
