var userLoggedIn = false;
var cart = new Array();
var subtotal = 0.00;
var delivery = 0.00;
var discountRate = 0.;
var discount = 0.00;
var taxRate = 0.0825;
var tax = 0.00;
var total = 0.00;


$(document).ready(function(){
                  
                  $("#login").click(validateUser);
                  $("select").change(update_qty);
                  $("input:radio").change(set_delivery);
                  })


function set_delivery(){
    
    delivery = $("input:radio:checked").val();
    $("#delivery").text(delivery);
    total = get_total();
    $("#total").text(total);
    
}


function get_subtotal(array){
    var sum = 0;
    for(var obj in array){
        sum += array[obj][2];
    }
    return sum;
}


function get_total(){
    if (userLoggedIn) {
        discountRate = 0.1
    }
    discount = discountRate * subtotal;
    tax = taxRate * subtotal;
    
    return (parseFloat(subtotal) - parseFloat(discount) + parseFloat(tax) + parseFloat(delivery));
}






function update_qty(){
    
    var selectedQty = this.value;
    var itemName = this.id; 
    var price = $(this).closest(".item").children(".itemHeader").children(".price").text(); alert
    var linePrice = price * selectedQty;
    cart[itemName]=[selectedQty, price, selectedQty*price];
    subtotal = get_subtotal(cart);
    total = get_total();
    
    // value has changed, search if there if there is an exising item
    searchExistingString = itemName + "Picked";  // id of a a tablerow
    alert(searchExistingString)
    
    var foundItem = document.getElementById(searchExistingString);
    if( $(foundItem).length ){
        
        if (selectedQty > 0){
            $(foundItem).children(":last").text(linePrice);
            alert("here")}
        else
            $(foundItem).remove();
        
    }
    else{
        alert("here 2")
        var stringToAppend = "<tr id=" + itemName + "Picked> <td>" + itemName + " " + selectedQty + " at $" + price + "</td><td>" + linePrice  + "</td></tr>";
        $("#orderDetails").prepend(stringToAppend);
    }
    $("#subtotal").text(subtotal);
    $("#discount").text(discount);
    $("#tax").text(tax);
    $("#delivery").text(delivery);
    $("#total").text(total);
    
} // function end





function validateUser()
{
    
    var username = $("#username").val();
    var password = $("#password").val();
    
    
    
    /*if (username.length==0)
    {
        $("#txtHint").text("Wrong username  and or password", alert("hi"));
        return;
    } */
    
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState)
        {

            var response = xmlhttp.responseText;
            if (response){
                if ( response === "Invalid login" ){
                    
                    $("#invalidLoginMsg").text("Invalid username and/or password");
                }
                else{
                    // Make login fields dissapear
                    $("#invalidLoginMsg").text("");
                    $("#personal").html(response);
                    userLoggedIn = true;
                    if(subtotal>0){
                        get_total();
                        $("#discount").text(discount);
                        $("#tax").text(tax);
                        $("#delivery").text(delivery);
                        $("#total").text(total);}
                    
                }
            };
            
            
        }
    }
    xmlhttp.open("POST","loginDisplay.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("username="+username+"&password="+password);     
}



