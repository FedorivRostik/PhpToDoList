window.addEventListener('load', function () {
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach(ch => {
        ch.onclick = function () {
            this.parentNode.submit();
        }
    });
});