<section class="sectionUser">
    <div class="container">
        <div class="row left">
            <div class="col-md-12 right">
            <span class="mr10 white"><?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?></span>
            <a href="logout" id="btn-logout" type="button" class="btn btn-lila f14 mt4 mb4">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</section>