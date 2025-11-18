<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand">Painel Admin</span>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link" style="display: inline; padding: 0;">
                            Sair
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>
