<?php
session_start();
require 'dbCon.php';
include 'navbar.php';
//sa fie mail
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="reserve.css">
</head>

<body>

    <div class="container-book py-5">
        <div class="text-center">
            <h2 class="display-4 text-white">Book a Table</h2>
            <p class="text-white">Please fill out the form to make a reservation</p>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php if(isset($_SESSION['message'])) 
                {?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['message'] ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                unset($_SESSION['message']);
                }
                ?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <form action="book-now.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="example@yahoo.com">
                            </div>
                            <div class="mb-3">
                                <label for="number-persons" class="form-label">Number of Persons</label>
                                <input type="number" name="number_persons" class="form-control" min="1">
                            </div>
                            <div class="mb-3">
                                <label for="reservation-date" class="form-label">Reservation Date</label>
                                <input type="date" id="book-day" name="book_day" class="form-control" value="2020-08-23"
                                    min="2020-08-23">
                            </div>
                            <div class="mb-3">
                                <label for="reservation-hour" class="form-label">Reservation Time</label>
                                <input type="time" id="book-time" name="book_time" class="form-control" min="09:00"
                                    max="18:00" value="09:00" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="text-center">
            <h2>Contact Us</h2>
            <p>Please Feel Free To Contact Us</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <h4>Address</h4>
                <p>Calea Floreasca 118-120</p>
            </div>
            <div class="col-md-4">
                <h4>Email</h4>
                <p>tratorriafloreasca@gmail.com</p>
            </div>
            <div class="col-md-4">
                <h4>Call Us</h4>
                <p>+40799697022</p>
            </div>
        </div>

        <div class="text-center mt-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d11397.372691145529!2d26.102405768291405!3d44.426122361359226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x40b1ff0fb4bb2cd3%3A0x66c764429b5ff49b!2zRU5HSUUsIEJ1bGV2YXJkdWwgTcSDcsSDyJllyJl0aSwgQnVjdXJlyJl0aQ!3m2!1d44.419027199999995!2d26.0986177!4m5!1s0x40b1ff287ee872d5%3A0xbf8d70d143e610d0!2sStrada%20Delea%20Veche%2036%2C%20Bucure%C8%99ti%20024102!3m2!1d44.4330625!2d26.1282811!5e0!3m2!1sro!2sro!4v1695481099743!5m2!1sro!2sro" 
            width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <script src="" async defer></script>
</body>

</html>