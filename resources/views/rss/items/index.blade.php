@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table>
                    <thead>
                        <tr>
                            <th>
                                Title
                                <p></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <a href="{{$item->url}}" target="_blank"> {{$item->title}}</a>
                                    <p></p>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
            {{$items->links()}}
        </div>
    </div>
@endsection
