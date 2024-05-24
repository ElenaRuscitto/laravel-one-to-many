<nav class="navbar navbar-expand-lg my-navbar fixed-top ">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('admin.home')}}">Home Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}" target="_blank">Vai al Sito</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('project.projects.index')}}">Vedi i Progetti</a>
          </li> --}}

        </ul>
      </div>
      {{-- dx --}}
      <div class="d-flex">

        <p class="pt-2">{{Auth::user()->name}}</p>

        <form
            action="{{ route('logout') }}"
            method="POST">
            @csrf
            <button type="submit" class="btn btn-light ms-3">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </form>
     </div>
    </div>
  </nav>

