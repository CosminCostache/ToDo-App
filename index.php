<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <title>TODO List Management using Bootstrap, PHP, MySql, AJAX, JQuery</title>
</head>

<body>

  <br />
  <br />

  <div class="container">
    <h1 align="center">TODO List Management using Bootstrap, PHP, MySql, AJAX, JQuery</h1>
    <br />
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-7">
            <h3 class="panel-title" style="margin-top: 7px;">My To-Do List</h3>
          </div>
          <div class="col-md-5">
            <form method="post" id="to_do_form">
              <span id="message"></span>
              <div class="input-group">
                <div class="row" style="justify-content: center;">
                  <div class="col-md-3" style="margin-right: 30px;">
                    <button type="button" name="new_category" id="new_category" class="btn btn-sm btn-success" data-toggle="modal" data-target="#new_category_modal">Add New Category
                    </button>
                  </div>
                  <div class="col-md-2">
                    <button type="button" name="new_todo" id="new_todo" class="btn btn-sm btn-success" data-toggle="modal" data-target="#new_todo_modal">Add New ToDo
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <br />
        <div class="list-group">

          <table class="table" id=todoListTable>
            <thead>
              <th class="col-md-1">ID</th>
              <th class="col-md-1">Category</th>
              <th class="col-md-1">Title</th>
              <th class="col-md-1">Status</th>
              <th class="col-md-1">Created at</th>
              <th class="col-md-1">Updated at</th>
              <th class="col-md-1">Deleted at</th>
              <th class="col-md-4">
                <div class="pull-right">Action</div>
              </th>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
<footer>
  <!-- Modals -->

  <!-- Add Category modal -->
  <div class="modal" id="new_category_modal" tabindex="-1" role="dialog" aria-labelledby="new_category_modal_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="new_category_modal_label">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="input-group">
            <input type="text" name="new_category_name" class="form-control" id="new_category_name" placeholder="New category...">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Cancel</button>
          <button id="new_category_modal_submit" type="submit" class="btn btn-primary btn-success">Add New
            Category
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Todo modal -->
  <div class="modal" id="new_todo_modal" tabindex="-1" role="dialog" aria-labelledby="new_todo_modal_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="new_todo_modal_label">Add New ToDo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="category_dropdown">Select category:</label>
            <select class="form-control" id="category_dropdown">
              <option value="" disabled selected>Select category</option>
            </select>
          </div>

          <div class="form-group">
            <label for="status_dropdown">Select status:</label>
            <select class="form-control" id="status_dropdown">
              <option value="" disabled selected>Select status</option>
              <option value="1">Status1</option>
              <option value="2">Status2</option>
            </select>
          </div>

          <div class="input-group">
            <input type="text" name="new_todo_name" class="form-control" id="new_todo_name" placeholder="New todo...">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Cancel</button>
          <button id="new_todo_modal_submit" type="submit" class="btn btn-primary btn-success">Add New todo
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Todo modal -->
  <div class="modal" id="edit_todo_modal" tabindex="-1" role="dialog" aria-labelledby="edit_todo_modal_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit_todo_modal_label">Edit ToDo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="category_dropdown">Select category:</label>
            <select class="form-control" id="edit_category_dropdown">
              <option value="" disabled selected>Select category</option>
            </select>
          </div>

          <div class="form-group">
            <label for="status_dropdown">Select status:</label>
            <select class="form-control" id="edit_status_dropdown">
              <option value="" disabled selected>Select status</option>
              <option value="1">Status1</option>
              <option value="2">Status2</option>
            </select>
          </div>

          <div class="input-group">
            <input type="text" name="edit_todo_name" class="form-control" id="edit_todo_name" placeholder="edit todo...">
          </div>

          <input type="text" name="edit_todo_id" class="form-control" id="edit_todo_id" hidden>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Cancel</button>
          <button id="edit_todo_modal_submit" type="submit" class="btn btn-primary btn-success">Edit todo
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Todo modal -->
  <div class="modal" id="delete_todo_modal" tabindex="-1" role="dialog" aria-labelledby="delete_todo_modal_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="delete_todo_modal_label">Edit ToDo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">


          <h4>Are you sure?</h4>

          <input type="text" name="delete_todo_id" class="form-control" id="delete_todo_id" hidden>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Cancel</button>
          <button id="delete_todo_modal_submit" type="submit" class="btn btn-primary btn-success">Edit todo
          </button>
        </div>
      </div>
    </div>
  </div>
</footer>

