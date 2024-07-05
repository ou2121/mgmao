
<?php include('dbconnection.php');
if(isset($_POST['ajouter'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $numbus = mysqli_real_escape_string($connection, $_POST['numbus']);
    $dateheure = mysqli_real_escape_string($connection, $_POST['dateheure']);
    $demandeur = mysqli_real_escape_string($connection, $_POST['demandeur']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    $query = "INSERT INTO `di`(`id`, `numbus`, `dateheure`, `demandeur`, `description`) 
    VALUES ('$id','$numbus','$dateheure','$demandeur','$description')";
    
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Erreur lors de l'ajout du bus: " . mysqli_error($connection));
    }
    
}
if(isset($_POST['delete_id'])) {
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    
    $query = "DELETE FROM di WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    
    if($result) {
        echo "تم حذف الباص بنجاح. معرف الباص: " . $id;
    } else {
        echo "حدث خطأ أثناء حذف الباص: " . mysqli_error($connection) . ". معرف الباص: " . $id;
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Bus - Gestion de Maintenance</title>
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
        .bus-table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .bus-table th {
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
                        <li class="nav-item"><a class="nav-link active" href="bus.php"><i class="fas fa-bus"></i> Les Bus</a></li>
                        <li class="nav-item"><a class="nav-link" href="mècanècia.php"><i class="fas fa-users-cog"></i> Les Mécaniciens</a></li>
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
                    <h1>Demande D'intervention</h1>
                </div>
                
                <div class="bus-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Num De Bus</th>
                                <th>Date Et Heure</th>
                                <th>Nom Demandeur</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
    $query = "SELECT * FROM `di`";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Erreur de requête: " . mysqli_error($connection));
    } else {
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['numbus']; ?></td>
            <td><?php echo $row['dateheure']; ?></td>
            <td><?php echo $row['demandeur']; ?></td>
            <td><?php echo $row['description']; ?></td>
        
            <td>
                <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger delete-btn" data-id="<?php echo $row['id']; ?>">
    <i class="fas fa-trash-alt"></i>
</button>
            </td>
        </tr>
    <?php
        }
    }
    ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addBusModal"><i class="fas fa-plus"></i> Ajouter</button>
                   
                </div>
            </main>
        </div>
    </div>
    <form action="" method="post">
    <!-- Modal (modifié pour correspondre aux nouvelles colonnes) -->
    <div class="modal fade" id="addBusModal" tabindex="-1" aria-labelledby="addBusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBusModalLabel">Ajouter un Demande D'intervention</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addBusForm">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" required>
                        </div>
                        <div class="mb-3">
                            <label for="numBus" class="form-label">Numéro de bus</label>
                            <input type="text" class="form-control" name="numbus" required>
                        </div>
                        <div class="mb-3">
                            <label for="dateHeure" class="form-label">Date et heure</label>
                            <input type="datetime-local" class="form-control" name="dateheure" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomDemandeur" class="form-label">Nom du demandeur</label>
                            <input type="text" class="form-control" name="demandeur" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-primary" name="ajouter" value="Ajouter">
                </div>
            </div>
        </div>
    </div> </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function submitForm() {
            // Ici, vous pouvez ajouter la logique pour traiter le formulaire
            // Par exemple, envoi des données à un serveur ou ajout à la table
            console.log("Formulaire soumis");
            // Fermer le modal après soumission
            var modal = bootstrap.Modal.getInstance(document.getElementById('addBusModal'));
            modal.hide();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>

$(document).ready(function() {
    $('.delete-btn').click(function() {
        if(confirm('هل أنت متأكد من رغبتك في حذف هذا الباص؟')) {
            var id = $(this).data('id');
            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: {delete_id: id},
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert("حدث خطأ: " + xhr.responseText);
                    console.log(xhr.responseText);
                }
            });
        }
    });
});
</script>
    </body>
</html>