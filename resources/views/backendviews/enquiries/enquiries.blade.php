@extends('backendviews.layouts.app')
@section('content')
@include('backendviews.layouts.navbar')
@include('backendviews.layouts.sidebar')
<main id="main-container">
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
           </div>
<!---->


<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;

        <div class="col-lg-6">
            <!-- Block Tabs Default Style -->

             
                <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="pill" href="#home">Non-Read Enquiries</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#menu1">Readed Enquiries</a>
                    </li>
                   
                </ul>
                
                <div class="tab-content">
                    <div id="home" class="container tab-pane active">
                    
                 
                         <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                        <tr role="row">
                            <th class="text-center sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                            <th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Mobile</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Subject</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Action</th>
                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($active_enquiries as $active_enquiry )
                        <tr role="row" class="odd">
                        <td class="text-center font-size-sm sorting_1">{{ $loop->index+1 }}</td>
                        <td class="font-w600 font-size-sm">
                            {{ $active_enquiry->name }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $active_enquiry->email }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $active_enquiry->mobile }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $active_enquiry->subject }}
                        </td>

                        @if ($active_enquiry->status == 1)
                          <td class="d-none d-sm-table-cell"><a href="{{ route('active_enquiries.status', [$active_enquiry->id]) }}"
                                  class="btn btn-success btn-sm">Not Read</a></td>
                      @else
                          <td class="d-none d-sm-table-cell"><a href="{{ route('active_enquiries.status', [$active_enquiry->id]) }}"
                                  class="btn btn-danger btn-sm">Readed</a></td>
                      @endif

                      <td>
                      <div class="btn-group">
                        <a href="{{ route('enquiries.view',[$active_enquiry->id]) }}" method="GET" >     
                              <button  type="submit" class="btn btn btn-sm " >
                                       <i class="far fa-0x fa-eye"></i>
                                </button>
                        </a> 

                        
                        <form action="{{ route('enquiries.destroy',$active_enquiry->id) }}" method="POST">
                       @csrf
                       @method('DELETE')

                       <button type="submit"  class="btn btn btn-sm  confirm" >
                       <i class="fa fa-fw fa-times"></i>
                       </button> 

                      </form>  
                     </div>
                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
           
         </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                                    <th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Mobile</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Subject</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach ($deactive_enquiries as $deactive_enquiry )
                        <tr role="row" class="odd">
                        <td class="text-center font-size-sm sorting_1">{{ $loop->index+1 }}</td>
                        <td class="font-w600 font-size-sm">
                            {{ $deactive_enquiry->name }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $deactive_enquiry->email }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $deactive_enquiry->mobile }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $deactive_enquiry->subject }}
                        </td>

                        @if ($deactive_enquiry->status == 1)
                          <td class="d-none d-sm-table-cell"><a href="{{ route('deactive_enquiries.status', [$deactive_enquiry->id]) }}"
                                  class="btn btn-success btn-sm">Not Read</a></td>
                      @else
                          <td class="d-none d-sm-table-cell"><a href="#"
                                  class="btn btn-danger btn-sm">Readed</a></td>
                      @endif

                    <td>
                      <div class="btn-group">
                        <a href="{{ route('enquiries.view',[$deactive_enquiry->id]) }}" method="GET" >     
                              <button  type="submit" class="btn btn btn-sm " >
                                       <i class="far fa-0x fa-eye"></i>
                                </button>
                        </a> 


                        
                        <form action="{{ route('enquiries.destroy',$deactive_enquiry->id) }}" method="POST">
                       @csrf
                       @method('DELETE')

                       <button type="submit"  class="btn btn btn-sm  confirm" >
                       <i class="fa fa-fw fa-times"></i>
                       </button> 

                      </form>  
                     </div>
                    </td>
                        </tr>
                        @endforeach
                    </tbody>
               </table>
                </div> 
                
</div>
</div>       

<!---->
</main>
@endsection