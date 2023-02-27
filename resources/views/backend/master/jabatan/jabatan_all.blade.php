@extends('admin.admin_master')
@section('admin')
    <div class="mb-3 intro-y flex flex-col sm:flex-row items-center mt-8">
        <h1 class="text-lg font-medium mr-auto">
            User All
        </h1>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('jabatan.add') }}" class="btn btn-primary shadow-md mr-2">Add New Jabatan</a>

        </div>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card overflow-x-auto">
                        <div class="card-body">
                            <table id="datatable" class="table table-sm"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>

                                    @foreach ($jabatan as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->name }} </td>
                                           
                                            <td>
                                                <a id="delete" href="{{ route('jabatan.delete', $item->id) }}"
                                                    class="btn btn-danger mr-1 mb-2">
                                                    <i data-lucide="trash" class="w-5 h-5"></i> </a>
                                                <a href="{{ route('jabatan.edit', $item->id) }}"
                                                    class="btn btn-success mr-1 mb-2">
                                                    <i data-lucide="edit" class="w-5 h-5"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

