@extends('user.layout.dashboard')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="table-responsive">
					<table class="table table-striped jambo_table bulk_action">
						<thead>
							<tr class="headings">
								<th>Required Service</th>
								<th>Applicant Name</th>
								<th>Mobile No</th>
								<th>Email</th>
								<th>Created Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($accre as $ac )
								<tr class="even pointer">
									<td>
										@switch($ac->required_service)
										@case('translation')
										Translation
										@break

										@case('passport_renewals')
										Passport Renewals
										@break

										@case('intl_dl_card')
										Intl Driving License - Card
										@break

										@case('intl_dl_booklet')
										Intl Driving License - Booklet
										@break

										@case('uni_adm')
										University Admissions
										@break

										@case('uae_visa')
										UAE Visa for KSA Residents
										@break

										@case('forms_filling')
										Forms Filling
										@break

										@case('bahrain_visa')
										Bahrain Visa for KSA Residents
										@break

										@case('vip')
										Premium Service (VIP)
										@break

										@default
										@endswitch
									</td>
									<td>{{ $ac->applicant_name }}</td>
									<td>{{ $ac->mobile_number }}</td>
									<td>{{ $ac->email }}</td>
									<td>{{ $ac->created_at}}</td>
									<td>
										@if ($ac->status == 0)
										<span class="badge badge-success bg-success">New</span>
										@elseif ($ac->status == 1)
										<span class="badge badge-warning bg-warning">Pending </span>
										@elseif ($ac->status == 2)
										<span class="badge badge-success bg-success">Progress</span>
										@else
										<span class="badge badge-primary bg-primary">Delivered</span>
										@endif
									</td>
									<td>
										<a href="{{ url('user/servicesdetail') }}/{{ $ac->id }}"><i class="btn btn-success fa fa-eye"></i></a>
										{{-- <a href="{{ url('admin/featured_sales/delete/') }}/{{ $accre->id }}"><i class="btn btn-danger fa fa-trash"></i> --}}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
