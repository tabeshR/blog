var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function() {
        this.parentElement.querySelector(".nested").classList.toggle("active");
        if(this.parentElement.querySelector(".nested").classList.contains('active')){
            this.className = 'fas fa-minus-circle';
        }else{
            this.className = 'fas fa-plus-circle caret';
        }

    });
}
