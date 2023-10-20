<?php require_once "./classes/database.php"; ?>

<!Doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle details</title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">

</head>

<body class="d-flex flex-column bg-light">
    <?php app::component("navbar"); ?>

    <?php 
    $vehicle = DB::columns("*")::table("vehicles")::where(["user_id" => app::getSession("id")])::execute();
    $vehicle = DB::fetch("one");
    $vehicle = ($vehicle) ? $vehicle : [
        "id" => "",
        "type" => "",
        "brand" => "",
        "color" => "",
        "seats" => "",
        "model" => "",
        "reg_number" => "",
    ];
    ?>
    <main class="container">
        <section class="card mb-5">
            <?php if (empty($vehicle["type"])):?>
            <form class="form" id="vehicleCreate">
                <h1 class="h3 mb-2 font-weight-bold text-center">Vehicle details</h1>
                <p class="h6 mb-4 text-center text-muted">Add your vehicle details!</p>
                <?php else: ?>
                <form class="form mt-5 mb-5" id="vehicleUpdate">
                    <h1 class="h3 mb-2 font-weight-bold text-center">Vehicle details</h1>
                    <p class="h6 mb-4 text-center text-muted">Update your vehicle details!</p>
                    <?php endif;?>
                    <div class="form-group mb-2">
                        <label for="brand" class="mb-0"><b>Vehicle type</b></label>
                        <select class="form-control form-control-lg shadow-none border rounded font-12" name="type"
                            id="type">
                            <?php if (empty($vehicle["type"])):?>
                            <option value="" selected>Select</option>
                            <?php else: ?>
                            <optgroup label="Selected Vehicle">
                                <option value="<?php echo $vehicle["type"];?>">
                                    <?php echo $vehicle["type"];?>
                                </option>
                            </optgroup>
                            <?php endif;?>
                            <option value="Bike">Bike</option>
                            <option value="Car">Car</option>
                            <option value="Pickup">Pickup</option>
                        </select>
                        <input type="hidden" value="<?php echo $vehicle['id']; ?>" id="id" name="id">
                    </div>

                    <div class="form-group mb-2">
                        <label for="brand" class="mb-0"><b>Brand</b></label>
                        <input type="text" class="form-control form-control-lg shadow-none border rounded font-12"
                            placeholder="Brand " id="brand" name="brand" value="<?php echo $vehicle['brand']; ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="brand" class="mb-0"><b>Color</b></label>
                        <input type="text"
                            class="form-control form-control-lg shadow-none border rounded font-12"
                            placeholder="Color" id="color" name="color" value="<?php echo $vehicle['color']; ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="brand" class="mb-0"><b>Seats</b></label>
                        <input type="text"
                            class="form-control form-control-lg shadow-none border rounded font-12"
                            placeholder="Seats" id="seats" name="seats" value="<?php echo $vehicle['seats']; ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="brand" class="mb-0"><b>Model</b></label>
                        <input type="text"
                            class="form-control form-control-lg shadow-none border rounded font-12"
                            placeholder="Model" id="model" name="model" value="<?php echo $vehicle['model']; ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="brand" class="mb-0"><b>Reg number</b></label>
                        <input type="text" class="form-control form-control-lg shadow-none border rounded font-12"
                            placeholder="Reg number" id="reg_number" name="reg_number"
                            value="<?php echo $vehicle['reg_number']; ?>">
                    </div>
                    <br>
                    <?php if (empty($vehicle["type"])):?>
                    <button class="w-100 btn btn-lg btn-success font-12" type="submit">Add</button>
                    <?php else: ?>
                    <button class="w-100 btn btn-lg btn-success font-12" type="submit">Update</button>
                    <?php endif;?>
                </form>
        </section>
    </main>
    <?php app::component("footer"); ?>

    <script src="./modules/vehicle/js/data.js"></script>

</body>

</html>