<?php
require_once("../common/common.php");
require_once("../common/dbconnect.php");
require_once("../models/animal-model.php");

$animal = new animal();

if (isset($_GET['animal_id'])) {
    $animal = getAnimalById($_GET['animal_id']);
}

?>

<?php include '../includes/header.php'; ?>

<div class="row">
    <div class="col-5" style="height:10em;">
        <img src="../assets/images/placeholder-dog.png" />
    </div>
    <div class="col-7">
        <div class="row">
            <div class="col-4">
                <div>
                    <fieldset>
                        <label class="form-label mt-4" for="readOnlyInput">Name</label>
                        <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['name'] ?>" disabled="">
                    </fieldset>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <fieldset>
                        <label class="form-label mt-4" for="readOnlyInput">Color</label>
                        <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['color'] ?>" disabled="">
                    </fieldset>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <fieldset>
                        <label class="form-label mt-4" for="readOnlyInput">Darter?</label>
                        <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['will_dart']) ?>" disabled="" style="<?php echo dynamicRedForImportantFields($animal['will_dart']) ?>)">
                    </fieldset>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <fieldset>
                        <label class="form-label mt-4" for="readOnlyInput">Species</label>
                        <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['species'] ?>" disabled="">
                    </fieldset>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <fieldset>
                        <label class="form-label mt-4" for="readOnlyInput">Fixed?</label>
                        <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['fixed']) ?>" disabled="">
                    </fieldset>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <fieldset>
                        <label class="form-label mt-4" for="readOnlyInput">Remain Caged?</label>
                        <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['must_remain_caged']) ?>" disabled="" style="<?php echo dynamicRedForImportantFields($animal['must_remain_caged']) ?>)">
                    </fieldset>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <fieldset>
                        <label class="form-label mt-4" for="readOnlyInput">Breed</label>
                        <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['breed'] ?>" disabled="">
                    </fieldset>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <fieldset>
                        <label class="form-label mt-4" for="readOnlyInput">Gender</label>
                        <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['gender'] ?>" disabled="">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Distinctive Markings</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['distinctive_markings'] ?>" disabled=""></textarea>
        </div>
    </div>
    <div class="col-6">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Special Needs</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['special_needs'] ?>" disabled=""></textarea>
        </div>
    </div>
    <div class="col-12">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Notes</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['notes'] ?>" disabled=""></textarea>
        </div>
    </div>
</div>
<br />
<div class="col-12">
    <a type="button" href="animal-info.php?animal_id=<?php echo $animal['animal_id']?>" class="btn btn-primary">Edit Animal Info</a>
    <button type="button" class="btn btn-danger">Delete Animal</button>
</div>

<?php include '../includes/footer.php'; ?>