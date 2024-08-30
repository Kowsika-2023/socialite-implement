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
                    Service Members<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Service Members</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a style="color:black" href="{{route('members.index')}}">List</a>
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
    
              
                    <a class="btn btn-info btn-sm" href="{{ route('members.create') }}">Add</a>
               
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
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 30%;" rowspan="1" colspan="1" aria-label="Content: activate to sort column ascending"> YOE</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 30%;" rowspan="1" colspan="1" aria-label="Content: activate to sort column ascending"> Mobile</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 30%;" rowspan="1" colspan="1" aria-label="Content: activate to sort column ascending"> Service</th>
                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Status</th>
                            <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Action</th></tr>
                    </thead>
                    <tbody>
                    @foreach ($service_members as $service_member )
           <tr role="row" class="odd">
               <td class="text-center font-size-sm sorting_1">{{ $loop->index+1 }}</td>
               <td class="font-w600 font-size-sm">
                   {{ $service_member->name }}
               </td>

            

               <td class="d-none d-sm-table-cell font-size-sm">
                      <img src="{{ asset('images/service_members/'.$service_member->image) }}"  alt="your image" width="80px" height="60px" />
                      
                      </td>
                
                      <td class="d-none d-sm-table-cell font-size-sm">
                 {{ $service_member->yoe }}
               </td>

               <td class="font-w600 font-size-sm">
                   {{ $service_member->mobile }}
               </td>

               <td class="font-w600 font-size-sm">
                   {{ Str::limit($service_member->service?$service_member->service->name:'-',30) }}
               </td>
            
                              @if ($service_member->status == 1)
                          <td class="d-none d-sm-table-cell"><a href="{{ route('members.status', [$service_member->id]) }}"
                                  class="btn btn-success btn-sm">Active</a></td>
                      @else
                          <td class="d-none d-sm-table-cell"><a href="{{ route('members.status', [$service_member->id]) }}"
                                  class="btn btn-danger btn-sm">Inactive</a></td>
                      @endif

<td>
                      <div class="btn-group">
            <a href="{{ route('members.show',$service_member->id) }}" method="GET" >     
            <button  type="submit" class="btn btn btn-sm " >
              <i class="far fa-0x fa-eye"></i>
            </button>
          </a> 
   
                    <div class="btn-group">
                  <a href="{{ route('members.edit',$service_member->id) }}" method="GET" >     
                  <button  type="submit" class="btn btn btn-sm " >
                    <i class="fa fa-fw fa-pencil-alt"></i>
                  </button>
                </a>   

                
                <form action="{{ route('members.destroy',$service_member->id) }}" method="POST">
                   @csrf
                     @method('DELETE')
    
                      <button type="submit"  class="btn btn btn-sm  confirm" >
                        <i class="fa fa-fw fa-times"></i>
                     </button> 
    
                       </form> 
                  </td>
       @endforeach
        

                  </tbody>
                
               
                     
                </table>
            </div>
        </div>
            </div>
        </div></div></div>
</main>
@endsection