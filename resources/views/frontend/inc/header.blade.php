
<header class="navigation">
        <nav class="navbar fixed-top navbar-expand-lg nav-bg">
            <div class="container">
            @foreach ($logo as $all_logo)
                <a class="navbar-brand text-white" href="#">
                <td><img src="{{ asset($all_logo->image) }}" alt="EIT" width="50" height="50" class="img-responsive post-image" />
            </td>
                
                </a>
                @endforeach
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navBar">
                    <span class="navbar-text white-text mr-auto gap"></span>
                    <ul class="navbar-nav">
                    @foreach ($menu as $all_menu)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ $all_menu->link }}">{{ $all_menu->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </nav>
    </header>

  