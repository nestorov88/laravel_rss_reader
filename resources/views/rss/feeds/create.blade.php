@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Rss Urls</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('url.store')}}">
                            @csrf
                            @include('rss.feeds.fields')
                            <p></p>
                            <button class="btn btn-primary col-md-1" type="submit">Insert</button>
                            <a href="{{url()->previous()}}" class="btn btn-danger col-md-1"><i class="glyphicon glyphicon-edit"></i> Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
