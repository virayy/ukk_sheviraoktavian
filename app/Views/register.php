<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        .register-container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Register</h2>
    <form action="<?= site_url('register/submit'); ?>" method="post">
        <?= csrf_field(); ?>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= old('name'); ?>" required>
            <?php if (isset($validation) && $validation->hasError('name')): ?>
                <div class="error"><?= $validation->getError('name'); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email'); ?>" required>
            <?php if (isset($validation) && $validation->hasError('email')): ?>
                <div class="error"><?= $validation->getError('email'); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <?php if (isset($validation) && $validation->hasError('password')): ?>
                <div class="error"><?= $validation->getError('password'); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <?php if (isset($validation) && $validation->hasError('confirm_password')): ?>
                <div class="error"><?= $validation->getError('confirm_password'); ?></div>
            <?php endif; ?>
        </div>

        <form id="registration-form">
    <div class="form-group">
        <button type="button" id="submit-btn">Register</button>
    </div>
</form>

<script>
    document.getElementById('submit-btn').addEventListener('click', function() {
        // Validasi atau proses form sebelum submit
        const form = document.getElementById('registration-form');
        
        // Misalnya, validasi untuk memastikan form tidak kosong
        if (form.checkValidity()) {
            form.submit();  // Kirimkan form
        } else {
            alert('Please fill out the form correctly.');
        }
    });
</script>


