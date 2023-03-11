<!-- component -->
<!--
Change class "fixed" to "sticky" in "navbar" (l. 33) so the navbar doesn't hide any of your page content!
-->

<style>
    ul.breadcrumb li+li::before {
        content: "\276F";
        padding-left: 8px;
        padding-right: 4px;
        color: inherit;
    }

    ul.breadcrumb li span {
        opacity: 60%;
    }

    #sidebar {
        -webkit-transition: all 300ms cubic-bezier(0, 0.77, 0.58, 1);
        transition: all 300ms cubic-bezier(0, 0.77, 0.58, 1);
    }

    #sidebar.show {
        transform: translateX(0);
    }

    #sidebar ul li a.active {
        background: #98CCD3;
        background-color: #98CCD3;
    }
</style>

<!-- Navbar start -->
<nav id="navbar" class="fixed top-0 z-40 flex w-full flex-row justify-center bg-cyan-600 pl-4 sm:justify-between">
    <button id="btnSidebarToggler" type="button" class="py-4 text-2xl text-white hover:text-gray-200">
        <svg id="navClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="h-9 w-9">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="hidden h-9 w-9">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
        <a href="{{ route('dashboard') }}">
            <img src="{{asset('/storage/logo.svg')}}" class="sm:w-64 sm:h-24 m-2 w-48 h-28" alt="logo" />
        </a>
    </div>
    @guest
        <div class="grid mx-2 md:flex">
            <a href="{{route('login')}}" class="btn bg-teal-500 border-none hover:bg-teal-400 text-white sm:mx-3 place-self-center sm:text-sm text-xs">Iniciar Sesión</a>
            <a href="{{route('register')}}" class="btn bg-blue-500 border-none hover:bg-blue-400 text-white sm:mx-3 place-self-center sm:text-sm text-xs">Registrate</a>
        </div> 
    @endguest 
    @auth
    <div class="grid grid-cols-2 justify-items-center">
        @if(Auth::user()->roles_id == 1)
            <div class="my-7">
                <a href="{{route('admin.index')}}" class="btn bg-blue-500 border-none hover:bg-blue-400 text-white place-self-center sm:text-sm text-xs">Panel <br>Administrativo</a>
            </div>
        @endif  
        <div>
            <a href="{{route('profile.edit')}}" class="btn my-1 bg-teal-500 border-none hover:bg-teal-400 text-white place-self-center sm:text-sm text-xs">Editar Perfil</a>
            
            <div class="flex justify-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn text-center bg-red-400 hover:bg-red-500">
                        <p class="text-white">Salir</p>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth


    
</nav>
<!-- Navbar end -->

<!-- Sidebar start-->
<div id="containerSidebar" class="z-0">
    <div class="navbar-menu relative z-10">
        <nav id="sidebar"
            class="fixed left-0 bottom-0 flex w-3/4 -translate-x-full flex-col overflow-y-auto bg-cyan-600 pt-6 pb-8 sm:max-w-xs lg:w-80">
            <!-- one category / navigation group -->
            <div class="px-4 pb-4">
                <h3 class="mb-2 text-xs font-medium uppercase text-gray-200">
                    Eventos
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#homepage">
                            <span class="select-none">Próximos Partidos</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Tabla de Posiciones</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Campeonatos</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- navigation group end-->

            <!-- example copies start -->
            <div class="px-4 pb-4">
                <h3 class="mb-2 text-xs font-medium uppercase text-gray-200">
                    Información
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="{{ asset("teams") }}">
                            <span class="select-none">Equipos</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#privacy">
                            <span class="select-none">Jugadores</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-4 pb-4">
                <h3 class="mb-2 text-xs font-medium uppercase text-gray-200">
                    Otros
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#ex1">
                            <span class="select-none">Tienda</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#ex2">
                            <span class="select-none">Cursos</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-4 pb-4">
                <h3 class="mb-2 text-xs font-medium uppercase text-gray-200">
                    Redes Sociales
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#ex1">
                            <span class="select-none">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#ex2">
                            <span class="select-none">Instagram</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#ex2">
                            <span class="select-none">YouTube</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#ex2">
                            <span class="select-none">Nosotros</span>
                        </a>
                    </li>
                </ul>
            </div>


            <!-- example copies end -->
        </nav>
    </div>
    <div class="mx-auto lg:ml-80"></div>
</div>
<!-- Sidebar end -->

<main>
    <!-- your content goes here -->
</main>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
        const navbar = document.getElementById("navbar");
        const sidebar = document.getElementById("sidebar");
        const btnSidebarToggler = document.getElementById("btnSidebarToggler");
        const navClosed = document.getElementById("navClosed");
        const navOpen = document.getElementById("navOpen");

        btnSidebarToggler.addEventListener("click", (e) => {
            e.preventDefault();
            sidebar.classList.toggle("show");
            navClosed.classList.toggle("hidden");
            navOpen.classList.toggle("hidden");
        });

        sidebar.style.top = parseInt(navbar.clientHeight) - 1 + "px";
    });
</script>