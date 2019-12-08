@extends('layouts.client-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Client Dashboard</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="container">

                   
                     
                    <div class="row">
                        <form action="/client/searchbooks" method="POST">
                        {{ csrf_field() }}

                            <div class="form-group">

                               <input type="text" name="search_book" placeholder="Search books...."> 
                               <input type="submit" name="submit" value="Search" class="btn btn-primary btn-sm "> 
                         
                            </div>


                         </form>         
                    </div>
                    
                    <h3>Books</h3>
                    

                    @foreach ($books as $b)
                    <div class="row">

                   
                        <div class="col-md-2">

                            <a href="#">    <h3>
                                {{$b->title}}
                            </h3></a>
           
                            <h5>
                                 Author: {{$b->author}}
                            </h5>
                            <h5>
                                    Published in: {{$b->year}}
                            </h5>
           
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
