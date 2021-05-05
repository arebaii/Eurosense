
// tuto : https://grafikart.fr/tutoriels/tp-tabs-776

(function() { //ENGLOBER Dans une fonction qui est auto appelé () afin d'éviter les collision avec une autre fonction

    // ############## Set and remove active mod ##########################################

    //Select all ref in class tabs
    var tabs = document.querySelectorAll('.tabsDT a')

    var afficherOnglet = function(a) {
        var li = a.parentNode //récupére la puce li    
            var div = a.parentNode.parentNode.parentNode //récupére la div parent * 3  à partir du 'a' -> li -> ul -> div

            //Est ce que l'élément parrent contient la classe active --- Si Oui ->
            if (li.classList.contains('active')){
                return false; //arréte l'éxecution de la fonction
            }
        
            // récupére l'élément actif -> enléve la classe active
            div.querySelector('.tabsDT .active').classList.remove('active')
            li.classList.add('active') // --> Rajoute la classe active sur l'élément cliqué

            //Enleve la class active du contenu
            div.querySelector('.tabDT-content.active').classList.remove('active')
            //permet de récupérer le href -> # et on lui ajoute l'éléement active
            div.querySelector(a.getAttribute('href')).classList.add('active')
    }

    //Boucle sur l'ensemble des éléments tabs
    for (var i = 0; i < tabs.length; i++){
        //Pour tabs[i] ajoute un événement click de fonction :
        tabs[i].addEventListener('click', function (e) {
            afficherOnglet(this)
        })
    }
    }

)()
