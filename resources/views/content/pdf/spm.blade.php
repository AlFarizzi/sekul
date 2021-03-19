<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- CSS only -->
   <style>
       table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%
       }

       th {
            border:0;
            border-bottom: 1px solid black;
            padding:10px 0;
       }

       td {
           text-align: center;
           padding:10px 0;
            border:0;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h3 {
            text-align: center;
            border-bottom:1px solid black;
            padding:10px;
        }

   </style>
   <title>Laporan SPP Tahun {{$total[0]->tahun}}</title>
</head>
<body>
    <h3>Laporan SPM Tahun {{$total[0]->tahun}}</h3>
    <table class="table table-striped table-hover">
      <thead>
          <tr>
              <th>Tahun</th>
              <th>Bulan</th>
              <th>Total Spp</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($total as $t)
              <tr>
                  <td>{{$t->tahun}}</td>
                  <td>{{$t->bulan}}</td>
                  <td>Rp.{{number_format($t->total_spp)}}</td>
              </tr>
          @endforeach
      </tbody>
    </table>
</body>
</html>
