document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    if (form) {
        form.addEventListener('submit', function (e) {
            const nom = document.querySelector('input[name="nom"]').value.trim();
            const prenom = document.querySelector('input[name="prenom"]').value.trim();

            if (nom === '') {
                e.preventDefault();
                alert('Le nom est obligatoire !');
                return;
            }

            if (prenom === '') {
                e.preventDefault();
                alert('Le prénom est obligatoire !');
                return;
            }
        });
    }
});