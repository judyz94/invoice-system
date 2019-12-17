$(document).ready(function(){
    var addButton = $('.btn-success');
	var wrapper = $('.col-sm-10');
	var options = $("#product_id").html();
    var fieldHTML = '<div class="input-group">' +
        '<label for="product_id">Product:</label><select class="form-control" id="product_id[]" name="product_id[]">'+options+'</select><span class="input-group-btn"></span>' +
        '<label for="price">Price:</label><input type="text" name="price[]" class="form-control"  placeholder="Type a product price"><span class="input-group-btn"></span>' +
        '<label for="quantity">Quantity:</label><input type="text" name="quantity[]" class="form-control" placeholder="Type a quantity"><div class="input-group-btn"><button type="button" id="btn-erase" class="btn btn-success">-</button></div></div><br>';
    $(addButton).click(function(){
        $(wrapper).append(fieldHTML);
    });
    $(wrapper).on('click', '#btn-erase', function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
    });
});
