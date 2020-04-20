<nav class="navbar flex-md-nowrap pt-2 pr-0">
    <input class="form-control form-control" type="text"
           placeholder="Search for movie, series, games and programs" aria-label="Search">
    <div class="pl-3" style="display: flex;">
                        <span class=" text-nowrap pr-2">

                            @auth
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">@csrf</form>

                                <a class="btn btn-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="fas fa-door-closed"></i>Logout</a>
                            @endauth

                            @guest
                                <a class="btn btn-primary" href="{{ route('login') }}"><i class="fas fa-door-open"></i> Login Solar Club</a>
                            @endguest

                        </span>
        <span class=" text-nowrap">
                            <button class="btn btn-light" id="lightMode"><i class="fas fa-lightbulb"></i> Light</button>
                        </span>
    </div>
</nav>