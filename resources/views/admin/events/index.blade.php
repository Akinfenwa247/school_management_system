@extends('admin.layouts.main')

@section('content')
<div class="w3-margin-bottom">
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Add Event</button>
</div>

    <div id="id01" class="w3-modal">
      <form method="POST" action="{{route('events.store')}}" files="true" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <header class="w3-container w3-dark-gray">
                <span onclick="document.getElementById('id01').style.display='none'"
              class="w3-button w3-hover-red w3-display-topright">&times;</span>
                <h4>Add New Event</h4>
            </header>
            <div class="w3-container w3-padding">
                <div>
                    {{--<input class="w3-input w3-border" type="hidden" name="name" value="{{$user}}">--}}
                    <label class="w3-margin-top"><strong>Name</strong></label>
                    <input class="w3-input w3-border" type="text" name="name" required>

                    <label class="w3-margin-top"><strong>Start Date</strong></label>
                    <input class="w3-input w3-border" type="date" name="startdate" required>

                    <label class="w3-margin-top"><strong>End Date</strong></label>
                    <input class="w3-input w3-border" type="date" name="enddate">

                    <label class="w3-margin-top"><strong>Start Time</strong></label>
                    <input class="w3-input w3-border" type="time" name="starttime">

                    <label class="w3-margin-top"><strong>End Time</strong></label>
                    <input class="w3-input w3-border" type="time" name="endtime">

                    <label class="w3-margin-top"><strong>Colour</strong></label>
                    <select class="w3-input w3-border" type="text" name="color">
                        <option value="">Black</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                        <option value="red">Red</option>
                        <option value="yellow">Yellow</option>
                        <option value="gold">Gold</option>
                        <option value="purple">Purple</option>
                    </select>

                    <label class="w3-margin-top"><strong>url</strong></label>
                    <input class="w3-input w3-border" type="text" name="url" placeholder="http://">

                    <label class="w3-margin-top"><strong>Description</strong></label>
                    <textarea class="w3-input w3-border" name="description"></textarea>

                    <button class="w3-button w3-block w3-blue w3-margin-top">Submit</button>
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
                    <h3><strong>Events</strong> </h3>
                </header>

                <table class="table table-striped table-bordered w3-centered table-advance table-hover">
                    <tbody>

                    <tr>
                        <th><i class="fa fa-user"></i> Name </th>
                        <th><i class="fa fa-paper-plane"></i> Description </th>
                        <th><i class="icon_calendar "></i> Date (Y - M - D)</th>
                        <th><i class="fa fa-clock-o "></i> Time</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @foreach($events as $event)
                    <tr>
                        <td>{{$event->name}}</td>
                        <td>{{str_limit($event->description, 30)}}</td>
                        <td>{{$event->startdate}} -- {{$event->enddate}}</td>
                        <td>{{$event->starttime}} -- {{$event->endtime}}</td>
                        <td>
                            <input type="submit" onclick="document.getElementById('{{$event->id}}').style.display='block'" class="btn btn-primary" value="View">
                            <a class="btn btn-success" href="{{ route('events.edit',[$event->id]) }}">Edit</a>
                            {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                    'route' => ['events.destroy', $event->id])) !!}
                            {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    <div id="{{$event->id}}" class="w3-modal">
                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                            <header class="w3-container w3-dark-gray">
                                <span onclick="document.getElementById('{{$event->id}}').style.display='none'" class="w3-button w3-hover-red w3-display-topright">&times;</span>
                                <h4><strong>{{$event->name}}</strong></h4>
                            </header>
                            <div class="w3-container w3-padding">
                                <h5><strong>Date</strong></h5>
                                <p><strong>Starting: </strong>{{$event->startdate}} -- <strong>Ending: </strong> {{$event->enddate}}</p>
                                <hr>
                                <h5><strong>Time</strong></h5>
                                <p><strong>Starting: </strong>{{$event->starttime}} -- <strong>Ending: </strong> {{$event->endtime}}</p>
                                <hr>
                                <h5><strong>URL</strong></h5>
                                <p>{{$event->url}}</p>
                                <hr>
                                <h5><strong>Description</strong></h5>
                                <p>{{$event->description}}</p>
                            </div>
                            <footer class="w3-container w3-dark-gray">
                                <br><br>
                            </footer>
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
