<footer class="ellos-footer">
    <div class="ellos-footer-left">
        <span>
            <img class="mr-2 w-8" src="{{getUrlImageServidor('802f9a82-0015-43c4-0ab9-2da5d868cd00')}}"/>
        </span>
        <span>
            © 2023 <a href="https://sistemaellos.com.br" class="ellos-footer-link">Ellos Tecnologia™ by GJM</a>.<br/>
            Todos os direitos reservados.
        </span>
    </div>
    <ul class="ellos-footer-right">
        <li>
            <a href="#"
                class="mr-6 ellos-footer-link"
                data-drawer-target="drawer-right-sobre"
                data-drawer-show="drawer-right-sobre"
                data-drawer-placement="right"
                aria-controls="drawer-right-sobre"
            >
                Sobre
            </a>
        </li>
        <li>
            <a href="#"
                class="mr-6 ellos-footer-link"
                data-drawer-target="drawer-right-privacidade"
                data-drawer-show="drawer-right-privacidade"
                data-drawer-placement="right"
                aria-controls="drawer-right-privacidade"
            >
                Política de Privacidade
            </a>
        </li>
        <li>
            <a href="#"
                class="mr-6 ellos-footer-link"
                data-drawer-target="drawer-right-licenciamento"
                data-drawer-show="drawer-right-licenciamento"
                data-drawer-placement="right"
                aria-controls="drawer-right-licenciamento"
            >
                Licenciamento
            </a>
        </li>
        <li>
            <a href="#"
                class="mr-6 ellos-footer-link"
                data-drawer-target="drawer-right-contato"
                data-drawer-show="drawer-right-contato"
                data-drawer-placement="right"
                aria-controls="drawer-right-contato"
            >
                Contato
            </a>
        </li>
    </ul>

    @include('admin._partials.sobre')
    @include('admin._partials.politica-privacidade')
    @include('admin._partials.licenciamento')
    @include('admin._partials.contato')
</footer>
