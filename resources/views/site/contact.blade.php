@extends('layouts.layout')
@section('content')
 <!-- Page Title -->
        <section class="flat-spacing-2 pb-0">
            <div class="container">
                <div class="page-title">
                    <div class="breadcrumbs">
                        <ul class="bread-wrap">

                            <li><a href="{{route('homepage')}}" class="text-main-4 link">{{__('main.home')}}</a></li>
                            <li class="br-line w-12 bg-main"></li>
                            <li>{{__('main.contactUs')}}</li>
                        </ul>
                        <h1 class="heading fw-normal text-uppercase">
                            {{__('main.contactUs')}}

                        </h1>
                    </div>
                    <div class="box-text">
                        <p class="text-main-4">

                            {{__('main.contactText')}}

                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Contact Us -->
        <section class="s-contact-us flat-spacing-6">
            <!-- Map -->
            <div class="wg-map d-flex">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7880.148272329334!2d151.20657421407668!3d-33.858885268389294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae682c546039%3A0x16da940d587922a1!2sCircular%20Quay!5e0!3m2!1sen!2s!4v1745205798630!5m2!1sen!2s"
                    width="100%" height="461" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- /Map -->

            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 offset-xxl-1 col-lg-6">
                        <div class="left-col mb-lg-0">

                            <h3 class="title fw-normal">{{__('main.VisitOurStore')}}</h3>
                            <ul class="store-info-list">
                                <li>
                                    <p class="caption">{{__('main.address')}}:</p>

                                    <a href="https://www.google.com/maps?q=15+Geogre+st,Sydney,NSW+2000,Australia" class="link text-main-4"
                                        target="_blank">15 Geogre st, Sydney, NSW 2000, Australia</a>
                                </li>
                                <li>
                                    <p class="caption">Email:</p>
                                    <a href="mailto:store@vemus.com" class="link text-main-4">
                                        Store@vemus.com
                                    </a>
                                </li>
                                <li>

                                    <p class="caption">{{__('main.phone')}}:</p>

                                    <a href="tel:6434528540" class="link text-main-4">
                                        +64 3452 8540
                                    </a>
                                </li>
                                <li>

                                    <p class="caption">{{__('main.openingHour')}}:</p>

                                    <p class="text-main-4">
                                        Mon - Fri: 8am to 4.30pm GST <br>
                                        Sat: 9am to 3pm GST <br>
                                        Sun: Close
                                    </p>
                                </li>
                            </ul>
                            <ul class="tf-social-icon">
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank" class="social-facebook">
                                        <span class="icon"><i class="icon-facebook"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank" class="social-instagram">
                                        <span class="icon"><i class="icon-instagram"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://x.com/" target="_blank" class="social-x">
                                        <span class="icon"><i class="icon-x"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.snapchat.com/" target="_blank" class="social-snapchat">
                                        <span class="icon"><i class="icon-snapchat"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="right-col">

                            <h3 class="title fw-normal">{{__('main.GetInTouch')}}</h3>
                            <p class="sub-title text-main-4">
                                {{__('main.GetInTouchText')}}

                            </p>
                            <form class="form-contact style-border">
                                <div class="form-content">
                                    <div class="cols tf-grid-layout sm-col-2">
                                        <fieldset>

                                            <input id="name" type="text" placeholder="{{__('main.name')}} *" required>

                                        </fieldset>
                                        <fieldset>
                                            <input id="email" type="email" placeholder="Email *" required>
                                        </fieldset>
                                    </div>

                                    <textarea id="desc" placeholder="{{__('main.message')}}" style="height: 229px;" required></textarea>
                                </div>
                                <div class="form_message text-center"></div>
                                <button type="submit" class="tf-btn btn-fill animate-btn w-100">
                                    {{__('main.send')}}

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Contact Us -->
@endsection

@section('mainJs')

@endsection