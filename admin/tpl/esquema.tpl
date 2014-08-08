 <!-- RIBBON -->
<div id="ribbon">

    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li>Esquemas</li><li>${accion}</li>
    </ol>
    <!-- /breadcrumb -->

</div>
<!-- /RIBBON -->

 <!-- ESQUEMA -->
<div id="content">

    <!-- row -->
    <div class="row">

        <!-- col -->
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">

                <!-- PAGE HEADER -->
                <i class="fa-fw fa fa-table"></i> 
                Esquemas
                <span>>  
                    ${accion}
                </span>
            </h1>
        </div>
        <!-- /col -->

    </div>
    <!-- /row -->

    <!-- widget grid -->
    <section id="esquema" class="">

        <!-- row -->
        <div class="row">
            
            <!-- WIDGET FORM -->
            <article class="col-md-12 col-sm-12 col-xs-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div 
                    class="jarviswidget jarviswidget-color-darken" 
                    id="" 
                    data-widget-colorbutton="false" 
                    data-widget-editbutton="false" 
                    data-widget-togglebutton="false" 
                    data-widget-deletebutton="false" 
                    data-widget-sortable="false"
                >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-${icon}"></i> </span>
                        <h2>${title}</h2>				

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            
                            <form id="formEsquema" action="php/controllers/esquema.controller.php" method="post">

                                <fieldset>
                                            
                                    <div id="infoPrincipal" class="row">
                                        
                                        <div class="col-md-12 infoAction" style="display: none">
                                            <hr class="bloque" />
                                            <a data-id="" class="btn btn-danger pull-right borrarBloque">Borrar info</a>
                                        </div>
                                        
                                        <section class="col col-md-2 col-sm-3 col-xs-12">
                                           <div class="vista-previa imagenUploader">
                                                <a data-src="${imagen}" data-tabla="esquema" class="btn btn-mini btn-danger borrarImagen"><i class="fa fa-trash-o borrarImagen"></i></a>
                                                <p class="info"><i style="display: none" class="fa fa-circle-o-notch fa-spin"></i> <span>Click para cargar la imagen</span></p>
                                                <img class="img-responsive inputFileDispacher" src="${imagen}">
                                                <p class="description">Imagen</p>
                                            </div>
                                        </section>
                                        
                                        <section class="col col-md-10 col-sm-9 col-xs-12 smart-form">
                                            <div class="row">
                                                <div class="col col-md-12 col-sm-12">
                                                    <label class="label">Nombre</label>
                                                    <label class="input">
                                                        <input type="text" name="value" value="${value}" />
                                                    </label>
                                                </div>
                                                <div class="col col-md-12 col-sm-12">
                                                    <label class="label">Descipción</label>
                                                    <label class="textarea">
                                                        <textarea style="min-height: 120px" name="descripcion">${descripcion}</textarea>
                                                    </label>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                                    
                                    <div class="row" id="bloques">
                                        ${bloques}
                                    </div>
                                            
                                </fieldset>
                                <input type="hidden" name="redirect" value="1" />
                                <input type="hidden" name="id" value="${id}" />
                                <input type="hidden" name="imgprefix" value="${imgprefix}" />
                            </form>
                            
                            <form class="fileForm" action="php/uploaders/esquema.uploader.php" method="post" enctype="multipart/form-data">
                                <input class="hidden" onchange="forceUpload(this);"  type="file" name="files[]">
                                <input class="hidden" type="submit" value="Upload File to Server">
                                <input type="hidden" name="imgprefix" value="${imgprefix}" />
                            </form>
                            
                            <div class="widget-footer">
                                <a id="agregarBloque" class="btn btn-sm btn-primary">Agregar info</a>
                                    <button class="btn btn-sm btn-success saveForm" type="submit">
                                        Guardar
                                    </button>	
                            </div>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- /widget div -->

                </div>
                <!-- /widget -->

            </article>
            <!-- /WIDGET FORM -->
            
            <!-- WIDGET ESPECIES -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div 
                    class="jarviswidget jarviswidget-color-darken" 
                    id="" 
                    data-widget-colorbutton="false" 
                    data-widget-editbutton="false" 
                    data-widget-togglebutton="false" 
                    data-widget-deletebutton="false" 
                    data-widget-sortable="false"
                >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                        <h2>Listado de especies</h2>				
                        <span id="dt-loader" class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span>
                    </header>

                    <!-- widget div-->
                    <div role="content">

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="especiesSelected" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nombre común</th>
                                        <th>Nombre científico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="widget-footer smart-form">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success saveForm" type="submit">
                                        Guardar
                                    </button>	
                                </div>
                            </div>
                        </div>
                        <!-- /widget content -->
                        
                        

                    </div>
                    <!-- /widget div -->

                </div>
                <!-- /widget -->

            </article>
            <!-- /WIDGET ESPECIES -->
            
        </div>

        <!-- /row -->

    </section>
    <!-- /widget grid -->

</div>
<!-- /ESQUEMA -->

<script>
    var especiesSelected = ${especiesSelected}
</script>