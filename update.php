<?php
session_start();
 if (isset($_GET['id'])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>ToDo</title>
</head>

<body>

  

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="handlers/handleUpdate.php?id=<?php echo $_GET['id']?>" method="POST" class="form border p-2 my-5">
                    <h1 class="text-center text-success">Edit Task</h1>
                    <?php
                    if (isset($_SESSION['errorUpdate'])):
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $_SESSION['errorUpdate'];
                            unset($_SESSION['errorUpdate'])
                            ?>
                        </div>
                        <?php endif;?>
                    <input id="myInput" type="text" name="updatedtitle" class="form-control my-3 border border-success" value="<?php echo $_GET['title']?>" autofocus>
                    <input type="submit" value="Edit" class="form-control btn btn-success my-3 " placeholder="add new todo">
                </form>
            </div>
            </div>
        </div>
    </div>
    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
      const input = document.getElementById('myInput');
      input.select();
    });
  </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
<?php else:
header("location:index.php");
die;
endif;
 ?>
