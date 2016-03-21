@extends('welcome')



@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			 <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                	@if ( isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                       	 
                       	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
				
					
					</form>
                </div>
            </div>
			<br>
		

			
			<br>
		</div>
	</div>
</div>
@endsection()