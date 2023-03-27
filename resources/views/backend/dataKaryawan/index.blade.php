@extends('backend.layouts.main')

@section('content')
    <div class="row">
        @if (session()->has('message'))
            {!! Toastr::message() !!}
        @endif
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Karyawan</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                                aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Tambah-tab3" data-toggle="tab" href="#Tambah3" role="tab"
                                aria-controls="Tambah" aria-selected="false">Add Data</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="">
                                <table class="table table-striped" id="table-1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Kota</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employee as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ ucfirst($item->city) }}</td>
                                                <td>
                                                    @if (!empty($item->getRoleNames()))
                                                        @foreach ($item->getRoleNames() as $v)
                                                            @if ($v === 'superadmin')
                                                                <div class="badge badge-info">{{ strtoupper($v) }}</div>
                                                            @else
                                                                <div class="badge badge-secondary">{{ strtoupper($v) }}
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 'active')
                                                        <div class="badge badge-success">{{ ucfirst($item->status) }}</div>
                                                    @else
                                                        <div class="badge badge-danger">{{ ucfirst($item->status) }}</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary editEmployeeBtn"
                                                        data-toggle="modal" data-target="#editEmployee"
                                                        data-id="{{ $item->id }}" value="{{ $item->id }}"
                                                        title="Edit">
                                                        <i class="fas fa-pencil-alt" id="btn-edit-post"></i>
                                                    </button>

                                                    @if ($item->status == 'active')
                                                        <button type="button" class="btn btn-danger deleteEmployeeBtn"
                                                            data-toggle="modal" data-target="#deleteEmployee"
                                                            title="Archive" value="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-success deleteEmployeeBtn1"
                                                            data-toggle="modal" data-target="#deleteEmployee1"
                                                            title="Showing" value="{{ $item->id }}">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    @endif


                                                    @include('backend.dataKaryawan.edit')
                                                    @include('backend.dataKaryawan.delete')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tambah3" role="tabpanel" aria-labelledby="Tambah-tab3">
                            @include('backend.dataKaryawan.create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
