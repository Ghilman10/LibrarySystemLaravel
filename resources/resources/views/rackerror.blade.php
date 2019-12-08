@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>This rack does not exist</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div > 
                            <a href="/admin/books" class="btn btn-primary btn-sm "> Go back</a>    
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
