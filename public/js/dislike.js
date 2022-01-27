
function onClickBtnDislike(event) {
    // on enlève la direction sur une autre page
    event.preventDefault();

    // on récupère l'url
    const url = this.href;

    // on récupère le span avec la classe compt-like
    const spanCountDislike = this.querySelector('span.count-dislike');

    // on récupère le i
    const icone = this.querySelector('i')

    //la librairie axios va récupérer la réponse de la requête et envoyer une promesse en retour
    axios.get(url).then(function (response) {
        // on change le nombre de dislikes avec le nombre de dislikes fournie par la réponse du span
        spanCountDislike.textContent = response.data.dislikes;

        // la on remplace le pouce vide par un pouce rempli et vice versa
        if (icone.classList.contains('fa')) {
            icone.classList.replace('fas', 'far');
        } else {
            icone.classList.replace('far', 'fas');
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
// on récupère tout les a avec la classe dislike et on boucle sur chacun des liens
document.querySelectorAll('a.dislike').forEach(function (link) {
    // on va écouter l'évènement click et appeler la fonction onClickBtnLike
    link.addEventListener('click', onClickBtnDislike);
});
