<!-- Modal -->
<div class="modal fade" id="modal-adicionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" data-backdrop="static" style="overflow-y: hidden;">
  <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header d-block pb-0">
        <div class="col-12">
          <button type="button" class="close fechar" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title"> Nova atividade</h5>
        </div>
        <div class="col-12 mb-0">
          <p>Preencha todas as informações necessárias.</p>
        </div>
        <div id="err"></div>
      </div>
      <div class="carregamento"></div>
      <form class="form-sample" id="formAdicionar" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-body">
          <div class="col-12 grid-margin mb-0">
            <div class="card-body py-0">
              <div class="row">
                <div class="col-10">
                  <div class="form-group">
                    <label class="col-form-label pb-0">Título <span class="text-danger">*</span></label>
                    <input class="form-control" name="titulo" required/>
                  </div>
                </div>
               <div class="col-6">
                  <div class="form-group">
                    <label class="col-form-label pb-0">Setor <span class="text-danger">*</span></label>
                    <select class="form-control" name="setor" required>
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
                <div class="col-12">
                  <div class="form-group">
                    <label class="col-form-label pb-0">Descrição <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="descricao" rows="3" required></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row col-12 justify-content-center mx-auto">
            <button class="btn btn-danger btn-outline col-5 col-lg-3 mx-1 d-flex align-items-center justify-content-center fechar" data-dismiss="modal" aria-label="Close">
              <i class="mdi mdi-close pr-2"></i> 
              <span>Cancelar</span>
            </button>
            <button type="submit" class="btn btn-success btn-outline col-5 col-lg-3 mx-1 d-flex align-items-center justify-content-center">
              <i class="mdi mdi-check pr-2"></i> 
              <span>Salvar</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
    