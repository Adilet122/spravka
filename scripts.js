document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function (event) {
            let valid = true;
            this.querySelectorAll('input, select, textarea').forEach(input => {
                if (!input.checkValidity()) {
                    valid = false;
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = '';
                }
            });
            if (!valid) {
                event.preventDefault();
                alert('Пожалуйста, заполните все обязательные поля.');
            }
        });
    });
});
