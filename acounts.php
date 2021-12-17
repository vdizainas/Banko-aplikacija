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
?>

<body>
  <div class="container">
    <div class="row"> 
      <div class="col-12">                    
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>Sąskaitos numeris</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    $db = json_decode( file_get_contents('./db/db.json'), true);
                    foreach($db as $id => $klientas) :
                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $klientas['vardas']; ?></td>
                        <td><?php echo $klientas['pavarde']; ?></td>
                        <td><?php echo $klientas['ask']; ?></td>
                        <td><?php echo $klientas['saskaitos_nr']; ?></td>
                        <td>
                            <a href="index.php?action=delete&id=<?php echo $id; ?>" class="btn btn-danger">Ištrinti</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</body>  

<!-- footer -->
<?php
  include('footer.php');
?>
</html>