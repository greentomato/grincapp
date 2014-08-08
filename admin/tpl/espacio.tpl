 <!-- RIBBON -->
<div id="ribbon">

    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li>Espacios</li><li>${accion}</li>
    </ol>
    <!-- /breadcrumb -->

</div>
<!-- /RIBBON -->

 <!-- ESPACIO -->
<div id="content">

    <!-- row -->
    <div class="row">

        <!-- col -->
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">

                <!-- PAGE HEADER -->
                <i class="fa-fw fa fa-building-o"></i> 
                Espacios
                <span>>  
                    ${accion}
                </span>
            </h1>
        </div>
        <!-- /col -->

    </div>
    <!-- /row -->

    <!-- widget grid -->
    <section id="espacio" class="">

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
                            
                            <form id="formEspacio" action="php/controllers/espacio.controller.php" method="post" class="smart-form">

                                <fieldset>
                                            
                                    <div class="row">
                                        
                                        <section class="col col-md-2 col-sm-3 col-xs-12">
                                           <div class="vista-previa imagenUploader">
                                                <a data-src="${src}" class="btn btn-mini btn-danger"><i class="fa fa-trash-o"></i></a>
                                                <label class="uploader" for="imagenInput">
                                                    <p class="info"><i style="display: none" class="fa fa-circle-o-notch fa-spin"></i> <span>Click para cargar la imagen</span></p>
                                                    <img src="${imagen}">
                                                </label>
                                                <p class="description">Imagen</p>
                                            </div>
                                        </section>
                                        
                                        <section class="col col-md-10 col-sm-9 col-xs-12">
                                            <div class="row">
                                                <div class="col col-md-12 col-sm-12">
                                                    <label class="label">Título</label>
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
                                            
                                </fieldset>
                                <input type="hidden" name="redirect" value="1" />
                                <input type="hidden" name="id" value="${id}" />
                                <input type="hidden" name="imgprefix" value="${imgprefix}" />
                            </form>
                            
                            <form id="imagenUploader" action="php/uploaders/espacio.uploader.php" method="post" enctype="multipart/form-data">
                                <input class="hidden" id="imagenInput" onchange="forceImagenUpload();"  type="file" name="files[]">
                                <input class="hidden" id="imagenSubmit" type="submit" value="Upload File to Server">
                                <input type="hidden" name="imgprefix" value="${imgprefix}" />
                            </form>
                            
                            <div class="widget-footer smart-form">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success saveForm" type="submit">
                                        Guardar
                                    </button>	
                                </div>
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
<!-- /ESPACIO -->

<script>
    var especiesSelected = ${especiesSelected}
</script>