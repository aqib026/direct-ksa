@extends('admin.include.main')
@section('main-section')
@push('title')
<title>Users</title>
@endpush
<section class="section border-0 m-0">
	<div class="row">
		<div class="col-md-12 col-sm-12">
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
								@foreach ($users as $user)
									<tr class="even pointer">
										<td scope="row">{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->usertype }}</td>
										<td><a href="{{ url('admin/user/edit/') }}/{{ $user->id }}"><i class="btn btn-success fa fa-edit"></i>
											<a href="{{ url('admin/user/delete/') }}/{{ $user->id }}"><i class="btn btn-danger fa fa-trash"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row float-right">
				<div class="col-lg-12">{{ $users->links('pagination::bootstrap-4') }}</div>
			</div>
		</div>
	</div>
</section>
@endsection