</html>

<!-- jQuery - Ajax -->
<script>
  $(document).ready(function() {

    // List all todos
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "main.php",
      data: {
        params: {
          'start': null,
          'end': null
        },
        action: 'getToDos'
      },
      success: function(response) {
        if (response.status == 404) {
          var row = $('<tr>');
          row.append('<td>' + response.message + '</td>');
          row.append($('</tr>'));
          $('table').append(row)
        } else {
          $.each(response.todo, function(index, obj) {
            var row = $('<tr>');
            row.append('<td  class="col-md-1">' + obj.id + '</td>');
            row.append('<td  class="col-md-1">' + obj.category_id + '</td>');
            row.append('<td  class="col-md-2">' + obj.title + '</td>');
            row.append('<td  class="col-md-1">' + obj.status + '</td>');
            row.append('<td  class="col-md-1">' + obj.created_at + '</td>');
            row.append('<td  class="col-md-1">' + obj.updated_at + '</td>');
            row.append('<td  class="col-md-1">' + obj.deleted_at + '</td>');
            row.append('<td class="col-md-4"><div class="btn-group pull-right"><button type="button" name="edit_todo_modal" id="edit_todo_button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit_todo_modal" data-todoid="' + obj.id + '"><span class=\'glyphicon glyphicon-edit\'></span></button><button type="button" name="delete_todo_modal" id="delete_todo_button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_todo_modal" data-todoid="' + obj.id + '"><span class=\'glyphicon glyphicon-trash\'></span></button></div></td>');
            $('table').append(row);
          })
        }
      }
    });

    $('#edit_todo_modal').on('show.bs.modal', function(e) {

      var todoId = $(e.relatedTarget).data('todoid');
      $('#edit_todo_id').val(todoId);

    });

    $('#delete_todo_modal').on('show.bs.modal', function(e) {

      var todoId = $(e.relatedTarget).data('todoid');
      $('#delete_todo_id').val(todoId);

    });

    // Add New Category
    $("#new_category_modal_submit").click(function(e) {
      e.preventDefault();
      if ($('#new_category_name').val().length == 0) {
        alert('Category name must exist');
        return false;
      }
      $.ajax({
        url: 'main.php',
        type: 'POST',
        data: {
          params: {
            'new_category_name': $('#new_category_name').val()
          },
          action: 'addCategory'
        },
        success: function(response) {
          var response = JSON.parse(response);
          alert(response.message);
          location.reload();
        },
      });
    });

    // Edit TODO
    $("#edit_todo_modal_submit").click(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "main.php",
        data: {
          params: {
            'id': $("#edit_todo_id").val(),
            'edit_todo_name': $('#edit_todo_name').val(),
            'edit_todo_category': $('#edit_category_dropdown').val(),
            'edit_todo_status': $('#edit_status_dropdown').val()
          },
          action: 'editToDo'
        },
        success: function(response) {
          var response = JSON.parse(response);
          alert(response.message);
          location.reload();
        }
      });
    });

    // Delete TODO
    $("#delete_todo_modal_submit").click(function(e) {
      e.preventDefault();
      var todoId = $("#delete_todo_id").val();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "main.php",
        data: {
          params: {
            'id': todoId
          },
          action: 'deleteToDo'
        },
        success: function(response) {
          var response = JSON.parse(response);
          alert(response.message);
          location.reload();
        }
      });
    });

    // Add TODO
    $("#new_todo_modal_submit").click(function(e) {
      e.preventDefault();
      if ($('#new_todo_name').val().length == 0) {
        alert('Todo name must exist');
        return false;
      }
      $.ajax({
        url: 'main.php',
        type: 'POST',
        data: {
          params: {
            'new_todo_name': $('#new_todo_name').val(),
            'new_todo_category': $('#category_dropdown').val(),
            'new_todo_status': $('#status_dropdown').val()
          },
          action: 'addTodo'
        },
        success: function(response) {
          var response = JSON.parse(response);
          alert(response.message);
          location.reload();
        },
      });
    });

    // GET Categories
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "main.php",
      data: {
        params: {
          'start': null,
          'end': null
        },
        action: 'getCategories'
      },
      success: function(response) {
        $.each(response.categories, function(i, category) {
          $('#category_dropdown').append($('<option>', {
            value: category.id,
            text: category.category_name
          }));
          $('#edit_category_dropdown').append($('<option>', {
            value: category.id,
            text: category.category_name
          }));
        });
      }
    });
  });
</script>