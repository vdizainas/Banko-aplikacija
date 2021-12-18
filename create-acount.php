<!DOCTYPE html>
<!--[if lte 8]><html class="pre-ie9" lang="en"><![endif]-->
<!--[if gte IE 9]><!--><html lang="en"><!--<![endif]-->
<html lang="en">
<!-- head -->
<?php
  $title = 'Naujas sąskaita';
  include('head.php');
  include('header.php');

$db = file_get_contents('./db/db.json');
$db = json_decode($db, true);

if( isset($_POST['kliento']) ) {
  if(
    $_POST['kliento']['vardas'] != '' &&
    $_POST['kliento']['pavarde'] != '' &&
    $_POST['kliento']['ask'] != '' &&
    $_POST['kliento']['saskaitos_nr'] != '' &&
    $_POST['kliento']['sum'] != ''
  ) {
    $db = file_get_contents('./db/db.json');
    $db = json_decode($db);
    
    $klientas = [$_POST['kliento']];

    if($db) {
      $klientas = array_merge($db, $klientas);
    }

    $json = json_encode($klientas);
    file_put_contents('./db/db.json', $json);
    header('Location: ./acounts.php');

    print_r($db);

  }
}

// $db.push($id);

?>

<body>
  <div class="container">
    <div class="row">

      <div class="col-8 m-auto">
        
            <h1 class="mb-3 fs-3 fw-semibold">Sukurti naują sąskaitą</h1>
            <form method="POST" class="needs-validation" novalidate="">
            <input type="hidden" class="form-control" name="kliento[sum]" value="0"/>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">Vardas</label>
                  <input type="text" class="form-control" id="firstName" name="kliento[vardas]" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                    Šis laukas privalomas
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Pavardė</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required="" name="kliento[pavarde]">
                  <div class="invalid-feedback">
                    Šis laukas privalomas
                  </div>
                </div>

                <div class="col-12">
                  <label for="ask" class="form-label">Asmens kodas</label>
                  <input type="number" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" name="kliento[ask]" required=""/>
                  <div class="invalid-feedback">
                    Šis laukas privalomas
                  </div>
                </div>

                <div class="col-12">
                  <label for="acount-number" class="form-label">Sąskaitos numeris</label>
                  <input type="number" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" for="acount-number" name="kliento[saskaitos_nr]" required=""/>
                  <div class="invalid-feedback">
                    Šis laukas privalomas
                  </div>
                </div>
              <button class="btn btn-primary btn-lg mt-5" type="submit">Sukurti</button>
            </form>
          </div>
      </div>

    </div>


</body>  

<!-- formos validacija -->

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>



<!-- footer -->
<?php
  include('footer.php')
?>
</html>