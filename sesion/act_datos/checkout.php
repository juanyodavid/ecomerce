<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/custom.css"><!-- hasta aca carga las librerias -->
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
        <form>
            <!--<div class="padding"> -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Payment Method</strong> 
                                <small>Enter your card details</small>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="paymentMethod">Please select a payment method</label>
                                    <select class="form-control" id="paymentMethod">
                                        <option>Payment Method</option>
                                        <option>Paypal</option>
                                        <option>Visa</option>
                                        <option>Mastercard</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="ccnumber">Credit Card Number</label>
                                        <div class="input-group">
                                        <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                            <i class="mdi mdi-credit-card"></i>
                                            </span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="ccmonth">Month</label>
                                    <select class="form-control" id="ccmonth">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="ccyear">Year</label>
                                    <select class="form-control" id="ccyear">
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cvv">CVV/CVC</label>
                                        <input class="form-control" id="cvv" type="text" placeholder="123">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input class="form-control" id="firstName" type="text"></textarea>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input class="form-control" id="lastName" type="text"></textarea>
                                    </div>
                                </div> 
                            </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input class="form-control" id="address" type="text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="address">Phone number</label>
                                    <input class="form-control" id="phoneNumber" type="text" placeholder="+886 937 123 456"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-success float-right" type="submit">
                                <i class="mdi mdi-gamepad-circle"></i>Confirm payment</button>
                                <button class="btn btn-sm btn-danger" type="reset">
                                <i class="mdi mdi-lock-reset"></i>Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!--</div> -->
        </form>
        </div>
</body>