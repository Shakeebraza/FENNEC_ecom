<?php
require_once("../../global.php");
include_once('../header.php');
?>

<div class="page-container">

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- USER DATA-->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>User Data
                            </h3>
                            <div class="filters m-b-45">
                                <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                    <select class="js-select2" name="property">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Products</option>
                                        <option value="">Services</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                    <select class="js-select2 au-select-dark" name="time">
                                        <option selected="selected">All Time</option>
                                        <option value="">By Month</option>
                                        <option value="">By Day</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                            <div class="table-responsive table-data">
                                <table id="userTable" class="table display">
                                    <thead>
                                        <tr>
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Role</td>
                                            <td>Type</td>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="deleteConfirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?
      </div>



<?php
include_once('../footer.php');
?>
<script>
$(document).ready(function() {
    
    var table = $('#userTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo $urlval ?>admin/ajax/user/fetchUsers.php",
            "type": "POST"
        },
        "columns": [
            {"data": "checkbox"}, 
            {"data": "name"}, 
            {"data": "email"},
            {"data": "role"},
            {"data": "type"}, 
            {"data": "actions"}
        ]
    });

    $('#userTable').on('click', '.btn-danger', function() {
        var userId = $(this).data('id'); 
            $.ajax({
                url: '<?php echo $urlval ?>admin/ajax/user/deleteUser.php', 
                type: 'POST',
                data: { id: userId },
                success: function(response) {
                    if (response.success) {
                        alert('User deleted successfully!');
                        table.ajax.reload(); 
                    } else {
                        alert('Error deleting user: ' + response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while deleting the user.');
                }
            });
    
    });
});

</script>
</body>

</html>