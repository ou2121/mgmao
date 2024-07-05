<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Gestion de Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }
        .sidebar {
            background-color: #2c3e50;
            color: #ffffff;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #ffffff;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover {
            background-color: #34495e;
        }
        .main-content {
            background-color: #ffffff;
            padding: 20px;
            margin-left: -15px;
        }
        .welcome-header {
    text-align: center;
    padding: 15px 0; /* Réduit de 25px à 15px */
    margin-bottom: 20px; /* Réduit de 30px à 20px */
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.welcome-header h1 {
    color: #4a90e2;
    font-size: 2.2rem; /* Réduit de 2.8rem à 2.2rem */
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px; /* Réduit de 3px à 2px */
    margin: 0;
}p
        .dashboard-container {
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .dashboard-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        .dashboard-card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .dashboard-card .icon {
            font-size: 2.5rem;
            margin-bottom: 16px;
            background-color: #f0f2f5;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 16px;
        }
        .dashboard-card .title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }
        .dashboard-card .value {
            font-size: 2rem;
            font-weight: 600;
            color: #1a73e8;
        }
        .dashboard-container a {
        text-decoration: none;
        color: inherit;
    }
    .dashboard-container a:hover {
        text-decoration: none;
        color: inherit;
    }
        
        .hamburger-icon {
            font-size: 24px;
            color: white;
            margin-bottom: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <div class="hamburger-icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="index2.php"><i class="fas fa-chart-line"></i> Tableau de bord</a></li>
                        <li class="nav-item"><a class="nav-link" href="bus2.php"><i class="fas fa-bus"></i> Les Bus</a></li>
                       
                        <li class="nav-item"><a class="nav-link" href="di2.php"><i class="fas fa-tools"></i> Demandes d'intervention</a></li>
                        <li class="nav-item"><a class="nav-link" href="..\login\logout.php"><i class="fas fa-history"></i> Log out</a></li> 
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4 main-content">
                <div class="welcome-header">
                    <h1>Gestion de Maintenance</h1>
                </div>
                
                <div class="dashboard-container">
                   <a href="#"> <div class="dashboard-row">
                        <div class="dashboard-card">
                            <div class="icon" style="color: #ff6347;"><i class="fas fa-users-cog"></i></div>
                           <div class="title">Mécaniciens</div>
                            <div class="value">25</div>
                        </div></a>
                    <a href="di2.php" class="dashboard-link">
    <div class="dashboard-card">
        <div class="icon" style="color: #ffd700;"><i class="fas fa-tools"></i></div>
        <div class="title">Demandes d'intervention</div>
        <div class="value">8</div>
    </div>
</a>
                        <a href="#">
                        <div class="dashboard-card">
                            <div class="icon" style="color: #32cd32;"><i class="fas fa-file-alt"></i></div>
                            <div class="title">Bons de travail</div>
                            <div class="value">5</div>
                        </div></a>

                        <a href="bus2.php">
                        <div class="dashboard-card">
                            <div class="icon" style="color: #3cb371;"><i class="fas fa-bus"></i></div>
                            <div class="title">Bus</div>
                            <div class="value">100</div>
                        </div></a>

                        <a href="#">
                        <div class="dashboard-card">
                            <div class="icon" style="color: #4169e1;"><i class="fas fa-wrench"></i></div>
                            <div class="title">Maintenances Préventives</div>
                            <div class="value">10</div>
                        </div> </a>

                        <a href="#">
                        <div class="dashboard-card">
                            <div class="icon" style="color: #ff4500;"><i class="fas fa-history"></i></div>
                            <div class="title">Historique</div>
                            <div class="value">-</div>
                        </div></a>
                    </div>
                </div>
            </main>
        </div>
    </div>