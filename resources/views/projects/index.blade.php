@extends('layouts.app')

@section('title','Projektek')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-5">
            @foreach ($projects as $project)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @foreach ($project->statuses as $status)
                                <div class="float-end">{{ $status->name }}</div>
                            @endforeach

                            <h4>{{ $project->title }}</h4>
                            
                            @foreach ($project->owners as $owner)
                                <p>{{ $owner->name }} ({{ $owner->email  }})</p>
                            @endforeach
                            
                            <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}" role="button">Szerkesztés</a>
                            <a class="btn btn-danger" href="#" role="button">Törlés</a>
                            
                        </li>
            @endforeach
                    </ul>
            </div>
        </div>
    </div>
</div>
@endsection