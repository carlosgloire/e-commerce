let filterarray = [];
let galleryarray=[
    {
        id:1,
        name: "watch",
        src : "./images/watch1",
        desc:"lorem ipsum dolor sit consecteur .. "  
    },
    {
        id:2,
        name: "watch2",
        src : "./images/watch2",
        desc:"lorem ipsum dolor sit consecteur .. "  
    }
] 
//create a function to show galery
showgallery(galleryarray);
 
function showgallery(currarray){
    document.getElementById("card").innerHTML = ""; 
    for(var i=0; i<currarray.lenghth;i++){
        ducument.getElementById("card").InnerHTML +=
        <div>
            <div>
                <h4>${currarray[i].name  } </h4>
                <img src="${currarray[i].src}   " width="100%" height="320px" />
                <p>${currarray[i].desc}</p>
                <button>More</button>
            </div>
        </div>
    }
     

}

// live searching using keyup input
document.getElementById("myinput").addEventListener("keyup",function(){
    let text=document.getElementById("myinput").ariaValueMax;
    filterarray = galleryarray.filter(function(a){
        if(a.name.includes(text)){
            return a.name;
        }
    });
    if(this.value == ""){
        showgallery(galleryarray); 
    }
    else{
        if(filterarray ==""){
            document.getElementById("para").style.display = 'block';
            document.getElementById("card").innerHTML = "";
        }
        else{
            showgallery(filterarray)
            document.getElementById("para").style.display ="none    "
        }
    }
})