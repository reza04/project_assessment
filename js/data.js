var database={
    "menu":{
        "dropdown":{
            "value":{
                "Xiaomi":["#"],
                "Realme":["#"],
                "Samsung":["#"],
                "Oppo":["#"],
            }
        },
        "link":{
            "value":{
                "Home":["#"],
                "Produk Terbaru":["#terbaru"],
                "Produk Terlaris":["#terlaris"],
                "Produk Terpopuler":["#terpopuler"]
            }
        },
    },
    "feature":[
        ["fas fa-award fa-3x","Dijamin Keasliannya","Ditempat kami handphone dijamin telah terdahatar kode IMEI,jadi barang ori bukam ilegal "],
        ["fas fa-store fa-3x","Dijamin Keasliannya","Ditempat kami handphone dijamin sesuai dengan ekspektasi anda"],
        ["fas fa-shipping-fast fa-3x","Dijamin Keasliannya","Ditempat kami handphone dijamin sesuai dengan ekspektasi anda"],
    ]
};





var menu_dropdown_temp="";

var menu_dropdown_key=Object.keys(database.menu.dropdown.value);

for(x=0;x<menu_dropdown_key.length;x++){
    
    menu_dropdown_temp+=`<a class="dropdown-item" href="`+database.menu.dropdown.value[menu_dropdown_key[x]]+'">'+menu_dropdown_key[x]+`</a>`;
}

$('#menu_dropdown').html(menu_dropdown_temp);



// ================================ link baru

var menu_link_temp="";

var menu_link_key=Object.keys(database.menu.link.value);


for(x=0;x<menu_link_key.length;x++){
    menu_link_temp+=`<li id="menu_link" class="nav-item">
    <a class="nav-link"href="`+database.menu.link.value[menu_link_key[x]]+'">'+menu_link_key[x]+
    
    `</a>
    </li>`;
}
$('#menu_link').append(menu_link_temp);

// ===========================featur

var feature_temp="";

for(x=0;x<database.feature.length;x++){
feature_temp+=`<div class="col-12 col-md-4 col-lg-4">
<i class="`+database.feature[x][0]+`"></i>
<h3 class="h5 mt-4">`+database.feature[x][1]+`</h3>
<p>`+database.feature[x][2]+`</p>
</div>`;
}
$('#feature').html(feature_temp);

