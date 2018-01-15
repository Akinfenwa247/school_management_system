@extends('admin.layouts.main')
@section('content')


    <div class="w3-margin-bottom">
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Add Class</button>
    </div>

    <div id="id01" class="w3-modal">
        <form method="POST" action="{{route('class.store')}}" files="true" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="w3-modal-content w3-card-4">
                <header class="w3-container w3-dark-gray">
                <span onclick="document.getElementById('id01').style.display='none'"
                      class="w3-button w3-display-topright">&times;</span>
                    <h2>Add Class</h2>
                </header>

                <div class="w3-container w3-margin">
                    <div class="w3-row-padding">
                        <div style="margin: 8px">
                            <label><strong>Name</strong></label>
                            <input class="w3-input w3-border" type="text" name="name" required>
                        </div>
                    </div>

                    <div class="w3-row-padding">
                        <div style="margin: 8px ">
                            <button class="w3-btn w3-blue w3-block">Register</button>
                        </div>
                    </div>

                </div>
                <footer class="w3-container w3-dark-gray">
                    <br><br>
                </footer>
            </div>

        </form>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h3><strong>Classes</strong> </h3>
                </header>

                <table class="table table-striped table-bordered w3-centered table-advance table-hover" id="dataTables-example">
                    <tbody>

                    <tr>
                        <th><i class="icon_calendar"></i> Name</th>
                        <th><i class="icon_user"></i> Teacher</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @foreach($classes as $class)
                        <tr>
                            <td>{{$class->name}}</td>
                            <td>{{App\Teacher::where('class_id', '=', $class->id)->value('name')}}</td>
                           <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('class.show',[$class->id]) }}">view</a>
                                    <a class="btn btn-success" href="{{ route('class.edit',[$class->id]) }}">Edit</a>
                                    {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['class.destroy', $class->id])) !!}
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
        </div>
    </div>

@endsection