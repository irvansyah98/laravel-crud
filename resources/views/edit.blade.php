@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('/artikel/'.$data->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="text" placeholder="Title" value="{{ $data->title }}" class="form-control col-md-12" name="title"><br>
                        <input type="text" placeholder="Kategori" value="{{ $data->kategori }}" class="form-control col-md-12" name="kategori"><br>
                        <textarea name="content" placeholder="Kontent" id="" class="form-controller col-md-12" cols="30" rows="10">{{ $data->content }}</textarea>
                        <input type="submit" class="btn btn-success" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
