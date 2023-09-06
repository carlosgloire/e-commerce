<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
      window.addEventListener('DOMContentLoaded',(event) =>{
        const flashMessage= document.getElementById('flash-message2');
        setTimeout(function() {
            if(flashMessage){
                flashMessage.classList.add('opacity-0');
                setTimeout(function(){
                 flashMessage.style.display='none';
                }, 600); //fade duration
              
            }
            
        }, 5000); //5 seconds
    });

</script>
</body>
</html>
