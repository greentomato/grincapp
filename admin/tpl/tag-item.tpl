<div class="nativaDataItem">
    <h3><i class="hidden-sm fa ${icon}"></i> ${value}</h3>
    <div class="smart-form ${visible-nivel}">
        <div class="rating rangeDots">
            <input type="radio" value="5" name="nivel-${id}" id="nivel-${id}-5" ${checked5}>
            <label for="nivel-${id}-5"><i class="fa fa-circle"></i></label>
            <input type="radio" value="4" name="nivel-${id}" id="nivel-${id}-4" ${checked4}>
            <label for="nivel-${id}-4"><i class="fa fa-circle"></i></label>
            <input type="radio" value="3" name="nivel-${id}" id="nivel-${id}-3" ${checked3}>
            <label for="nivel-${id}-3"><i class="fa fa-circle"></i></label>
            <input type="radio" value="2" name="nivel-${id}" id="nivel-${id}-2" ${checked2}>
            <label for="nivel-${id}-2"><i class="fa fa-circle"></i></label>
            <input type="radio" value="1" name="nivel-${id}" id="nivel-${id}-1" ${checked1}>
            <label for="nivel-${id}-1"><i class="fa fa-circle"></i></label>
        </div>
    </div>
    <textarea class="nativeDataCardItem ${visible-descripcion}" name="descripcion-${id}">${descripcion}</textarea>
    <input type="hidden" name="tipotags[]" value="${id}" />
</div>