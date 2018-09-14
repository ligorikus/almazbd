@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>{{ __('Computers') }}</h3>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <a href="{{route('computers.create')}}" class="btn btn-primary">Добавить компьютер</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive col-md-12">
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($computers as $computer)
                                        <tr>
                                            <td>{{$computer->id}}</td>
                                            <td>{{$computer->number}}</td>
                                            <td>{{$computer->status ? 'Busy' : 'Free'}}</td>
                                            <td scope="row">
                                                <div class="row">
                                                    <a href="{{route('computers.edit', [$computer])}}" class="btn btn-primary">
                                                        Редактировать
                                                    </a>
                                                    <form action="{{route('computers.destroy', [$computer])}}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger">
                                                            Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $computers->appends(['sort' => 'votes'])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
