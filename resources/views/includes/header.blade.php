<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mx-auto">
                <li class="nav_item">
                    <a href="/home" class="nav-link">Home</a>
                </li>
                <li class="nav_item">
                    <a href="/resume" class="nav-link">Résumé</a>
                </li>
                <li class="nav_item">
                    <a href="/aboutme" class="nav-link">About Me</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Projects
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/projects">Project List</a>
                        <a class="dropdown-item" href="/stockpredictor" >Stock Predictor</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>