<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<div>
      <img src="image/2.png" width="300" height="100" style="float:left">
      <!-- <img src="image/1.jpg" width="300" height="100" style="float:right">
      <h1 style='margin: 0 auto; font-size: 60px; color:black; text-align: center;'>
      <strong>Absensi Karyawan</strong>
      </h1>
      <span style='display:block; float:Center; margin: 35px 0px 0 0;'>
      <hr style='display:block; margin: 35px 0px 0 0px;' />
      </span> -->
</div>
</head>
<body>
  <table id="table_absen" class="table table-striped">
            <thead bgcolor="#0a5aca" text-align="center">
              <tr>
                <th>TANGGAL</th>
                <th>KETERANGAN</th>
                <th>NIK</th>
                <th>BAGIAN</th>
                <th>NAMA KARYAWAN</th>
              </tr>
            </thead>
            <tbody id="table">
            </tbody>
          </table>
        </div>
      </section>

      <script>
        $(document).ready(function () {
          setInterval(function() {
            table()
          }, 5000); // This will load data every 5 seconds
        });

        function table(){
          $.ajax({
            url: "http://10.103.0.23/test_oracle.php?action=table",
            method: "GET",
            dataType: "JSON",
            success:function(res){
              $('#table_absen').DataTable({
                data: res,
                destroy: true,
                dom: 'Bfrtip',
                ordering: false,
                searching: false,
                info: false,
                paging: false,
                "columns": [
                { "render": function(data,type,full){
                  return full['TIME'] + '<br> ' + full['JAM'];
                }},
                { "data": "IOMODE" },
                { "data": "NOKAR"},
                { "render": function(data,type,full){
                  if(data = "null")
                  {return '';}
                  else
                  {return full['NAMA_KAR'] + '<br>' + full['BAGIAN'];}
                }}
              ],
              });
            }
          });
        }
      </script>
</html>
