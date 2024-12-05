<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background: url('/images/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        
        .blur-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(15px);
            z-index: -1;
        }

       
        .container {
            text-align: center;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        
        .tectonic {
            opacity: 0;
            transform: translateY(-50px);
            animation: tectonic 1.5s ease-out forwards;
        }

       
        .heading {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        
        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            background-color: rgba(0, 0, 0, 0.7);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: rgba(0, 0, 0, 0.9);
            transform: scale(1.1);
        }

       
        @keyframes tectonic {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    
    <div class="blur-overlay"></div>

    
    <div class="container">
      
        <h2 class="heading tectonic">Bienvenue sur Project Manager, une plateforme de gestion de tâches collaboratives <br> conçue par Brunel AHOKPOSSI et Orens TONON.</h2><br><br>

       
        <div class="buttons tectonic">
            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn">Tableau de bord</a>
                    @else
                        <a href="{{ route('login') }}" class="btn">Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn">Inscription</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tectonicElements = document.querySelectorAll('.tectonic');
            tectonicElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.5}s`; 
            });
        });
    </script>
</body>
</html>
