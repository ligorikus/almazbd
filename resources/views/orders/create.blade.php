@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Добавить заказ</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('orders.store')}}">
                            {{csrf_field()}}
                            <div class="form-group col-md-6">
                                <select name="admin" class="form-control type" required="required">
                                    @foreach($admins as $key => $admin)
                                        <option value="{{ $admin->id }}">{{$admin->email}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <select name="computer" class="form-control type" required="required">
                                    @foreach($computers as $key => $computer)
                                        <option value="{{ $computer->id }}">{{$computer->number}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-8">
                                <table class="table">
                                    <tbody id="generator">
                                        <tr>
                                            <th>Service</th>
                                            <th>Count</th>
                                            <th></th>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" id="addField" class="btn btn-success">
                                            <i class="fa fa-plus"></i> Добавить услугу
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <input type="submit" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="display: none;">
        <table>
            <tbody id="line">
                <tr>
                    <td>
                        <select name="services[]" class="form-control type" required="required">
                            @foreach($services as $key => $service)
                                <option value="{{ $service->id }}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="date form-control" name="count[]" type="number">
                    </td>
                    <td><a href="#" class="rem btn btn-danger"><i class="fa fa-minus">Удалить</i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            // Add new row to the table of fields
            $('#addField').click(function () {
                var line = $('#line').html();
                var table = $('#generator');
                table.append(line);
            });

            // Remove row from the table of fields
            $(document).on('click', '.rem', function () {
                $(this).parent().parent().remove();
            });

        });
    </script>
@endsection