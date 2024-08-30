@extends('backendviews.layouts.app')
@section('content')
@include('backendviews.layouts.navbar')
@include('backendviews.layouts.sidebar')
<main id="main-container">
    <!-- Hero -->
    
    <!-- END Hero -->
        <div class="content">
        
           <div class="block block-rounded">
                   <div class="block-content ">
                <div class="d-flex justify-content-end">
               <div class="block-content block-content-full">
                 <div class="row">
                 <h1 class="flex-sm-fill h3 my-2">
                    Deactive Membership Enquiries<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                    <div class="col-sm-12">
                         <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                        <tr role="row">
                            <th class="text-center sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                            <th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Mobile</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Subject</th>
                            <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deactive_membership_enquiries as $deactive_membership_enquiry )
                        <tr role="row" class="odd">
                        <td class="text-center font-size-sm sorting_1">{{ $loop->index+1 }}</td>
                        <td class="font-w600 font-size-sm">
                            {{ $deactive_membership_enquiry->name }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $deactive_membership_enquiry->email }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $deactive_membership_enquiry->mobile }}
                        </td>

                        <td class="font-w600 font-size-sm">
                            {{ $deactive_membership_enquiry->subject }}
                        </td>

                        <td class="d-none d-sm-table-cell"><a href="#"
                                    class="btn btn-danger btn-sm">Inactive</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
</div>
</main>
@endsection