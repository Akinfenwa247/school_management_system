@extends('admin.layouts.main')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h3><strong>Students</strong> </h3>
                </header>

                <table class="table table-striped table-bordered w3-centered table-advance table-hover" id="dataTables-example">
                    <tbody>

                    <tr>
                        <th><i class="icon_profile"></i> Image</th>
                        <th><i class="icon_calendar"></i> Name</th>
                        <th><i class="icon_user"></i> Gender</th>
                        <th><i class="icon_book"></i> Subject</th>
                        <th><i class="icon_mobile"></i> Phone no</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @foreach($students as $student)
                        <tr>
                            <td><img alt="avatar" class="size w3-circle " src="{{url('images',$student->image)}}"></td>
                            <td>{{$student->surname}} {{$student->first_name}} {{$student->middle_name}}</td>
                            <td>{{$student->sex}}</td>
                            <td>{{$student->designation}}</td>
                            <td>{{$student->phone}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('student.show',[$student->student_id]) }}">view</a>
                                    <a class="btn btn-success" href="{{ route('student.edit',[$student->student_id]) }}">Edit</a>
                                    {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['student.destroy', $student->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-danger')) !!}
                                    {!! Form::close() !!}
                                </div>
                                @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
            <script>
                $(document).ready(function () {
                    $('#dataTables-example').dataTable();
                });
            </script>
        </div>
    </div>




   {{-- <script src="{{asset('js/angular.min.js')}}"></script>
    <body>
    <div ng-app="myApp" ng-controller="customersCtrl">

        <select ng-model="selectedCar">
            <option ng-repeat="x in names" value="@{{ x.name }}">@{{ x.name }}</option>
        </select>

        <h1>You selected: @{{selectedCar}}</h1>

    </div>


    </div>

    <script>
        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function($scope, $http) {
            $http.get("view")
                    .then(function(response) {
                       // alert(JSON.stringify(response));
                        $scope.names = response.data;
                    });
        });


    </script>

    </body>--}}

    @endsection