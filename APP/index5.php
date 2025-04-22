<?php
include("connect.php");
session_start();

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: index2.php");
    exit();
}

// Récupérer les plantations de l'utilisateur connecté
$query = "SELECT * FROM plantations WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>
<?php
include("chat.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="script1.js"></script>
    
    <title>Maroc Weather App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
  
        body {
            background: linear-gradient(135deg, #00feba, #5b548a);
            min-height: 100vh;
            padding: 200px;
        }
        
        /* Style pour les deux containers */
        .container {
            max-width: 600px;
            margin:  auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            margin-bottom: 100px; /* Espacement entre les containers */
        }

        /* Styles spécifiques pour chaque section */
        .weather-container {
            background-color: #f1f1f1;
        }

        .plant-container {
            background-color: #e3e3e3;
            max-width: 1400px;

        }

        /* Zone de recherche de la météo */
        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        input {
            flex: 1;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
        }
        header {
            position: fixed;
            left: 0px;
            top: 0;
            width: 100%;
            padding: 1.5rem 5%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 1.8rem;
            font-weight: 700;
            color: #054927;
        }

        .logo svg {
            width: 40px;
            height: 40px;
            fill: #0f6e2f;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
            color: #0d4b2c;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 600;
            padding: 0.8rem 1.4rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        nav-menu a:hover {
            background: rgba(44, 95, 45, 0.1);
            transform: translateY(-2px);
        }

        .logout-btn {
            background: #e74c3c;
            color: white !important;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
        }

        .logout-btn:hover {
            background: #c0392b !important;
            transform: translateY(-2px) scale(1.05);
        }
        
        button {
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            background: #00feba;
            color: #333;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #02e0aa;
        }

        .weather-info {
            text-align: center;
        }

        .temperature {
            font-size: 48px;
            font-weight: bold;
            margin: 20px 0;
        }

        .weather-details {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error {
            color: #ff3333;
            text-align: center;
            margin-top: 20px;
            display: none;
        }

        .weather-icon {
            width: 100px;
            margin: 0 auto;
        }

        /* Styles pour la table de suivi des plantes */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            background: #00feba;

        }
        td{
            background-color: #f2f2f2;
        }

        .plant-detail {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        #topBtn {
            position: fixed;
            top: 10%;
            left: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        #topBtn:hover {
            background-color: #000305;
        }
        

    </style>
</head>
<body>
     <!-- Return Button as an Icon -->
<button id="topBtn" onclick="goToIndex4()">
    <span class="glyphicon glyphicon-arrow-left"></span> <!-- Return Icon -->
</button>

<script type="text/javascript">
    function goToIndex4() {
        window.location.href = "index4.php"; // Redirect to index4.html
    }
</script>

   
    <header>
        <div class="logo">
            <svg viewBox="0 0 24 24">
                <path d="M12 2L2 7l3 1v9l7 4 7-4V8l3-1-10-5zM5 8v7l7 4 7-4V8l-7-4-7 4z"/>
                <path d="M5 15l7 4 7-4M5 11l7 4 7-4M12 2v5"/>
            </svg>
            AgriGuide
        </div>
        <nav class="nav-menu">
            <a href="index.php">Accueil</a>
            <a href="profile.php">Profil</a>
            <a href="logout.php" class="logout-btn">Déconnexion</a>
        </nav>
    </header>
    <!-- Container pour la météo -->
    <div class="container weather-container">
        <div class="search-box">
            <input type="text" placeholder="Entrez le nom de la ville" id="cityInput">
            <button onclick="getWeather()">Rechercher</button>
        </div>
        <div class="error" id="error">Ville non trouvée!</div>
        <div class="weather-info" id="weatherInfo">
            <img src="" class="weather-icon" id="weatherIcon">
            <div class="temperature" id="temperature"></div>
            <div class="city" id="city"></div>
            <div class="weather-details">
                <div class="detail-item">
                    <span>💧 Humidité</span>
                    <span id="humidity"></span>
                </div>
                <div class="detail-item">
                    <span>🌪️ Vent</span>
                    <span id="wind"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Container pour le suivi des plantes -->
    <div class="container plant-container">
        <h2>Suivi de la Plante</h2>
        <!-- Table de suivi des plantes -->
        <table>
    <thead>
        <tr>
            <th>Plante</th>
            <th>Date de plantation</th>
            <th>Température idéale</th>
            <th>Humidité idéale</th>
            <th>Taux d'irrigation</th>
            <th>Statut de croissance</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['plant_type']) . "</td>
                    <td>" . htmlspecialchars($row['planting_date']) . "</td>
                    <td>" . htmlspecialchars($row['ideal_temperature']) . "</td>
                    <td>" . htmlspecialchars($row['ideal_humidity']) . "</td>
                    <td>" . htmlspecialchars($row['irrigation_rate']) . "</td>
                    <td>" . htmlspecialchars($row['growth_status']) . "</td>
                </tr>";
        }
        ?>
    </tbody>
</table>
        <!-- Détails supplémentaires -->
        <div class="plant-detail">
            <div><strong>Dernière mise à jour:</strong> 29/03/2025</div>
        </div>
    </div>

    <script>
        const API_KEY = '3d08520c62aa14543f6ddef38eabe23d'; // Get from OpenWeatherMap

        async function getWeather() {
            const cityInput = document.getElementById('cityInput').value;
            const weatherInfo = document.getElementById('weatherInfo');
            const errorElement = document.getElementById('error');

            try {
                const response = await fetch(
                    `https://api.openweathermap.org/data/2.5/weather?q=${cityInput},MA&units=metric&appid=${API_KEY}`
                );

                if (!response.ok) throw new Error('City not found');
                
                const data = await response.json();
                
                // Update DOM elements
                document.getElementById('city').textContent = data.name;
                document.getElementById('temperature').textContent = `${Math.round(data.main.temp)}°C`;
                document.getElementById('humidity').textContent = `${data.main.humidity}%`;
                document.getElementById('wind').textContent = `${data.wind.speed} km/h`;
                
                // Set weather icon
                const weatherIcon = document.getElementById('weatherIcon');
                const iconCode = data.weather[0].icon;
                weatherIcon.src = `http://openweathermap.org/img/wn/${iconCode}.png`;

                weatherInfo.style.display = 'block';
                errorElement.style.display = 'none';

            } catch (error) {
                weatherInfo.style.display = 'none';
                errorElement.style.display = 'block';
            }
        }

        // Allow Enter key to trigger search
        document.getElementById('cityInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                getWeather();
            }
        });
    </script>
    
</body>
</html>
