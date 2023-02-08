@extends('backend.layouts.main')

@section('content')
    <div class="row">
        @if (session()->has('message'))
            {!! Toastr::message() !!}
        @endif
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pelanggan</h4>
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
                                <table class="table table-striped display" id="table-1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Registered</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer as $item)
                                            <tr>
                                                <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst($item->name) }}</td>
                                                <td>{{ $item->contact }}</td>
                                                <td>{{ ucfirst($item->address) }}</td>
                                                <td>{{ $item->city }}</td>
                                                <td>{{ date('d F Y', strtotime($item->registered)) }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary editCustomerBtn"
                                                        data-toggle="modal" data-target="#editCustomer"
                                                        data-id="{{ $item->id }}" value="{{ $item->id }}"
                                                        title="Edit">
                                                        <i class="fas fa-pencil-alt" id="btn-edit-post"></i>
                                                    </button>
                                                    <form action="{{ route('customer.destroy', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-md btndelete"
                                                            title="Archive">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @include('backend.dataPelanggan.edit')
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tambah3" role="tabpanel" aria-labelledby="Tambah-tab3">
                            @include('backend.dataPelanggan.create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('backend.dataPelanggan.delete')
