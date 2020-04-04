<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto">

        <li @if($current == "produtos") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/produtos">Produtos <span class="sr-only">(current)</span></a>
        </li>

        <li @if($current == "categorias") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/categorias">Categorias <span class="sr-only">(current)</span></a>
        </li>

        <li @if($current == "Pedidos") class="nav-item active" @else class="nav-item" @endif>
          <a class="nav-link" href="/pedidos">Pedidos<span class="sr-only">(current)</span></a>
      </li>
      </ul>
       
    </div>
  </nav>