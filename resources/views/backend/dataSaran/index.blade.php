@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Rekapitulasi Hasil Saran</h4>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="">
                                <table class="table table-striped table-bordered" id="table-1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>IP</th>
                                            <th>Saran</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kuesioner as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->ip }}</td>
                                                <td>{{ $item->saran }}</td>
                                                @if ($item->star == 'star1')
                                                    <td>Rating 1</td>
                                                @elseif($item->star == 'star2')
                                                    <td>Rating 2</td>
                                                @elseif($item->star == 'star3')
                                                    <td>Rating 3</td>
                                                @elseif($item->star == 'star4')
                                                    <td>Rating 4</td>
                                                @else
                                                    <td>Rating 5</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
