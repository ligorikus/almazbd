@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Редактировать компьютер</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('computers.update', [$computer])}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group col-md-4">
                                <input type="text" name="number" value="{{$computer->number}}" class="form-control">
                                <input type="submit" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection