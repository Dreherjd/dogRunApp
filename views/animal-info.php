<?php
require_once("../common/common.php");
require_once("../common/dbconnect.php");

if(isset($_GET['animal_id'])){
    #editing or viewing
    $animal_id = $_GET['animal_id'];

    #get the animal record passed from the id
    $stmt = $pdo->query("
        SELECT
            *
        FROM
            animals
        WHERE
            animal_id = $animal_id
    ");
    $animal_result = $stmt->execute();
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    #adding
    



}

$disabledOrNo = '';
function getPageState(){
    if(isset($_GET['animal_id'])){
        $disabledOrNo = 'disabled=""';
    } else {
        $disabledOrNo = "";
    }
    return $disabledOrNo;
}

?>

<?php include '../includes/header.php'; ?>

<style>
    <?php include '../assets/bootstrap.css'; ?>
</style>

<div class="row">
    <h3>Animal Info</h3>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Name</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['name'] ?>" <?php echo getPageState() ?>>
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Species</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['species'] ?>" <?php echo getPageState() ?>>
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Breed</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['breed'] ?>" <?php echo getPageState() ?>>
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Color</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['color'] ?>" <?php echo getPageState() ?>>
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Fixed?</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['fixed']) ?>" <?php echo getPageState() ?>>
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Gender</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['gender'] ?>" <?php echo getPageState() ?>>
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Darter?</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['will_dart']) ?>" <?php echo getPageState() ?> style="<?php echo dynamicRedForImportantFields($animal['will_dart'])?>)">
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Remain Caged?</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['must_remain_caged']) ?>" <?php echo getPageState() ?> style="<?php echo dynamicRedForImportantFields($animal['must_remain_caged'])?>)">
            </fieldset>
        </div>
    </div>
    <div class="col-4">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Special Needs</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['special_needs'] ?>" <?php echo getPageState() ?>></textarea>
        </div>
    </div>
    <div class="col-4">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Distinctive Markings</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['distinctive_markings'] ?>" <?php echo getPageState() ?>></textarea>
        </div>
    </div>
    <div class="col-12">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Notes</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['notes'] ?>" <?php echo getPageState() ?>></textarea>
        </div>
    </div>
    <br /><br /><br /><br /><br /><br /><br />
    <div class="col-12">
        <button type="button" class="btn btn-primary">Edit Animal Info</button>
        <button type="button" class="btn btn-danger">Delete Animal</button>
    </div>
</div>




<?php include '../includes/footer.php'; ?>