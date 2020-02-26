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

                    <form action="{{ url('artikel') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Title" class="form-control col-md-12" name="title"><br>
                        <input type="text" placeholder="Kategori" class="form-control col-md-12" name="kategori"><br>
                        <textarea name="content" placeholder="Kontent" id="" class="form-controller col-md-12" cols="30" rows="10"></textarea>
                        <input type="submit" class="btn btn-success" value="Save">
                    </form>
                    <br><br>
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td>Title</td>
                            <td>Kategori</td>
                            <td>Content</td>
                            <td>Aksi</td>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->content }}</td>
                                <td width="153">
                                    <form action="{{ url('/artikel/'.$item->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{ url('/artikel/'.$item->id.'/edit') }}" class="btn btn-info"> Edit</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
