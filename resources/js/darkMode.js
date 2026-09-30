
function enableDarkMode() {

    let state = localStorage.getItem("darkMode") === 'true';

    function update() {

        document.documentElement.dataset.theme = state ? 'dark' : 'light';

        document.querySelectorAll('[data-dark-mode-toggle]').forEach(button => {
            button.textContent = state ? 'Light' : 'Dark';
        });

    }

    document.addEventListener('click', event => {

        if (!event.target.closest('[data-dark-mode-toggle]')) return;

        state = !state;
        localStorage.setItem("darkMode", state);
        update();
    });

    update();

}

enableDarkMode();