<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | Nolan AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        
        .neon-green {
            color: #39FF14;
            text-shadow: 0 0 10px #39FF14;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #000 60%, #1a1a1a);
            padding: 6rem 0;
            margin-bottom: 4rem;
            border-bottom: 2px solid #39FF14;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: #39FF14;
            margin-bottom: 1rem;
            text-shadow: 0 0 8px rgba(57, 255, 20, 0.5);
        }
        
        .card-hover {
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #39FF14;
            background: #111;
            border-radius: 15px;
            padding: 2rem;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.3);
            border-color: #7fff00;
        }
        
        .nav-highlight {
            border-bottom: 3px solid #39FF14;
        }
        
        .navbar {
            background: #000 !important;
            border-bottom: 1px solid #39FF14;
        }
        
        .list-item-glow li {
            transition: text-shadow 0.3s;
        }
        
        .list-item-glow li:hover {
            text-shadow: 0 0 10px #39FF14;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark px-4">
        <div class="container">
            <a class="navbar-brand neon-green" href="index.php" style="font-size: 1.5rem; font-weight: 800;">NOLAN AI</a>
            <div class="collapse navbar-collapse">
                 <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active nav-highlight" href="chat.php">Chat </a></li>
                    <li class="nav-item"><a class="nav-link active nav-highlight" href="history.php">History</a></li>
                    <li class="nav-item"><a class="nav-link active nav-highlight" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link active nav-highlight" href="index.php">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container text-center">
            <h1 class="neon-green display-4 mb-3" style="font-weight: 800;">ABOUT NOLAN AI</h1>
            <p class="lead fs-3 text-white-50">Where Innovation Meets Imagination</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-5">
            <div class="col-md-6">
                <div class="card-hover">
                    <i class="fas fa-brain feature-icon"></i>
                    <h3 class="neon-green mb-4">WHO WE ARE</h3>
                    <p class="fs-5 text-white-50">Nolan AI revolutionizes content creation through cutting-edge AI technology. We empower visionaries to transform ideas into masterpieces, combining human creativity with machine precision.</p>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card-hover">
                    <i class="fas fa-rocket feature-icon"></i>
                    <h3 class="neon-green mb-4">CORE FEATURES</h3>
                    <ul class="list-unstyled fs-5 list-item-glow">
                        <li class="mb-3 text-white"><i class="fas fa-chevron-right neon-green me-2"></i>Dual AI Architecture (Gemini + GPT-4)</li>
                        <li class="mb-3 text-white"><i class="fas fa-chevron-right neon-green me-2"></i>Real-time Collaborative Editing</li>
                        <li class="mb-3 text-white"><i class="fas fa-chevron-right neon-green me-2"></i>Military-grade Encryption</li>
                        <li class="text-white"><i class="fas fa-chevron-right neon-green me-2"></i>Smart Version Control</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center mt-6 pt-5 border-top border-secondary">
            <p class="text-white-50 mb-0">© <?= date("Y") ?> Nolan AI. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>