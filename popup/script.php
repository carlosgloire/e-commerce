
<script>
        // JavaScript code
        const deleteButtons = document.querySelectorAll('#delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                
                const popup = document.getElementById('popup');
                const deleteLink = document.getElementById('deleteProduct');

                popup.style.display = 'block';
            });
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'none';
        });
    </script>
