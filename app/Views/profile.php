<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-header h2 {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        .profile-info label {
            font-weight: bold;
        }
        .profile-info input {
            background-color: #e9ecef;
            border: none;
            font-size: 16px;
        }
        .profile-info button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container profile-container">
        <div class="profile-header">
            <h2>User Profile</h2>
        </div>
        <div class="profile-info">
            <form>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" value="<?= htmlspecialchars($user->username); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($user->email); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="level">Level:</label>
                    <input type="text" class="form-control" id="level" value="<?= htmlspecialchars($user->level); ?>" readonly>
                    </div>
                <a href="<?= base_url('home/resetPassword/' . $user->id_user) ?>" class="btn btn-primary btn-block">Reset Password</a>
            </form>
        </div>
    </div>
</body>
</html>