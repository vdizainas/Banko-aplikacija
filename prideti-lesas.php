<?php 
  $title = 'title';
?>
<!DOCTYPE html>
<!--[if lte 8]><html class="pre-ie9" lang="en"><![endif]-->
<!--[if gte IE 9]><!--><html lang="en"><!--<![endif]-->
<html lang="en">
<!-- head -->
<?php
  include('head.php');
  include('header.php');

  // $user_data = open_db_file('./db/db.json');
  // print_r($user_data);

  $db = json_decode( file_get_contents('./db/db.json'), true);
  // $db = json_encode($db);

  foreach($db as $id => $klientas) {    
  }

  // print_r(json_decode($db));
  // echo $db;

  


?>


<body>
  <div class="container">
    <div class="row">

      <div class="col-8 m-auto">        
        
            <h1 class="mb-3 fs-3 fw-semibold">Pridėti lešų</h1>
            <p>Kliento ID <?php echo $id ?> </p>

      
            <form method="POST" class="needs-validation" novalidate="">
              <div class="row g-3">
                <div class="col-sm-6">
                <fieldset disabled>
                  <label for="firstName" class="form-label">Vardas</label>
                  <input type="text" class="form-control" id="firstName"  placeholder="" value="<?php echo $klientas['vardas']; ?>" name="kliento[vardas]">
                </fieldset>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Pavardė</label>
                  <input type="text" class="form-control" id="lastName" value="<?php echo $klientas['pavarde']; ?>" name="kliento[pavarde]" disabled>
                  <div class="invalid-feedback">
                    Šis laukas privalomas
                  </div>
                </div>

                <div class="col-12">
                  <label for="ask" class="form-label">Asmens kodas</label>
                  <input type="number" class="form-control" value="<?php echo $klientas['ask']; ?>" name="kliento[ask]"  disabled />
                  <div class="invalid-feedback">
                    Šis laukas privalomas
                  </div>
                </div>

                <div class="col-12">
                  <label for="acount-number" class="form-label">Sąskaitos numeris</label>
                  <input type="number" class="form-control" name="kliento[saskaitos_nr]" value="<?php echo $klientas['ask']; ?>" disabled />
                </div>
                <div class="col-12">
                  <label for="acount-sum" class="form-label">Pinigai sąskaitoje</label>
                  <input type="number" class="form-control" for="acount-sum" value="<?php echo $klientas['sum']; ?> ['sum']" name="kliento[sum]" required=""/>
                  <div class="invalid-feedback">
                    Šis laukas privalomas
                  </div>
                </div>
              <button class="btn btn-primary btn-lg mt-5" type="submit">Pridėti</button>
            </form>
          </div>
      </div>

    </div>


</body>  

<!-- footer -->
<?php
  include('footer.php')
?>
</html>