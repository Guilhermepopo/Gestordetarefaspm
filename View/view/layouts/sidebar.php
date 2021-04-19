 <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> 
                            <div class="row col mx-auto">
                                <div class="col-4 p-0 m-auto text-center">
                                    <img src="/Gestordetarefaspm/View/resources/images/users/1.jpg" alt="user-img" class="img-circle">
                                </div>
                                <div class="col-8 p-0">
                                    <h5 class="mb-0 d-none d-sm-block"><?php echo $_SESSION['nome']; ?></h5>
                                    <small class="d-none d-sm-block"> <?php echo $_SESSION['setor']; ?></small>
                                </div>
                            </div>
                        </li>
                        <hr class="mx-4 hidden-xs">
                        <li> 
                            <a class="waves-effect waves-dark" href="/Gestordetarefaspm/app/atividades/listar" aria-expanded="false"><i class="mdi mdi-buffer mdi-24px mr-3"></i><span class="hide-menu">Atividades </span></a>
                        </li>
                        <?php if($_SESSION['gestor'] == 1){ ?>
                        <li> 
                            <a class="waves-effect waves-dark" href="/Gestordetarefaspm/app/usuarios/listar" aria-expanded="false"><i class="mdi mdi-account mdi-24px mr-3"></i><span class="hide-menu">Usuarios </span></a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>