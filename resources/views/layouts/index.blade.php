<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Nook\'s Workbench - AC v1.2.0')</title>
    <script src="https://code.jquery.com/jquery-3.5.0.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/pagination.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mobile.css') }}" />

    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ secure_asset('favicon.png') }}">
    <meta name="theme-color" content="#212121">
    <meta name="description" content="Information about all of your favourite crafting recipes."/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163890400-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-163890400-1');
    </script>
</head>

<body>
    <nav class="mb-2 navbar navbar-light bg-pgreen">
        <div class="input-group mt-2 ">
            <a href="/"><div class="logo-btn mr-3"><img src="{{ secure_asset('/img/i/misc/tom.png') }}" alt="tom"/></div></a>
            <input id="search" type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="search-addon">
            <div class="input-group-append">
                <span class="input-group-text btn-info" id="search-addon"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
            </div>
        </div>

        <div class="mt-3 mb-2 mr-2">
            <button id="item-search" class="btn btn-nook mb-1" type="submit" name="item" formaction="/recipe/">Search by Item</button>
            <button id="material-search" class="btn btn-nook mb-1" type="submit" name="material" formaction="/material/">Search by Material</button>
            <button id="tag-search" class="btn btn-nook mb-1" type="submit" name="tag" formaction="/tag/">Search by Tag</button>
            <button id="nav-category" class="btn btn-nook-secondary mb-1 dropdown-toggle" type="button" data-toggle="dropdown">Categories</button>
            <button id="nav-tag" class="btn btn-nook-secondary mb-1 dropdown-toggle" type="button" data-toggle="dropdown">Tags</button>
            <button id="nav-source" class="btn btn-nook-secondary mb-1 dropdown-toggle" type="button" data-toggle="dropdown">Sources</button>

            <div id="extended-nav-container">
                <div id="nav-extended-category">
                    @foreach($categories as $category)
                        @if($category->category)
                            <button class="btn-sm btn-info mb-1" onclick='window.location="/category/{{ strtolower($category->category) }}"'>{{ $category->category }}</button>
                        @endif
                    @endforeach
                </div>

                <div id="nav-extended-tag">
                    @foreach($tags as $tag)
                        @if($tag->tag)
                            <button class="btn-sm btn-info mb-1" onclick='window.location="/tag/{{ strtolower($tag->tag) }}"'>{{ $tag->tag }}</button>
                        @endif
                    @endforeach
                </div>

                <div id="nav-extended-source">
                    @foreach($sources as $source)
                        @if($source->sources)
                            <button class="btn-sm btn-info mb-1" onclick='window.location="/source/{{ strtolower($source->sources) }}"'>{{ $source->sources }}</button>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </nav>


    @yield('content')

    <footer class="footer bg-pgreen pt-4">
        <div class="container-fluid text-center bg-pgreen">
            <div class="row text-center">
                <div class="w-100">
                    <p>
                        <a href="https://github.com/BasketBandit" rel="noreferrer"><img class="social-btn" src="{{ secure_asset('/img/i/social/github.png') }}" alt="github"/></a>
                        <a href="https://www.linkedin.com/in/jmh79/" rel="noreferrer"><img class="social-btn" src="{{ secure_asset('/img/i/social/linkedin.png') }}" alt="linkedin"/></a>
                        <a href="https://discord.gg/4Tx6G3p"><img class="social-btn lazyload" src="{{ secure_asset('/img/i/social/discord.png') }}" alt="discord"/></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center py-3 bg-pgreen">
            <p>Nooksworkbench is a fan-made website and is in no way affiliated with Nintendo.</p>
            Created by <a href="https://github.com/BasketBandit" target="_blank"><u>Joshua Hunt</u></a> |
            <a href="https://docs.google.com/spreadsheets/d/13d_LAJPlxMa_DubPTuirkIV4DERBMXbrWQsmSh8ReK4" target="_blank">Data Source</a>
        </div>
    </footer>

    <script src="{{ url('/js/search.js') }}" type="text/javascript"></script>
</body>

</html>
