@extends('admin.layouts.main')

@section('content')
    <h3 class="page-title">@lang('quickadmin.teacher.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>@lang('quickadmin.teacher.fields.name')</th>
                                        <td field-key='name'>{{ $teacher->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('quickadmin.teacher.fields.birthday')</th>
                                        <td field-key='birthday'>{{ $teacher->birthday }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('quickadmin.teacher.fields.gender')</th>
                                        <td field-key='gender'>{{ $teacher->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('quickadmin.teacher.fields.designation')</th>
                                        <td field-key='designation'>{{ $teacher->designation }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('quickadmin.teacher.fields.adresss')</th>
                                        <td field-key='adresss'>{{ $teacher->adresss }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('quickadmin.teacher.fields.phone')</th>
                                        <td field-key='phone'>{{ $teacher->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('quickadmin.teacher.fields.email')</th>
                                        <td field-key='email'>{{ $teacher->email }}</td>
                                    </tr>

                                </table>
                            </td>
                            <td><img alt="avatar" class="size2 " src="{{url('images',$teacher->image)}}"></td>
                        </tr>
                    </table>

                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('teachers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
