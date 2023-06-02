@extends('admin.include.main')
@section('main-section')
@push('title')
<title>Visa Requirement</title>
    
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
          <h3>Visa Requirement </h3>
        </div>

        <div class="title_right">
          <div class="col-md-7 col-sm-7   form-group pull-right top_search">

            <div class="input-group">
               <div>
                <a href="{{url('admin/visa_form')}}"  class="btn btn-dark"> Add Visa Requirement</a>
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
                        <th>Detail</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>

    

                  <tbody>
                    <tr class="even pointer">
                        @foreach ($visa as $visa)
                
                

                    
                         <td scope="row">{{$visa->visa->name }}</td>
                        
                       
                      
                       <td> {{$visa->detail}}</td>
                       <td>@if($visa->status==1)
                   
                            <span class="badge badge-success bg-success">Active</span>
                            @else
                            <span class="badge badge-danger  bg-danger">InActive</span>
        
                            @endif
                        </td>   <td>
                      
                            <a href="{{url('admin/visa_requirement/delete/')}}/{{$visa->id}}">
                                <button class="btn btn-danger">Delete</button></a>
                                <a href="{{url('admin/visa_form/edit/')}}/{{$visa->id}}">
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
              
            </div>
          
        </div>
   
        
    </div>
  





@endsection


