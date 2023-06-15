@extends('admin.include.main')
@section('main-section')
@push('title')
<title>Users</title>
@endpush
<div class="container">
	<form action="">
		<div class="page-title">
			<div class="title_left">
				<h3>Users </h3>
			</div>
			<div class="title_right">
				<div class="col-md-7 col-sm-7   form-group pull-right top_search">
					<div class="input-group">
						<a href="{{ url('admin/add-user') }}" class="btn btn-dark">Add User</a>
						<input type="search" name="search" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div class="clearfix"></div>
	<div class="col-md-12 col-sm-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="table-responsive">
					<table class="table table-striped jambo_table bulk_action">
						<thead>
							<tr class="headings">
								<th>User Name</th>
								<th>Email</th>
								<th>User Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr class="even pointer">
								@foreach ($users as $user)
								<td scope="row">{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->usertype }}</td>
								<td>
									<a href="{{ url('admin/user/delete/') }}/{{ $user->id }}">
										<button class="btn btn-danger">Delete</button></a>
									<a href="{{ url('admin/user/edit/') }}/{{ $user->id }}">
										<button class="btn btn-success">Edit</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			{{ $users->links('pagination::bootstrap-4') }}
		</div>
	</div>
</div>
@endsection