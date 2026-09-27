<?php
include 'includes/db.php';

try {
    // Check if admins table exists and has data
    $stmt = $conn->query("SELECT * FROM admins");
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Admins in database:\n";
    print_r($admins);
    
    // Test password verification
    if (!empty($admins)) {
        $admin = $admins[0];
        $test_password = 'admin123';
        echo "\nTesting password verification for: " . $test_password . "\n";
        echo "Stored hash: " . $admin['password'] . "\n";
        echo "Password verify result: " . (password_verify($test_password, $admin['password']) ? 'SUCCESS' : 'FAILED') . "\n";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
