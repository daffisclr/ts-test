@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col">
                        <h2> Data Alumni JTIK</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-resposive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Alumni</th>
                                <th>NIM Alumni</th>
                                <th>Program Studi</th>
                                <th>Jenjang</th>
                                <th>Tahun Lulus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
