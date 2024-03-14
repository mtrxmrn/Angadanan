<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Admin List
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Admin List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
<div class='alert alert-danger alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-warning'></i> Error!</h4>
" . $_SESSION['error'] . "
</div>
";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
<div class='alert alert-success alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-check'></i> Success!</h4>
" . $_SESSION['success'] . "
</div>
";
                    unset($_SESSION['success']);
                }
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>


                                        <th>username</th>
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Member Since</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM admin";

                                        $query = $conn->query($sql);
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><img src="<?php echo (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg'; ?>" width="30px" height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['photo']; ?>"><span class="fa fa-edit"></span></a></td>
                                                <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                                <td><?php echo date('M d, Y', strtotime($row['created_on'])) ?></td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Delete</button>

                                                </td>
                                            </tr>
                                        <?php

                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/admin_modal.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
        let otp = '';
        $(() => {
            // Function to bind click events for edit and delete buttons
            function bindEvents() {
                $('.edit').click(function(e) {
                    e.preventDefault();
                    $('#edit').modal('show');
                    var id = $(this).data('id');

                    getRow(id);
                });

                $('.delete').click(function(e) {
                    e.preventDefault();
                    $('#delete').modal('show');
                    var id = $(this).data('id');

                    getRow(id);
                });

                $('.photo').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    getRow(id);
                });
            }

            // Initial binding of events
            bindEvents();

            // Function to fetch employee details via AJAX


            function getRow(id) {

                $.ajax({
                    type: 'POST',
                    url: 'admin_row.php',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Update modal fields with response data

                        $('.hrid').val(response.id);
                        $('.employee_id').html(response.id);
                        $('.del_employee_name').html(response.firstname + ' ' + response.lastname);
                        $('#employee_name').html(response.firstname + ' ' + response.lastname);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle any errors that occur during the AJAX request
                    }
                });
            }

            // Function to re-bind events after new content is added dynamically
            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                getRow(id);
            });

            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                getRow(id);
            });

            $(document).on('click', '.photo', function() {
                var id = $(this).data('id');
                getRow(id);
            });
        });

        function sendcode() {
            $.ajax({
                type: 'POST',
                url: 'admin_code.php',
                data: {
                    id: '<?php echo $_SESSION['admin']; ?>'
                },
                success: (response) => {
                    otp = response;

                }
            });
            let btn = document.querySelector('#btnCode');
            btn.disabled = true;
            let countdown = 60;
            let countdownInterval = setInterval(() => {
                if (countdown > 0) {
                    btn.innerHTML = countdown--;
                    console.log(countdown);
                } else {
                    clearInterval(countdownInterval);
                    btn.innerHTML = 'Re-send Code';
                }
            }, 1000);
            setTimeout(() => {
                btn.disabled = false;
            }, 60000);


        }
    </script>
</body>

</html>