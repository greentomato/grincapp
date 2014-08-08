<form id="form-ubicacion" method="post" action="espacios-disponibles">

    <!-- LOCATION -->

    <div class="asideBox">
        <label class="asideItemHeader">&iquest;D&oacute;nde est&aacute;s?</label>
        <input name="lugar" class="error-tooltip" title="Ten&eacute;s que indicar tu ubicaci&oacute;n" id="search" type="text" placeholder="Ej. Capital Federal" value="${lugar}">
    </div>
    <!-- AREA DESCRIPTION -->
    <div class="hr"></div>

    <div class="asideBox">
        <label id="label-zona" title="Ten&eacute;s que indicar una zona" class="asideItemHeader error-tooltip">&iquest;C&oacute;mo es ese lugar?</label>
        ${zonas}
    </div>

    <div class="hr"></div>

    <!-- TERRAIN DIMENSIONS -->
    <div class="asideBox">
        <label id="label-dimension" title="Ten&eacute;s que indicar la dimensi&oacute;n del terreno" class="asideItemHeader error-tooltip">&iquest;Qu&eacute; dimensiones tiene el terreno?</label>
        <div class="terrainDimensionOptions">
            ${dimensiones}
        </div>
    </div>

    <div class="hr"></div>
    <!-- ASOLEAMIENTO -->
    <div class="asideBox">
        <label id="label-sol" title="Ten&eacute;s que indicar la cantidad de sol" class="asideItemHeader error-tooltip">&iquest;Cu&aacute;nto sol recibe en promedio?</label>
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