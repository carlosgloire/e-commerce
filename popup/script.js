
    // JavaScript code
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            const productId = this.getAttribute('data-product-id');
            const popup = this.nextElementSibling;
            popup.style.display = 'block';

            const closePopup = popup.querySelector('.close');
            closePopup.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        });
    });
