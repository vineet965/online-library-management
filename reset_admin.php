<?php
session_start();
include 'includes/db.php';

try {
    // Check if admin exists
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->execute(['admin@library.com']);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($admin) {
        echo "Admin exists. Updating password...\n";
        // Update with fresh password hash for 'admin123'
        $new_password = password_hash('admin123', PASSWORD_DEFAULT);
        $update = $conn->prepare("UPDATE admins SET password = ? WHERE email = ?");
        $update->execute([$new_password, 'admin@library.com']);
        echo "Password updated successfully!\n";
        echo "New hash: " . $new_password . "\n";
    } else {
        echo "Admin does not exist. Creating new admin...\n";
        // Create new admin
        $password = password_hash('admin123', PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO admins (name, email, password) VALUES (?, ?, ?)");
        $insert->execute(['Admin User', 'admin@library.com', $password]);
        echo "Admin created successfully!\n";
        echo "Hash: " . $password . "\n";
    }
    
    // Verify the password works
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->execute(['admin@library.com']);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "\nTesting login:\n";
    echo "Email: admin@library.com\n";
    echo "Password: admin123\n";
    echo "Verification: " . (password_verify('admin123', $admin['password']) ? 'SUCCESS' : 'FAILED') . "\n";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
