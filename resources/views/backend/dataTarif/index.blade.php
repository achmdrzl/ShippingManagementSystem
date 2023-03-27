@extends('backend.layouts.main')

@section('content')
    <div class="row">
        @if (session()->has('message'))
            {!! Toastr::message() !!}
        @endif
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Tarif Pengiriman</h4>
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
                                            <th>Kota</th>
                                            <th>Berat</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rates as $item)
                                            <tr>
                                                <input type="hidden" class="delete_id" value="{{ $item->id }}">

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->province->name }}</td>   
                                                <td>{{ $item->berat / 1000 }} kg</td>
                                                <td>{{ $item->harga }}</td>
                                                <td>
                                                    @if ($item->status == 'active')
                                                        <div class="badge badge-success">{{ ucfirst($item->status) }}</div>
                                                    @else
                                                        <div class="badge badge-danger">{{ ucfirst($item->status) }}</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" title="Edit"
                                                        class="btn btn-primary editRatesBtn" data-toggle="modal"
                                                        data-target="#editRates" data-id="{{ $item->id }}"
                                                        value="{{ $item->id }}">
                                                        <i class="fas fa-pencil-alt" id="btn-edit-post"></i>
                                                    </button>
                                                    @if ($item->status == 'active')
                                                        <form action="{{ route('rates.destroy', $item->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-md btndelete"
                                                                title="Archive">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('rates.destroy', $item->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-success btn-md btnUnDelete" title="Show">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                                @include('backend.dataTarif.edit')
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tambah3" role="tabpanel" aria-labelledby="Tambah-tab3">
                            @include('backend.dataTarif.create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @include('backend.dataTarif.delete')
