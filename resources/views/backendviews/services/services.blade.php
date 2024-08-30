@extends('backendviews.layouts.app')
@section('content')
@include('backendviews.layouts.navbar')
@include('backendviews.layouts.sidebar')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light ">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Services<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Services</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a style="color:black" href="{{route('services.index')}}">List</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="content">
        
        <div class="block block-rounded">
            <div class="block-content ">
                <div class="d-flex justify-content-end">
    
              
                    <a class="btn btn-info btn-sm" href="{{ route('services.create') }}">Add</a>
               
                    {{-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addmodal">Add</button> --}}
                </div></div>
                
              {{-- @include('backendviews.modals.add_admin') --}}
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>
                   
                </label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" style="width: 5%;" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 30%;" rowspan="1" colspan="1" aria-label="Content: activate to sort column ascending"> Name</th>
                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending">Image</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 30%;" rowspan="1" colspan="1" aria-label="Content: activate to sort column ascending"> Team members count</th>
                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Status</th>
                            <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Action</th></tr>
                    </thead>
                    <tbody>
                
               
                @foreach ( $services as $service)
                   <tr role="row" class="odd">
                      <td class="text-center font-size-sm sorting_1">{{ $loop->index+1 }}</td>
                      <td class="font-w600 font-size-sm">
                          {{$service->name}}
                      </td>
                      <td class="d-none d-sm-table-cell font-size-sm">
                      <img src="{{ asset('images/services/'.$service->image) }}"  alt="your image" width="80px" height="60px" />
                      
                      </td>
            
                    
            
                      <td class="font-w600 font-size-sm">
                          {{$service->team_members}}
                      </td>
            
                      @if ($service->status == 1)
                          <td class="d-none d-sm-table-cell"><a href="{{ route('services.status', [$service->id]) }}"
                                  class="btn btn-success btn-sm">Active</a></td>
                      @else
                          <td class="d-none d-sm-table-cell"><a href="{{ route('services.status', [$service->id]) }}"
                                  class="btn btn-danger btn-sm">Inactive</a></td>
                      @endif
               
                      <td>    
                      <div class="btn-group">
            <a href="{{ route('services.show',$service->id) }}" method="GET" >     
            <button  type="submit" class="btn btn btn-sm " >
              <i class="far fa-0x fa-eye"></i>
            </button>
          </a> 

          <div class="btn-group">
            <a href="{{ route('services.edit',$service->id) }}" method="GET" >     
            <button  type="submit" class="btn btn btn-sm " >
              <i class="fa fa-fw fa-pencil-alt"></i>
            </button>
          </a>

          <form action="{{ route('services.destroy',$service->id) }}" method="POST">
             @csrf
               @method('DELETE')

                <button type="submit"  class="btn btn btn-sm  confirm" >
                  <i class="fa fa-fw fa-times"></i>
               </button> 

                 </form>  
</td>
</div>

          </tr>
                      @endforeach 
                  </tbody>
                
               
                     
                </table></div></div>
            </div>
        </div></div></div>
</main>
@endsection