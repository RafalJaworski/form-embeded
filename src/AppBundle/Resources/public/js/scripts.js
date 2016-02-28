$(document).ready(function () {

    var buttonAdd = $('<a href="#" class="usr_add_product_btn" >Add</a>');
    var productForm = $('<li></li>').append(buttonAdd);
    var productFormsContainer = $('ul.products');


    //add productForm to UL element
    productFormsContainer.append(productForm);

    //amount of inouts
    productFormsContainer.data('index',productFormsContainer.find(':input').length);


    buttonAdd.click(function (e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();
        addProductForm(productFormsContainer,productForm);


    });

    function addProductForm($productFormsContainer,$productForm) {
        var prototype = $productFormsContainer.data('something-prototype');

        //get index we added above in this script
        var index  = $productFormsContainer.data('index');

        //index instead of __name__ in DIV
        var newForm = prototype.replace(/__name__/g,index); // "/g" is needed to search all __name__

        //increase index
        $productFormsContainer.data('index',index + 1);

        var productFormWrapped = $('<li></li>').append(newForm);
        $productForm.before(productFormWrapped);

    }

});

