@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>{{ __('Orders') }}</h3>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <a href="{{route('orders.create')}}" class="btn btn-primary">Добавить заказ</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive col-md-12">
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Admin</th>
                                    <th>Computer</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->admin->email}}</td>
                                        <td>{{$order->computer->number}}</td>
                                        <td scope="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <a href="{{route('orders.show', [$order])}}" class="btn btn-primary">
                                                        Показать
                                                    </a>
                                                    <form action="{{route('orders.destroy', [$order])}}" method="POST">
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
                            {{ $orders->appends(['sort' => 'votes'])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
