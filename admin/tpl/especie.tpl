 <!-- RIBBON -->
<div id="ribbon">

    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li>Especies</li><li>${accion}</li>
    </ol>
    <!-- /breadcrumb -->

</div>
<!-- /RIBBON -->

 <!-- ESPECIE -->
<div id="content">

    <!-- row -->
    <div class="row">

        <!-- col -->
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">

                <!-- PAGE HEADER -->
                <i class="fa-fw fa fa-pagelines"></i> 
                Especies
                <span>>  
                    ${accion}
                </span>
            </h1>
        </div>
        <!-- /col -->

    </div>
    <!-- /row -->

    <!-- widget grid -->
    <section id="especie" class="">

        <!-- row -->
        <div class="row">
            
            <!-- WIDGET FORM -->
            <article class="col-md-9 col-sm-12 col-xs-12">

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
                            
                            <form action="php/controllers/especie.controller.php" method="post" class="smart-form">

                                <fieldset>
                                            
                                    <div class="row">
                                        <section class="col col-md-8 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col col-md-6 col-sm-6">
                                                    <label class="label">Nombre común</label>
                                                    <label class="input">
                                                        <input type="text" name="nombre" value="${nombre}" />
                                                    </label>
                                                </div>
                                                <div class="col col-md-6 col-sm-6">
                                                    <label class="label">Nombre científico</label>
                                                    <label class="input">
                                                        <input type="text" name="denominacion" value="${denominacion}" />
                                                    </label>
                                                </div>
                                                <div  class="col col-md-6 col-sm-6">
                                                    <label class="label">Zona</label>
                                                    ${zonaToCheckbox}
                                                </div>
                                                <div  class="col col-md-6 col-sm-6">
                                                    <label class="label">Dimensión</label>
                                                    ${dimensionToCheckbox}
                                                </div>
                                                <div  class="col col-md-6 col-sm-6">
                                                    <label class="label">Luz solar</label>
                                                    ${solToCheckbox}
                                                </div>
                                                <div  class="col col-md-6 col-sm-6">
                                                    <label class="label">Espacio</label>
                                                    ${espacioToCheckbox}
                                                </div>
                                                <div  class="col col-md-6 col-sm-6">
                                                    <label class="label">Esquema</label>
                                                    ${esquemaToCheckbox}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-6 col-sm-6">
                                                    <div class="vista-previa imagenUploader">
                                                        <a data-src="${imagen}" data-type="imagen" class="btn btn-mini btn-danger"><i class="fa fa-trash-o"></i></a>
                                                        <label class="uploader" for="imagenInput">
                                                            <img src="${imagen}">
                                                        </label>
                                                        <p>Img. representativa</p>
                                                    </div>
                                                </div>
                                                <div class="col col-md-6 col-sm-6">
                                                    <div class="vista-previa florUploader">
                                                        <a data-src="${flor}" data-type="flor" class="btn btn-mini btn-danger"><i class="fa fa-trash-o"></i></a>
                                                        <label class="uploader" for="florInput">
                                                            <img src="${flor}">
                                                        </label>
                                                        <p>Flor destacada</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                            
                                        <section class="col col-md-4 col-sm-12 col-xs-12">
                                            <label class="label">Etiquetas</label>
                                            <div id="sortable2" class="connectedSortable">
                                                ${tagsAsignados}
                                            </div>
                                        </section>
                                            
                                        
                                    </div>
                                            
                                </fieldset>
                                <input type="hidden" name="redirect" value="1" />
                                <input type="hidden" name="id" value="${id}" />
                                <input type="hidden" name="imgprefix" value="${imgprefix}" />
                            </form>
                            
                            <form id="imagenUploader" action="php/uploaders/imagen.uploader.php" method="post" enctype="multipart/form-data">
                                <input class="hidden" id="imagenInput" onchange="forceImagenUpload();"  type="file" name="files[]">
                                <input class="hidden" id="imagenSubmit" type="submit" value="Upload File to Server">
                                <input type="hidden" name="imgprefix" value="${imgprefix}" />
                            </form>
                            
                            <form id="florUploader" action="php/uploaders/flor.uploader.php" method="post" enctype="multipart/form-data">
                                <input class="hidden" id="florInput" onchange="forceFlorUpload();"  type="file" name="files[]">
                                <input class="hidden" id="florSubmit" type="submit" value="Upload File to Server">
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
            
            <!-- WIDGET TAGS -->
            <article class="col-md-3 col-sm-12 col-xs-12">

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
                        <span class="widget-icon"> <i class="fa fa-tags"></i> </span>
                        <h2>Listado de etiquetas</h2>				

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
                            <div id="sortable1" class="connectedSortable">
                                ${tags}
                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- /widget div -->

                </div>
                <!-- /widget -->

            </article>
            <!-- /WIDGET TAGS -->
            
        </div>

        <!-- /row -->

    </section>
    <!-- /widget grid -->

</div>
<!-- /ESPECIE -->