<!DOCTYPE html>
<html lang="en">
<!-- Author: Anil Prajapati @anilprz -->

<head>
	<meta charset="UTF-8">
	<title>Database Manager</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #f8f9fa;
			padding-top: 5%;
		}

		.form-group {
			margin-bottom: 2em;;
		}

		.card {
			width: 100%;
			max-width: 800px;
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<div class="card">
		<div class="card-body">
			<h4 class="card-title text-center mb-4">Create Database and User</h4>
			<form action="" method="post">
				<div class="form-group">
					<label for="db_name">Database Name:</label>
					<input type="text" id="db_name" name="db_name" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="db_user">Username:</label>
					<input type="text" id="db_user" name="db_user" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="db_pass">Password:</label>
					<input type="password" id="db_pass" name="db_pass" class="form-control" required>
				</div>

				<button type="submit" name="create" class="btn btn-primary btn-block">Create Database and User</button>
			</form>

			<?php
            if (isset($_POST['create'])) {
                $host = 'mariadb';
                $rootUser = 'root';
                $rootPassword = 'mariadb';
                $dbName = $_POST['db_name'];
                $dbUser = $_POST['db_user'];
                $dbPass = $_POST['db_pass'];

                try {
                    // Connect to MySQL as root user
                    $pdo = new PDO("mysql:host=$host", $rootUser, $rootPassword);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Create the database
                    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName`");
                    echo "<div class='alert alert-success mt-4'>Database '$dbName' created successfully.</div>";

                    // Create the user and grant privileges
                    $pdo->exec("CREATE USER IF NOT EXISTS '$dbUser'@'%' IDENTIFIED BY '$dbPass'");
                    $pdo->exec("GRANT ALL PRIVILEGES ON `$dbName`.* TO '$dbUser'@'%'");
                    $pdo->exec("FLUSH PRIVILEGES");
                    echo "<div class='alert alert-success'>User '$dbUser' created and granted privileges on '$dbName'.</div>";

                } catch (PDOException $e) {
                    echo "<div class='alert alert-danger mt-4'>Error: " . $e->getMessage() . "</div>";
                }

                // Close the connection
                $pdo = null;
            }
			?>
		</div>
	</div>

	<!-- Bootstrap JS and dependencies -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	</script>
</body>

</html>