@extends('admin.layouts.main')
@section('content')

    <div class="w3-container">
        <h3>Admit New Student</h3>
        <div class="w3-container">
            <form action="{{route('student.store')}}" method="POST"  files="true" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" class="w3-input w3-margin w3-border w3-half" placeholder="Firstname" name="first_name">

                <input type="text" class="w3-input w3-margin w3-border w3-half" placeholder="Lastname" name="surname">

                <input type="text" class="w3-input w3-margin w3-border w3-half" placeholder="Middlename" name="middle_name">

                <input type="date" class="w3-input w3-margin w3-border w3-half" name="dob">

                <select class="w3-input w3-margin w3-select w3-border w3-half" name="sex" required>
                    <option value="" disabled selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <input type="text" class="w3-input w3-margin w3-border w3-half" placeholder="Residential Address" name="address">

                <select class="w3-input w3-margin w3-select w3-border w3-half" name="school_class" required>
                    <option value="" disabled selected>Class</option>
                    @foreach ($classes as $class)
                        <option class="w3-bordered" value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>

                <select class="w3-input w3-margin w3-select w3-border w3-half" name="nationality" required>
                    <option value="" disabled selected>Nationality</option>
                    @foreach ($countries as $country)
                        <option class="w3-bordered" value="{{ $country->name }}">{{ $country->name }}</option>
                    @endforeach
                </select>

                <select class="w3-input w3-margin w3-select w3-border w3-half" name="SOO" required>
                    <option value="" disabled selected>State Of Origin</option>
                    @foreach ($states as $state)
                        <option class="w3-bordered" value="{{ $state->name }}">{{ $state->name }}</option>
                    @endforeach
                </select>

                <select class="w3-input w3-margin w3-select w3-border w3-half" name="LGOO" required>
                    <option value="" disabled selected>LGA Of Origin</option>
                    @foreach ($LGAs as $LGA)
                        <option class="w3-bordered" value="{{ $LGA->name }}">{{ $LGA->name }}</option>
                    @endforeach
                </select>

                <div>
                    <label><strong>image</strong></label>
                    <img class="size2 w3-padding" id="blah" src="http://placehold.it/180" alt="your image" />
                    <input class="w3-button w3-blue" type='file' onchange="readURL(this);" name="image"/>
                </div>
                <div class="w3-padding">
                    <button class="w3-button w3-block w3-blue w3-large">Submit</button>
                </div>
            </form>
        </div>

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
@endsection
