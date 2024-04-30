var userList = JSON.parse(localStorage.getItem("userList"));
if(userList == null) // tuc la khong co nguoi dang nhap
{
    userList = new Array();
}
var currentUser = localStorage.getItem("currentUser");


if(currentUser != null) {
    var replace = document.getElementById("header-right");
    replace.innerHTML =replace.innerHTML = '<div class="header-right-meta text-right">' +
        '<ul>'
        '    <li><a href="login-register.php"><i class="fa fa-user"></i></a></li>' +
        '    <li><a href="#" class="modal-active"><i class="fa fa-search"></i></a></li>'+
        '    <li class="settings"><a href="#"><i class="fa fa-cog"></i></a>'+
        '        <div class="site-settings d-block d-sm-flex">'+
        '            <dl class="currency">'+
        '                <dt>Currency</dt>' +
        '                <dd class="current"><a href="#">USD</a></dd>'+
        '                <dd><a href="#">AUD</a></dd>'+
        '                <dd><a href="#">CAD</a></dd>'+
        '                <dd><a href="#">BDT</a></dd>'+
        '            </dl>'+

        '            <dl class="my-account">'+
        '                <dt>My Account</dt>'+
        '                <dd><a href="#">Dashboard</a></dd>'+
        '                <dd><a href="#">Profile</a></dd>'+
        '                <dd><a href="#">Sign</a></dd>'+
        '                <dd><a href="#" onclick="logout()">Log Out</a></dd>'+
        '            </dl>'+

        '            <dl class="language">'+
        '                <dt>Language</dt>'+
        '                <dd class="current"><a href="#">English (US)</a></dd>'+
        '                <dd><a href="#">English (UK)</a></dd>'+
        '                <dd><a href="#">Chinees</a></dd>'+
        '                <dd><a href="#">Bengali</a></dd>'+
        '                <dd><a href="#">Hindi</a></dd>'+
        '                <dd><a href="#">Japanees</a></dd>'+
        '            </dl>'+
        '</div>'+
        '</li>'+
        '<li class="shop-cart"><a href="#"><i class="fa fa-shopping-bag"></i> <span'+
        ' class="count">3</span></a>'+
        '<div class="mini-cart">'+
        '<div class="mini-cart-body">'+
        '<div class="single-cart-item d-flex">'+
        '<figure class="product-thumb">'+
        '<a href="#"><img class="img-fluid" src="assets/img/product-1.jpg"'+
        ' alt="Products"/></a>'+
        '</figure>'+

        '<div class="product-details">'+
        '<h2><a href="#">Sprite Yoga Companion</a></h2>'+
        '<div class="cal d-flex align-items-center">'+
        '<span class="quantity">3</span>'+
        '<span class="multiplication">X</span>'+
        '<span class="price">$77.00</span>'+
        '</div>'+
        '</div>'+
        '<a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>'+
        '</div>'+
        '<div class="single-cart-item d-flex">'+
        '<figure class="product-thumb">'+
        '<a href="#"><img class="img-fluid" src="assets/img/product-2.jpg"'+
        ' alt="Products"/></a>'+
        '</figure>'+
        '<div class="product-details">'+
        '<h2><a href="#">Yoga Companion Kit</a></h2>'+
        '<div class="cal d-flex align-items-center">'+
        '<span class="quantity">2</span>'+
        '<span class="multiplication">X</span>'+
        '<span class="price">$6.00</span>'+
        '</div>'+
        '</div>'+
        '<a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>'+
        '</div>'+
        '<div class="single-cart-item d-flex">'+
        '<figure class="product-thumb">'+
        '<a href="#"><img class="img-fluid" src="assets/img/product-3.jpg"'+
        ' alt="Products"/></a>'+
        '</figure>'+
        '<div class="product-details">'+
        '<h2><a href="#">Sprite Yoga Companion Kit</a></h2>'+
        '<div class="cal d-flex align-items-center">'+
        '<span class="quantity">1</span>'+
        '<span class="multiplication">X</span>'+
        '<span class="price">$116.00</span>'+
        '</div>'+
        '</div>'+
        '<a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>'+
        '</div>'+
        '</div>'+
        '<div class="mini-cart-footer">'+
        '<a href="checkout.html" class="btn-add-to-cart">Checkout</a>'+
        '</div>'+
        '</div>'+
        '</li>'+
        '</ul>'+
        '</div>'+
        '</div>';
}


function onClickUserIcon() {
    event.preventDefault();

    window.location.href="login-register.php";
}

function signup()
{
    event.preventDefault();

    var fullName = document.getElementById("fullName").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var user = {
        fullName: fullName,
        email: email,
        phone: phone,
        username: username,
        password: password,
    }

    userList.push(user);
    var json = JSON.stringify(userList);

    localStorage.setItem("userList",json);
    alert("Register successfully");

    window.location.href="login-register.php";

}

function login()
{
    event.preventDefault();
    var username = document.getElementById("login-username").value;
    var password = document.getElementById("login-password").value;
    var flag = false;
    for(var i = 0; i < userList.length; i++)
    {
        if(username == userList[i].username && password == userList[i].password)
        {
            var JsonCurrentUser =JSON.stringify(userList[i]);
            localStorage.setItem("currentUser",JsonCurrentUser);
            window.location.href="index.php";
            flag = true;
        }
    }
    if(flag == true)
    {
        alert("Login successfully");
    }
    else
    {
        alert("Please try again");
    }

}

function logout()
{
    localStorage.removeItem("currentUser");
    window.location.href="index.php";
}





