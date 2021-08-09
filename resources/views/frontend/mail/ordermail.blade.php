<!DOCTYPE html>
<html>
<head>
    <title>Flip Ship Invoice for Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="card card-info">
            <div class="card-header">Invoice of Your Order</div>
            <div class="card-body">  
                <table class="table">
                    <thead>
                        <tr>
                            <th>Invoice No:</th>
                            <th>Amount:</th>
                            <th>Name:</th>
                            <th>Email:</th>
                            <th>Payment Method:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $order['invoice_no'] }}</td>
                            <td>${{ $order['Amount'] }}</td>
                            <td>{{ $order['name'] }}</td>
                            <td>{{ $order['email'] }}</td>
                            <td>{{ $order['payment_method'] }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>


</html>