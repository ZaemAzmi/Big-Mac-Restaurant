class Food{
    constructor(code, name, price){
        this.code=code;
        this.name=name;
        this.price=price;
    }
}

const food=[
    new Food(0, "Crunchy Soft Shell Crab Burger", 35.00),
    new Food(1, "Margherita Pizza", 23.00),
    new Food(2, "Grilled Soft Shell Crab Sandwiches", 25.00),
    new Food(3, "Grilled Salmon Steak", 30.00),
    new Food(4, "Southern Fried Chicken Burger", 20.00),
    new Food(5, "Wagyu Beef Croza", 56.00)
];

var prices = document.querySelectorAll(".price");
var btnAddCart = document.querySelectorAll(".BtnAddCart");
var cost=0;

for(var i=0; i<btnAddCart.length; i++){
    

    btnAddCart[i].addEventListener("click", function(event){
        var btnClicked=event.target;
        var code = btnClicked.getAttribute("id");
        truncatedPrice = prices[code-1].textContent.substring(2);
        thisPrice = parseFloat(truncatedPrice);
        cost += thisPrice;
        console.log(cost);
    });
}