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

  if( isset($_GET['action']) AND $_GET['action'] == 'delete') {

    if( isset($_GET['id']) ) {

        $id = $_GET['id'];

        $db = json_decode( file_get_contents('./db/db.json'), true);

        unset($db[$id]);

        if( file_put_contents( './db/db.json', json_encode($db) ) ) {
            header('Location: acounts.php?status=3');
        } else {
            header('Location: index.php?status=4');
        }
        
    }

}



?>


<body>
  <div class="container">
    <div class="row"> 
      <div class="col-12">                    
      <h1 class="mb-3 fs-3 fw-semibold">Klientų sąrašas</h1>
<?php
  if( isset($_GET['status']) AND $_GET['status'] == 3) :
?>

  <div class="alert alert-success" role="alert">
    <?php echo 'Sąskaitą sėkmingai ištrinta'; ?>
  </div>
<?php endif; ?>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>Sąskaitos numeris</th>
                <th>Suma</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                  $db = json_decode( file_get_contents('./db/db.json'), true);
                  foreach($db as $id => $klientas) :
                ?>
                    <tr>
                        <td class="col-1"><?php echo $id; ?></td>
                        <td><?php echo $klientas['vardas']; ?></td>
                        <td><?php echo $klientas['pavarde']; ?></td>
                        <td><?php echo $klientas['ask']; ?></td>
                        <td><?php echo $klientas['saskaitos_nr']; ?></td>
                        <td><?php echo $klientas['sum']; ?></td>
                        <td class="col-auto">
                          <div class="row">
                            <div class="col-auto">
                              <a href="./prideti-lesas?id=<?php echo $id; ?>" class="btn btn-outline-secondary btn-sm">Pridėti lėšas</a>
                            </div>
                            <div class="col-auto">
                              <a href="acounts.php?action=delete&id=<?php echo $id; ?>" class="btn btn-outline-secondary btn-sm">Nuskaičiuoti lėšas</a>
                            </div>
                            <div class="col-auto">
                              <a href="acounts.php?action=delete&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Ištrinti</a>
                            </div>
                          </div>
                      
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row -justify-content-end">
          <div class="col-4 m-auto">
            <a href="create-acount.php" class="btn btn-primary btn-lg w-100">Sukurti sąskaitą</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>  

<!-- footer -->
<?php
  include('footer.php');
?>
</html>