@extends('layouts.main')

@section('content')
    <h3 class="page-title">@lang('quickadmin.task.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.task.fields.name')</th>
                            <td field-key='name'>{{ $task->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.task.fields.description')</th>
                            <td field-key='description'>{!! $task->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.task.fields.task-date')</th>
                            <td field-key='task_date'>{{ $task->task_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('tasks.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
