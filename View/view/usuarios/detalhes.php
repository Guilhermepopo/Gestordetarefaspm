<!-- Modal -->
<div class="modal fade" id="modal-detalhes" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" data-backdrop="static" style="overflow-y: hidden;">
  <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header d-block pb-0">
        <div class="col-12">
          <button type="button" class="close fechar" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title"> Detalhes Uusuario</h5>
        </div>
        <div class="col-12 mb-0">
          <p>Preencha todas as informações necessárias.</p>
        </div>
        <div id="err"></div>
      </div>
      <div class="carregamento"></div>
        <div class="modal-body">
          <div class="col-12 grid-margin mb-0">
            <div class="card-body py-0">
              <div class="row">
                <div class="col-10">
                  <div class="form-group">
                    <label class="col-form-label pb-0">Nome <span class="text-danger">*</span></label>
                    <input class="nome form-control" name="nome" placeholder="Nome do Uusuario" disabled/>
                  </div>
                </div>
               <div class="col-6">
                  <div class="form-group">
                    <label class="col-form-label pb-0">Setor <span class="text-danger">*</span></label>
                    <select class="setor form-control" name="setor" disabled>
                        <option value="">Selecione</option>
                        <option value="Compras">Compras</option>
                        <option value="Contabilidade">Contabilidade</option>
                        <option value="Controle">Controle Interno</option>
                        <option value="Gabinete">Gabinete</option>
                        <option value="Licitação">Licitação</option>
                        <option value="Tesouraria">Tesouraria</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="col-form-label pb-0">Gestor <span class="text-danger">*</span></label>
                    <select class="gestor form-control" name="gestor" disabled>
                        <option>Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                  </div>
                </div>
                <div class="col-10">
                  <div class="form-group">
                    <label class="col-form-label pb-0">Login <span class="text-danger">*</span></label>
                    <input class="login form-control" name="login" placeholder="Login do Uusuario" disabled/>
                  </div>
                </div>
                <div class="col-10">
                  <div class="form-group">
                    <label class="col-form-label pb-0">Senha <span class="text-danger">*</span></label>
                    <input type="password" class="senha form-control" name="senha" placeholder="Senha" value="******" disabled/> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row col-12 justify-content-center mx-auto">
            <button class="btn btn-danger btn-outline col-5 col-lg-3 mx-1 d-flex align-items-center justify-content-center fechar">
              <i class="mdi mdi-close pr-2"></i> 
              <span>Cancelar</span>
            </button>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- Modal -->
    