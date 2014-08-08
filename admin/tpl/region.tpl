 <!-- RIBBON -->
<div id="ribbon">

    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li>Regiones</li><li>${accion}</li>
    </ol>
    <!-- /breadcrumb -->

</div>
<!-- /RIBBON -->

 <!-- REGION -->
<div id="content">

    <!-- row -->
    <div class="row">

        <!-- col -->
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">

                <!-- PAGE HEADER -->
                <i class="fa-fw fa fa-map-marker"></i> 
                Regiones
                <span>>  
                    ${accion}
                </span>
            </h1>
            <div class="smart-form">
                <label class="input"> <i class="icon-append fa fa-question-circle"></i>
                    <input type="text" name="region" placeholder="Región" value="${value}">
                    <b class="tooltip tooltip-top-right">
                        <i class="fa fa-warning txt-color-teal"></i> 
                        Ingrese un nombre para esta región</b> 
                </label>
            </div>
                    <p>&nbsp;</p>
        </div>
        <!-- /col -->

    </div>
    <!-- /row -->

    <!-- widget grid -->
    <section id="espacio" class="">

        <!-- row -->
        <div class="row">
            
            <!-- NEW WIDGET START -->
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
                        <h2>Editor de región</h2>				
                        <div class="widget-toolbar smart-form">
                            
                            
                                
                        </div>
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
                            <div id="map_region" class="google_maps">
                                &nbsp;
                            </div>
                            <div class="widget-footer">
                                <a id="hand_b" class="hidden"></a>
                                <a id="shape_b" class="hidden"></a>
                                <a id="remove_b" class="btn btn-sm btn-danger">Borrar polígono</a>
                                <a class="btn btn-sm btn-success saveForm">Guardar</a>	
                            </div>
                        </div>
                        <!-- end widget content -->
                        <form class="hidden" id="dataSender" method="post" action="php/controllers/region.controller.php">
                            <input type="hidden" name="value" value="${value}" />
                            <textarea class="hidden" name="polygon">${polygon}</textarea>
                            <input type="hidden" name="id" value="${id}" />
                        </form>
                    </div>
                    <!-- end widget div -->
                    
                </div>
                <!-- end widget -->
                
            </article>
            <!-- WIDGET END -->
            
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
<!-- /REGION -->

<script>
    var especiesSelected = ${especiesSelected}
</script>