@extends('admin.layouts.main')

@section('content')

    <div class="w3-container">
        <header class="panel-heading">
            <h3 align="center"><strong>Manage Tasks</strong> </h3>
        </header>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped table-bordered w3-centered table-advance table-hover">
            <tr>
                <th>Day</th>
                <th>Task</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->day}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{str_limit($task->description,100) }}</td>
                    <td><input type="submit" onclick="document.getElementById('{{$task->id}}').style.display='block'" class="btn btn-primary" value="Update"></td>
                </tr>
                <div id="{{$task->id}}" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                        <header class="w3-container w3-dark-gray">
                            <span onclick="document.getElementById('{{$task->id}}').style.display='none'" class="w3-button w3-hover-red w3-display-topright">&times;</span>
                            <h4><strong>{{$task->day}}</strong></h4>
                        </header>
                        <div class="w3-container">
                            {!! Form::model($task, ['method' => 'PUT', 'route' => ['tasks.update', $task->id], 'files' => true,]) !!}

                            {!! Form::label('name', 'Task', ['class' => 'control-label w3-margin-top']) !!}
                            {!! Form::text('name',old('name'), ['class' => 'form-control', 'placeholder' => 'input task title'])!!}

                            {!! Form::label('description', 'Description', ['class' => 'control-label w3-margin-top']) !!}
                            {!! Form::textarea('description',old('description'), ['class' => 'form-control', 'placeholder' => ''])!!}

                            {!! Form::submit(('Update'), ['class' => 'btn btn-primary btn-block w3-margin-top w3-large w3-margin-bottom']) !!}

                            {!! Form::close() !!}
                        </div>

                        <footer class="w3-container w3-dark-gray">
                            <br><br>
                        </footer>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
