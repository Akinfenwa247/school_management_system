@extends('admin.layouts.main')

@section('content')
    <header class="w3-container">
        <h5><b><i class="fa fa-dashboard"></i> Admin Dashboard</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
            <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>{{\App\Student::count()}}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Student</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="icon_group w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>{{\App\Teacher::count()}}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Teacher</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>23</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Parent</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="icon_datareport_alt w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>{{\App\SchoolClass::count()}}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Class</h4>
            </div>
        </div>
    </div>
    <div class="w3-container w3-row-padding">
        <div style="display:inline-block;" class="w3-border w3-dark-gray w3-half" >
            <header class="w3-container w3-dark-gray ">
                <h5> <i class="fa fa-calendar"></i>  Event Calender</h5>
            </header>
            <div class="monthly" id="mycalendar"></div>
            <footer class="w3-container w3-dark-gray">
                <br>
            </footer>
        </div>
        <div class="w3-half w3-border w3-dark-gray">
            <header class="w3-container w3-dark-gray ">
                <h5> <i class="fa fa-book"></i>  Everyday Task</h5>
            </header>
            <div>
                <table class="table table-bordered w3-centered table-advance">
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
                            <td>{{str_limit($task->description,50) }}</td>
                            <td><input type="submit" onclick="document.getElementById('{{$task->id}}').style.display='block'" class="btn btn-primary" value="View"></td>
                        </tr>
                        <div id="{{$task->id}}" class="w3-modal">
                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                <header class="w3-container w3-dark-gray">
                                    <span onclick="document.getElementById('{{$task->id}}').style.display='none'" class="w3-button w3-hover-red w3-display-topright">&times;</span>
                                    <h4><strong>{{$task->day}}</strong></h4>
                                </header>
                                <div class="w3-container w3-white">
                                    <h3 align="center">{{$task->name}}</h3>
                                    <hr>
                                    <h5 align="center"><strong>Description</strong></h5>
                                    <p>{{$task->description}}</p>
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
            <footer class="w3-container w3-dark-gray w3-padding">
                <div class="w3-container"><a class="btn btn-primary w3-block" href="{{route('tasks.index')}}">Manage Tasks</a></div>
            </footer>
        </div>
    </div>

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/monthly.js')}}"></script>
    <script>
        $('#mycalendar').monthly({
            mode: 'event',
            jsonUrl: '{{url('admin/dashboard/view')}}',
            dataType: 'json'
            //xmlUrl: 'events.xml'
        });

    </script>



@endsection