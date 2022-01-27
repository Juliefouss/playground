
function onClickBtnLike(event) {
    // on enlève la direction sur une autre page
    event.preventDefault();

    // on récupère l'url
    const url = this.href;

    // on récupère le span avec la classe compt-like
    const spanComptLike = this.querySelector('span.compt-like');

    // on récupère le i
    const icone = this.querySelector('i')

    //la librairie axios va récupérer la réponse de la requête et envoyer une promesse en retour
    axios.get(url).then(function (response) {
        // on change le nombre de likes avec le nombre de likes fournie par la réponse du span
        spanComptLike.textContent = response.data.likes;

       // la on remplace le pouce vide par un pouce rempli et vice versa
        if (icone.classList.contains('fas fa-thumbs-up')) {
            icone.classList.replace('fas fa-thumbs-up', 'far fa-thumbs-up');
        }if (icone.classList.contains('far fa-thumbs-up')) {
            icone.classList.replace('far fa-thumbs-up', 'fas fa-thumbs-up');
        }
        // on gère les erreurs
    }).catch(function (error) {
        //console.log(error);
        if (error.response.status === 403) {
            window.location.href = "{{ url('app_login') }}";
        } else {
            window.alert('Une erreur s\'est produite...');
        }
    });
}
// on récupère tout les a avec la classe like et on boucle sur chacun des liens
document.querySelectorAll('a.like').forEach(function (link) {
    // on va écouter l'évènement click et appeler la fonction onClickBtnLike
    link.addEventListener('click', onClickBtnLike);
});
