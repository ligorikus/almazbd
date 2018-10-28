@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>User</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                Name: {{$user->name}}
                            </div>
                            <div class="form-group">
                                Email: {{$user->email}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //
        });
    </script>
@endsection