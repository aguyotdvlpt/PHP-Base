$(function() {
    // DEBUT DU SCRIPT
    
    $('.confirm-delete').on('click', function(event) {
        event.preventDefault();
        var button = this; // event.currentTarget
        // Plugin Sweet Alert
        swal({
            title: 'Etes-vous sûrs de vouloir supprimer cette brasserie ?',
            text: 'Vous ne pourrez-plus goûter les bières de cette brasserie',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        
        }) 

        .then(function (hasConfirm) {
            if(hasConfirm) { // Il veut supprimer la brasserie
                // $(button).click(); // On clique sur le vrai bouton pour supprimer
                
                window.location = $(button).attr('href');
                               
            }
        });
    });
    














    // FIN DU SCRIPT
});