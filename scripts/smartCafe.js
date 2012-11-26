

var userLoggedIn = false;
var cart = new Array();
var subtotal = 0.00; 
var delivery = 0.00; 
var discountRate = 0.00; 
var discount = 0.00; 
var taxRate = 0.0825; 
var tax = 0.00; 
var total = 0.00; 
var totalCal = 0; 

// user info
var caloricLimit=0; 
var budget=0; 
var caloricTracking=0;
var budgetTracking=0;
var balance=0; 

$(document).ready(function(){
                  
                  // need to get iterms out of the cart into an array
                  
                  $("#login").click(validateUser);
                  $(".foodSelect").change(update_qty);
                  $("input:radio").change(set_delivery);
                  $("#order").click(place_order);
                  $("#order").attr('disabled', true);
                  $(".itemFooter").hover(mousein, mouseout);
                  })


function mousein(){
    $(this).siblings(".tooltip").css({'display':'block'});
    
    
    
}

function mouseout(){
    $(this).siblings(".tooltip").hide();
}


function place_order(){
    
    var dataToPass = {};
    for(var obj in cart)
    {
        var propName = obj;
        dataToPass[propName] =  cart[propName][0];
    }
    dataToPass['grandTotal'] = total;

    $.post("scripts/placeorder.php", dataToPass, function(data){
           var now = new Date();
           var targetTime = new Date(now.getTime() + 30*60000);
           var time = targetTime.toTimeString();
           
           alert( "Thank you for your order!\nYour total of this purchase is $" + total.toFixed(2) + "\nYour order number is: " + data + ".\nIt will be ready or delivered at " + time + ".")
           // clear all forms
           location.reload(true);
           
           }
           );
    

}


function set_delivery(){
    
    delivery = $("input:radio:checked").val();
    $("#delivery").text(delivery);
    total = get_total();
    $("#total").text(total.toFixed(2));
    
}


function get_subtotal(array){
    var sum = 0;
    for(var obj in array){
        sum += array[obj][2];
    }
    return sum;
}


function get_total_cal(array){
    var sum = 0;
    for(var obj in array){
        sum += array[obj][3];
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
    var price = $(this).closest(".item").children(".itemHeader").children(".price").text();
    price = price.substr(1);
    price = parseFloat(price);
    price = price.toFixed(2);
    
    var linePrice = price * selectedQty;
    var calories = $(this).closest(".itemFooter").children(".cal").text();
    calories = parseFloat(calories);
    var lineCalories = calories * selectedQty; 
    cart[itemName]=[selectedQty, price, selectedQty*price, selectedQty*calories];
    subtotal = get_subtotal(cart); 
    total = get_total();
    totalCal = get_total_cal(cart);
    
    // value has changed, search if there if there is an exising item
    searchExistingString = itemName + "Picked";  // id of a a tablerow
    
    var foundItem = document.getElementById(searchExistingString);
    if( $(foundItem).length ){
        
        if (selectedQty > 0){
            $(foundItem).children(":last").text(linePrice.toFixed(2));
            $(foundItem).children(":first").text(itemName + " " + selectedQty + " at $" + price);
            }
        else
            $(foundItem).remove();
        
    }
    else{
        
        var stringToAppend = "<tr id='" + itemName + "Picked'> <td>" + itemName + " " + selectedQty + " at " + price  + "</td><td>" + linePrice.toFixed(2) + " (" + lineCalories + " cal)"  + "</td></tr>";
        $("#orderDetails").prepend(stringToAppend);        
    }
    
    $("#subtotal").text(subtotal.toFixed(2));
    $("#discount").text(discount.toFixed(2));
    $("#tax").text(tax.toFixed(2));
    $("#delivery").text(delivery.toFixed(2));
    $("#total").text(total.toFixed(2) + " (" + totalCal + " cal)" );
    
    
    // check if cart is empty or not to enable/disable the order button
    if (total-delivery){
        $("#order").attr('disabled', false);
    }
    else {
        $("#order").attr('disabled', true);
        
    }
    
    
    // check personal options
    if( $("#calLimit").length > 0)
    {
        caloricTracking = 1;
        caloricLimit = $("#calLimit").text();
        if (totalCal > caloricLimit){
            alert( "The calories in your cart exceeds your caloric limit of " + caloricLimit);
        }
    }
    
    
    if( $("#budgetLimit").length > 0)
    {
        budgetTracking = 1;
        budget = $("#budgetLimit").text();
        balance = $("#balance").text();
        if (balance < 100 ){
            alert( "There is less than $100 in your balance")
        }
    }
    
    
} // function end





function validateUser()
{
    
    var username = $("#username").val();
    var password = $("#password").val();
    
    
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
                        $("#discount").text(discount.toFixed(2));
                        $("#tax").text(tax.toFixed(2));
                        $("#delivery").text(delivery.toFixed(2));
                        $("#total").text(total.toFixed(2));}
                    
                    
                    // check personal options
                    if( $("#calLimit").length > 0)
                    {
                        caloricTracking = 1;
                        caloricLimit = $("#calLimit").text();
                        if (totalCal > caloricLimit){
                            alert( "The calories in your cart exceeds your caloric limit of " + caloricLimit);
                        }
                    }
                    
                    if( $("#budgetLimit").length > 0)
                    {
                        budgetTracking = 1;
                        budget = $("#budgetLimit").text();
                        balance = $("#balance").text();
                        if (balance < 100 ){
                            alert( "There is less than $100 in your balance!")
                        }
                    }


                    
                }
            };
            
            
        }
    }
    xmlhttp.open("POST","loginDisplay.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("username="+username+"&password="+password);
    
}



