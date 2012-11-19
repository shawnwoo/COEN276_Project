var searchExistingString;


$(document).ready(function(){

                  $("select").change(update_qty);
});



function update_qty(){
    var selectedQty = this.value;
    var itemName = this.id;
    
    // value has changed, search if there if there is an exising item
    
    searchExistingString = itemName + "Picked";  // id of a a tablerow
    
    var foundItem = document.getElementById(searchExistingString);
    if( $(foundItem).length ){
        
        if (selectedQty > 0)
            $(foundItem).children(":last").text(selectedQty);
        else
            $(foundItem).remove();
        
    }
    else{
        var stringToAppend = "<tr id=" + itemName + "Picked> <td>" + itemName + "</td><td>" + selectedQty + "</td> </tr>";
        $("#orderDetails").append(stringToAppend);
    }
    
    
    
    
    
} // function end