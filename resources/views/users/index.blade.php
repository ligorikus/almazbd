@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>{{ __('Users') }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive col-md-12">
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->email}}</td>
                                        <td scope="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <a href="{{route('users.show', [$user])}}" class="btn btn-primary">
                                                        Показать
                                                    </a>
                                                    <form action="{{route('users.destroy', [$user])}}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger">
                                                            Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->appends(['sort' => 'votes'])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
