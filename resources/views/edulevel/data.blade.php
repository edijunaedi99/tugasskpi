@extends('main')
@section('title', 'EduLevel')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Toko Buku</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="">TokoBuku</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">

    <div class="animated fadeIn">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Buku</strong>
                </div>
                <div class="pull-right">
                <a href="{{ url('edulevels/add') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                        <th>NO</th>
                        <th>Judul</th>
                        <th>Harga</th>
                        <th>Penerbit</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($edulevels as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->penerbit }}</td>
                                <td class="text-center">
                                    <a href="{{ url('edulevels/edit/' .$item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                <form action="{{ url('edulevels/' .$item->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Akan Menghapus Data?')">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="{{ url('edulevels//' .$item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-print"></i>
                                    </a>
                                        <!-- <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-print"></i>
                                        </button> -->
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            
        
    </div>
</div>
@endsection