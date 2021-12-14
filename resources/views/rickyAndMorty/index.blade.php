@php $page_title = "Rick and Morty API call";@endphp

@extends('layouts.page')

@section('stylesheet')
@endsection
@section('content') 
<h1 class="mt-4">Rick and Morty </h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href=#">Dashboard</a></li>
    <li class="breadcrumb-item active">API data</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Origin</th>
                    <th>Image</th>
                    <th>Episodes</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Origin</th>
                    <th>Image</th>
                    <th>Episodes</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($arrRickyAndMortyAPIData as $rickyAndMortyAPIData)
                <tr>
                    <td>{{$rickyAndMortyAPIData['name']}}</td>
                    <td>{{$rickyAndMortyAPIData['species']}}</td>
                    <td>
                        @if($rickyAndMortyAPIData['origin']['name']!=="unknown"  &&  $rickyAndMortyAPIData['origin']['url']!=="") 
                        <a href="{{$rickyAndMortyAPIData['origin']['url']}}">{{$rickyAndMortyAPIData['origin']['name']}}</a> 
                        @endif
                    </td>
                    <td>
                        <img src="{{$rickyAndMortyAPIData['image']}}" alt="img" width="100" height="60"> 
                    </td>
                    <td>
                        @if(count($rickyAndMortyAPIData['episode']) > 0) 
                            @foreach($rickyAndMortyAPIData['episode'] as $key => $episode)
                            <a href="{{$episode}}">Episode {{ basename($episode)}}</a>
                            @endforeach
                        @endif
                    </td>
                </tr>
                @endforeach   
            </tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('javascript')
@endsection