<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nolan AI - Features</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --neon-green: #39FF14;
            --dark-bg: #000;
            --card-bg: #111;
        }

        body {
            background-color: var(--dark-bg);
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .neon-header {
            background: linear-gradient(135deg, #000 60%, #1a1a1a);
            border-bottom: 3px solid var(--neon-green);
            box-shadow: 0 0 25px rgba(57, 255, 20, 0.2);
            padding: 4rem 0;
        }

        .neon-title {
            color: var(--neon-green);
            text-shadow: 0 0 15px rgba(57, 255, 20, 0.5);
            font-weight: 800;
            letter-spacing: -1px;
        }

        .feature-card {
            background: var(--card-bg);
            border: 1px solid var(--neon-green);
            border-radius: 15px;
            padding: 2rem;
            margin: 1.5rem 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(57, 255, 20, 0.15);
        }

        .feature-icon {
            color: var(--neon-green);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            margin-bottom: 2rem;
            padding-left: 2.5rem;
            position: relative;
        }

        .feature-list li::before {
            content: "▹";
            color: var(--neon-green);
            position: absolute;
            left: 0;
            font-size: 1.2em;
        }

        .cyber-footer {
            border-top: 2px solid var(--neon-green);
            background: #1a1a1a;
            padding: 2rem;
            margin-top: 4rem;
        }

        .glow-text {
            text-shadow: 0 0 10px rgba(57, 255, 20, 0.3);
        }
    </style>
</head>
<body>

<header class="neon-header text-center">
    <div class="container">
        <h1 class="neon-title display-4 mb-3">NOLAN AI FEATURES</h1>
        <p class="lead text-white-50">Where Innovation Meets Creative Execution</p>
    </div>
</header>

<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="feature-card">
                <i class="fas fa-brain feature-icon"></i>
                <h3 class="glow-text mb-4">Core Architecture</h3>
                <ul class="feature-list">
                    <li>Dual AI Engine (Gemini + GPT-4)</li>
                    <li>Military-Grade Encryption</li>
                    <li>Real-Time Collaboration</li>
                    <li>Smart Version Control</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="feature-card">
                <i class="fas fa-tools feature-icon"></i>
                <h3 class="glow-text mb-4">Product Features</h3>
                <ul class="feature-list">
                    <li>AI-Powered Writing Suite</li>
                    <li>Interactive Storyboarding</li>
                    <li>Cross-Format Export</li>
                    <li>Collaborative Workspaces</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="feature-card">
        <i class="fas fa-infinity feature-icon"></i>
        <h3 class="glow-text mb-4">Technical Ecosystem</h3>
        <div class="row">
            <div class="col-md-4">
                <ul class="feature-list">
                    <li>Scalable MySQL Backend</li>
                    <li>RESTful API Integration</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="feature-list">
                    <li>Bootstrap 5 Interface</li>
                    <li>OAuth 2.0 Support</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="feature-list">
                    <li>Real-Time Analytics</li>
                    <li>CI/CD Pipeline</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<footer class="cyber-footer text-center">
    <div class="container">
        <p class="text-white-50 mb-0">
            © <?= date("Y"); ?> Nolan AI. All rights reserved. 
            <a href="index.php" class="text-decoration-none glow-text">Main Hub</a>
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>