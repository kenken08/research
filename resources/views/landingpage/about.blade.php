@extends('layouts.app')
@section('css')
@include('landingpage.maincss')
@endsection
@section('contents')
<div class="container">
        <!-- Heading Section Start -->
        <div class="row">
            <h2>About Us</h2>
        </div>
</div>
<div class="container" style="margin-bottom:100px">
<div class="row">
        <div class="col-md-8">
            <blockquote>
                <h3 class="warning">Research</h3>
                <p>The University Research Unit is one of the major pillars of CMU. Research is one of the four main functions of the university, 
                    together with instruction, extension, and production. As stated in Section 2 of Republic Act No. 4498 issued on 19 June 1965, 
                    CMU shall “provide programs of instruction at all levels in the arts, sciences, technical, professional, educational, 
                    and philosophical fields, and shall concern itself with pure and applied research in all branches of knowledge for 
                    the intellectual and professional growth of faculty members, for the advance instruction of students, particularly 
                    graduate students, and for increasing knowledge and understanding”.
                </p>
            </blockquote>
        </div>
        <div class="side hidden-xs col-sm-5 col-md-4">
                <div class="card text-center border-success" style="margin-top:10px; margin-bottom:10px">
                    <div class="box">
                        <div class="text-center">
                            <img src="/images/cmu.png" class="img img-circle" style="width: 110px; height: 110px; margin-top:-50px">
                        </div>
                        <div class="card-body text-center">
                            <h6>Central Mindanao University</h6>
                            <h4>Research Office</h4>
                        </div>
                    </div>
                </div>
        </div>

    </div>
        
                <!-- Responsive Section Start -->
            <div class="col-sm-6 col-md-6">
                <div class="box">
                        <h3 class="success text-center">Goals</h3>
                           <p> • Harness and develop its human resources;</p>
                           <p> • Conduct periodic evaluation of the researches of the faculty;</p>
                           <p> • Improve laboratory and office research facilities in order to produce quality research;</p>
                           <p> • Establish and maintain linkages with other government and non-government institutions locally and internationally; and</p>
                           <p> • Conduct relevant basic and applied researches to answer the needs of the community in the region or of the entire Mindanao.</p>
                        <p>
                                The University Research Unit consists of the following: the Research Office, the University Museum and the Mt. Musuan Zoological and Botanical Garden (MMZBG).
                        </p>
                  
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                    <div class="box">
                            <h3 class="success text-center">Objectives</h3>
                               <p> The Central Mindanao University shall undertake integrated research and extension programs on:</p>
                               <p> • Crops and livestock/poultry development, production, processing, marketing, packaging and technology promotion and socio-economics;</p>
                               <p> • Natural products, bio-cultural biodiversity, communication, local, history, gender issues, governance and basic sciences;</p>
                               <p> • Teacher education, business arts and basic sciences;</p>
                               <p> • Locally appropriate engineering technologies and information systems;</p>
                               <p> • Environmental management, watershed rehabilitation, and forest products utilization technologies;</p>
                               <p> • Nutrition and dietetics, food science and technology, H.E. education, clothing and textile and its related crafts;</p>
                               <p> • Biodiversity conservation;</p>
                               <p> • Small ruminants (goat);</p>
                               <p> • Climate change</p>
                    </div>
</div>
@endsection
@section('scripts')
@include('landingpage.mainscript')
@endsection