@props(['viewInfoUser' => true, 'size' => 'normal'])

<div class="ellos-avatar-horizontal lg:ellos-avatar-horizontal-md 2xl:ellos-avatar-horizontal-lg">
    <div class="avatar-img">
        @if(Auth::user()->id == 4)
            <img src="/imagem/user/fotoGiovani.png" alt="{{ Auth::user()->name }}">
        @else
            <p>{{ Str::upper(Str::substr(Auth::user()->name, 0, 2)) }}</p>
        @endif
    </div>
    @if ($viewInfoUser)
        <div class="avatar-content">
            <h1>{{ Auth::user()->name }}</h1>
            <p>{{Auth::user()->email}}</p>
        </div>
    @endif
</div>
