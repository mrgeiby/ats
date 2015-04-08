@extends('app')

@section('content')

    <script>
        function searchEngineers(str) {
            if (str.length == 0) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("engineers").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "{!! URL::to('engineers/search') !!}/", true);
                xmlhttp.send();
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("engineers").innerHTML = xmlhttp.responseText;
                        document.getElementById("paginator").innerHTML = "";

                    }
                }
                xmlhttp.open("GET", "{!! URL::to('engineers/search') !!}/" + str, true);
                xmlhttp.send();
            }
        }
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input type="text" class="form-control" placeholder="Search Engineers" id="engineer-search"
                       onkeyup="searchEngineers(this.value)">
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="row">
                            <div class="col-md-1">Engineers</div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                <strong>{{ Session::get('success') }}</strong>
                            </div>
                        @endif
                        <div id="productions">
                            @foreach ($data as $engineer)
                                {{ $engineer->user->firstName }} {{ $engineer->user->lastName }} <br />
                                {{ $engineer->rate }}
                                {{--@if ($productionType->production->count() != 0)--}}
                                    {{--<h1>{{ $productionType->prodType }}</h1>--}}
                                    {{--<ul>--}}
                                        {{--@foreach($productionType->production as $production)--}}
                                            {{--<h3>{!! HTML::linkAction('ProductionController@show', $production->prodName,--}}
                                                {{--$production->prodSlug) !!}</h3>--}}
                                            {{--<i>Released: {{ $production->created_at }}</i>--}}
                                            {{--<p>{{ $production->prodDescription }}</p>--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}
                                {{--@endif--}}
                            @endforeach
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" id="paginator"> {!! $data->render() !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection