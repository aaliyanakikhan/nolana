<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Assistant - NolanAI</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/favicon.png" type="image/png">
</head>
<body>
    <!-- Navigation <li><a href="history.html" class="nav-link">History</a></li>-->
    <header class="header">
        <nav class="navbar container">
            <a href="index.html" class="logo">NolanAI</a>
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="history.php" class="nav-link">History</a></li>

            </ul>
        </nav>
    </header>

    <main class="assistant-container container">
        <section class="ai-interface">
            <h2 class="section-title">AI Script Assistant</h2>
            
            <form method="POST" action="gemini_api.php" class="prompt-form">
                <div class="form-group">
                    <input type="text" 
                           name="prompt" 
                           class="form-input" 
                           placeholder="Ask anything about scriptwriting, character development, or industry trends..."
                           required>
                </div>
                <button type="submit" class="btn btn-block">
                    <span class="btn-text">Generate Response</span>
                </button>
            </form>

            <?php if (isset($_GET['response'])): ?>
                <div class="response-box">
                    <div class="response-header">
                        <span class="response-badge">NOLAN AI</span>
                        <span class="response-time"><?php echo date('H:i'); ?></span>
                    </div>
                    <div class="response-content">
                        <?php echo htmlspecialchars($_GET['response']); ?>
                    </div>
                </div>
            <?php endif; ?>
            
        </section>
    </main>
</body>
</html>