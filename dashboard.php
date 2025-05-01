<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

$history_stmt = $conn->prepare("SELECT prompt, response, created_at FROM user_conversations WHERE user_id = ? ORDER BY created_at DESC");
$history_stmt->bind_param("i", $user_id);
$history_stmt->execute();
$history_result = $history_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        
        .neon-green {
            color: #39FF14;
            text-shadow: 0 0 10px #39FF14;
        }
        
        .dashboard-section {
            background: #111;
            border: 1px solid #39FF14;
            border-radius: 10px;
            padding: 2rem;
            margin: 2rem 0;
            box-shadow: 0 0 15px rgba(57, 255, 20, 0.1);
        }
        
        .chat-entry {
            background: #1a1a1a;
            border-left: 3px solid #39FF14;
            padding: 1.5rem;
            margin: 1rem 0;
            border-radius: 5px;
            transition: transform 0.3s;
        }
        
        .chat-entry:hover {
            transform: translateX(10px);
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.1);
        }
        
        .timestamp {
            color: #888;
            font-size: 0.9em;
        }
        
        .nav-button {
            background: #39FF14;
            color: #000 !important;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .nav-button:hover {
            background: #2cc312;
            box-shadow: 0 0 15px #39FF14;
        }
        
        .admin-links {
            list-style: none;
            padding: 0;
        }
        
        .admin-links li {
            margin: 1rem 0;
        }
        
        .admin-links a {
            color: #39FF14;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .admin-links a:hover {
            text-shadow: 0 0 10px #39FF14;
            margin-left: 5px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="dashboard-section">
        <h1 class="neon-green mb-4">DASHBOARD</h1>
        <p class="lead"><strong class="neon-green">EMAIL:</strong> <?php echo htmlspecialchars($email); ?></p>

        <div class="my-5">
            <h2 class="neon-green mb-4">CONTROL PANEL</h2>
            <ul class="admin-links">
                <li><a href="index.php"><i class="fas fa-home me-2"></i>Main Hub</a></li>
                <li><a href="history.php"><i class="fas fa-history me-2"></i>Conversation Archive</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout Sequence</a></li>
            </ul>
            <a href="chat.php" class="nav-button mt-3">Initiate Chat </a>
        </div>
    </div>

    <div class="dashboard-section">
        <h2 class="neon-green mb-4">CONVERSATION LOGS</h2>
        <?php if ($history_result->num_rows > 0): ?>
            <?php while ($row = $history_result->fetch_assoc()): ?>
                <div class="chat-entry">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-user neon-green me-2"></i>
                        <strong class="neon-green">USER:</strong>
                        <span class="ms-2"><?php echo htmlspecialchars($row['prompt']); ?></span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-robot neon-green me-2"></i>
                        <strong class="neon-green">AI:</strong>
                        <span class="ms-2"><?php echo htmlspecialchars($row['response']); ?></span>
                    </div>
                    <p class="timestamp mb-0"><i class="fas fa-clock me-2"></i><?php echo $row['created_at']; ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="text-center py-4">
                <p class="neon-green">No conversation records found</p>
                <i class="fas fa-comment-slash neon-green" style="font-size: 2rem;"></i>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>