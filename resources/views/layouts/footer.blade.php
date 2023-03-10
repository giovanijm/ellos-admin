{{-- <footer class="footer px-4 py-6 hidden lg:block">
    <div class="footer-content">
        <p class="text-sm text-gray-600 text-center">© Sistema Ellos Tecnologia. Todos os direitos reservados. <a href="https://sistemaellos.com.br" target="blanck">by GJM</a></p>
    </div>
</footer> --}}


<footer class="footer p-6 bg-white border-t border-gray-200 shadow xl:flex items-center justify-between hidden">
    <div class="inline-flex items-center">
        <span>
            <img class="mr-2 w-8" src="{{getUrlImageServidor('802f9a82-0015-43c4-0ab9-2da5d868cd00')}}"/>
        </span>
        <span class="text-sm text-left text-gray-500">
            © 2023 <a href="https://sistemaellos.com.br" class="hover:underline">Ellos Tecnologia™ by GJM</a>.<br/>
            Todos os direitos reservados.
        </span>
    </div>
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 sm:mt-0 mr-24">
        <li>
            <a href="#" class="mr-6 hover:underline" data-drawer-target="drawer-right-sobre" data-drawer-show="drawer-right-sobre" data-drawer-placement="right" aria-controls="drawer-right-sobre">Sobre</a>
        </li>
        <li>
            <a href="#" class="mr-6 hover:underline" data-drawer-target="drawer-right-privacidade" data-drawer-show="drawer-right-privacidade" data-drawer-placement="right" aria-controls="drawer-right-privacidade">Política de Privacidade</a>
        </li>
        <li>
            <a href="#" class="mr-6 hover:underline" data-drawer-target="drawer-right-licenciamento" data-drawer-show="drawer-right-licenciamento" data-drawer-placement="right" aria-controls="drawer-right-licenciamento">Licenciamento</a>
        </li>
        <li>
            <a href="#" class="hover:underline" data-drawer-target="drawer-right-contato" data-drawer-show="drawer-right-contato" data-drawer-placement="right" aria-controls="drawer-right-contato">Contato</a>
        </li>
    </ul>

    @include('admin._partials.sobre')
    @include('admin._partials.politica-privacidade')
    @include('admin._partials.licenciamento')
    @include('admin._partials.contato')
</footer>
