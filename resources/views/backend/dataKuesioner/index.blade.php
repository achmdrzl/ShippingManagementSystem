@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Rekapitulasi Hasil Kuesioner</h4>
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
                                            <th>P1</th>
                                            <th>P2</th>
                                            <th>P3</th>
                                            <th>P4</th>
                                            <th>P5</th>
                                            <th>P6</th>
                                            <th>P7</th>
                                            <th>P8</th>
                                            <th>P9</th>
                                            <th>P10</th>
                                            <th>P11</th>
                                            <th>P12</th>
                                            <th>P13</th>
                                            <th>P14</th>
                                            <th>P15</th>
                                            <th>P16</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kuesioner as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->ip }}</td>
                                                <td>{{ $item->p1 }}</td>
                                                <td>{{ $item->p2 }}</td>
                                                <td>{{ $item->p3 }}</td>
                                                <td>{{ $item->p4 }}</td>
                                                <td>{{ $item->p5 }}</td>
                                                <td>{{ $item->p6 }}</td>
                                                <td>{{ $item->p7 }}</td>
                                                <td>{{ $item->p8 }}</td>
                                                <td>{{ $item->p9 }}</td>
                                                <td>{{ $item->p10 }}</td>
                                                <td>{{ $item->p11 }}</td>
                                                <td>{{ $item->p12 }}</td>
                                                <td>{{ $item->p13 }}</td>
                                                <td>{{ $item->p14 }}</td>
                                                <td>{{ $item->p15 }}</td>
                                                <td>{{ $item->p16 }}</td>
                                                {{-- <td>{{ (($item->p1+$item->p2+$item->p3+$item->p4+$item->p5+$item->p6)/6)+(($item->p7+$item->p8+$item->p9+$item->p10+$item->p11+$item->p12)/6)+(($item->p13+$item->p14+$item->p15)/3)+(($item->p1+$item->p2+$item->p3+$item->p4+$item->p5+$item->p6+$item->p7+$item->p8+$item->p9+$item->p10+$item->p11+$item->p12+$item->p13+$item->p14+$item->p15+$item->p16)/16) }}</td> --}}
                                                @php($hasil = (16 / ($item->p1 + $item->p2 + $item->p3 + $item->p4 + $item->p5 + $item->p6 + $item->p7 + $item->p8 + $item->p9 + $item->p10 + $item->p11 + $item->p12 + $item->p13 + $item->p14 + $item->p15 + $item->p16) / 7) * 100)
                                                @if ($hasil > 7)
                                                    <td>Sangat Memuaskan</td>
                                                @elseif($hasil > 6)
                                                    <td> Memuaskan</td>
                                                @elseif($hasil > 5)
                                                    <td> Sangat Setuju</td>
                                                @elseif($hasil > 4)
                                                    <td> Setuju</td>
                                                @elseif($hasil > 3)
                                                    <td> Cukup</td>
                                                @elseif($hasil > 2)
                                                    <td> Kurang</td>
                                                @elseif($hasil > 1)
                                                    <td> Sangat Kurang</td>
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
