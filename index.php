<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!----<link rel="stylesheet" href="fa/css/font-awesome.min.css">---->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<style>
    .h1{
        background-color: aquamarine;
    }
    .container{
        background-color: burlywood;
    }
    .body{
        background-color: burlywood;
    }

</style>

<body class="body">
    <br>
    <h4 style="text-align: center;">Restaur Yummy</h4>
    <br>

            <table class="table">
                <thead>
                    <tr>

                        <td colspan=2>
                            <input type="hidden" name="" id="txtRID" value="0" />
                            <input type="password" class="form-control" id="txtnameras" placeholder="ชื่อร้าน" />

                        </td>
                        <td><input type="text" class="form-control" id="txtRID" placeholder="รหัสอาหาร" /></td>
                        <td><input type="text" class="form-control" id="txtname" placeholder="ชื่ออาหาร" /></td>
                        <td><input type="text" class="form-control" id="pricefood" placeholder="ราคา" /></td>
                        <td><button class="btn btn-success" id="btnAdd"> 
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add </button></td>
                        <td><button class="btn btn-danger" id="btnClear>
                            <i class="fa fa-trash" aria-hidden="true"></i> Delete </button></td>
                            <td><button class="btn btn-warning" id="btnUpdate">
                                <i class="fa fa-upload" aria-hidden="true"></i> Update </button></td>

                    </tr>
                    <div class="container">
                        <table id="tblAll" class="table table-striped" style="margin-top:23px">
                            <thead>
                                <tr>
                                    <th>ชื่อร้าน </th>
                                    <th>ID อาหาร </th>
                                    <th>ชื่ออาหาร </th>
                                    <th>ราคา </th>
                
                                </tr>
                            </thead>
                        </table>
                        <br/>
                    </div>
                </thead>
                <tbody id="tblRestaurants"></tbody>
            </table>



</body>
<script>
    $(function () {
        $('#btnAdd').on('click', function () {
            var txtnameras ,txtRID, txtname, pricefood;
            txtnameras = $("#txtnameras").val();
            txtname = $("#txtname").val();
            txtRID = $("#txtRID").val();
            pricefood = $("#pricefood").val();
            var edit = "<a class='edit' href='JavaScript:void(0);' >Edit</a>";
            var del = "<a class='delete' href='JavaScript:void(0);'>Delete</a>";
            if (txtRID == "" || pricefood == "" || txtnameras == " ") {
                alert("กรุณากรอกข้อมูล!");
            } else {
                var table = "<tr><td>" + txtname + "</td><td>" + txtnameras + "</td><td>" + txtRID + "</td><td>" + pricefood + "</td><td>" + edit + "</td><td>" + del + "</td></tr>";
                $("#tblAll").append(table);
            }
            txtname = $("#txtname").val("");
            txtnameras = $("#txtnameras").val();
            txtRID = $("#txtRID").val("");
            pricefood = $("#pricefood").val("");
            Clear();
        });
        $('#btnUpdate').on('click', function () {
            var txtnameras ,txtRID, pricefood, txtname;
            txtnameras = $("#txtnameras").val();
            txtname = $("#txtname").val();
            txtRID = $("#txtRID").val();
            pricefood = $("#pricefood").val();
            $('#tblAll tbody tr').val().find('td').eq(0).html(txtnameras);
            $('#tblAll tbody tr').val().find('td').eq(1).html(txtRID);
            $('#tblAll tbody tr').val().find('td').eq(2).html(txtname);
            $('#tblAll tbody tr').val().find('td').eq(3).html(pricefood);
            $('#btnAdd').show();
            $('#btnUpdate').hide();
            Clear();
        });
        $("#tblAll").on("click", ".delete", function (e) {
            if (confirm("ยืนยันการลบ")) {
                $(this).closest('tr').remove();
            } else {
                e.preventDefault();
            }
        });
        $('#btnClear').on('click', function () {
            Clear();
        });
        $("#tblAll").on("click",".edit", function (e) {
            var row = $(this).closest('tr');
            $('#hfRowIndex').val($(row).index());
            var td = $(row).find("td");
            $('#txtnameras').val($(td).eq(1).html());
            $('#txtname').val($(td).eq(0).html());
            $('#txtRID').val($(td).eq(2).html());
            $('#pricefood').val($(td).eq(3).html());
            $('#btnAdd').hide();
            $('#btnUpdate').show();
        });
    });
    function Clear() {
        $("#txtnameras").val("");
        $("#txtname").val("");
        $("#txtRID").val("");
        $("#pricefood").val("");
        $("#hfRowIndex").val("");
    }
</script>

</html>
