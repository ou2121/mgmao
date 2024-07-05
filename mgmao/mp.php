<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Préventive - Gestion de Maintenance</title>
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
            position: fixed;
            width: 250px;
        }
        .sidebar .nav-link {
            color: #ffffff;
            padding: 10px 15px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link:hover {
            background-color: #34495e;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .welcome-header {
            text-align: center;
            padding: 15px 0;
            margin-bottom: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .welcome-header h1 {
            color: #4a90e2;
            font-size: 2.2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
        }
        .maintenance-table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .maintenance-table th {
            background-color: #4a90e2;
            color: #ffffff;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
            }
            .main-content {
                margin-left: 0;
            }
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
                        <li class="nav-item"><a class="nav-link" href="index.html"><i class="fas fa-chart-line"></i> Tableau de bord</a></li>
                        <li class="nav-item"><a class="nav-link" href="bus.php"><i class="fas fa-bus"></i> Les Bus</a></li>
                        <li class="nav-item"><a class="nav-link" href="mècanècia.php"><i class="fas fa-users-cog"></i> Les Mécaniciens</a></li>
                        <li class="nav-item"><a class="nav-link" href="Demand_d'intervention.php"><i class="fas fa-tools"></i> Demandes d'intervention</a></li>
                        <li class="nav-item"><a class="nav-link" href="bondetravail.php"><i class="fas fa-file-alt"></i> Bons de Travail</a></li>
                        <li class="nav-item"><a class="nav-link active" href="mp.php"><i class="fas fa-wrench"></i> Maintenance Préventive</a></li>
                        <li class="nav-item"><a class="nav-link" href="historique.html"><i class="fas fa-history"></i> Historique</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4 main-content">
                <div class="welcome-header">
                    <h1>MAINTENANCE PRÉVENTIVE</h1>
                </div>
                
                <div class="maintenance-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Num. Bus</th>
                                <th>Type d'entretien</th>
                                <th>Pièce/Huile</th>
                                <th>Dernière maintenance</th>
                                <th>Prochaine maintenance</th>
                                <th>Kilométrage actuel</th>
                                <th>Kilométrage prévu</th>
                                <th>État</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BP001</td>
                                <td>Changement d'huile</td>
                                <td>Huile moteur</td>
                                <td>2023-04-15</td>
                                <td>2024-07-15</td>
                                <td>125000 km</td>
                                <td>130000 km</td>
                                <td><span class="badge bg-warning">Prévu</span></td>
                            </tr>
                            <tr>
                                <td>BP002</td>
                                <td>Remplacement courroie</td>
                                <td>Courroie de distribution</td>
                                <td>2023-03-01</td>
                                <td>2025-03-01</td>
                                <td>9000 km</td>
                                <td>120000 km</td>
                                <td><span class="badge bg-success">Effectué</span></td>
                            </tr>
                            <tr>
                                <td>BP003</td>
                                <td>Remplacement chaîne</td>
                                <td>Chaîne de distribution</td>
                                <td>2022-11-10</td>
                                <td>2023-11-10</td>
                                <td>100000 km</td>
                                <td>100000 km</td>
                                <td><span class="badge bg-danger">alerte</span></td>
                            </tr>
                            <tr>
                                <td>BP004</td>
                                <td>Révision générale</td>
                                <td>Multiples</td>
                                <td>2023-06-01</td>
                                <td>2023-06-15</td>
                                <td>75000 km</td>
                                <td>80000 km</td>
                                <td><span class="badge bg-info">En cours</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target