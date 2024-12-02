const itemSlidebar = document.querySelectorAll(".category-left-li")
itemSlidebar.forEach(function(menu,index){
    menu.addEventListener("click",function(){
        menu.classList.toggle("block")
    })
})