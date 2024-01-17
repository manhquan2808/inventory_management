<?php 
$male = 'Quan, Thinh';
$gender = 'male';
$a= 1/2;
echo $gender;
echo $$gender;
echo $php_erorrmsg;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Request Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
        integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>


    <table class="table user-table" id="example">
        <thead style="text-align: center;">
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Tên kho</th>
                <th class="border-top-0">Loại phiếu</th>
                <th class="border-top-0">Thời gian</th>
                <th class="border-top-0"></th>
            </tr>
        </thead>
    </table>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
        integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div id="result"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            // Function to make the AJAX request
            function fetchData() {
                // Replace 'https://example.com/api/endpoint' with your actual API endpoint
                fetch('./process_form.php')
                    // .then(response => response.json())
                    .then(data => {
                        // Handle the received data
                        displayData(data);
                    })
                    .catch(error => {
                        // Handle errors
                        console.error('Error fetching data:', error);
                    });
            }

            // Function to display the received data
            function displayData(data) {
                // Replace this with your actual logic to display the data
                document.getElementById('result').innerHTML = JSON.stringify(data, null, 2);
            }

            // Trigger the AJAX request when the page loads
            fetchData();
        });
    </script>

    <script>
        new DataTable('#example', {
            ajax: './process_form.php',
            columns: [
                { data: '#' },
                { data: 'resource_name' },
                { data: 'quantity' },
                { data: 'status' },
                {
                    data: null, // Placeholder for the buttons
                    render: function (data, type, row) {
                        // 'data' is the full data for the row, 'type' is the type of rendering

                        // Check if the type is 'display' (rendering for the user interface)
                        if (type === 'display') {
                            // Create a button with a data attribute for the time value
                            return '<button type="button" class="btn btn-info text-white view-button" data-time="' + row.status + '">Xem</button>';
                        }

                        // For other types (sorting, filtering, etc.), return the original data
                        return data;
                    }
                }

            ],
            order: [[3, 'desc']],
            // columnDefs: [
            //     { targets: [0,1,3],searchable: false  },
            // ]
        });
    </script>
</body>

</html>