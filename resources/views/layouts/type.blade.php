@if($value == "movies")
    <link rel="stylesheet" href="{{asset('css/plyr.css')}}">
    <video poster="{{asset('storage/main-files/movie/Night at the museum/WlJCzVPqgIrHLCaUE7szGsO7k98hFLfbxa2utecG.jpeg')}}" id="moviePlayer" playsinline controls>
        <source src="{{asset('storage/main-files/movie/Night at the museum/A2lZBoEM2EhDkkpPp31W4L6LW7jP982bE1i8Hh8C.mp4')}}" type="video/mp4" />
    </video>

    <script src="{{asset('js/plyr.min.js')}}"></script>
    <script>
        const player = new Plyr('#moviePlayer',{});
    </script>
@elseif($value == 'series')

@elseif($value == 'anime')

@elseif($value == 'music')

@elseif($value == 'game')

@elseif($value == 'program')

@endif