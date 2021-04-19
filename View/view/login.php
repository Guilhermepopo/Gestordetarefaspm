<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gerenciamento de atividades">
    <meta name="author" content="Guilherme Souza">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Gerenciamento de atividades</title>

    <!-- Custom CSS -->
     <link href="/Gestordetarefaspm/View/resources/vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/Gestordetarefaspm/View/resources/css/style.css" rel="stylesheet">
    <link href="/Gestordetarefaspm/View/resources/vendors/datatables/datatables.css" rel="stylesheet">
    <link href="/Gestordetarefaspm/View/resources/css/pages/error-pages.css" rel="stylesheet">
    <link href="/Gestordetarefaspm/View/resources/css/login-register-lock.css" rel="stylesheet">    
</head>
<body class="skin-green card-no-border">
    <section id="wrapper">
        <div class="login-register" style="background-image:url(/Gestordetarefaspm/View/resources/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                        <h3 class="text-center my-4">Gestor de tarefas</h3>
                        <div class="text-center text-danger pb-3">
                            <?php echo @$repost; ?>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="usuario"  placeholder="Usuário" required> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="password" class="form-control" name="senha" placeholder="Senha" required> 
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20 pt-4">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>