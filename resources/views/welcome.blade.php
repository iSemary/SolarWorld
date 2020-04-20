@extends('layouts.app')

@section('stylesheets')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        main.usermain {
            background-image: linear-gradient(1deg, #3F51B5 0%, #380036 74%);
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .footer-bs {
            padding: 30px 0px 0 0px;
            background-color: transparent !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.aside')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 usermain">
                @include('layouts.header')
                <div class="pt-3 pb-2 mb-3">
                    @include('layouts.main')
                    @include('layouts.footer')
                </div>
            </main>
        </div>
    </div>
    <div id="slickInfo" style="display: none">@if(isset($value)){{$types::count()}}@endif</div>
@endsection('content')
@section('scripts')
    <script>
        $(document).ready(function () {
            let filesCount = $('#slickInfo').text();
            if(filesCount > 6){
                filesCount = 6;
            }
            $('#randomType , #latestType').slick({
                infinite: true,
                speed: 300,
                slidesToShow: filesCount,
                slidesToScroll:1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.type-other-things #OtherTypeImg').hover(
                function() {

                    $(this).css({
                        'filter': 'brightness(0.2)'
                    });
                    $(this).next('.type-other-info-plus').css({
                     'position': 'absolute',
                    'top': '109px',
                    'right': '5px',
                    });
                    $(this).next('.type-other-info-plus').find('.type-other-quality').css({
                        'background-color':'#2a752d',
                        'top': '42px'
                    });
                },function() {
                    $(this).css({
                        'filter': 'brightness(1)'
                    });
                    $(this).next('.type-other-info-plus').css({
                        'position': '',
                        'top': '',
                        'bottom':'',
                        'right': '',
                    });
                    $(this).next('.type-other-info-plus').find('.type-other-quality').css({
                        'background-color':'#d20000',
                        'top': '10px'
                    });
                }
            );
        });
    </script>
@endsection
