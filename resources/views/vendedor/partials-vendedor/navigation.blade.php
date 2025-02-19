<style>
    /* Estilo geral */
    nav {
        width: 250px;
        height: 100vh;
        background-color: #1a202c; /* Cinza escuro */
        padding-top: 20px;
    }

    /* Links */
    nav a, nav button {
        display: block;
        color: #a3bffa; /* Azul claro */
        text-decoration: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        width: 100%;
        text-align: left;
    }

    /* Ícones */
    nav i {
        font-size: 1.2rem;
        margin-right: 10px;
    }

    /* Efeito hover */
    nav a:hover, nav button:hover {
        background-color: #4c51bf; /* Azul forte */
        color: white;
    }

    /* Botão de logout estilo fixo */
    nav button {
        background: none;
        border: none;
        cursor: pointer;
        width: 100%;
        text-align: left;
    }
</style>

<!-- Navegação lateral -->
<nav>
    <ul class="list-none px-2">
        <!-- Dashboard -->
        <li>
            <a href="{{ route('vendedor.dashboard') }}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>
        <!-- Painel de Vendas -->
        <li>
            <a href="{{ route('vendedor.vendas') }}">
                <i class="fa-brands fa-shopify"></i> Vendas
            </a>
        </li>
        <!-- Lista de Produtos -->
        <li>
            <a href="{{ route('vendedor.listaProd') }}">
                <i class="bi bi-cart-fill"></i> Lista Produtos
            </a>
        </li>
        <!-- Logout -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    <i class="bi bi-door-closed-fill"></i> Deslogar
                </button>
            </form>
        </li>
    </ul>
</nav>


