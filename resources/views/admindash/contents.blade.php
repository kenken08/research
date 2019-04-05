@extends('layouts.admin')

@section('contents')
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
            <!--/row-->
            <div class="row ">
                <div class="col-md-8 col-sm-6">
                    <div class="panel panel-border">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="dashboard" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i> Realtime Server Load
                                <small>- Load on the Server</small>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div id="realtimechart" style="height:350px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="panel blue_gradiant_bg">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Server Stats
                                <small class="white-text">- Monthly Report</small>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="sparkline-chart">
                                        <div class="number" id="sparkline_bar"></div>
                                        <h3 class="title">Network</h3>
                                    </div>
                                </div>
                                <div class="margin-bottom-10 visible-sm"></div>
                                <div class="margin-bottom-10 visible-sm"></div>
                                <div class="col-sm-6">
                                    <div class="sparkline-chart">
                                        <div class="number" id="sparkline_line"></div>
                                        <h3 class="title">Load Rate</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN Percentage monitor -->
                    <div class="panel green_gradiante_bg ">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="spinner-six" data-size="16" data-loop="false" data-c="#fff" data-hc="white"></i> Result vs Target
                            </h3>
                        </div>
                        <div class="panel-body nopadmar">
                            <div class="row">
                                <div class="col-sm-6 text-center">
                                    <h4 class="small-heading">Sales</h4>
                                    <span class="chart cir chart-widget-pie widget-easy-pie-1" data-percent="45">
                            <span class="percent">45</span>
                                    </span>
                                </div>
                                <!-- /.col-sm-4 -->
                                <div class="col-sm-6 text-center">
                                    <h4 class="small-heading">Reach</h4>
                                    <span class="chart cir chart-widget-pie widget-easy-pie-3" data-percent="25">
                            <span class="percent">25</span>
                                    </span>
                                </div>
                                <!-- /.col-sm-4 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- END BEGIN Percentage monitor-->
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="panel panel-success panel-border">
                        <div class="panel-heading  border-light">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="calendar" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i> Calendar
                            </h4>
                        </div>
                        <div class="panel-body">
                            <div id='external-events'></div>
                            <div id="calendar"></div>
                            <div class="box-footer pad-5">
                                <a href="#" class="btn btn-success btn-block createevent_btn" data-toggle="modal" data-target="#myModal">Create event
                                </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                <i class="fa fa-plus" style="margin-top: 8px;"></i> Create Event
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group">
                                                <input type="text" id="new-event" class="form-control" placeholder="Event">
                                                <div class="input-group-btn">
                                                    <button type="button" id="color-chooser-btn" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                        Type
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" id="color-chooser">
                                                        <li>
                                                            <a class="palette-primary" href="#">Primary</a>
                                                        </li>
                                                        <li>
                                                            <a class="palette-success" href="#">Success</a>
                                                        </li>
                                                        <li>
                                                            <a class="palette-info" href="#">Info</a>
                                                        </li>
                                                        <li>
                                                            <a class="palette-warning" href="#">warning</a>
                                                        </li>
                                                        <li>
                                                            <a class="palette-danger" href="#">Danger</a>
                                                        </li>
                                                        <li>
                                                            <a class="palette-default" href="#">Default</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /btn-group -->
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">
                                                Close
                                                <i class="fa fa-times" style="margin-top: 4px;"></i>
                                            </button>
                                            <button type="button" class="btn btn-success pull-left" id="add-new-event" data-dismiss="modal">
                                                <i class="fa fa-plus" style="margin-top: 5px;"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- To do list -->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="panel panel-primary todolist">
                        <div class="panel-heading border-light">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white" data-l="true"></i> Tasks
                            </h4>
                        </div>
                        <div class="panel-body nopadmar">
                            <form class="row list_of_items">
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck checkbox-custom">
                                            <input type="checkbox" class="striked large" />
                                        </div>
                                        <div class="todotext todoitem">Meeting with CEO</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Team Out</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Review On Sales</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Meeting with Client</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Analysis on Views</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Seminar on Market</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Business Review</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Purchase Equipment</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Meeting with CEO</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck">
                                            <input type="checkbox" class="striked" />
                                        </div>
                                        <div class="todotext todoitem">Takeover Leads</div>
                                        <span class="label label-default">2016-07-27</span>
                                    </div>
                                    <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                        <a href="#" class="todoedit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <span class="striks">|</span>
                                        <a href="#" class="tododelete redcolor">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <div class="todolist_list adds">
                                <form role="form" id="main_input_box" class="form-inline">
                                    <div class="form-group">
                                        <label class="sr-only" for="custom_textbox">Add Task</label>
                                        <input id="custom_textbox" name="Item" type="text" required placeholder="Add list item here" class="form-control" />
                                    </div>
                                    <div class="form-group is-empty date_pick">
                                        <label class="sr-only" for="task_deadline">Datepicker</label>
                                        <input class="form-control datepicker" placeholder='Dead line' id="task_deadline" data-date-format="YYYY/MM/DD" required="required" name="task_deadline" type="text">
                                    </div>
                                    <input type="submit" value="Add Task" class="btn btn-primary add_button" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row ">
                <div class="col-md-4 col-sm-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading border-light">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="mail" data-size="18" data-color="white" data-hc="white" data-l="true"></i> Quick Mail
                            </h4>
                        </div>
                        <div class="panel-body no-padding">
                            <div class="compose row">
                                <label class="col-md-3 hidden-xs">To:</label>
                                <input type="text" class="col-md-9 col-xs-9" placeholder="name@email.com " tabindex="1" />
                                <div class="clear"></div>
                                <label class="col-md-3 hidden-xs">Subject:</label>
                                <input type="text" class="col-md-9 col-xs-9" tabindex="1" placeholder="Subject" />
                                <div class="clear"></div>
                                <div class='box-body'>
                                    <form>
                                        <textarea class="textarea textarea_home resize_vertical" placeholder="Write mail content here"></textarea>
                                    </form>
                                </div>
                                <br />
                                <div class="pull-right">
                                    <a href="#" class="btn btn-danger">Send</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="panel panel-border">
                        <div class="panel-heading">
                            <h4 class="panel-title pull-left visitor">
                                <i class="livicon" data-name="map" data-size="16" data-loop="true" data-c="#515763" data-hc="#515763"></i> Visitors Map
                            </h4>
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <i class="livicon" data-name="settings" data-size="16" data-loop="true" data-c="#515763" data-hc="#515763"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="panel-collapse collapses" href="#">
                                            <i class="fa fa-angle-up"></i>
                                            <span>Collapse</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="panel-refresh" href="#">
                                            <i class="fa fa-refresh"></i>
                                            <span>Refresh</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="panel-config" href="#panel-config" data-toggle="modal">
                                            <i class="fa fa-wrench"></i>
                                            <span>Configurations</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="panel-expand" href="#">
                                            <i class="fa fa-expand"></i>
                                            <span>Fullscreen</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body nopadmar">
                            <div id="world-map-markers" style="width:100%; height:300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    <!-- right-side -->
</div>  

@endsection