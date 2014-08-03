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
                            
                            <label class="input"> <i class="icon-append fa fa-question-circle"></i>
                                <input type="text" name="region" placeholder="Región" value="${value}">
                                <b class="tooltip tooltip-top-right">
                                    <i class="fa fa-warning txt-color-teal"></i> 
                                    Ingrese un nombre para esta región</b> 
                            </label>
                                
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
                                <a id="guardar" class="btn btn-sm btn-success">Guardar</a>	
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
            
            
        </div>

        <!-- /row -->

    </section>
    <!-- /widget grid -->

</div>
<!-- /REGION -->