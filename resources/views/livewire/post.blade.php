<div>
    <h2>this is post component</h2>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if ($edit_mode)
        @include('livewire.edit')
    @elseif($create_mode)
        @include('livewire.create')
    @else

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
                    Post<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Post</li>
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
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Title</th>
                                    <th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Description</th>
                                    <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Action</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post )
                                    <tr role="row" class="odd">
                                        <td class="text-center font-size-sm sorting_1">{{ $loop->index+1 }}</td>
                                        <td class="font-w600 font-size-sm">
                                            {{ $post->title }}
                                        </td>

                                        <td class="font-w600 font-size-sm">
                                            {{ $post->description }}
                                        </td>

                                        <td>
                                            <div>
                                            <button wire:click="editPost({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                                            </div>
                                            <div>
                                            <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
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
</main>
@endsection

      @endif
</div>
