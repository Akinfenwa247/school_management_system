@extends('admin.layouts.main')

@section('content')
    <header class="w3-container">
        <h5><b><i class="fa fa-dashboard"></i> Student Dashboard</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
            <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>52</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Student</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="icon_group w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>99</h3>
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
                    <h3>50</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Attendance</h4>
            </div>
        </div>
    </div>

    <div class="col-md-6 portlets">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><strong>Calendar</strong></h2>
                <div class="panel-actions">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>

            </div><br><br><br>
            <div class="panel-body">
                <!-- Widget content -->

                <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                <div id='calendar'></div>

            </div>
        </div>

    </div>

    <div class="col-md-6 portlets">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-left">Quick Post</div>
                <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="padd">

                    <div class="form quick-post">
                        <!-- Edit profile form (not working)-->
                        <form class="form-horizontal">
                            <!-- Title -->
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="title">Title</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="title">
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="content">Content</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" id="content"></textarea>
                                </div>
                            </div>
                            <!-- Cateogry -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">Category</label>
                                <div class="col-lg-10">
                                    <select class="form-control">
                                        <option value="">- Choose Cateogry -</option>
                                        <option value="1">General</option>
                                        <option value="2">News</option>
                                        <option value="3">Media</option>
                                        <option value="4">Funny</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Tags -->
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="tags">Tags</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="tags">
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="form-group">
                                <!-- Buttons -->
                                <div class="col-lg-offset-2 col-lg-9">
                                    <button type="submit" class="btn btn-primary">Publish</button>
                                    <button type="submit" class="btn btn-danger">Save Draft</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
                <div class="widget-foot">
                    <!-- Footer goes here -->
                </div>
            </div>
        </div>

    </div>

    </div>
    <!-- project team & activity end -->

    </section>

@endsection