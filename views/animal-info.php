<?php
require_once("../common/common.php");
require_once("../common/dbconnect.php");

# default values for variables
$name = $species = $breed = $color = $fixed = $gender = $darter = $remain_caged = $special_needs = $markings = $notes = '';
$animal_id = null;

if (isset($_GET['animal_id'])) {
    #editing or viewing
    $animal = getAnimalById($_GET['animal_id']);
    if ($animal) {
        $animal_id = $_GET['animal_id'];
        $name = $animal['name'];
        $species = $animal['species'];
        $breed = $animal['breed'];
        $color = $animal['color'];
        $fixed = $animal['fixed'];
        $gender = $animal['gender'];
        $darter = $animal['will_dart'];
        $remain_caged = $animal['must_remain_caged'];
        $special_needs = $animal['special_needs'];
        $markings = $animal['distinctive_markings'];
        $notes = $animal['notes'];
    }
}
$errors = array();
if (!empty($_POST)) {
    
}

$disabledOrNo = '';
function getPageState()
{
    if (isset($_GET['animal_id'])) {
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
    <form method="post">
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
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['will_dart']) ?>" <?php echo getPageState() ?> style="<?php echo dynamicRedForImportantFields($animal['will_dart']) ?>)">
                </fieldset>
            </div>
        </div>
        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Remain Caged?</label>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['must_remain_caged']) ?>" <?php echo getPageState() ?> style="<?php echo dynamicRedForImportantFields($animal['must_remain_caged']) ?>)">
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
    </form>
</div>




<?php include '../includes/footer.php'; ?>