<header class="header">
    <!-- Social Media Section -->
    <div class="social-links-header">
        <a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
    </div>

    <div class="header-container">
        <!-- Header Top -->
        <div class="header-top">
            <div class="logo-section">
                <b class="LogoPart1">T</b><b class="LogoPart2">TrickinG</b>
                <span class="logo-subtitle">Desenvolvimento Web</span>
            </div>

            <div class="auth-section">
                <div class="connect-text">Conecte-se já!!!</div>
                
                <div>
                    <?php if (!logged()) : ?>
                        <a href="/login">Login</a>
                        <button><a href="/register">Cadastre-se</a></button>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['user_logged'])) : ?>
                        <a href="/logout">Logout</a>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['admin_logged'])) : ?>
                        <button><a style="color: crimson" href="/adminPanel">Admin Panel</a></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="nav-container">
            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <div class="nav-links" id="navLinks">
                <a href="/"><i class="fas fa-home"></i> Home</a>
                <a href="/about"><i class="fas fa-user"></i> Sobre</a>
                <a href="/product"><i class="fas fa-box"></i> Produtos</a>
                <a href="/service"><i class="fas fa-cog"></i> Serviços</a>
                <a href="/post"><i class="fas fa-edit"></i> Postagens</a>
                <a href="/contact"><i class="fas fa-envelope"></i> Contato</a>
            </div>
        </nav>

        <!-- Search Section -->
        <div class="search-section">
            <form class="search-form" method="GET" action="/search">
                <input type="text" name="q" placeholder="🔍 Pesquisar..." value="<?= ($_GET['q'] ?? '') ?>">
                
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>Buscar
                </button>
            </form>
        </div>
    </div>
</header>
