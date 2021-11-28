<?php include './functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css//styles.css">
    <title>Test</title>
</head>

<body>

    <?php $activePage = 'add';
    include './components/header.php'; ?>

    <section class="contact-from pt-4">
        <div class="container">

            <div class="row mt-5">
                <div class="col-md-7 mx-auto">
                    <div class="form-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Registration form</h4>
                            </div>
                        </div>
                        <form _lpchecked="1" method="POST" action="functions.php">
                            <input type="hidden" name="action" value="register" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" required name="data[firstname]" class="form-control" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" required name="data[lastname]" class="form-control" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" required name="data[email]" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" required name="data[phone]" class="form-control" placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" required name="data[password]" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password_confirm" required name="data[password_confirm]" class="form-control" placeholder="Confirm password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="data[gender]" id="inlineRadio1" value="male" checked>
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="data[gender]" id="inlineRadio2" value="famale">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" required name="data[birthday]" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <select required name="data[country]" class="custom-select" id="exampleFormControlSelect1">
                                        <option value="" disabled selected hidden>Select country</option>
                                        <option value="Russia">Russia</option>
                                        <option value="USA">USA</option>
                                        <option value="France">France</option>
                                        <option value="China">China</option>
                                        <option value="Italia">Italia</option>
                                    </select>
                                </div>

                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="public/js/main.js"></script>
</body>

</html>