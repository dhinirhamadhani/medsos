@extends('template')

    @section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Create New Video</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('vidd.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Input gagal.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <form action="{{ route('vidd.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>user:</strong>
                    <input type="text" name="created_by" class="form-control" placeholder="Video">
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Video:</strong>
                    <input type="file" name="vid" class="form-control" placeholder="Video">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Caption:</strong>
                    <input type="text" name="caption" class="form-control" placeholder="Caption">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    @endsection
