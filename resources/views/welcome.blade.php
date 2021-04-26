<!DOCTYPE html>

<html>

<head>

	<title>Stripe Payment</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">

        .panel-title {

        display: inline;

        font-weight: bold;

        }

        .display-table {

            display: table;

        }

        .display-tr {

            display: table-row;

        }

        .display-td {

            display: table-cell;

            vertical-align: middle;

            width: 61%;

        }

    </style>

</head>

<body>



<div class="container">



    <h1>Donation Page</h1>



    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="panel panel-default credit-card-box">

                <div class="panel-heading display-table" >

                    <div class="row display-tr" >

                        <h3 class="panel-title display-td" >Donate Now!</h3>

                        

                    </div>

                </div>

                <div class="panel-body">

                    @if (Session::has('success'))

                        <div class="alert alert-success text-center">

                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                            <p>{{ Session::get('success') }}</p>

                        </div>

                    @endif

                        <div class='form-row row'>

                            <div class='col-xs-12 form-group required'>

                                <label class='control-label'>Amount</label> 
                                <input class='form-control' type='number' min="1" id="amount" required>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-xs-12">

                                <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="nextPage()">Donate</button>

                            </div>

                        </div>

                </div>

            </div>

        </div>

    </div>



</div>

<script>
    function nextPage()
    {
        var amount = document.getElementById('amount').value;
            window.location = '/stripe/payment?amount=' + amount;
    }
</script>

</body>



</html>
