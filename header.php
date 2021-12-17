<header class="mb-5">      
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto header-left-side">
            <div class="logo-wrapper">
            </div>
          </div>
          <div class="col-auto header-right-side">
            <a href="javascript:void(0);" class="mob-trigger" onclick="myFunction()">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
            <nav id="primary-menu" class="menu" style="display: none;">              
              <ul>
                <li><a href="./create-acount.php">Create acount</a></li>
                <li><a href="#">Item</a></li>
                <li><a href="#">Item</a></li>
                <li><a href="./login.php">Prisijungti</a></li>
              </ul>
            </nav>

            <script>
              function myFunction() {
                if (document.getElementById("primary-menu").style.display == "none"){
                document.getElementById("primary-menu").style.display = "block"; 
                } else {
                document.getElementById("primary-menu").style.display = "none";
               }    
              }
              </script>
          </div>
        </div>
      </div>  
    </header>