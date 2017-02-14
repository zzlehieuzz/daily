<?php use App\Libs\Constant; ?>
<?php use Cake\Routing\Router; ?>

<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <a class="navbar-brand" href="<?= Router::url(Constant::$C_ROUTE_LOGIN_REDIRECT); ?>"><?= Constant::C_TITLE ?></a>
</div>