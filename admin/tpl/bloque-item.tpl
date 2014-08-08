<div class="bloque">
    
    <div class="col-md-12 infoAction">
        <hr class="bloque" />
        <a data-id="${id}" class="btn btn-danger pull-right borrarBloque">Borrar info</a>
    </div>
    
    <section class="col col-md-2 col-sm-3 col-xs-12">
        <div class="vista-previa imagenUploader">
            <a data-src="${imagen}" data-tabla="imagen" class="btn btn-mini btn-danger borrarImagen"><i class="fa fa-trash-o borrarImagen"></i></a>
            <p class="info"><i style="display: none" class="fa fa-circle-o-notch fa-spin"></i> <span>Click para cargar la imagen</span></p>
            <img class="img-responsive inputFileDispacher" data-i="${i}" src="${imagen}">
            <p class="description">Imagen</p>
        </div>
    </section>

    <section class="col col-md-10 col-sm-9 col-xs-12 smart-form">
        <div class="row">
            <div class="col col-md-12 col-sm-12">
                <label class="label">Título</label>
                <label class="input">
                    <input type="text" name="bloquesValue[]" value="${value}" />
                </label>
            </div>
            <div class="col col-md-12 col-sm-12">
                <label class="label">Bajada</label>
                <label class="textarea">
                    <textarea style="min-height: 120px" name="bloquesDescripcion[]">${descripcion}</textarea>
                </label>
            </div>
        </div>
    </section>
    <input type="hidden" name="bloquesId[]" value="${id}">
</div>