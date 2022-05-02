<!-- Modal -->
<div class="modal fade basicModalLG" id="mantenimientoproducto" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" id="producto_form">
                <div class="modal-header">
                    <h5 id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="prod_id" id="prod_id">
                    <div class="form-group">
                        <label>Nombre de Producto</label>
                        <input type="text" class="form-control" name="prod_n" id="prod_n" required>
                    </div>
                    <div class="form-group">
                        <label>Precio Normal</label>
                        <input type="text" class="form-control" name="prod_precion" id="prod_precion" required>
                    </div>
                    <div class="form-group">
                        <label>Precio Descuento</label>
                        <input type="text" class="form-control" name="prod_preciod" id="prod_preciod" required>
                    </div>
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" name="prod_url" id="prod_url" required>
                    </div>
                    <div class="form-group">
                        <label>Ruta de Imagen</label>
                        <input type="text" class="form-control" name="prod_img" id="prod_img" required>
                    </div>
                    <div class="form-group">
                        <label>Cupon</label>
                        <input type="text" class="form-control" name="prod_cupon" id="prod_cupon" required>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea class="form-control" name="prod_descrip" id="prod_descrip" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>