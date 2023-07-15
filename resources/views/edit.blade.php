@extends('layouts.app') 

@section('content')

    <div class="container mt-5">
          <div class="row mt-5 ">
                 <div class="col-10 mt-5">

                   <h1 class="h1 mt-5">
                      Edit Country 
                   </h1>

                   @if ($errors->any())
                   <div class="alert" style="background: rgb(41, 189, 225) ;">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li style="color:#f8f2f2;">{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
                  @endif

                   <div class="col-8 mt-5">

                     <form class="row g-3" method="POST" action="{{ route("dashboard.update" , $data['country']['id'] ) }}" enctype="multipart/form-data"">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                          <label for="name" class="form-label">Name</label>
                          <input type="text"  class="form-control-plaintext form-control-lg" name="name" id="name_id"
                           value="{{ $data['country']['name'] }}" placeholder="Country name">
                        </div>
                        <div class="col-12">
                          <label for="iso" class="form-label">ISO</label>
                          <input type="text" class="form-control form-control-lg" id="iso_id"  name="iso" placeholder="ISO"
                           value="{{ $data['country']['iso'] }}"
                          >
                        </div>
                        <div class="col-12">
                          <button type="submit" name="submit" class="btn btn-primary btn-lg">Create</button>
                        </div>
                      </form> 

                   </div>
                 </div>
          </div>
    </div>
@endsection