<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Mécaniciens - Gestion de Maintenance</title>
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
        .mechanic-table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .mechanic-table th {
            background-color: #4a90e2;
            color: #ffffff;
        }
        .hamburger-icon {
            font-size: 24px;
            color: white;
            margin-bottom: 20px;
            cursor: pointer;
            padding-left: 15px;
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
                        <li class="nav-item"><a class="nav-link active" href="mècanècia.php"><i class="fas fa-users-cog"></i> Les Mécaniciens</a></li>
                        <li class="nav-item"><a class="nav-link" href="Demand_d'intervention.php"><i class="fas fa-tools"></i> Demandes d'intervention</a></li>
                        <li class="nav-item"><a class="nav-link" href="bondetravail.php"><i class="fas fa-file-alt"></i> Bons de Travail</a></li>
                        <li class="nav-item"><a class="nav-link" href="mp.php"><i class="fas fa-wrench"></i> Maintenance Préventive</a></li>
                        <li class="nav-item"><a class="nav-link" href="historique.html"><i class="fas fa-history"></i> Historique</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4 main-content">
                <div class="welcome-header">
                    <h1>Liste des Mécaniciens</h1>
                </div>
                
                <div class="mechanic-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Spécialité</th>
                                <th>Expérience (années)</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Dupont</td>
                                <td>Jean</td>
                                <td>Moteur</td>
                                <td>10</td>
                                <td>Disponible</td>
                                <td>
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Martin</td>
                                <td>Sophie</td>
                                <td>Électricité</td>
                                <td>8</td>
                                <td>En intervention</td>
                                <td>
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <!-- Ajoutez plus de lignes selon vos besoins -->
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addMechanicModal"><i class="fas fa-plus"></i> Ajouter</button>
                   
                </div>
            </main>
        </div>
    </div>

    <!-- Modal pour ajouter un mécanicien -->
    <div class="modal fade" id="addMechanicModal" tabindex="-1" aria-labelledby="addMechanicModalLabel" aria-hidden="true">
        <div