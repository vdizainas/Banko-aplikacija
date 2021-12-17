<!DOCTYPE html>
<!--[if lte 8]><html class="pre-ie9" lang="en"><![endif]-->
<!--[if gte IE 9]><!--><html lang="en"><!--<![endif]-->
<html lang="en">  
<?php
  $title = 'Prisijungti';
  include('head.php');
  include('header.php');

// funkcija

function is_param_equal($method, $key, $comparison) {
    
  if(isset($method[$key]) && $method[$key] ==  $comparison) {
      return true;
  } else {
      return false;
  }
}

//Paleidzia php sesija
//Galim irasineti i $_SESSION masyva duomenis

session_start();

//Masyvas kuriame nurodyti teisingi prisijungimo duomenys
$auth = [
  'login' => 'admin@admin.lt',
  'password' => '12345'
];

//Kintamasis kuriuo tikriname ar vartotojas yra prisijunges
$logged_in = false;

//Tikriname su funkcija aprasyta 24-oje eiluteje, ar gaunamas $_POST parametras
if( is_param_equal($_POST, 'login', 1) ) {

  //Tikriname ar gavome reiksme email ir tikriname ar tai el pasto adresas
  if( isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

    //Tikriname ar el pasto adresas yra teisingas
    if( $_POST['email'] == $auth['login'] ) {

      //Tikriname ar ivestas slaptazodis ir ar slaptazodis yra tinkamas
      if( isset($_POST['password']) AND md5($_POST['password']) == md5($auth['password']) ) {

        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $auth['login'];
      }
    }
  }
}

if( is_param_equal($_POST, 'logout', 1) ) {

  session_destroy();
  header('Location: ./login.php');

}

//Jeigu $_SESSION['logged_in'] silirtas ir turi reiksme true, tuomet prie kintamojo priskiriam reiksme true

if( isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] ) {
  $logged_in = true;
}

//Tikriname ar varotojas prisijunges, jeigu ne rodome login forma
if(!$logged_in) : ?>

<body>
  <div class="container">

    <div class="row">
      <div class="col-4 m-auto text-center">
        <h1 class="mb-5 fs-3 fw-semibold">Prisijungti</h1>

<!-- forma -->

        <form method="POST">
          <input type="hidden" name="login" value="1"/>          
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vartotojo vardas</label>
            <input type="text" class="form-control text-center" id="exampleInputEmail1" name="email">
          </div>
          <div class="mb-5">
            <label for="exampleInputPassword1" class="form-label">Slaptažodis</label>
            <input type="password" class="form-control text-center" id="exampleInputPassword1" name="password">
          </div>      
          <button type="submit" class="btn btn-primary d-block m-auto px-5">Prisijungti</button>
        </form>

      </div>
    </div>
  </div>
 
</body>  

<?php else: ?>
<!-- <?php header('Location: ./create-acount.php'); ?> -->
<h1>Sekmingai prisijungete</h1>

<?php echo $_SESSION['user']; ?>

<div>
    <form method="POST">
        <input type="hidden" name="logout" value="1" />
        <button type="submit">Atsijungti</button>
    </form> 
</div>

            
<?php endif; ?>
<!-- footer -->
<?php
  include('footer.php');
?>
</html>