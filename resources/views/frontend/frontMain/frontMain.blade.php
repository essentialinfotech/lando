@extends('frontend.front_master')
@section('content')

<section class="home" id="home">
    <div class="container">
        @foreach($body as $all_section)
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="eit-content">
                    <h1 class="text-white">{{$all_section->heading}}</h1>
                    <p class="text-white">{{$all_section->para1}}
                    </p>
                    <div class="input-group mb-3">

                        <!-- <span class="input-group-text" id="basic-addon2">@example.com</span> -->
                    </div>
                </div>
                <small id="emailHelp" class="form-text text-muted d-block d-md-none ">{{$all_section->para3}}</small>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="home-img">
                            <img src="{{ asset($all_section->image) }}" alt="" style="hight:300px; width:500px;">
                        </div>
            </div>
                </div>
                
            </div>



            <!-- ==== small card === -->
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 small-card">
                            <div class="card sm-card">
                                <h3 class="card-title">
                                    Product design
                                </h3>
                                <p class="card-subtitle">12 projects</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card-content">
                        <p class="text-white  d-sm-none d-md-block">{{$all_section->para2}}</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control email d-none d-md-block" placeholder="Recipient's username"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#">
                                    <i class=" rocket fa fa-rocket d-none d-md-block"></i>
                                </a>
                                <!-- <span class="input-group-text" id="basic-addon2">@example.com</span> -->
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted d-none d-md-block ">{{$all_section->para3}}</small>

                    </div>
                </div>
            </div>
    @endforeach
    </div>
</section>


<!-- ==== small card === -->

<!-- === end home section === -->


<!-- === services section === -->

<section class="services-section" id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 d-sm-none d-md-block">
                <div class="services-img">
                    <img src="{{asset('frontend/resources/img/a.jpg')}}" alt="">
                </div>
                <div class="sercics-cont">
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam soluta
                        eos amet, illo fugiat in autem non rerum iusto culpa odit deleniti ipsa quae esse tempore,
                        distinctio consequatur quas cupiditate.</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg 6">
                <div class="services-head-cont">
                    <h2 class="text-white">we are your best</h2>
                </div>
                <div class="services-img2">
                    <img src="{{asset('frontend/resources/img/a.jpg')}}" alt="">
                </div>
                <div class="sercics-cont d-md-none  d-lg-none  d-md-block">
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam soluta
                        eos amet, illo fugiat in autem non rerum iusto culpa odit deleniti ipsa quae esse tempore,
                        distinctio consequatur quas cupiditate.</p>
                </div>
                <div class="contact-btn">
                    <button class="btn ">Contact</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===  end services section === -->



<!-- === project section === -->
<section class="project-section" id="project">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-5 img-card-box">
                <div class="project-content">
                    <h2 class="text-white">our work process</h2>
                    <p class="text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem hic cupiditate iusto tempore,
                        dolorum eum vitae blanditiis sint aliquid nesciunt voluptas voluptatem aliquam veniam odit
                        sapiente ad a atque voluptate!
                    </p>

                </div>
                <!-- === card img 1=== -->
                <div class="card card-project">
                    <div class="card-header">
                        <div class="float-left">
                            <h4 class="text-white">01</h4>
                        </div>
                        <div class="float-right">
                            <h4 class="text-white">goal</h4>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="{{asset('frontend/resources/img/a.jpg')}}" alt="" class="card-bottom-img">
                    </div>
                </div>

                <!-- === card img 2=== -->
                <div class="card card-project card-project2 ">
                    <div class="card-header">
                        <div class="float-left">
                            <h4 class="text-white">01</h4>
                        </div>
                        <div class="float-right">
                            <h4 class="text-white">goal</h4>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="{{asset('frontend/resources/img/a.jpg')}}" alt="" class="card-bottom-img">
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-7 col-lg-7">
                <!-- === card img 1=== -->
                <div class="card card-project card-project3">
                    <div class="card-header">
                        <div class="float-left">
                            <h4 class="text-white">01</h4>
                        </div>
                        <div class="float-right">
                            <h4 class="text-white">goal</h4>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="{{asset('frontend/resources/img/a.jpg')}}" alt="" class="card-bottom-img">
                    </div>
                </div>

                <!-- === card img 2=== -->
                <div class="card card-project card-project2 ">
                    <div class="card-header">
                        <div class="float-left">
                            <h4 class="text-white">01</h4>
                        </div>
                        <div class="float-right">
                            <h4 class="text-white">goal</h4>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="resources/img/a.jpg" alt="" class="card-bottom-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- === end project section === -->




<!-- === about us section === -->
<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-5">
                <div class="about-cont">
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis commodi
                        excepturi dolorem. Soluta ab voluptate vero eum illum mollitia, deserunt optio magnam
                        numquam ex neque non eaque, iusto, delectus totam.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7 d-sm-none  d-xs-none d-md-block">
                <div class="about-head">
                    <h2 class="text-white">our great team</h2>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- === end about us section === -->
<!-- === team member === -->
<section class="team-member" id="about_us">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 team">
                <div class="team-img">
                    <img src="resources/img/a.jpg" alt="">
                </div>
                <div class="team-des">
                    <h3 class="text-white">Johan</h3>
                    <p class="text-white">Graphics</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 team ">
                <div class="team-img">
                    <img src="resources/img/a.jpg" alt="">
                </div>
                <div class="team-des">
                    <h3 class="text-white">Johan</h3>
                    <p class="text-white">Graphics</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 team">
                <div class="team-img">
                    <img src="resources/img/a.jpg" alt="">
                </div>
                <div class="team-des">
                    <h3 class="text-white">Johan</h3>
                    <p class="text-white">Graphics</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- === end team member === -->

<!-- === join us === -->

<section class="join-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="join-head d-sm-none  d-md-block">
                    <h2 class="text-white">Ready to join us?</h2>
                </div>
                <div class="about-head d-block d-md-none">
                    <h2 class="text-white">our great team</h2>
                </div>

            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="join-cont">
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, sit ea.
                        Dolorum explicabo, veritatis adipisci ipsum reiciendis tempore quaerat dolore repellat modi
                        voluptatem soluta nihil, expedita cumque at, aut velit.</p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection