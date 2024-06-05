<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.paypal.com/sdk/js?client-id=AbN2T-wZzOAz41jSkIje7Cd0XgN2551LNvljX9o282rwJvZDAB9uajavTk38Zxt9QxKj8q56OGpucXBN&currency=MXN"></script>
</head>
<body>

    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder:function(data,action){
                return action.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    alert("Pago Realizado");
                });
            },
            
            onCancel: function(data){
               alert("Pago Cancelado");
               console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
