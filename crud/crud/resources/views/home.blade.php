<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>CRUD</title>
</head>

<body>
    <div class="container mt-sm-2">
        <div class="row">
            <div class="col-sm-10 m-sm-auto">
                <div class="card border-dark">
                    <form id="studentForm">
                        <div class="card-header bg-light">National College Of Business Administration</div>
                        <!-- Card Header -->
                        <div class="card-body">
                            <h4 class="card-title">Student Registration</h4>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="studentId" id="studentId">
                                    <label for="studentName" class="form-label">Name</label>
                                    <input type="text" name="name" id="studentName" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="studentEmail" class="form-label">Email</label>
                                    <input type="email" name="email" id="studentEmail" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="studentAge" class="form-label">Age</label>
                                    <input type="number" name="age" id="studentAge" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->

                        <div class="card-footer bg-light">
                            <input type="submit" value="Submit" class="btn btn-primary" id="submit-button">
                        </div>
                        <!-- Card Footer -->
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }};
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mt-sm-1">
            <div class="col m-auto">
                <table class="table table-hover align-middle caption-top" style="text-align: center;">
                    <caption>Student List</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @foreach ($students as $stu)
                            <tr>
                                <th>{{ $stu->id }}</th>
                                <td>{{ $stu->name }}</td>
                                <td>{{ $stu->email }}</td>
                                <td>{{ $stu->age }}</td>
                                <td><button id="edit-student" class="btn btn-info"
                                        data-id="{{ $stu->id }}">Edit</button></td>
                                <td><button id="delete-student" class="btn btn-danger"
                                        data-id="{{ $stu->id }}">Delete</button></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $students->links() }}
            </div>
        </div>
    </div>

    <script>
        window._token = document.querySelector('meta[name="csrf-token"]').content;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submit-button').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ url('/create') }}',
                type: "POST",
                data: {
                    studentId: $('#studentId').val(),
                    studentName: $('#studentName').val(),
                    studentEmail: $('#studentEmail').val(),
                    studentAge: $('#studentAge').val(),
                    _token: window._token
                },
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        showTable();
                        $('#studentForm').trigger('reset');
                        $('#studentId').val('');
                    }
                },
            });
        });

        // Edit Student

        $('#table-body').on('click', '#edit-student', function() {

            let id = $(this).data('id');
            $row = $(this).closest('tr');
            let name = $row.find("td:nth-child(2)").text();
            let email = $row.find("td:nth-child(3)").text();
            let age = $row.find("td:nth-child(4)").text();

            $('#studentId').val(id);
            $('#studentName').val(name);
            $('#studentEmail').val(email);
            $('#studentAge').val(age);
        });

        //Deleting Student
        $('#table-body').on('click', '#delete-student', function() {

            let id = $(this).data('id');
            let mythis = this;
            $.ajax({
                url: `{{ url('/delete') }}`,
                type: "POST",
                data: {
                    sid: id
                },
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        $(mythis).closest('tr').fadeOut();
                    }
                },
            })
        });


        function showTable() {
            $.ajax({
                url: '{{ url('/showtable') }}',
                type: "GET",

                success: function(response, textStatus, xhr) {

                    if (xhr.status === 200) {
                        students = response.student.data;
                        let table = "";
                        students.forEach(student => {
                            table += `<tr>
                                        <th>${student.id}</th>
                                        <td>${student.name}</td>
                                        <td>${student.email}</td>
                                        <td>${student.age}</td>
                                        <td>
                                            <button id="edit-student" class="btn btn-info"
                                             data-id="${student.id}">Edit</button>
                                        </td>
                                        <td>
                                            <button id="delete-student" class="btn btn-danger"
                                             data-id="${student.id}">Delete</button>
                                        </td>
                                    </tr>`;
                        });
                        $('#table-body').html(table);
                    }
                },
            });
        }
    </script>
</body>

</html>
