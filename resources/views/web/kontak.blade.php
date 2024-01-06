@extends('layouts.web')

@section('title', 'Kontak')

@section('content')
    <div class="page-header" style="background: url({{ asset('') }}web/{{ asset('') }}web/assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Kontak</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('index') }}">Home /</a></li>
                            <li class="current">Kontak</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="google-map-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <object style="border:0; height: 450px; width: 100%;"
                        data="https://www.google.com/maps/d/embed?mid=10L-fLvHwkG0iN7hAxA1B1pvQelQ&hl=en_US&ehbc=2E312F"></object>
                </div>
            </div>
        </div>
    </section>

    <section id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">

                    <form id="contactForm" class="contact-form" data-toggle="validator">
                        <h2 class="contact-title">
                            Hubungi Kami
                        </h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="Email"
                                                required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="msg_subject" name="subject"
                                                placeholder="Subject" required data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Massage" rows="7" data-error="Write your message" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" id="submit" class="btn btn-common">Submit Now</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="information mb-4">
                        <h3>Alamat</h3>
                        <div class="contact-datails">
                            <p>Gedung Graha Edhi Praja Lt.4 Jl. Jendral Sudirman No. 02, Ramanuju, Kec. Purwakarta, Kota
                                Cilegon, Banten 42431</p>
                        </div>
                    </div>
                    <div class="information">
                        <h3>Info Kontak</h3>
                        <div class="contact-datails">
                            <ul class="list-unstyled info">
                                <li><span>Email : </span>
                                    <p>
                                        <a href="#">
                                            <span class="__cf_email__"
                                                data-cfemail="c0b3b5b0b0afb2b480ada1a9aceea3afad">disperindag.cilegon@cilegon.go.id</span>
                                        </a>
                                    </p>
                                </li>
                                <li><span>Telepon : </span>
                                    <p>0878-0823-8747</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
