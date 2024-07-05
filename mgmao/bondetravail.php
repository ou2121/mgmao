
<?php include('dbconnection.php');
if(isset($_POST['ajouter'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $numbus = mysqli_real_escape_string($connection, $_POST['numbus']);
    $section = mysqli_real_escape_string($connection, $_POST['section']);
    $mecanicien = mysqli_real_escape_string($connection, $_POST['mecanicien']);
    $dateheuredebut = mysqli_real_escape_string($connection, $_POST['dateheuredebut']);
    $dateheurefin = mysqli_real_escape_string($connection, $_POST['dateheurefin']);
    $operation = mysqli_real_escape_string($connection, $_POST['operation']);

    $query = "INSERT INTO `bt`(`id`, `numbus`, `section`,`mecanicien`,`datedebut`, `datefin`, `operation`) 
    VALUES ('$id','$numbus','$section','$mecanicien','$dateheuredebut','$dateheurefin','$operation')";
    
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Erreur lors de l'ajout du bus: " . mysqli_error($connection));
    }
    
}
if(isset($_POST['delete_id'])) {
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    
    $query = "DELETE FROM bt WHERE id = ?";
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
<?php
if(isset($_POST['edit_bus'])) {
    $id = mysqli_real_escape_string($connection, $_POST['edit_id']);
    $numbus = mysqli_real_escape_string($connection, $_POST['edit_numbus']);
    $section = mysqli_real_escape_string($connection, $_POST['edit_section']);
    $mecanicien = mysqli_real_escape_string($connection, $_POST['edit_mecanicien']);
    $dateheuredebut = mysqli_real_escape_string($connection, $_POST['edit_dateheuredebut']);
    $dateheurefin = mysqli_real_escape_string($connection, $_POST['edit_dateheurefin']);
    $operation = mysqli_real_escape_string($connection, $_POST['edit_operation']);

    $query = "UPDATE `bt` SET 
              `numbus`='$numbus', 
              `section`='$section',
              `mecanicien`='$mecanicien',
              `datedebut`='$dateheuredebut',
              `datefin`='$dateheurefin',
              `operation`='$operation'
              WHERE `id`='$id'";
    
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Erreur lors de la modification du bon de travail: " . mysqli_error($connection));
    }
    
    // Redirection pour rafraîchir la page
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
     }?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Bus - Gestion de Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-chart-line"></i> Tableau de bord</a></li>
                        <li class="nav-item"><a class="nav-link active" href="bus.php"><i class="fas fa-bus"></i> Les Bus</a></li>
                        <li class="nav-item"><a class="nav-link" href="mècanècia.php"><i class="fas fa-users-cog"></i> Les Mécaniciens</a></li>
                        <li class="nav-item"><a class="nav-link" href="Demand_d'intervention.php"><i class="fas fa-tools"></i> Demandes d'intervention</a></li>
                        <li class="nav-item"><a class="nav-link" href="bondetravail.php"><i class="fas fa-file-alt"></i> Bons de Travail</a></li>
                        <li class="nav-item"><a class="nav-link" href="mp.php"><i class="fas fa-wrench"></i> Maintenance Préventive</a></li>
                        <li class="nav-item"><a class="nav-link" href="historique.php"><i class="fas fa-history"></i> Historique</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4 main-content">
                <div class="welcome-header">
                    <h1>BONS DE TRAVAIL</h1>
                </div>
                
                <div class="bus-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Num. Bon Travail</th>
                                <th>Num. Bus</th>
                                <th>Section</th>
                                <th>Mécanicien</th>
                                <th>Date et heure de début</th>
                                <th>Date et heure de fin</th>
                                <th>Opération à effectuer</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php 
    $query = "SELECT * FROM `bt`";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Erreur de requête: " . mysqli_error($connection));
    } else {
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['numbus']; ?></td>
            <td><?php echo $row['section']; ?></td>
            <td><?php echo $row['mecanicien']; ?></td>
            <td><?php echo $row['datedebut']; ?></td>
            <td><?php echo $row['datefin']; ?></td>
            <td><?php echo $row['operation']; ?></td>
        
                                <td>
                                    <button class="btn btn-sm btn-info" onclick="viewPDF(this.closest('tr'))"><i class="fas fa-print"></i> Imprimer</button>
                                    <button class="btn btn-sm btn-primary edit-btn" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#editBusModal">
    <i class="fas fa-edit"></i>
</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="<?php echo $row['id']; ?>">
                                    <i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <?php
        }
    }
    ?>
                        </tbody>
                    </table>
                </div> <div class="mt-3">
                    <div class="mt-3">
                        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addBusModal"><i class="fas fa-plus"></i> Ajouter</button>
                       
                        
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
            </main>
        </div>
    </div>
    <form action="" method="post">
    <div class="modal fade" id="addBusModal" tabindex="-1" aria-labelledby="addBusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBusModalLabel">Ajouter un nouveau bon de travail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addBusForm">
                        <div class="mb-3">
                            <label for="numBonTravail" class="form-label">Numéro de bon de travail</label>
                            <input type="text" class="form-control" name="id" required>
                        </div>
                        <div class="mb-3">
                            <label for="numBus" class="form-label">Numéro de bus</label>
                            <input type="text" class="form-control" name="numbus" required>
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Section</label>
                            <input type="text" class="form-control" name="section" required>
                        </div>
                        <div class="mb-3">
                            <label for="mecanicien" class="form-label">Mécanicien</label>
                            <input type="text" class="form-control" name="mecanicien" required>
                        </div>
                        <div class="mb-3">
                            <label for="dateHeureDebut" class="form-label">Date et heure de début</label>
                            <input type="datetime-local" class="form-control" name="dateheuredebut" required>
                        </div>
                        <div class="mb-3">
                            <label for="dateHeureFin" class="form-label">Date et heure de fin</label>
                            <input type="datetime-local" class="form-control" name="dateheurefin" required>
                        </div>
                        <div class="mb-3">
                            <label for="operation" class="form-label">Opération à effectuer</label>
                            <textarea class="form-control" name="operation" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-primary" name="ajouter" value="Ajouter">
                </div>
            </div>
        </div>
    </div></form>
    <div class="modal fade" id="editBusModal" tabindex="-1" aria-labelledby="editBusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBusModalLabel">Modifier le bon de travail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editBusForm" method="post">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="mb-3">
                        <label for="edit_numbus" class="form-label">Numéro de bus</label>
                        <input type="text" class="form-control" id="edit_numbus" name="edit_numbus" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_section" class="form-label">Section</label>
                        <input type="text" class="form-control" id="edit_section" name="edit_section" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_mecanicien" class="form-label">Mécanicien</label>
                        <input type="text" class="form-control" id="edit_mecanicien" name="edit_mecanicien" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_dateheuredebut" class="form-label">Date et heure de début</label>
                        <input type="datetime-local" class="form-control" id="edit_dateheuredebut" name="edit_dateheuredebut" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_dateheurefin" class="form-label">Date et heure de fin</label>
                        <input type="datetime-local" class="form-control" id="edit_dateheurefin" name="edit_dateheurefin" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_operation" class="form-label">Opération à effectuer</label>
                        <textarea class="form-control" id="edit_operation" name="edit_operation" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="edit_bus">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
        function viewPDF(row) {
    // Récupérer les données de la ligne du tableau
    const cells = row.cells;
    const numBonTravail = cells[0].textContent;
    const numBus = cells[1].textContent;
    const section = cells[2].textContent;
    const mecanicien = cells[3].textContent;
    const dateHeureDebut = cells[4].textContent;
    const dateHeureFin = cells[5].textContent;
    const operation = cells[6].textContent;

    // Créer le contenu HTML pour le PDF
    const content = `
        <h1>Bon de Travail</h1>
        <p><strong>Num Bon de Travail :</strong> ${numBonTravail}</p>
        <p><strong>Num-Bus :</strong> ${numBus}</p>
        <p><strong>Section :</strong> ${section}</p>
        <p><strong>Mècanicien :</strong> ${mecanicien}</p>
        <p><strong>Date heur dèbut :</strong> ${dateHeureDebut}</p>
        <p><strong>Dat et heur de fin :</strong> ${dateHeureFin}</p>
        <p><strong>Opèration a effectuer :</strong> ${operation}</p>
    `;

    // Options pour html2pdf
    const opt = {
        margin: 1,
        filename: `Bon de travail${numBonTravail}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    // Générer le PDF
    html2pdf().from(content).set(opt).save();
}

    </script>
   <script>
$(document).ready(function() {
    $('.edit-btn').click(function() {
        var id = $(this).data('id');
        var row = $(this).closest('tr');
        
        $('#edit_id').val(id);
        $('#edit_numbus').val(row.find('td:eq(1)').text());
        $('#edit_section').val(row.find('td:eq(2)').text());
        $('#edit_mecanicien').val(row.find('td:eq(3)').text());
        $('#edit_dateheuredebut').val(row.find('td:eq(4)').text().replace(' ', 'T'));
        $('#edit_dateheurefin').val(row.find('td:eq(5)').text().replace(' ', 'T'));
        $('#edit_operation').val(row.find('td:eq(6)').text());
    });
});
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script> $(document).ready(function() {
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