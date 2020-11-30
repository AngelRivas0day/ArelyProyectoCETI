<?php
require('../../../shared/header.php');
require('../../../db/conn.php');
$conn = connection();
$id = $_GET['id'];
$cancion_query = "SELECT * FROM cancion WHERE id = $id";
if($result = $conn->query($cancion_query)):
    while($row = $result->fetch_assoc()):
?>
        <div class="container">
            <div class="row my-5">
                <div class="col-12">
                    <h1 class="text-center"><?php echo $row['nombre']; ?></h1>
                </div>
                <div class="col-12">
                    <audio class="w-100" controls>
                        <source src="../../<?php echo $row['file']; ?>" type="audio/ogg">
                        <source src="../../<?php echo $row['file']; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
require('../../../shared/footer.php');
?>