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
        <h2 class="text-center mb-4">Update Form</h2>
        <form action="<?php echo base_url('updatedData/' . $citizenData['national_id']); ?>" method="post">
            <div class="mb-3">
                <label for="ni" class="form-label">National ID:</label>
                <input type="text" class="form-control" id="ni" name="ni" value="<?php echo $citizenData['national_id']; ?>">
            </div>
            <div class="mb-3">
                <label for="na" class="form-label">Names:</label>
                <input type="text" class="form-control" id="na" name="na" value="<?php echo $citizenData['names']; ?>">

            </div>
            <div class="mb-3">
                <label for="we" class="form-label">Weight:</label>
                <input type="text" class="form-control" id="we" name="we" value="<?php echo $citizenData['weight']; ?>">

            </div>
            <div class="mb-3">
                <label for="he" class="form-label">Height:</label>
                <input type="text" class="form-control" id="he" name="he" value="<?php echo $citizenData['height']; ?>">

            </div>
            <div class="mb-3">
                <label for="dt" class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" id="dt" name="dt" value="<?php echo $citizenData['date_of_birth']; ?>">

            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>





</body>

</html>