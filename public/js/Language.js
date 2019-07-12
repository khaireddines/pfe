$(document).ready(function(){

    var engImgLink = {!! asset('img/Flag/En.gif'); !!};

    var fraImgLink = {!! asset('img/Flag/Fr.gif'); !!};

    var imgBtnSel = $('#imgBtnSel');
    var imgBtnEng = $('#imgBtnEng');
    var imgBtnFra = $('#imgBtnFra');

    var imgNavSel = $('#imgNavSel');
    var imgNavEng = $('#imgNavEng');
    var imgNavFra = $('#imgNavFra');

    var spanNavSel = $('#lanNavSel');
    var spanBtnSel = $('#lanBtnSel');


    imgBtnSel.attr("src",engImgLink);
    imgBtnEng.attr("src",engImgLink);
    imgBtnFra.attr("src",fraImgLink);

    imgNavSel.attr("src",engImgLink);
    imgNavEng.attr("src",engImgLink);
    imgNavFra.attr("src",fraImgLink);


    $( ".language" ).on( "click", function( event ) {
        var currentId = $(this).attr('id');

        if (currentId == "navEn") {
            imgNavSel.attr("src",engImgLink);
            spanNavSel.text("EN");

        } else if (currentId == "navFr") {
            imgNavSel.attr("src",fraImgLink);
            spanNavSel.text("FR");
        }

        if (currentId == "btnEn") {
            imgBtnSel.attr("src",engImgLink);
            spanBtnSel.text("EN");
        }  else if (currentId == "btnFr") {
            imgBtnSel.attr("src",fraImgLink);
            spanBtnSel.text("FR");
        }

    });
});