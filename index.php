<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container mt-5">
        <div class="form-group">
            <label for="State">State:</label>
            <select id="State" class="form-control">
                <option value="">Select State</option>
            </select>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <select id="city" class="form-control">
                <option value="">Select City</option>
            </select>
        </div>

        <div class="form-group">
            <label for="block">Block:</label>
            <select id="block" class="form-control">
                <option value="">Select Block</option>
            </select>
        </div>
    </div>

    <script>
        $(Document).ready(function(){

             // Fetch countries
             $.ajax({
                url: 'php_code/getState.php',
                method: 'GET',
                success: function(data) {
                    $('#State').append(data);
                }
            });


             // Fetch cities based on selected state
             $('#State').change(function() {
                var stateId = $(this).val();
                
                if (stateId) {
                    $.ajax({
                        url: 'php_code/getCitie.php',
                        method: 'POST',
                        data: {stateId: stateId},
                        success: function(data) {
                            $('#city').html(data);
                            $('#block').html('<option value="">Select Block</option>'); // Reset block dropdown
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select City</option>');
                    $('#block').html('<option value="">Select Block</option>');
                }
            });



            $('#city').change(function() {
                var cityId = $(this).val();
                // alert(cityId);
                if (cityId) {
                    $.ajax({
                        url: 'php_code/getBlock.php',
                        method: 'POST',
                        data: {cityId: cityId},
                        success: function(data) {
                            $('#block').html(data);
                             
                        }
                    });
                } else {
                   
                    $('#block').html('<option value="">Select Block</option>');
                }
            });


            
        })
    </script>

    
</body>
</html>