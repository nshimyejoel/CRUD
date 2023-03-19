<?php
if (session()->get('yego')) {
?>
  <script>
    alert('<?php echo session()->get('yego'); ?>');
  </script>

<?php }
if (session()->get('oya')) {
?>
  <script>
    alert('<?php echo session()->get('oya'); ?>');
  </script>
<?php }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container mt-5 col-md-6">
    <h2 class="text-center mb-4">Registration Form</h2>
    <form action="<?php echo base_url('register'); ?>" method="post">
      <div class="mb-3">
        <label for="ni" class="form-label">National ID:</label>
        <input type="text" class="form-control" id="ni" name="ni" value="<?php echo set_value('ni'); ?>">
        <span><?php echo isset($validation) ? display_error($validation, 'ni') : ''; ?></span>
      </div>
      <div class="mb-3">
        <label for="na" class="form-label">Names:</label>
        <input type="text" class="form-control" id="na" name="na" value="<?php echo set_value('na'); ?>">
        <span><?php echo isset($validation) ? display_error($validation, 'na') : ''; ?></span>
      </div>
      <div class="mb-3">
        <label for="we" class="form-label">Weight:</label>
        <input type="text" class="form-control" id="we" name="we" value="<?php echo set_value('we'); ?>">
        <span><?php echo isset($validation) ? display_error($validation, 'we') : ''; ?></span>
      </div>
      <div class="mb-3">
        <label for="he" class="form-label">Height:</label>
        <input type="text" class="form-control" id="he" name="he" value="<?php echo set_value('he'); ?>">
        <span><?php echo isset($validation) ? display_error($validation, 'he') : ''; ?></span>
      </div>
      <div class="mb-3">
        <label for="dt" class="form-label">Date of Birth:</label>
        <input type="date" class="form-control" id="dt" name="dt" value="<?php echo set_value('dt'); ?>">
        <span><?php echo isset($validation) ? display_error($validation, 'dt') : ''; ?></span>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Register</button>
    </form>
  </div>
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>National ID</th>
        <th>Names</th>
        <th>Weight</th>
        <th>Height</th>
        <th>Date of Birth</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if (isset($citizenData)) {
        foreach ($citizenData as $row) { ?>
          <tr>
            <td><?php echo $row['national_id']; ?></td>
            <td><?php echo $row['names']; ?></td>
            <td><?php echo $row['weight']; ?></td>
            <td><?php echo $row['height']; ?></td>
            <td><?php echo $row['date_of_birth']; ?></td>
            <td><a href="<?php echo base_url('delete/' . $row['national_id']); ?>">delete</a></td>
            <td><a href="<?php echo base_url('update/' . $row['national_id']); ?>">update</a></td>
          </tr>
      <?php }
      } ?>

    </tbody>
  </table>

</body>

</html>