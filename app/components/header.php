<?php
include_once 'functions/consulta.php';

$estado = $_POST['estadosSelect']
          ?? 'all'; 
        
$pesquisa = $_POST['pesquisar'] ?? ''; 
?>
        <header>
            <a href=""><img src="https://embras.net/assets/images/logo.png" style="margin-left:30px; height:30px; width:90px"></a>
            <img src="https://static.vecteezy.com/system/resources/thumbnails/019/879/186/small/user-icon-on-transparent-background-free-png.png" style="margin-right:30px; height:30px; width:50px">
        </header>

        <nav>
            <h1 style="margin-left:30px; font-size: 27px;">Gerenciamento de publicidades</h1>
            <button class="nova-publi" id="btnNovaPubli" style="margin-right:30px;"> <span class="material-symbols-outlined" style="margin-right: 7px;">add_circle</span>Nova Publicidade</button>
        </nav>

        <div class="bar">
            <form method="POST" style="all: unset; box-sizing: border-box;">
                <select name="estadosSelect" style="margin-left:30px; border:none; background-color:#f9f9f9; padding: 10px 10px; font-size: 15px;" onchange="this.form.submit()">
                    <option value="all" name="all" style="display: flex; align-items: center;">Visualizar todos os estados</option> <span class="material-symbols-outlined" style="margin-left: 5px;">stat_minus_1</span>
                    <?php foreach($dadosEst as $es): ?>
                      <option value="<?php echo $es['uf'] ?>" name="<?php $es['uf'] ?>" <?= $estado === $es['uf']  ? 'selected' : '' ?>><?php echo $es['descricao'] ?></option>
                    <?php endforeach; ?>
                </select>
            </form>

            <form method="POST" style="all: unset; box-sizing: border-box;">
                <button class="nova-publi" id="btnNovo" type="submit" name="novo-estado">Cadastrar Novo Estado</button>
            </form>

                <div class="search" style=" margin-right:30px">
                    <form method="POST" style="all:unset; box-sizing: border-box;">
                        <input type="text" name="pesquisar" placeholder="Pesquisar" value=<?=$pesquisa?> >
                    </form>
                </div>
        </div>

<style>
header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 50px;
}

nav{
    display: flex;
    align-items: center;
    margin-top: 13px;
    justify-content: space-between;
    height: 50px;
}

.bar{
    display: flex;
    align-items: center;
    margin-top: 10px;
    justify-content: space-between;
    height: 30px;
}

.nova-publi{
    padding: 8px 15px;
    background-color: rgba(65, 91, 235);
    color: white;
    border: none;
    border-radius: 7px;
    display: flex;
    align-items: center;
}

.nova-publi:hover{
    cursor: pointer;
    background-color: rgb(41, 72, 250);
}
</style>