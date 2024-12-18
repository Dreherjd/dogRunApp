<?php
require_once("../common/common.php");
require_once("../common/dbconnect.php");
if (isset($_GET['run_id'])) {
    $run_id = $_GET['run_id'];

    #get the run record
    global $pdo;
    $stmt = $pdo->query("
        SELECT
            *
        FROM
            runs
        WHERE
            run_id = $run_id
    ");
    $run_result = $stmt->execute();
    $run = $stmt->fetch(PDO::FETCH_ASSOC);

    #get all the legs
    $stmt = $pdo->query("
        SELECT
            *
        FROM
            legs
        WHERE
            run_id = $run_id
    ");
    $leg_result = $stmt->execute();
    $legs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    #get the animal record assigned to run
    $animal_id = $run['animal'];
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

    function getDateForDatabase(string $date): string
    {
        $timestamp = strtotime($date);
        $date_formated = date('m/d/y - g:ia', $timestamp);
        return $date_formated;
    }

    function stripSpaceForPlus(string $string)
    {
        return str_replace(' ', '+', $string);
    }

    function convertBoolToTorF($bool)
    {
        if ($bool == 0) {
            return 'No';
        } else {
            return 'Yes';
        }
    }
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
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['name'] ?>" disabled="">
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Species</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['species'] ?>" disabled="">
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Breed</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['breed'] ?>" disabled="">
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Color</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['color'] ?>" disabled="">
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Fixed?</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['fixed']) ?>" disabled="">
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Gender</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $animal['gender'] ?>" disabled="">
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Darter?</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['will_dart']) ?>" disabled="">
            </fieldset>
        </div>
    </div>
    <div class="col-2">
        <div>
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Remain Caged?</label>
                <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo convertBoolToTorF($animal['must_remain_caged']) ?>" disabled="" style="background-color:#d9534f;">
            </fieldset>
        </div>
    </div>
    <div class="col-4">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Special Needs</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['special_needs'] ?>" disabled=""></textarea>
        </div>
    </div>
    <div class="col-4">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Distinctive Markings</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['distinctive_markings'] ?>" disabled=""></textarea>
        </div>
    </div>
    <div class="col-12">
        <div>
            <label for="exampleTextarea" class="form-label mt-4">Notes</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="<?php echo $animal['notes'] ?>" disabled=""></textarea>
        </div>
    </div>
    <br /><br /><br /><br /><br /><br /><br />
    <div class="col-12">
        <button type="button" class="btn btn-primary">Modify Animal Info</button>
        <button type="button" class="btn btn-primary">Cancel Run</button>
    </div>
</div>
<br />
<div class="row">
    <div class="col-12">
        <h3>Legs</h3>
        <table class="table table-hover table-bordered table-clickable">
            <thead>
                <tr>
                    <th scope="col">Leg Nubmer</th>
                    <th scope="col">Map Route</th>
                    <th scope="col">Start</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End</th>
                    <th scope="col">End Time</th>
                </tr>
            <tbody>
                <?php foreach ($legs as $leg) : ?>
                    <tr class="table-active">
                        <td>1</td>
                        <td><a href="https://www.google.com/maps/dir/?api=1&origin=<?php echo stripSpaceForPlus($leg['start_dest_address']) ?>&destination=<?php echo $leg['end_dest_address'] ?>&travelmode=driving" target="_blank">Route</a></td>
                        <td><a href="https://www.google.com/maps/search/?api=1&query=<?php echo stripSpaceForPlus($leg['start_dest_address']) ?>" target="_blank"><?php echo $leg['start_dest_address'] ?></a></td>
                        <td><?php echo getDateForDatabase($leg['start_time'])  ?></td>
                        <td><a href="https://www.google.com/maps/search/?api=1&query=<?php echo stripSpaceForPlus($leg['end_dest_address']) ?>" target="_blank"><?php echo $leg['end_dest_address'] ?></a></td>
                        <td><?php echo getDateForDatabase($leg['end_time']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </thead>
        </table>
    </div>
    <br /><br /><br /><br /><br /><br /><br />
    <div class="col-12">
        <button type="button" class="btn btn-primary">Change Leg Info</button>
        <button type="button" class="btn btn-primary">Cancel Run</button>
    </div>
</div>
<?php include '../includes/footer.php'; ?>