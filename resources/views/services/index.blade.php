@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>{{ __('Services') }}</h3>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <a href="{{route('services.create')}}" class="btn btn-primary">Добавить услугу</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Number</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->id}}</td>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->price}}</td>
                                            <td scope="row">
                                                <div class="row">
                                                    <a href="{{route('services.edit', [$service])}}" class="btn btn-primary">
                                                        Редактировать
                                                    </a>
                                                    <form action="{{route('services.destroy', [$service])}}" method="POST">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
