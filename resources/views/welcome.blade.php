@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container px-0">
            <h1 class="pt-3 text-center">
                Welcome to Deliverboo!
            </h1>
            <p class="text-center fs-3">
                The premier food delivery service in the Eternal City. Partner with us to expand your
                restaurant's reach and delight customers across Rome with your delicious dishes.
            </p>

            <div class="row py-5">
                <div class="col align-self-center">
                    <h3 class="pb-2">
                        Why Partner with Deliverboo?
                    </h3>
                    <ul class="list-unstyled">
                        <li>
                            <strong class="text-info">
                                Expand Your Reach:
                            </strong>
                            <br>
                            Connect with thousands of hungry customers in Rome.
                        </li>
                        <li>
                            <strong class="text-info">
                                Boost Your Sales:
                            </strong>
                            <br>
                            Increase your revenue with online orders and delivery services.
                        </li>
                        <li>
                            <strong class="text-info">
                                User-Friendly Interface:
                            </strong>
                            <br>
                            Easily manage your menu, orders, and promotions.
                        </li>
                        <li>
                            <strong class="text-info">
                                Marketing Support:
                            </strong>
                            <br>
                            Benefit from exclusive marketing campaigns and promotions.
                        </li>
                    </ul>
                </div>
                <!-- /.col -->
                <div class="col">
                    <img src="{{ url('/img/deliverboo-3.jpg') }}" alt="" class="img_shadow">
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row py-5">
                <div class="col">
                    <img src="{{ url('/img/deliverboo-4.jpg') }}" alt="" class="img_shadow">
                </div>
                <!-- /.col -->
                <div class="col align-self-center pl-5">
                    <h3>
                        How It Works
                    </h3>
                    <ul class="list-unstyled">
                        <li>
                            <strong class="text-info">
                                Sign Up:
                            </strong>
                            <br>
                            Register your restaurant and create an account.
                        </li>
                        <li>
                            <strong class="text-info">
                                List Your Menu:
                            </strong>
                            <br>
                            Upload your dishes, customize your menu, and set prices.
                        </li>
                        <li>
                            <strong class="text-info">
                                Receive Orders:
                            </strong>
                            <br>
                            Get notified of new orders and prepare them for delivery.
                        </li>
                        <li>
                            <strong class="text-info">
                                Track Performance:
                            </strong>
                            <br>
                            Monitor your sales and customer feedback in real-time.
                        </li>
                    </ul>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="container-sm">

                <h3 class="text-center">
                    Join the Deliverboo Community
                </h3>

                <div class="row">
                    <div class="col">
                        <h5>
                            Sign up today and become part of the Deliverboo network.
                        </h5>
                    </div>
                    <!-- /.col -->
                    <div class="col bg-primary rounded">
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col bg-primary rounded"></div>
                    <!-- /.col -->
                    <div class="col">
                        <h5>
                            Gain access to a larger customer base and watch your business grow.
                        </h5>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col">
                        <h5>
                            Our team is here to support you every step of the way.
                        </h5>
                    </div>
                    <!-- /.col -->
                    <div class="col bg-primary rounded"></div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-sm -->

            <h3>
                Get Started
            </h3>
            <p>
                Ready to take your restaurant to the next level? Click the button below to register and start showcasing
                your delicious dishes on Deliverboo!
                <a href="" class="text-decoration-none text-primary">Register now</a>
            </p>
            <h5 class="text-center py-5">
                Thank you for choosing Deliverboo. Let's create unforgettable dining experiences together!
            </h5>
        </div>
    </div>
    <!-- /.container -->
@endsection
