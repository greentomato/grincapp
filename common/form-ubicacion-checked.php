<form action="">

            <!-- LOCATION -->
            
             <div class="asideBox">
            <label class="asideItemHeader">&#191;D&oacute;nde estas?</label>
           
            <input type="text" placeholder="San Isidro, Buenos Aires">
            </div>
            <!-- AREA DESCRIPTION -->
            <div class="hr"></div>

            <div class="asideBox">

            <label class="asideItemHeader">&#191;C&oacute;mo es ese lugar</label>
            
            <label class=" areaDescription">
                <input type="radio" name="areaDescription" value="urban">
                <div class="radioEffect asideItemContent tooltip" title="Entorno en su mayor&iacute;a cubierto por edificaciones urbanas. Ej. ciudad, pueblo, etc.">
                    <h3><i class="fa fa-building fa-lg"></i>Zona Urbana</h3>
                </div>
            </label>
            
             <label class="areaDescription">
                <input type="radio" name="areaDescription" value="urban" checked>
                <div class="radioEffect asideItemContent tooltip" title="Zona relativamente despojada de edificaciones. Mucho espacio verde disponible. Ej. quinta, granja, etc.">
                    <h3><i class="fa fa-home fa-lg"></i>Zona Sub Urbana</h3>
                    
                </div>
            </label>
            
             <label class="areaDescription">
                <input type="radio" name="areaDescription" value="urban">
                <div class="radioEffect asideItemContent tooltip" title="Espacio casi salvaje, con mínima edificación y buena disponibilidad para restaruación. Ej. monte, campo, etc.">
                    <h3><i class="fa fa-pagelines fa-lg"></i>Zona Rural</h3>
                    
                </div>
            </label>
            </div>
            
            <div class="hr"></div>

            <!-- TERRAIN DIMENSIONS -->
            <div class="asideBox">
            <label class="asideItemHeader">&#191;Qu&eacute; dimensiones tiene el terreno?</label>
            <div class="terrainDimensionOptions">
            <label class="terrainDimension">
                <input type="radio" name="terrainDimension" value="small">
                <div class="radioEffect terrainDimensionItem">
                    <h3>P</h3>
                    <p>Menos de<br>500m2</p>
                </div>
            </label><!-- 
             --><label class="terrainDimension">
                <input type="radio" name="terrainDimension" value="medium" checked>
                <div class="radioEffect terrainDimensionItem">
                    <h3>M</h3>
                    <p>Hasta<br>1000m2</p>   
                </div>            
            </label><!-- 
             --><label class="terrainDimension">
                <input type="radio" name="terrainDimension" value="large">
                <div class="radioEffect terrainDimensionItem">
                    <h3>G</h3>
                    <p>M&aacute;s de<br>1000m2</p>
                </div>                
            </label>
            </div>
        </div>
            
            <div class="hr"></div>
            <!-- ASOLEAMIENTO -->
            <div class="asideBox">
            <label class="asideItemHeader">&#191;Cu&aacute;nto sol recibe en promedio?</label>
            <div class="terrainDimensionOptions">
            <label class="terrainDimension">
                <input type="radio" name="sunAvailable" value="small">
                <div class="radioEffect terrainDimensionItem">
                    <i class="fa fa-cloud fa-2x"></i>
                    <p>Sombra</p>
                </div>
            </label><!-- 
             --><label class="terrainDimension">
                <input type="radio" name="sunAvailable" value="medium">
                <div class="radioEffect terrainDimensionItem">
                    <i class="fa fa-cloud"></i>
                    <i class="fa fa-sun-o fa-2x"></i>
                    <p>Medio Sol</p>   
                </div>            
            </label><!-- 
             --><label class="terrainDimension">
                <input type="radio" name="sunAvailable" value="large" checked>
                <div class="radioEffect terrainDimensionItem">
                    <i class="fa fa-sun-o fa-2x"></i>
                    <p>Soleado</p>
                </div>                
            </label>
            </div>
        </div>
            
            <div class="hr"></div>

            <div class="asideBox">
            <div class="asideItemHeader">
            <a href="?view=2" class="asideSubmit">Ver resultados <!-- <i class="fa fa-arrow-right"></i> --></a>
            </div>
        </form>