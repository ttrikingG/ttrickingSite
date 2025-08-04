<div style="
            background-color: Indigo;
            color: snow;
            padding: 20px;
            margin: 0 auto;
            max-width: 400px;
            width: 90%;
            box-sizing: border-box;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
">

  <div style="position: relative;">
    <b class="LogoPart1" style="position: relative; top: -30px;">T</b>
    <b class="LogoPart2" style="position: relative; top: -30px;">TrickinG</b>
    <b style="position: relative; top: -30px;">Desenvolvimento Web</b><br>
  </div>

  <h2>Enter Admin Login</h2>
    
  <form action="/adminLogin/store" method="POST">
      <input type="text" placeholder="E-mail" name="email">
      <div style="color: snow; margin-bottom: 10px;"><small><?php echo message('email') ?></small></div>

      <input type="password" placeholder="Senha" name="password">
      <div style="color: snow; margin-bottom: 10px;"><small><?php echo message('password') ?></small></div>
            
      <button 
      style="
      background-color: lime;
      color: black;
      border: 1px solid #FFFFFF;
      border-radius: 2px;
      padding: 10px;
      font: inherit;
      width: 100%;
      cursor: pointer;
  "
  onmouseover="this.style.backgroundColor='white'"
  onmouseout="this.style.backgroundColor='lime'"
      type="submit">Logar</button>
      <div style="color: snow; margin-bottom: 10px;"><small><?php echo message('login') ?></small></div>

      <a style="color: snow;" href="/">Voltar</a>
  </form>


</div>

