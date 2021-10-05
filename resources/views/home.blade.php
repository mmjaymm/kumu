@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Github Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Login</th>
                            <th>Company</th>
                            <th>Followers</th>
                            <th>Public Repos</th>
                            <th>Ave Followers Per Repo</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->login }}</td>
                                    <td>{{ $user->company }}</td>
                                    <td>{{ $user->followers }}</td>
                                    <td>{{ $user->public_repos }}</td>
                                    <td>{{ $user->average_followers_per_repo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
