@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Simple Ajax CRUD Laravel 5.3</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					@if(Session::has('alert-success'))
						<div class="alert alert-success">
							{{ Session::get('alert-success') }}
						</div>
					@endif

					<button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" data-target=".bs.example-modal-sm1">Tambah Data</button><br><br>

					<div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
						<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah Data</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								{{ csrf_field() }}
								<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname">
							</div>
							<div class="form-group">
								<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname">
							</div>
							<div class="form-group">
								<input type="text" name="email" id="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="text" name="address" id="address" class="form-control" placeholder="Address">
							</div>
							<div class="form-group" align="right">
								<button type="reset" class="btn btn-default">Reset</button>
								<button type="button" id="add" class="btn btn-primary" data-dismiss="modal">Simpan</button>
							</div>
						</div>
						</div>
					</div>
				</div>

				<table class="table table-stripped" id="table">
					<tr>
						<th>ID</th>
						<th>Fistname</th>
						<th>Lastname</th>
						<th>Email</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
					@foreach($cruds as $crud)
					<tr class="item{{ $crud->id }}">
						<td>{{ $crud->id }}</td>
						<td>{{ $crud->firstname }}</td>
						<td>{{ $crud->lastname }}</td>
						<td>{{ $crud->email }}</td>
						<td>{{ $crud->address }}</td>
						<td>
							<button class="edit-modal btn btn-info btn-sm" 
								data-id			=	"{{ $crud->id }}" 
								data-firstname	=	"{{ $crud->firstname }}"
								data-lastname	=	"{{ $crud->lastname }}"
								data-email		=	"{{ $crud->email }}"
								data-address	=	"{{ $crud->address }}">Edit
							</button>
							<button class="delete-modal btn btn-danger btn-sm" data-id="{{ $crud->id }}">Delete</button>
						</td>
					</tr>
					@endforeach
				</table>

				<!-- Edit Modal -->
				<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Ubah Data</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									{{ csrf_field() }}
									<input type="hidden" name="id" id="id-edit">
									<input type="text" name="firstname-edit" id="firstname-edit" class="form-control" placeholder="Firstname">
								</div>
								<div class="form-group">
									<input type="text" name="lastname-edit" id="lastname-edit" class="form-control" placeholder="lastname">
								</div>
								<div class="form-group">
									<input type="text" name="email-edit" id="email-edit" class="form-control" placeholder="Email">
								</div>
								<div class="form-group">
									<input type="text" name="address-edit" id="address-edit" class="form-control" placeholder="Address">
								</div>
								<div class="form-group" align="right">
									<button type="button" id="edit" class="btn btn-primary" data-dismiss="modal">Ubah</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Delete Modal -->
				<div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Delete Data</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									{{ csrf_field() }}
									<input type="hidden" name="id-delete" id="id-delete">
									<p>Yakin Ingin Menghapus Data?</p>
								</div>
								<div class="form-group" align="right">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="button" id="delete" class="btn btn-danger" data-dismiss="modal">Delete</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('javascript')
<script>
	$(document).on('click','.edit-modal', function() {
		$('#id-edit').val($(this).data('id'));
		$('#firstname-edit').val($(this).data('firstname'));
		$('#lastname-edit').val($(this).data('lastname'));
		$('#email').val($(this).data('email'));
		$('#address').val($(this).data('address'));
		$('.bs-example-modal-sm2').modal('show');
	});
	$(document).on('click','.delete-modal', function(){
		$('#id-delete').val($(this).data('id'));
		$('.bs-example-modal-sm3').modal('show');
	});
	$('#add').click(function(){

		$.ajax({
			type: 'post',
			url : '/crud/store',
			data: {
				'_token' 	: $('input[name=_token]').val(),
				'firstname'	: $('input[name=firstname]').val(),
				'lastname'	: $('input=[name=lastname]').val(),
				'email'		: $('input[name=email]').val(),
				'address'	: $('input[name=address]').val()
			},
			success: function(data){
				if ((data.errors)) {
					$('.error').remove();
					 $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td>
					 	<td>" + data.firstname + "</td>
					 	<td>" + data.lastname + "</td>
					 	<td>" + data.email + "</td>
					 	<td>" + data.address + "</td>

					 	<td><button class='edit-modal btn btn-info btn-sm' 
					 	data-id='" + data.id + "' 
					 	data-firstname='" + data.firstname + "' 
					 	data-lastname='" + data.lastname + "' 
					 	data-email='" + data.email + "'  
					 	data-address='" + data.address + "'>Edit</button> 

					 	<button class='delete-modal btn btn-danger btn-sm' 
					 	data-id='" + data.id + "' 
					 	data-firstname='" + data.firstname + "' 
					 	data-lastname='" + data.lastname + "' 
					 	data-email='" + data.email + "' 
					 	data-address='" + data.address + "'>Delete</button></td></tr>");
				  	toastr.success("Data Berhasil Disimpan.");
				}
			},
		});
		$('#firstname').val('');
		$('#lastname').val('');
		$('#email').val('');
		$('#address').val('');
	});

	
</script>