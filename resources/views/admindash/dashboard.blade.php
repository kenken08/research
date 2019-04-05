@extends('layouts.admin')

@section('contents')
<aside class="right-side">
    {{-- <div class="alert alert-success alert-dismissable margin5">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success:</strong> You have successfully logged in.
    </div> --}}
    <!-- Main content -->
    <section class="content-header">
        <h1>Welcome to Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/dashboard">
                    <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                    <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <h4><span>Registered Students</span></h4>
                                    <div class="number" id="myTargetElement1">{{\App\User::where('role',1)->count()}}</div>
                                </div>
                                <i class="livicon  pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                    <!-- Trans label pie charts strats here-->
                <div class="goldbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <h4><span>Pending Proposals</span></h4>
                                    <div class="number" id="myTargetElement1">{{\App\research_papers::where('proposal_status','pending')->count()}}</div>
                                </div>
                                <i class="livicon  pull-right" data-name="list" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                    <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <h4><span>Needs Revision</span></h4>
                                    <div class="number" id="myTargetElement1">{{\App\research_papers::where('proposal_status','needs revision')->count()}}</div>
                                </div>
                                <i class="livicon  pull-right" data-name="edit" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic charts strats here-->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> Registered Users per College
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <canvas id="doughnut-chart" width="800" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                    <!-- Basic charts strats here-->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="piechart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Manuscripts per College
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <canvas id="chart-area" width="800" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>
@endsection
<script type="text/javascript" src="/js/Chart.bundle.js"></script>
<script type="text/javascript" src="/js/utils.js"></script>
<script>
    var coe = function() {
            return parseInt({{count($users->where('collegeid',1))}});
        };
    var coed = function() {
            return parseInt({{count($users->where('collegeid',2))}});
        };
    var coa = function() {
            return parseInt({{count($users->where('collegeid',3))}});
        };
    var coh = function() {
            return parseInt({{count($users->where('collegeid',4))}});
        };
    var coaas = function() {
            return parseInt({{count($users->where('collegeid',5))}});
        };
    var con = function() {
            return parseInt({{count($users->where('collegeid',6))}});
        };
    var cov = function() {
            return parseInt({{count($users->where('collegeid',7))}});
        };
    var cof = function() {
        return parseInt({{count($users->where('collegeid',8))}});
    };
    var cob = function() {
            return parseInt({{count($users->where('collegeid',9))}});
        };
    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    coe(),
                    coed(),
                    coa(),
                    coh(),
                    coaas(),
                    con(),
                    cov(),
                    cof(),
                    cob(),
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    '#4b6584',
                    '#26de81',
                    '#a5b1c2',
    
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'College of Engineering'+ ' ' + coe(),
                'College of Education'+ ' ' + coed(),
                'College of Agriculture'+ ' ' + coa(),
                'College of Human Ecology'+ ' ' + coh(),
                'College of Arts and Sciences'+ ' ' + coaas(),
                'College of Nursing'+ ' ' + con(),
                'College of Veterinary Medicine'+ ' ' + cov(),
                'College of Environmental Science and Forestry'+ ' ' + cof(),
                'College of Business and Management'+ ' '+ cob(),
                
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Registered Users per College'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };
</script>
<script>
    var coemanu = function() {
            return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',1))}});
        };
    var coedmanu = function() {
            return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',2))}});
        };
    var coamanu = function() {
            return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',3))}});
        };
    var cohmanu = function() {
            return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',4))}});
        };
    var coaasmanu = function() {
            return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',5))}});
        };
    var conmanu = function() {
            return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',6))}});
        };
    var covmanu = function() {
            return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',7))}});
        };
    var cofmanu = function() {
        return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',8))}});
    };
    var cobmanu = function() {
            return parseInt({{count($manus->where('manuscript','!=',null)->where('collegeid',9))}});
        };
    var configs = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    coemanu(),
                    coedmanu(),
                    coamanu(),
                    cohmanu(),
                    coaasmanu(),
                    conmanu(),
                    covmanu(),
                    cofmanu(),
                    cobmanu(),
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    '#4b6584',
                    '#26de81',
                    '#a5b1c2',
    
                ],
                label: 'Dataset 2'
            }],
            labels: [
                'College of Engineering'+' '+coemanu(),
                'College of Education'+' '+coedmanu(),
                'College of Agriculture'+' '+coamanu(),
                'College of Human Ecology'+' '+cohmanu(),
                'College of Arts and Sciences'+' '+coaasmanu(),
                'College of Nursing'+' '+conmanu(),
                'College of Veterinary Medicine'+' '+covmanu(),
                'College of Environmental Science and Forestry'+' '+cofmanu(),
                'College of Business and Management'+' '+cobmanu(),
                
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Manuscripts per College'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };
</script>
<script>
    window.onload = function() {
        var ctx = document.getElementById('doughnut-chart').getContext('2d');
        window.myDoughnut = new Chart(ctx, config);

        var ct = document.getElementById('chart-area').getContext('2d');
        window.myManus = new Chart(ct, configs);
    };
</script>
