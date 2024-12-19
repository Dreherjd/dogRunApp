<?php
require_once("../common/common.php");
require_once("../common/dbconnect.php");
require_once("../models/animal-model.php");
require_once("../controllers/animal-info.php");

# default values for variables
$animal = new animal();
$name = $species = $breed = $color = $fixed = $gender = $darter = $remain_caged = $special_needs = $markings = $notes = "";
$animal_id = null;

if (isset($_GET['animal_id'])) {
    #editing
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
} else {
    #adding
}
$errors = array();
if (!empty($_POST)) {
}

$disabledOrNo = '';
function getPageState()
{
    if (!isset($_GET['animal_id'])) {
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

<form method="post">
    <div class="row">
        <h3>Animal Info</h3>

        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Name</label>
                    <input class="form-control" id="readOnlyInput" type="text" value="<?php echo $name ?>" <?php echo getPageState() ?>>
                </fieldset>
            </div>
        </div>
        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Species</label>
                    <input class="form-control" id="readOnlyInput" type="text" value="<?php echo $species ?>" <?php echo getPageState() ?>>
                </fieldset>
            </div>
        </div>
        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Breed</label>
                    <input class="form-control" id="readOnlyInput" type="text" value="<?php echo $breed ?>" <?php echo getPageState() ?>>
                </fieldset>
            </div>
        </div>
        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Color</label>
                    <input class="form-control" id="readOnlyInput" type="text" value="<?php echo $color ?>" <?php echo getPageState() ?>>
                </fieldset>
            </div>
        </div>
        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Fixed?</label>
                    <input class="form-control" id="readOnlyInput" type="text" value="<?php echo convertBoolToTorF($fixed) ?>" <?php echo getPageState() ?>>
                </fieldset>
            </div>
        </div>
        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Gender</label>
                    <input class="form-control" id="readOnlyInput" type="text" value="<?php echo $gender ?>" <?php echo getPageState() ?>>
                </fieldset>
            </div>
        </div>
        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Darter?</label>
                    <input class="form-control" id="readOnlyInput" type="text" value="<?php echo convertBoolToTorF($darter) ?>" <?php echo getPageState() ?> style="<?php echo dynamicRedForImportantFields($animal['will_dart']) ?>)">
                </fieldset>
            </div>
        </div>
        <div class="col-2">
            <div>
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Remain Caged?</label>
                    <input class="form-control" id="readOnlyInput" type="text" value="<?php echo convertBoolToTorF($remain_caged) ?>" <?php echo getPageState() ?> style="<?php echo dynamicRedForImportantFields($animal['must_remain_caged']) ?>)">
                </fieldset>
            </div>
        </div>
        <div class="col-4">
            <div>
                <label for="exampleTextarea" class="form-label mt-4">Special Needs</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" value="<?php echo $special_needs ?>" <?php echo getPageState() ?>></textarea>
            </div>
        </div>
        <div class="col-4">
            <div>
                <label for="exampleTextarea" class="form-label mt-4">Distinctive Markings</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" value="<?php echo $markings ?>" <?php echo getPageState() ?>></textarea>
            </div>
        </div>
        <div class="col-12">
            <div>
                <label for="exampleTextarea" class="form-label mt-4">Notes</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" value="<?php echo $notes ?>" <?php echo getPageState() ?>></textarea>
            </div>
        </div>
        <br /><br /><br /><br /><br /><br /><br />
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Confirm</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </div>

    </div>
</form>




<?php include '../includes/footer.php'; ?>