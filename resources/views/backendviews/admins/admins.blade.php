@extends('backendviews.layouts.app')
@section('content')
@if(Auth::check())
@include('backendviews.layouts.navbar')
@include('backendviews.layouts.sidebar')
@else
@include('backendviews.login')
@endif
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light ">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Admins<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Admins</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a style="color:black" href="">List</a>
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

                    <a class="btn btn-info btn-sm" href="{{ route('admins.create') }}">Add</a>
                 {{-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addmodal">Add</button> --}}
                </div>
            </div>


            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th class="text-center sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                            <th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">User Name</th>
                            <th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Mobile</th>
                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Status</th>
                            <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Action</th></tr>
                    </thead>
                    <tbody>

           @foreach ($admins as $admin )
           <tr role="row" class="odd">
               <td class="text-center font-size-sm sorting_1">{{ $loop->index+1 }}</td>
               <td class="font-w600 font-size-sm">
                   {{ $admin->name }}
               </td>

               <td class="font-w600 font-size-sm">
                   {{ $admin->user_name }}
               </td>

               <td class="d-none d-sm-table-cell font-size-sm">
                 {{ $admin->mobile }}
               </td>

               @if ($admin->status == 1)
                                <td class="d-none d-sm-table-cell"><a href="{{ route('admins.status', [$admin->id]) }}"
                                        class="btn btn-success btn-sm">Active</a></td>
                            @else
                                <td class="d-none d-sm-table-cell"><a href="{{ route('admins.status', [$admin->id]) }}"
                                        class="btn btn-danger btn-sm">Inactive</a></td>
                            @endif

             <td>
                            <div class="btn-group">
                  <a href="{{ route('admins.show',$admin->id) }}" method="GET" >
                  <button  type="submit" class="btn btn btn-sm " >
                    <i class="far fa-0x fa-eye"></i>
                  </button>
                </a>

                    <div class="btn-group">
                  <a href="{{ route('admins.edit',$admin->id) }}" method="GET" >
                  <button  type="submit" class="btn btn btn-sm " >
                    <i class="fa fa-fw fa-pencil-alt"></i>
                  </button>
                </a>

                @if(count($admins)>1)

                <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">
                   @csrf
                     @method('DELETE')

                      <button type="submit"  class="btn btn btn-sm  confirm" >
                        <i class="fa fa-fw fa-times"></i>
                     </button>

                       </form>
         @endif
</td>
       </div>
   </td>  </tr>
               @endforeach
           </tbody>
                </table></div></div>
            </div>
        </div></div></div>
</main>
@endsection
