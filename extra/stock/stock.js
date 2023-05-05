
    function editQuantity(value1, value2) {
        $(document).ready(function() {
            var product_id = value1;
            var quantity = value2;
            $.ajax({
                url: '../../extra/stock/edit_quantity.php',
                type: 'POST',
                data: {
                    product_id: product_id,
                    quantity: quantity
                },
                success: function(response) {
                    console.log(response); // log response from server
                }
            });

        });
    }

    function editRprice(value1, value2) {
        $(document).ready(function() {
            var product_id = value1;
            var rprice = value2;
            $.ajax({
                url: '../../extra/stock/edit_rprice.php',
                type: 'POST',
                data: {
                    product_id: product_id,
                    rprice: rprice
                },
                success: function(response) {
                    console.log(response); // log response from server
                }
            });

        });
    }

    function editWprice(value1, value2) {
        $(document).ready(function() {
            var product_id = value1;
            var wprice = value2;
            $.ajax({
                url: '../../extra/stock/edit_wprice.php',
                type: 'POST',
                data: {
                    product_id: product_id,
                    wprice: wprice
                },
                success: function(response) {
                    console.log(response); // log response from server
                }
            });

        });
    }

    function getFileName(value1) {
        return value1;
    }

    function editName(value1, value2) {
        $(document).ready(function() {
            var product_id = value1;
            var new_name = value2;
            var old_name = getFileName();
            $.ajax({
                url: '../../extra/stock/edit_name.php',
                type: 'POST',
                data: {
                    product_id: product_id,
                    new_name: new_name,
                    old_name: old_name
                },
                success: function(response) {
                    console.log(response); // log response from server
                }
            });

        });
    }

    function selectText(element) {
        var range, selection;
        if (document.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(element);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(element);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }
