document.getElementById('categorie-id').addEventListener('input', function () {
    let category = document.getElementById('categorie-id');
    let name = document.getElementById('sub_name');
    let title = document.getElementById('sub_title');

    if (category.value == 1) {
        name.value = 'w_' + title.value;
    } else if (category.value == 2) {
        name.value = 'm_' + title.value;
    } else {
        name.value = 'k_' + title.value;
    }
})




$('#p-article').summernote({
    height: 300
});
//-------------------------------------------------------------------
$('input[type="file"]').change(function (e) {
    var fileName = e.target.files[0].name;
    $('.custom-file-label').html(fileName);
});
//---------------------------------------------------------------------

String.prototype.permalink = function () {
    return this.toString().trim().toLowerCase().replace(/\s/g, '-')
}

$('.origin-text').on('focusout', function () {
    $('.target-text').val($(this).val().permalink())
})

//---------------------------------------------------------------------


document.getElementById('price').addEventListener('focusout', function () {
    var price = document.getElementById('price');
    var fullPrice = document.getElementById('fullPrice');
    var discount = document.getElementById('discount');
    if (!fullPrice.value) {
        return
    }
    discount.value = parseInt(100 - (price.value * 100 / fullPrice.value))
})



//---------------------------------------------------------------------

String.prototype.createName = function () {
    return this.toString().trim().toLowerCase().replace(/\s/g, '_')
}




$('.origin-text').on('focusout', function () {
    var categorie = $('#categorie-id').val();


    if (categorie == 1) {
        $('.target-text-name').val('w_' + $('.origin-text').val().createName())
    } else if (categorie == 2) {
        $('.target-text-name').val('m_' + $('.origin-text').val().createName())
    } else if (categorie == 3) {
        $('.target-text-name').val('k_' + $('.origin-text').val().createName())

    }

})
