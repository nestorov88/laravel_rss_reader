@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('url.create')}}" class="btn btn-primary col-md-1">New</a>
        <p></p>
        <div class="row justify-content-center">
            @foreach($urls as $url)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{$url->title}}</div>
                        <div class="card-body">
                            <p class="card-text">
                                URL: {{$url->url}}
                            </p>
                            <a href="{{route('url.delete', ['id' => $url->id])}}" class="btn btn-danger col-md-1 ">DELETE</a>
                        </div>
                    </div>
                </div>
                <p></p>
            @endforeach
            {{ $urls->links() }}
        </div>
    </div>
@endsection
