@extends('layouts.admin-app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Manage Books</h3></div>

            
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                  
                    <div class="container">
                    
                        <div class="row">
                            <form action="/admin/addbooks" method="POST">
                            {{ csrf_field() }}

                                   <div >  
                                        <label>Title</lable>
                                        <input type="text"  name="title" class="form-control">
                                    </div>
                                    <div >  
                                        <label>Author</lable>
                                        <input type="text"  name="author" class="form-control">
                                    </div>
                                    <div >  
                                        <label>Year</lable>
                                        <input type="number"  name="year" class="form-control" min="1" max="9999">
                                    </div>
                                    <div >  
                                        <label>Rack Name</lable>
                                        <input type="text"  name="rack_name" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">  
                                   
                                     <input type="submit" name="form1" class="btn btn-primary btn-sm " value="Add Book">    
                                   </div>

                             </form>         
                        </div>
                        <br><br>
                        <h1>Books</h1>
                        @foreach ($books as $b)
                        <div class="row">


                   
                            <div class="col-md-2">
                        

                                    <a href="#">    <h3>
                                            {{$b->title}}
                                        </h3></a>
                                       
                                        <h5>
                                            {{$b->author}}
                                        </h5>
                                        <h5>
                                            {{$b->year}}
                                        </h5>
                                        <h5>
                                            {{$b->name}}
                                        </h5>
                           
                          
                          
                          <a href="/admin/removebooks/{{ $b->id }}"> <button class="btn btn-danger btn-sm"> Delete</button> </a>
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
