@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">User Details - {{ $data['firstName'].' '.$data['lastName'] }}</div>

                    <div class="panel-body">

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>{{ Session::get('success') }}</strong>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/update') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstName" value="{{ $data['firstName'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastName" value="{{ $data['lastName'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="dateOfBirth" value="{{ $data['dob'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $data['email'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" value="{{ $data['address'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Town</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="town" value="{{ $data['town'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Post Code</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="postCode" value="{{ $data['postCode'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phoneNumber" value="{{ $data['phoneNumber'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">User Type</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="role" value="{{ $data->role->name }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Account
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection