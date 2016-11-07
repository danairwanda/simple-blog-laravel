@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>CRUD Laravel 5.3</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{route('ajax.update', $cruds->id)}}" method="post">
					<input name="_method" type="hidden" value="PATCH">
					{{csrf_field()}}
						<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
							<input type="text" name="firstname" class="form-control" placeholder="firstname" value="{{$cruds->firstname}}">
							{!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
							<input type="text" name="lastname" class="form-control" placeholder="Nomor Handlastname" value="{{$cruds->lastname}}">
							{!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<input type="text" name="email" class="form-control" placeholder="email" value="{{$cruds->email}}">
							{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							<input type="text" name="address" class="form-control" placeholder="Nomor Handaddress" value="{{$cruds->address}}">
							{!! $errors->first('address', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection