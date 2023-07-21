<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Initialize an array to store validation errors
    $errors = array();

    // Validate the 'name' field
    if (empty($_POST["name"])) {
        $errors["name"] = "Name is required.";
    } elseif (!preg_match("/^[A-Za-z ]+$/", $_POST["name"])) {
        $errors["name"] = "Name should only contain letters or spaces.";
    }

    // Validate the 'email' field
    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }

    // Validate the 'phone' field
    if (empty($_POST["phone"])) {
        $errors["phone"] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["phone"])) {
        $errors["phone"] = "Phone number should be a 10-digit number.";
    }

    // Validate the 'password' field
    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required.";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{6,}$/", $_POST["password"])) {
        $errors["password"] = "Password must be at least 6 characters and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    // If there are no validation errors, process the form data further
    if (empty($errors)) {
        // Perform additional actions (e.g., save data to the database)
        // Here, you can access the form data using $_POST["name"], $_POST["email"], etc.
        // For example:
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        // Add your logic to handle the form data accordingly
        // ...

        // Redirect to a success page or display a success message
        header("Location: success.php");
        exit;
    }
}
?>

<!-- Your HTML form -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<!-- ... -->
<body>
    <!-- ... -->
    <div class="container">
        <form method="post" action="">
            <!-- Name Input -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" >
                <?php if (isset($errors["name"])) echo "<p class='text-danger'>" . $errors["name"] . "</p>"; ?>
            </div>

            <!-- Email Input -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
                <?php if (isset($errors["email"])) echo "<p class='text-danger'>" . $errors["email"] . "</p>"; ?>
            </div>

            <!-- Phone Input -->
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" >
                <?php if (isset($errors["phone"])) echo "<p class='text-danger'>" . $errors["phone"] . "</p>"; ?>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <?php if (isset($errors["password"])) echo "<p class='text-danger'>" . $errors["password"] . "</p>"; ?>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- ... -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<!-- ... -->
</html>
