
// tuto : https://grafikart.fr/tutoriels/tp-tabs-776

(function() {

    // ############## Set and remove active mod ##########################################

    //Select all ref in class tabs
    var tabs = document.querySelectorAll('.tabs a')

    var afficherOnglet = function(a) {
        var li = a.parentNode // get li  
            var div = a.parentNode.parentNode.parentNode //get parent div

            //if li class is active
            if (li.classList.contains('active')){
                return false; //Stop function
            }
        
            // get active element and remove them
            div.querySelector('.tabs .active').classList.remove('active')
            li.classList.add('active') // add active class on select element

            //remove active element of content
            div.querySelector('.tab-content.active').classList.remove('active')
            //get href -> # adn add active element
            div.querySelector(a.getAttribute('href')).classList.add('active')
    }


    for (var i = 0; i < tabs.length; i++){
        //for eah tabs element add event click
        tabs[i].addEventListener('click', function (e) {
            afficherOnglet(this)
        })
    }



    // ############## keep actual position for refresh ##########################################

    //get actuel hash -> #...
    var hash = window.location.hash

    //Add active element
    var a = document.querySelector('a[href="' + hash + '"]')

    //if element _> querySelector and is active --> display content
    if(a !== null && !a.classList.contains('active')) {
        afficherOnglet(a)
    }
    }

)()
