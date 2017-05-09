<nav class={{config('app.corSite')}}>
  <div class="nav-wrapper container">
    <a href="/minhas-disciplinas" class="brand-logo">{{config('app.logoSite')}}</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <!-- <li><a href="#">Empresa</a></li>
      <li><a href="#">Contato</a></li> -->
      @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Entrar</a></li>
          <li><a href="{{ url('/register') }}">Cadastro</a></li>
      @else
        <li><a href="/minhas-disciplinas">{{ Auth::user()->name }}</a></li></li>
        <li>
            <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Sair
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

      @endif
    </ul>
  </div>
</nav>
