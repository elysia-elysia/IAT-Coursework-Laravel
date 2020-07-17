{{--<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Book Store</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       --}}{{-- <!-- Styles -->
        <style>
            body {
                background: url('https://source.unsplash.com/uu0cOMPdM2g/1920x1080') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
            }
            /*html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }



            .m-b-md {
                margin-bottom: 30px;
            }*/

        </style>--}}{{--
    </head>
    <body>--}}
@extends('layouts.app')
@section('content')


        <div class="row justify-content-center">
            <div class="flex-center position-ref full-height">
                <div class="jumbotron align-items-center text-center">
                    <h1 class="display-4 ">Welcome to Aston Book Store! </h1>
                    <p class="lead">Browse our books. Register or Login to buy them!</p>
                    <hr class="my-4">

                    <a class="btn btn-primary btn-lg" href="{{ url('books') }}" role="button">To The Books!</a>
                </div>
            </div>
        </div>
    </div>

@endsection
