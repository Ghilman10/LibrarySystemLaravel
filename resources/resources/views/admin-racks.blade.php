@extends('layouts.admin-app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Manage Racks</h3></div>

            
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                  
                    <div class="container">
                    
                        <div class="row">
                            <form action="/admin/addracks" method="POST">
                            {{ csrf_field() }}
                                    <input type="text"  name="name" placeholder="Rack name...">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     <input type="submit" name="form1" class="btn btn-primary btn-sm " value="Add Rack">    
                            
                             </form>         
                        </div>
                        <br><br>
                        @foreach ($racks as $r)
                        <div class="row">


                  

                            <div class="col-md-2">

                            <a href="#">
                                        <h4>
                                            {{$r->name}}
                                        </h4>
                                    </a>

                            </div>

                            <div class="col-md-2">
                          
                          <a href="/admin/removeracks/{{ $r->id }}"> <button class="btn btn-danger btn-sm"> Delete</button> </a>
                            </div>


                        </div>
                        @endforeach
                    
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
