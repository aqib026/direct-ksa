@extends('admin.include.main')
@section('main-section')
@push('title')
<title>Country</title>
    
@endpush
@push('style')
    <style>
      .my-image {
  width: 2000px;
  height: 2000px;
  transition: all 0.5s;
}

.my-image:hover {
  transform: scale(2.2);
}
    </style>
@endpush

    <div class="">
      <form action="">
      <div class="page-title">
        <div class="title_left">
          <h3>Countries </h3>
        </div>

        <div class="title_right">
          <div class="col-md-7 col-sm-7   form-group pull-right top_search">

            <div class="input-group">
               <div>
                <a href="{{url('admin/country-form')}}"  class="btn btn-dark"> Add Country</a>
                </div>
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

        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
          

            <div class="x_content">


              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                        <th>Country Name</th>
                        <th>Flag</th>
                        <th>Cover Pic</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>

    

                  <tbody>
                    <tr class="even pointer">
                        @foreach ($countries as $country)
                
           
                        <td scope="row">{{$country->name }}</td>
                        <td><img src="{{asset($country->flag_pic)}}" class="me-4 border my-image"  style="width:130px;height:80px" alt="Flag-Pic"></td>
                        <td><img src="{{asset($country->cover_pic)}}" class="me-4 border my-image" style="width:130px;height:80px" alt="Cover-Pic"></td>
                        <td>@if($country->status=="active")
                   
                            <span class="badge badge-success bg-success">Active</span>
                            @else
                            <span class="badge badge-danger  bg-danger">InActive</span>
        
                            @endif
                        </td>   <td>
                      
                            <a href="{{url('admin/countries/delete/')}}/{{$country->id}}">
                                <button class="btn btn-danger">Delete</button></a>
                                <a href="{{url('admin/country-form/edit/')}}/{{$country->id}}">
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
              {{$countries->links('pagination::bootstrap-4')}}
            </div>
          
        </div>
   
        
    </div>
  





@endsection


