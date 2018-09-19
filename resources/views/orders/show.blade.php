@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Заказ: {{$order->id}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-md-6">
                            <h3>Admin: {{$order->admin->email}}</h3>
                            <h3>Computer: {{$order->computer->number}}</h3>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-active">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Count</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->pivot->count}}</td>
                                            <td>{{$service->pivot->count * $service->price}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                       <td colspan="2" style="text-align: right;">Total:</td>
                                        <td>{{$price}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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