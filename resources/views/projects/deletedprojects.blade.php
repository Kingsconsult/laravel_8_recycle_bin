@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
        </div>
    </div>

    <div class="pull-left ">
        <a class="btn btn-success" href="{{ route('projects.index') }}" title="Back to Index"> <i class="fas fa-home"></i> </a>
    </div>
    <div class="">
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('projects.index') }}" method="GET" role="search">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search projects">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                        <a href="{{ route('projects.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Introduction</th>
            <th>Location</th>
            <th>Cost</th>
            <th>Date Deleted</th>
            <th>Action</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->introduction }}</td>
                <td>{{ $project->location }}</td>
                <td>{{ $project->cost }}</td>
                <td>{{ date_format($project->deleted_at, 'jS M Y') }}</td>
                <td>
                    <a href="{{ route('restoreDeletedProjects', $project->id) }}" title="restore project">
                        <i class="fas fa-window-restore text-success  fa-lg"></i>
                    </a>
                    <a href="{{ route('deletePermanently', $project->id) }}" title="Permanently delete">
                        <i class="fas fa-trash text-danger  fa-lg"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $projects->links() !!}


@endsection


