@inject('request', 'Illuminate\Http\Request')
@extends('admin.layouts.main')

@section('content')
<div class="w3-margin-bottom">
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Add Teacher</button>
</div>

    <div id="id01" class="w3-modal">
      <form method="POST" action="{{route('teachers.store')}}" files="true" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-dark-gray">
                <span onclick="document.getElementById('id01').style.display='none'"
              class="w3-button w3-display-topright">&times;</span>
                <h2>Add New Teacher</h2>
            </header>

            <div class="w3-container w3-margin">
                <div class="w3-row-padding">
                    <div style="margin: 8px">
                        <label><strong>Fullname</strong></label>
                        <input class="w3-input w3-border" type="text" name="name" required>
                    </div>
                </div>
                <div class="w3-row-padding">
                    <div class="w3-half">
                        <label><strong>Date of birth</strong></label>
                        <input id="datepicker" class="w3-input w3-border" type="text" name="birthday" required>
                    </div>
                    <div class="w3-half">
                        <label><strong>Qualification</strong></label>
                        <input class="w3-input w3-border" name="qualification" type="text">
                    </div>
                </div>
                <div class="w3-row-padding">
                    <div class="w3-half">
                        <label><strong>Phone no</strong></label>
                        <input class="w3-input w3-border" name="phone" type="text" required>
                    </div>
                    <div class="w3-half">
                        <label><strong>Class</strong></label>
                        <select class="w3-input w3-border" name="gender">
                            <option value="" disabled selected>Choose Class</option>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w3-row-padding">
                    <div class="w3-half">
                        <label><strong>Gender</strong></label>
                        <select class="w3-input w3-border" name="gender" required>
                            <option value="" disabled selected>Choose option</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="w3-half">
                        <label><strong>Address</strong></label>
                        <input class="w3-input w3-border" name="address" type="text" required>
                    </div>
                </div>
                <div class="w3-row-padding">
                        <div style="margin: 8px ">
                            <label><strong>Upload image</strong></label>
                            <img class="size2" id="blah" src="http://placehold.it/180" alt="your image" />
                            <input type='file' onchange="readURL(this);" name="image"/>
                        </div>
                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#blah')
                                                .attr('src', e.target.result);
                                    };

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                </div>
                <div class="w3-row-padding">
                    <div style="margin: 20px ">
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
                    <h3><strong>Teachers</strong> </h3>
                </header>

                <table class="table table-striped table-bordered w3-centered table-advance table-hover" id="dataTables-example">
                    <tbody>

                    <tr>
                        <th><i class="icon_profile"></i> Image</th>
                        <th><i class="icon_calendar"></i> Name</th>
                        <th><i class="icon_user"></i> Gender</th>
                        <th><i class="icon_book"></i> Class</th>
                        <th><i class="icon_mobile"></i> Phone no</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td><img alt="avatar" class="size w3-circle " src="{{url('images',$teacher->image)}}"></td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->gender}}</td>
                        <td>{{App\SchoolClass::where('id', '=', $teacher->class_id)->value('name')}}</td>
                        <td>{{$teacher->phone}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-default" href="{{route('teachers.show',[$teacher->id])}}">View</a>
                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="btn-block w3-padding" href="{{ route('teachers.edit',[$teacher->id]) }}">Edit</a></li>
                                    <li><button onclick="document.getElementById({{$teacher->id*100}}).style.display='block'" class="btn-block w3-hover-blue w3-padding w3-white">Change Class</button></li>
                                    <li>
                                        {{--@if(/*{{App\User::where('id', '=', $teacher->id)->value('teacher_id')}}*/)
                                            Activated
                                            @else
                                            <button onclick="document.getElementById('{{$teacher->id}}').style.display='block'" class="btn-block w3-padding w3-green">Activate</button>
                                        @endif--}}
                                    </li>
                                    <li>
                                        {!! Form::model($teacher, ['method' => 'PUT','onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');", 'route' => ['teachers.update', $teacher->id], 'files' => true,]) !!}

                                            {!! Form::hidden('status',0, ['class' => 'form-control', 'placeholder' => '', 'required' => ''])!!}
                                            {!! Form::submit(('Delete'), ['class' => 'btn-block w3-padding w3-red']) !!}

                                        {!! Form::close() !!}

                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <div class="w3-container">
                        <div id="{{$teacher->id*100}}" class="w3-modal">
                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                <header class="w3-container w3-dark-gray">
                                    <span onclick="document.getElementById({{$teacher->id*100}}).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <h2>Previous Class: {{App\SchoolClass::where('id', '=', $teacher->class_id)->value('name')}}</h2>
                                </header>
                                <div class="w3-container">
                                    {!! Form::model($teacher, ['method' => 'PUT', 'route' => ['teachers.update', $teacher->id], 'files' => true,]) !!}
                                        {{ Form::select('class_id', $classChange, null, ['class' => 'form-control w3-margin-top','placeholder'=>'Select Class']) }}
                                        {!! Form::submit(('Submit'), ['class' => 'btn btn-block w3-margin-top w3-margin-bottom w3-padding w3-blue']) !!}

                                    {!! Form::close() !!}
                                </div>
                                <footer class="w3-container w3-dark-gray">
                                    <br><br>
                                </footer>
                            </div>
                        </div>
                    </div>

                    {{--activation form--}}
                    <div class="w3-container">
                        <div id="{{$teacher->id}}" class="w3-modal">
                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                <header class="w3-container w3-dark-gray">
                                    <span onclick="document.getElementById('{{$teacher->id}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <h2>Activate {{$teacher->name}}</h2>
                                </header>
                                <div class="w3-container">
                                    <form method="POST" action="{{route('authorize')}}">
                                        {{ csrf_field() }}
                                        <input id="name" type="hidden" class="form-control" name="role_id" value="2">
                                        <input id="name" type="hidden" class="form-control" name="teacher_id" value="{{ $teacher->id }}">

                                        <div class="w3-row-padding w3-margin-top">
                                            <label><strong>Email</strong></label>
                                            <input class="w3-input w3-border" type="text" name="email" required>
                                        </div>
                                        <div class="w3-row-padding">
                                            <label><strong>Password</strong></label>
                                            <input class="w3-input w3-border" type="password" name="password" required>
                                        </div>
                                        <div class="w3-row-padding">
                                            <label><strong>Confirm Password</strong></label>
                                            <input class="w3-input w3-border" type="PASSWORD" required>
                                        </div>
                                        <div class="w3-row-padding">
                                            <div>
                                                <button class="w3-btn w3-margin-top w3-blue w3-block">Activate</button>
                                                <button onclick="document.getElementById('{{$teacher->id}}').style.display='none'" type="button" class="w3-button w3-block w3-margin-top w3-margin-bottom w3-red">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <footer class="w3-container w3-dark-gray">
                                    <br><br>
                                </footer>
                            </div>
                        </div>
                    </div>




                    @endforeach
                    </tbody>
                </table>
                {{--<div align="right">
                    {{ $teachers->links() }}
                </div>--}}
            </section>
        </div>
    </div>



@endsection