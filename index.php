<html lang = "ptb-br">
  <head>
    <meta charset = "utf-8"/>
    <title>Gravando Arquivo</title>
    <link rel = "stylesheet" href="style.css">
  </head>
  <body>
      <div id = "corpo-form">
        <h1>Cadastro</h1>
        <form action="cadastro.php" method="post">
          <input type="text" name="email" placeholder = "Email" required/>
          <input type="text" name="nick" placeholder = "Nickname" required/>
          <input type="submit" class="cadastro" value = "Cadastrar"/>
        </form> 
      </div>

    <div id="modal-pop-up" class="modal-container">
      <div class = "modal">
        <button class="fechar">x</button>
        <h3><center>Cadastro OK!</h3>
          <form>
            <center> <input type="button" class="button" value="Fechar">
          </form>
      </div>
    </div>
    
    <script>
      
      function iniciaModal(modalID){
       
        const modal = document.getElementById(modalID);
        if(modal){
          modal.classList.add('mostrar');
          modal.addEventListener('click', (e) => {
            if(e.target.id == modalID  || e.target.className == 'fechar'){
              modal.classList.remove('mostrar');
            }
          });
        }
        
      }

      const logo = document.querySelector('.cadastro');
        logo.addEventListener('click', () => iniciaModal('modal-pop-up'));

    </script>

      
    

  </body>
</html>