<form id="form-ubicacion" method="post" action="espacios-disponibles">

    <!-- LOCATION -->

    <div class="asideBox">
        <label class="asideItemHeader">&iquest;D&oacute;nde estás?</label>
        <input id="search" type="text" placeholder="Ej. Capital Federal">
    </div>
    <!-- AREA DESCRIPTION -->
    <div class="hr"></div>

    <div class="asideBox">
        <label class="asideItemHeader">&iquest;C&oacute;mo es ese lugar</label>
        ${zonas}
    </div>

    <div class="hr"></div>

    <!-- TERRAIN DIMENSIONS -->
    <div class="asideBox">
        <label class="asideItemHeader">&iquest;Qu&eacute; dimensiones tiene el terreno?</label>
        <div class="terrainDimensionOptions">
            ${dimensiones}
        </div>
    </div>

    <div class="hr"></div>
    <!-- ASOLEAMIENTO -->
    <div class="asideBox">
        <label class="asideItemHeader">&iquest;Cu&aacute;nto sol recibe en promedio?</label>
        <div class="terrainDimensionOptions">
            <div class="terrainDimensionOptions">
                ${soles}
            </div>
        </div>
    </div>

    <div class="hr"></div>
    
    <input type="hidden" name="location" value="" />
    
    <div class="asideBox">
        <div class="asideItemHeader">
            <a href="espacios-disponibles" class="asideSubmit">Ver resultados</a>
        </div>
    </div>
</form>